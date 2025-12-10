<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Thuoc;
use Carbon\Carbon;

class ThuocController extends Controller
{
    public function show($id)
    {
       $thuoc = Thuoc::join('Loaithuoc', 'thuoc.maLoai', '=', 'Loaithuoc.maLoai')
              ->select('thuoc.*', 'Loaithuoc.tenLoai') // lấy thêm tên loại
              ->where('thuoc.maThuoc', $id)
              ->firstOrFail();

        if (!$thuoc) {
            abort(404, 'Thuốc không tồn tại');
        }

        return view('ChiTietSanPham.index', compact('thuoc'));
    }

    public function getByLoai($id)
    {
        $thuocs = Thuoc::where('maLoai', $id)
            ->get();

        if (!$thuocs) {
            abort(404, 'Sản phẩm không tồn tại');
        }

        return view('LoaiThuoc.index', compact('thuocs'));
    }

    public function getTrangChu()
    {
        // Sản phẩm khuyến mãi: có giaKhuyenMai và nhỏ hơn giá gốc
        $thuocKhuyenmai = Thuoc::whereNotNull('giaKhuyenMai')
            ->where('giaKhuyenMai', '>', 0)
            ->whereRaw('giaKhuyenMai < GiaTien')
            ->orderBy('giaKhuyenMai', 'desc')
            ->limit(20)
            ->get();

        // Sản phẩm mới: tạo trong 30 ngày gần đây
        $thuocmoi = Thuoc::where('CreateAt', '>=', Carbon::now()->subDays(30))
            ->orderBy('CreateAt', 'desc')
            ->limit(20)
            ->get();

        return view('trangchu.index', compact('thuocKhuyenmai', 'thuocmoi'));
    }
}
