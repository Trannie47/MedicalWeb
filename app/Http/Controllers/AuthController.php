<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Khachhang;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('DangKi.index');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'phone' => 'required|string|unique:khachhang,sdt',
            'email' => 'nullable|email|unique:khachhang,email',
            'name' => 'required|string|min:3',
            'dateBorn' => 'required|string',
            'address' => 'required|string|min:3',
            'password' => 'required|min:6|confirmed', // cần password_confirmation
        ]);

        // Tạo khách hàng mới
        $khachhang = Khachhang::create([
            'sdt' => $data['phone'],
            'ten' => $data['name'],
            'email' => $data['email'] ?? null,
            'namsinh' => $data['dateBorn'],
            'diaChi' => $data['address'],
            'matKhau' => Hash::make($data['password']),
            'GhiChu' => null
        ]);

        // Tự động login
        Auth::guard('khachhang')->login($khachhang);


        // Redirect đến dashboard
        return redirect('/trangchu')->with('success', 'Đăng ký thành công, bạn đã được đăng nhập!');
    }
}

