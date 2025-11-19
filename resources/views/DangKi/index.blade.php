{{-- resources\views\DangKi\index.blade.php --}}
@extends('app')

@section('title', 'Đăng Kí')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/DangKi') }}?v={{ time() }}">
@endpush

@section('content')
    <div class="register-container">
        <h2>ĐĂNG KÍ</h2>
        <form class="register-form">
            <div class="input-wrapper">
                <div class="input-container">
                    <label class="label-container" for="email">Email</label>
                    <input type="email" id="email" placeholder="Email" required>
                </div>

                <div class="input-container">
                    <label class="label-container" for="name">Họ Tên</label>
                    <input type="name" id="name" placeholder="Họ Tên" required>
                </div>

                <div class="input-container">
                    <label class="label-container" for="password">Mật khẩu</label>
                    <input type="password" id="password" placeholder="Mật khẩu" required>
                </div>

                <div class="input-container">
                    <label class="label-container" for="password-confirm">Mật khẩu xác nhận</label>
                    <input type="password" id="password-confirm" placeholder="Mật khẩu xác nhận" required>
                </div>

                <div class="input-container">
                    <label class="label-container" for="phone">Số điện thoại</label>
                    <input type="phone" id="phone" placeholder="+84" required>
                </div>
            </div>
            <button type="submit" class="register-btn" >Đăng kí</button>
        </form>
    </div>
    @endsection

@push('scripts')
    <script src="{{ asset('js/DangKi') }}?v={{ time() }}"></script>
@endpush