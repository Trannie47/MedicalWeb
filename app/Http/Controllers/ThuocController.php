<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Thuoc;
use Illuminate\Support\Carbon;

class ThuocController extends Controller
{
    public function show($id)
    {
        $thuoc = Thuoc::join('Loaithuoc', 'thuoc.maLoai', '=', 'Loaithuoc.maLoai')
            ->select('thuoc.*', 'Loaithuoc.tenLoai') // lấy thêm tên loại
            ->where('thuoc.isDelete', false)
            ->where('thuoc.maThuoc', $id)
            ->firstOrFail();

        if (!$thuoc) {
            abort(404, 'Thuốc không tồn tại');
        }

        return view('ChiTietSanPham.index', compact('thuoc'));
    }

    public function getByLoai($id)
    {
        $thuocs = Thuoc::where('isDelete', false)
            ->where('maLoai', $id)
            ->get();

        if (!$thuocs) {
            abort(404, 'Sản phẩm không tồn tại');
        }

        return view('LoaiThuoc.index', compact('thuocs'));
    }

    public function getTrangChu()
    {
        $thuocKhuyenmai = Thuoc::where('isDelete', false)
            ->whereNotNull('giaKhuyenMai')
            ->get();
        $thuocmoi = Thuoc::where('isDelete', false)
            ->where('CreateAt', '>=', Carbon::now()->subMonth())
            ->get();

        return view('trangchu.index', compact('thuocKhuyenmai', 'thuocmoi'));
    }
}
