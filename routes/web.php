<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThuocController;


Route::get('/', function () {
    return view('trangchu.index'); 
});
//Page 
Route::get('/trangchu', function () {
    return view('trangchu.index');  
});

Route::get('/lienhe', function () {
    return view('LienHe.index');  
});

Route::get('/gioithieu', function () {
    return view('GioiThieu.index');  
});

Route::get('/dangnhap', function () {
    return view('DangNhap.index');  
});

Route::get('/dangki', function () {
    return view('DangKi.index');  
});

Route::get('/giohang', function () {
    return view('GioHang.index');  
});

Route::get('/thuoc/{id}', [ThuocController::class, 'show']);

Route::get('/loaithuoc/{id}', [ThuocController::class, 'getByLoai']);


//-----------------------------------------------------------------------------------------------------
//css
Route::get('/css/{file}', function ($file) {
    $path = resource_path('views/' . $file . '/index.css');

    if (!file_exists($path)) {
        abort(404);
    }

    $content = file_get_contents($path);
    return Response::make($content, 200, [
        'Content-Type' => 'text/css',
    ]);
});
//js
Route::get('/js/{file}', function ($file) {
    $path = resource_path('views/' . $file . '/index.js');

    if (!file_exists($path)) {
        abort(404);
    }

    $content = file_get_contents($path);
    return Response::make($content, 200, [
        'Content-Type' => 'application/javascript',
    ]);
});

//component
Route::get('/component/{file}', function ($file) {
    $path = resource_path('views/component/' . $file);

    if (!file_exists($path)) {
        abort(404);
    }

    // Lấy phần mở rộng file
    $ext = pathinfo($path, PATHINFO_EXTENSION);

    // Xác định Content-Type đúng
    $mimeTypes = [
        'css' => 'text/css',
        'js'  => 'application/javascript',
        'png' => 'image/png',
        'jpg' => 'image/jpeg',
        'jpeg'=> 'image/jpeg',
        'gif' => 'image/gif',
        'svg' => 'image/svg+xml',
        'webp'=> 'image/webp',
    ];

    $contentType = $mimeTypes[$ext] ?? 'application/octet-stream';

    return response()->file($path, [
        'Content-Type' => $contentType,
    ]);
});

