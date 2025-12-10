{{-- resources\views\ChiTietSanPham\index.blade.php --}}
@extends('app')

@section('title', $thuoc->tenThuoc ?? 'Chi Tiết Sản Phẩm')

@push('styles')
    <link rel="stylesheet" href="{{ url('/css/ChiTietSanPham?v=' . time()) }}">
    <style>

        .product-container {
            background: white;
            margin-top: 230px;
            margin-bottom: 2rem;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .product-image img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .badge-official {
            background: #dc3545;
            color: white;
        }
        .badge-freeship {
            background: #28a745;
            color: white;
        }
        .price-display {
            margin: 1.5rem 0;
        }
        .price-discount {
            background: #dc3545;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            display: inline-block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        .price-old {
            text-decoration: line-through;
            color: #6c757d;
            font-size: 18px;
            margin-right: 1rem;
        }
        .price-current {
            font-size: 32px;
            color: #dc3545;
            font-weight: bold;
        }
        .product-info {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 8px;
            margin: 1.5rem 0;
        }
        .product-info-row {
            display: flex;
            padding: 0.75rem 0;
            border-bottom: 1px solid #e9ecef;
        }
        .product-info-row:last-child {
            border-bottom: none;
        }
        .product-info-label {
            font-weight: 600;
            width: 150px;
            color: #495057;
        }
        .product-info-value {
            flex: 1;
            color: #212529;
        }
        .quantity-selector {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin: 1.5rem 0;
        }
        .quantity-input {
            display: flex;
            border: 1px solid #dee2e6;
            border-radius: 4px;
        }
        .qty-btn {
            width: 40px;
            height: 40px;
            border: none;
            background: #f8f9fa;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s;
        }
        .qty-btn:hover {
            background: #e9ecef;
        }
        .qty-input {
            width: 60px;
            border: none;
            text-align: center;
            font-weight: bold;
        }
        .qty-input:focus {
            outline: none;
        }
        .btn-action {
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
        }
        .btn-buy-now {
            background: #dc3545;
            color: white;
        }
        .btn-buy-now:hover {
            background: #c82333;
        }
        .btn-add-cart {
            background: #28a745;
            color: white;
        }
        .btn-add-cart:hover {
            background: #218838;
        }
        .alert-message {
            position: fixed;
            top: 100px;
            right: 20px;
            z-index: 9999;
            min-width: 300px;
            animation: slideIn 0.3s ease;
        }
        @keyframes slideIn {
            from {
                transform: translateX(400px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
@endpush

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-message alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle"></i> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="container py-4 ">
        <div class="product-container mx-auto">
            <div class="row g-4">
                <!-- Cột ảnh sản phẩm -->
                <div class="col-lg-5">
                    <div id="main-slider" class="splide mb-3">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @if ($thuoc->HinhAnh && count($thuoc->HinhAnh) > 0)
                                    @foreach($thuoc->HinhAnh as $hinh)
                                        <li class="splide__slide">
                                            <img src="{{ $hinh }}" 
                                                alt="{{ $thuoc->tenThuoc }}" 
                                                class="img-fluid rounded"
                                                style="object-fit: cover; height: 400px; width: 100%;">
                                        </li>
                                    @endforeach
                                @else
                                    <li class="splide__slide">
                                        <div class="bg-light d-flex align-items-center justify-content-center rounded" style="height: 400px;">
                                            <i class="fas fa-image fa-5x text-muted"></i>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <small class="text-muted">✓ Sản phẩm 100% chính hãng, mẫu mã có thể thay đổi theo lô hàng</small>
                </div>

                <!-- Cột thông tin sản phẩm -->
                <div class="col-lg-7">
                    <h1 class="h3 fw-bold mb-2">{{ $thuoc->tenThuoc }}</h1>
                    <small class="text-muted d-block mb-3">
                        <i class="fas fa-barcode"></i> {{ $thuoc->maThuoc }}
                    </small>

                    <!-- Badges -->
                    <div class="mb-3">
                        <span class="badge badge-official p-2">
                            <i class="fas fa-shield-alt"></i> CHÍNH HÃNG
                        </span>
                        <span class="badge badge-freeship p-2">
                            <i class="fas fa-truck"></i> FREESHIP
                        </span>
                    </div>

                    <!-- Giá tiền -->
                    <div class="price-display">
                        @if ($thuoc->giaKhuyenMai && $thuoc->giaKhuyenMai > 0 && $thuoc->giaKhuyenMai < $thuoc->GiaTien)
                            <div class="price-discount">
                                -{{ round((1 - $thuoc->giaKhuyenMai / $thuoc->GiaTien) * 100) }}%
                            </div>
                            <div class="mt-2">
                                <span class="price-old">{{ number_format($thuoc->GiaTien, 0, ',', '.') }}đ</span>
                            </div>
                            <div>
                                <span class="price-current">{{ number_format($thuoc->giaKhuyenMai, 0, ',', '.') }}đ</span>
                                <span class="text-muted ms-2">/ {{ $thuoc->DVTinh }}</span>
                            </div>
                        @else
                            <div>
                                <span class="price-current">{{ number_format($thuoc->GiaTien, 0, ',', '.') }}đ</span>
                                <span class="text-muted ms-2">/ {{ $thuoc->DVTinh }}</span>
                            </div>
                        @endif
                    </div>

                    <p class="text-muted small">
                        Giá đã bao gồm thuế, phí vận chuyển và các chi phí khác (nếu có) sẽ được thể hiện khi đặt hàng.
                    </p>

                    <!-- Thông tin sản phẩm -->
                    <div class="product-info">
                        <div class="product-info-row">
                            <div class="product-info-label"><i class="fas fa-cube"></i> Quy cách:</div>
                            <div class="product-info-value">{{ $thuoc->QuiCach }}</div>
                        </div>
                        <div class="product-info-row">
                            <div class="product-info-label"><i class="fas fa-tag"></i> Danh mục:</div>
                            <div class="product-info-value">{{ $thuoc->loaithuoc->TenLoai ?? 'N/A' }}</div>
                        </div>
                        <div class="product-info-row">
                            <div class="product-info-label"><i class="fas fa-industry"></i> NSX:</div>
                            <div class="product-info-value">{{ $thuoc->NSX }}</div>
                        </div>
                    </div>

                    <!-- Chọn số lượng -->
                    <form action="{{ route('gio-hang-add', $thuoc->maThuoc) }}" method="POST" class="mt-4">
                        @csrf
                        <div class="quantity-selector">
                            <label class="fw-bold">Số lượng:</label>
                            <div class="quantity-input">
                                <button type="button" class="qty-btn" id="qty-minus">−</button>
                                <input type="number" id="qty-input" name="quantity" value="1" min="1" class="qty-input">
                                <button type="button" class="qty-btn" id="qty-plus">+</button>
                            </div>
                        </div>

                        <!-- Nút hành động -->
                        <div class="d-grid gap-2 d-md-flex mt-4">
                            <button type="submit" class="btn btn-action btn-add-cart flex-grow-1">
                                <i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng
                            </button>
                            <button type="button" class="btn btn-action btn-buy-now flex-grow-1">
                                <i class="fas fa-bolt"></i> Mua ngay
                            </button>
                        </div>
                    </form>

                    <!-- Thông tin vận chuyển -->
                    <div class="row mt-4 text-center">
                        <div class="col-4">
                            <i class="fas fa-check-circle text-success fa-2x mb-2"></i>
                            <p class="small fw-bold">Đủ thuốc chuẩn</p>
                        </div>
                        <div class="col-4">
                            <i class="fas fa-clock text-warning fa-2x mb-2"></i>
                            <p class="small fw-bold">Giao hàng siêu tốc</p>
                        </div>
                        <div class="col-4">
                            <i class="fas fa-truck text-info fa-2x mb-2"></i>
                            <p class="small fw-bold">Miễn phí vận chuyển</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chi tiết sản phẩm -->
        <div class="container mt-5">
            <div class="card">
                <div class="card-header bg-light">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-info-circle"></i> Mô tả sản phẩm
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold text-muted">Thành phần:</div>
                        <div class="col-md-9">{{ $thuoc->ThanhPhan ?? 'Không có thông tin' }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold text-muted">Cách sử dụng:</div>
                        <div class="col-md-9">{{ $thuoc->CachSuDung ?? 'Không có thông tin' }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 fw-bold text-muted">Công dụng:</div>
                        <div class="col-md-9">{{ $thuoc->CongDung ?? 'Không có thông tin' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chatbox -->
    <button id="open_chatbox" title="Mở chat" style="position: fixed; bottom: 20px; right: 20px; width: 50px; height: 50px; border-radius: 50%; background: #667eea; color: white; border: none; cursor: pointer; z-index: 999; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
        <i class="fa-regular fa-message"></i>
    </button>
    <div id="chatbox" style="display:none; position: fixed; bottom: 80px; right: 20px; width: 400px; height: 600px; border-radius: 8px; overflow: hidden; z-index: 999; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
        <button id="close_chatbox" title="Đóng chatbox" style="position: absolute; top: 10px; right: 10px; background: #dc3545; color: white; border: none; width: 30px; height: 30px; border-radius: 50%; cursor: pointer; z-index: 1000;">×</button>
        <iframe src="https://www.chatbase.co/chatbot-iframe/iKp1d0Z7u4lW7wMauNcBu" width="100%" height="100%" frameborder="0"></iframe>
    </div>

    <button id="backToTop" title="Về đầu trang" style="position: fixed; bottom: 20px; right: 80px; width: 50px; height: 50px; border-radius: 50%; background: #28a745; color: white; border: none; cursor: pointer; z-index: 999; box-shadow: 0 4px 8px rgba(0,0,0,0.2); display: none;">
        <i class="fa-solid fa-angle-up"></i>
    </button>

@endsection

@push('scripts')
    <script>
        // Quantity selector
        document.getElementById('qty-plus').addEventListener('click', function(e) {
            e.preventDefault();
            let input = document.getElementById('qty-input');
            input.value = parseInt(input.value) + 1;
        });

        document.getElementById('qty-minus').addEventListener('click', function(e) {
            e.preventDefault();
            let input = document.getElementById('qty-input');
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
            }
        });

        // Splide carousel
        if (document.querySelector('.splide')) {
            new Splide('.splide', {
                type: 'slide',
                perPage: 1,
                pagination: true,
                arrows: true,
            }).mount();
        }

        // Chatbox toggle
        document.getElementById('open_chatbox')?.addEventListener('click', function() {
            document.getElementById('chatbox').style.display = 'block';
        });
        
        document.getElementById('close_chatbox')?.addEventListener('click', function() {
            document.getElementById('chatbox').style.display = 'none';
        });

        // Back to top
        window.addEventListener('scroll', function() {
            let btn = document.getElementById('backToTop');
            if (window.scrollY > 300) {
                btn.style.display = 'block';
            } else {
                btn.style.display = 'none';
            }
        });

    </script>
@endpush

<!-- Felix Do Done test push -->