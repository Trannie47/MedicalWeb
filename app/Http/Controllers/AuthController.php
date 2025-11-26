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

    public function showLogin()
    {
        return view('DangNhap.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);

        // Tìm khách hàng theo số điện thoại
        $khachhang = Khachhang::where('sdt', $credentials['phone'])->first();

        if ($khachhang && Hash::check($credentials['password'], $khachhang->matKhau)) {
            Auth::guard('khachhang')->login($khachhang);
            $request->session()->regenerate();

            return redirect('/trangchu')->with('success', 'Đăng nhập thành công!');
        }

        return back()->withErrors([
            'phone' => 'Số điện thoại hoặc mật khẩu không đúng',
        ])->onlyInput('phone');
    }


    public function logout(Request $request)
    {
        // Logout guard 'khachhang'
        Auth::guard('khachhang')->logout();

        // Xóa session để tránh lỗi 419
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Chuyển hướng về trang login hoặc trang chủ
        return redirect('/dangnhap')->with('success', 'Bạn đã đăng xuất thành công!');
    }


}

