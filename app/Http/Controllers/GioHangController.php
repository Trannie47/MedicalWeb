<?php

namespace App\Http\Controllers;

use App\Models\Chitietdonhang;
use App\Models\Donhang;
use Illuminate\Http\Request;
use App\Models\Thuoc;
use Illuminate\Support\Facades\Auth;

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

        if (isset($cart[$id])) {
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

        return back()->with('success', 'Thêm vào giỏ hàng thành công!');
    }

    public function removeFromCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
    }

    public function updateCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (!isset($cart[$id])) {
            return back()->with('error', 'Sản phẩm không tồn tại trong giỏ hàng.');
        }

        $action = $request->input('action'); // 'inc' hoặc 'dec'
        $quantity = (int) $request->input('quantity', $cart[$id]['soLuong']);

        if ($action === 'inc') {
            $cart[$id]['soLuong'] = $quantity + 1;
        } elseif ($action === 'dec') {
            $cart[$id]['soLuong'] = max(1, $quantity - 1); // không cho số lượng < 1
        } else {
            // Nếu người dùng nhập trực tiếp số lượng
            $cart[$id]['soLuong'] = max(1, $quantity);
        }

        session()->put('cart', $cart);
        return back()->with('success', 'Cập nhật giỏ hàng thành công.');
    }

    public function ShowCartDetail()
    {
        $cart = session('cart', []);
        return view('GioHang.index', compact('cart'));
    }

    public function pay()
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return back()->with('error', 'Giỏ hàng trống!');
        }

        if (!Auth::guard('khachhang')->check()) {
            return redirect('/dangnhap')->with('error', 'Bạn cần đăng nhập để thanh toán!');
        }

        $user = Auth::guard('khachhang')->user();

        $today = now()->format('Ymd');

        $lastOrder = Donhang::where('ngaydat', $today)
            ->orderBy('maDonHang', 'DESC')
            ->first();

        if ($lastOrder) {
            $lastIndex = (int) substr($lastOrder->maDonHang, -3);
            $newIndex = str_pad($lastIndex + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newIndex = "001";
        }

        $maDon = $today . $newIndex;

        // 4. Tính tổng tiền
        $tongTien = array_sum(array_map(fn($item) => $item['gia'] * $item['soLuong'], $cart));

        // 5. Lưu đơn hàng
        Donhang::create([
            'maDonHang'   => $maDon,
            'ngaydat'     => $today,
            'tongTien'    => $tongTien,
            'DiaChi'      => $user->diaChi,
            'SdtNguoiDat' => $user->sdt,
            'MaKH'        => $user->maKhachHang ?? null
        ]);

        // 6. Lưu chi tiết đơn
        foreach ($cart as $maThuoc => $item) {
            Chitietdonhang::create([
                'maDonHang' => $maDon,
                'maThuoc'   => $maThuoc,
                'SoLuong'   => $item['soLuong'],
                'SoTien'    => $item['gia'] * $item['soLuong'],
            ]);
        }

        // 7. Xóa giỏ hàng
        session()->forget('cart');

        return redirect()->route('cart.index')
            ->with('success', "Đặt hàng thành công! Mã đơn: $maDon");
    }
}
