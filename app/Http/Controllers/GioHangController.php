<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thuoc;


class GioHangController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Thuoc::findOrFail($id);

        $credentials = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);

        $image = is_array($product->HinhAnh) && !empty($product->HinhAnh)
                ? $product->HinhAnh[0]
                : "logo.png";

        $giaTien = $product->giaKhuyenMai ?? $product->GiaTien;

        if(isset($cart[$id])) {
            $cart[$id]['soLuong'] += $credentials['quantity'];
        } else {
            $cart[$id] = [
                'tenThuoc' => $product->tenThuoc,
                'gia' => $giaTien,
                'hinhAnh' => $image,
                'soLuong' => $credentials['quantity']
            ];
        }

        session()->put('cart', $cart);

        // Debug: xem session
        // dd(session('cart'));

        return back()->with('success', 'Thêm vào giỏ hàng thành công!');
    }

    public function removeFromCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            unset($cart[$id]); 
            session()->put('cart', $cart); 
        }

        return back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
    }

    public function updateCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if(!isset($cart[$id])) {
            return back()->with('error', 'Sản phẩm không tồn tại trong giỏ hàng.');
        }

        $action = $request->input('action'); // 'inc' hoặc 'dec'
        $quantity = (int) $request->input('quantity', $cart[$id]['soLuong']);

        if($action === 'inc') {
            $cart[$id]['soLuong'] = $quantity + 1;
        } elseif($action === 'dec') {
            $cart[$id]['soLuong'] = max(1, $quantity - 1); // không cho số lượng < 1
        } else {
            // Nếu người dùng nhập trực tiếp số lượng
            $cart[$id]['soLuong'] = max(1, $quantity);
        }

        session()->put('cart', $cart);
        dd(session('cart'));
        return back()->with('success', 'Cập nhật giỏ hàng thành công.');
    }


}
