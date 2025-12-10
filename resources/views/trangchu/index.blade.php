{{-- resources/views/pages/trang-chu.blade.php --}}
@extends('app')

@section('title', 'Trang Chủ')

@push('styles')
    <link rel="stylesheet" href="{{ url('/css/trangchu?v=' . time()) }}">
@endpush

@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp

    <div id="body-container">
        <!-- Quảng cáo -->
        <div class="advertisement-wrapper" align="center">
            <div class="container-fluid px-0">
                <div class="row g-0 align-items-stretch">
                    <div class="col-lg-9 mx-auto">
                        <div class="splide large-ad">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    <li class="splide__slide"><img src="{{ asset('asset/img/banner.png') }}" alt="QC1" /></li>
                                    <li class="splide__slide"><img src="{{ asset('asset/img/banner2.png') }}" alt="QC2" /></li>
                                    <li class="splide__slide"><img src="{{ asset('asset/img/banner3.png') }}" alt="QC3" /></li>
                                    <li class="splide__slide"><img src="{{ asset('asset/img/banner4.png') }}" alt="QC4" /></li>
                                    <li class="splide__slide"><img src="{{ asset('asset/img/banner1.png') }}" alt="QC5" /></li>
                                    <li class="splide__slide"><img src="{{ asset('asset/img/banner5.png') }}" alt="QC6" /></li>
                                    <li class="splide__slide"><img src="{{ asset('asset/img/banner6.png') }}" alt="QC7" /></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sản phẩm -->
        <section class="products py-5">
            <div class="container-fluid px-3 px-md-5">
                <!-- Sản phẩm Khuyến Mãi -->
                <h2 class="mb-4 fw-bold text-dark">
                    <i class="fas fa-tag text-danger"></i> Sản phẩm Khuyến Mãi
                </h2>
                
                @if ($thuocKhuyenmai && $thuocKhuyenmai->count() > 0)
                <div class="row g-4 mb-5">
                    @foreach ($thuocKhuyenmai as $thuoc)
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="product-card h-100" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); border-radius: 8px; overflow: hidden; display: flex; flex-direction: column;">
                            <div class="position-relative overflow-hidden" style="height: 220px; background: #f8f9fa;">
                                @if ($thuoc->getThumbnailImage())
                                <img src="{{ $thuoc->getThumbnailImage() }}" 
                                     alt="{{ $thuoc->tenThuoc }}"
                                     style="object-fit: cover; height: 100%; width: 100%; transition: transform 0.3s;">
                                @else
                                <div style="display: flex; align-items: center; justify-content: center; height: 100%; color: #6c757d;">
                                    <i class="fas fa-image fa-3x"></i>
                                </div>
                                @endif
                                @if ($thuoc->giaKhuyenMai && $thuoc->giaKhuyenMai < $thuoc->GiaTien)
                                <span style="position: absolute; top: 8px; left: 8px; background: #dc3545; color: white; padding: 6px 10px; border-radius: 4px; font-weight: bold; font-size: 12px;">
                                    -{{ round((1 - $thuoc->giaKhuyenMai / $thuoc->GiaTien) * 100) }}%
                                </span>
                                @endif
                            </div>
                            <div style="padding: 16px; display: flex; flex-direction: column; flex-grow: 1;">
                                <h6 style="margin: 0 0 8px 0; font-weight: bold; color: #343a40; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; font-size: 14px;">
                                    {{ Str::limit($thuoc->tenThuoc, 35) }}
                                </h6>
                                <small style="color: #6c757d; margin: 4px 0;">
                                    <i class="fas fa-folder"></i> {{ $thuoc->loaithuoc->TenLoai ?? 'Chưa phân loại' }}
                                </small>
                                <small style="color: #6c757d; margin: 4px 0;">
                                    <i class="fas fa-cube"></i> {{ $thuoc->QuiCach }} / {{ $thuoc->DVTinh }}
                                </small>
                                <div style="margin-top: auto; padding-top: 12px;">
                                    @if ($thuoc->giaKhuyenMai && $thuoc->giaKhuyenMai > 0)
                                    <small style="color: #6c757d; text-decoration: line-through; display: block;">
                                        {{ number_format($thuoc->GiaTien, 0, ',', '.') }}đ
                                    </small>
                                    <h6 style="color: #dc3545; font-weight: bold; margin: 4px 0;">
                                        {{ number_format($thuoc->giaKhuyenMai, 0, ',', '.') }}đ
                                    </h6>
                                    @else
                                    <h6 style="color: #28a745; font-weight: bold; margin: 0;">
                                        {{ number_format($thuoc->GiaTien, 0, ',', '.') }}đ
                                    </h6>
                                    @endif
                                    <div style="display: flex; gap: 8px; margin-top: 12px;">
                                        <a href="{{ route('chi-tiet-san-pham', $thuoc->maThuoc) }}" 
                                           class="btn btn-sm btn-primary flex-grow-1" style="font-size: 12px;">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('gio-hang-add', $thuoc->maThuoc) }}" 
                                           class="btn btn-sm btn-success flex-grow-1" style="font-size: 12px;">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="alert alert-info text-center mb-5">
                    <i class="fas fa-box-open fa-2x mb-3"></i>
                    <p class="mb-0">Hiện không có sản phẩm khuyến mãi nào.</p>
                </div>
                @endif

                <!-- Sản phẩm mới -->
                <h2 class="mb-4 fw-bold text-dark">
                    <i class="fas fa-star text-warning"></i> Sản phẩm mới
                </h2>
                
                @if ($thuocmoi && $thuocmoi->count() > 0)
                <div class="row g-4">
                    @foreach ($thuocmoi as $thuoc)
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="product-card h-100" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); border-radius: 8px; overflow: hidden; display: flex; flex-direction: column;">
                            <div class="position-relative overflow-hidden" style="height: 220px; background: #f8f9fa;">
                                @if ($thuoc->getThumbnailImage())
                                <img src="{{ $thuoc->getThumbnailImage() }}" 
                                     alt="{{ $thuoc->tenThuoc }}"
                                     style="object-fit: cover; height: 100%; width: 100%; transition: transform 0.3s;">
                                @else
                                <div style="display: flex; align-items: center; justify-content: center; height: 100%; color: #6c757d;">
                                    <i class="fas fa-image fa-3x"></i>
                                </div>
                                @endif
                                <span style="position: absolute; top: 8px; left: 8px; background: #17a2b8; color: white; padding: 6px 10px; border-radius: 4px; font-weight: bold; font-size: 12px;">
                                    <i class="fas fa-fire-alt"></i> Mới
                                </span>
                            </div>
                            <div style="padding: 16px; display: flex; flex-direction: column; flex-grow: 1;">
                                <h6 style="margin: 0 0 8px 0; font-weight: bold; color: #343a40; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; font-size: 14px;">
                                    {{ Str::limit($thuoc->tenThuoc, 35) }}
                                </h6>
                                <small style="color: #6c757d; margin: 4px 0;">
                                    <i class="fas fa-folder"></i> {{ $thuoc->loaithuoc->TenLoai ?? 'Chưa phân loại' }}
                                </small>
                                <small style="color: #6c757d; margin: 4px 0;">
                                    <i class="fas fa-cube"></i> {{ $thuoc->QuiCach }} / {{ $thuoc->DVTinh }}
                                </small>
                                <div style="margin-top: auto; padding-top: 12px;">
                                    @if ($thuoc->giaKhuyenMai && $thuoc->giaKhuyenMai > 0)
                                    <small style="color: #6c757d; text-decoration: line-through; display: block;">
                                        {{ number_format($thuoc->GiaTien, 0, ',', '.') }}đ
                                    </small>
                                    <h6 style="color: #dc3545; font-weight: bold; margin: 4px 0;">
                                        {{ number_format($thuoc->giaKhuyenMai, 0, ',', '.') }}đ
                                    </h6>
                                    @else
                                    <h6 style="color: #28a745; font-weight: bold; margin: 0;">
                                        {{ number_format($thuoc->GiaTien, 0, ',', '.') }}đ
                                    </h6>
                                    @endif
                                    <div style="display: flex; gap: 8px; margin-top: 12px;">
                                        <a href="{{ route('chi-tiet-san-pham', $thuoc->maThuoc) }}" 
                                           class="btn btn-sm btn-primary flex-grow-1" style="font-size: 12px;">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('gio-hang-add', $thuoc->maThuoc) }}" 
                                           class="btn btn-sm btn-success flex-grow-1" style="font-size: 12px;">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="alert alert-info text-center">
                    <i class="fas fa-box-open fa-2x mb-3"></i>
                    <p class="mb-0">Hiện không có sản phẩm mới nào.</p>
                </div>
                @endif
            </div>
        </section>

        <!-- Tin tức -->
        <section class="news">
            <h2>Góc sức khỏe</h2>
            <div class="news-wrapper">
                <button class="prev-btn"><i class="fa-solid fa-chevron-left"></i></button>

                 <div class="news-list">
                    <a class="news-item news-item-large" href="#">
                        <img src="{{ asset('asset/img/covid.png') }}" alt="Covid">
                        <div class="news-content">
                            <span class="news-category">Tin dịch bệnh</span>
                            <h3>Tình trạng covid 19 hiện nay và cách phòng tránh</h3>
                            <p>So với cùng kỳ năm ngoái, tổng số ca mắc Covid-19 được ghi nhận tại TPHCM năm 2023 giảm đến 83%...</p>
                        </div>
                    </a>

                    {{--<a class="news-item" href="{{ route('chi-tiet-tin-tuc', 'sua-bi-do') }}">
                        <img src="{{ asset('asset/img/suabido.png') }}" alt="Sữa bí đỏ">
                        <div class="news-content">
                            <span class="news-category">Sống khỏe</span>
                            <h4>Sữa bí đỏ - bữa phụ bổ dưỡng cho bé yêu</h4>
                            <p>Bữa phụ sữa bí đỏ được xem là một món đồ uống rất bổ dưỡng cho trẻ nhỏ...</p>
                        </div>
                    </a>

                    <a class="news-item" href="{{ route('chi-tiet-tin-tuc', 'gia-vi-rac-com') }}">
                        <img src="{{ asset('asset/img/gvị rắc cơm.png') }}" alt="Gia vị rắc cơm">
                        <div class="news-content">
                            <span class="news-category">Sống khỏe</span>
                            <h4>Gia vị rắc cơm cho bé: tăng thêm hương vị và dinh dưỡng</h4>
                            <p>Gia vị là một trong những cách đơn giản giúp cơm thêm ngon miệng và đủ chất...</p>
                        </div>
                    </a> --}}
                </div> 

                <button class="next-btn"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
        </section>
    </div>

    <!-- Chatbox -->
    <button id="open_chatbox" title="Mở chat"><i class="fa-regular fa-message"></i></button>
    <div id="chatbox" style="display:none;">
        <button id="close_chatbox" title="Đóng chatbox">×</button>
        <iframe src="https://www.chatbase.co/chatbot-iframe/iKp1d0Z7u4lW7wMauNcBu" width="100%" height="100%" frameborder="0" style="min-height: 500px;"></iframe>
    </div>

    <button id="backToTop" title="Về đầu trang"><i class="fa-solid fa-angle-up"></i></button>

@endsection

@push('scripts')
    <script src="{{ asset('js/trangchu') }}?v={{ time() }}"></script>
@endpush