<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Thuoc;

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
}
