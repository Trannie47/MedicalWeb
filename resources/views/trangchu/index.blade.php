{{-- resources/views/pages/trang-chu.blade.php --}}
@extends('app')

@section('title', 'Trang Chủ')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/trangchu') }}?v={{ time() }}">
@endpush

@section('content')

    <div id="body-container">
        <!-- Quảng cáo -->
        <div class="advertisement">
            <div class="splide large-ad">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide"><img src="{{ asset('asset/img/banner.png') }}" alt="QC1" /></li>
                        <li class="splide__slide"><img src="{{ asset('asset/img/banner2.png') }}" alt="QC2" /></li>
                        <li class="splide__slide"><img src="{{ asset('asset/img/banner3.png') }}" alt="QC3" /></li>
                        <li class="splide__slide"><img src="{{ asset('asset/img/banner4.png') }}" alt="QC4" /></li>
                        <li class="splide__slide"><img src="{{ asset('asset/img/banner1.png') }}" alt="QC5" /></li>
                        <li class="splide__slide"><img src="{{ asset('asset/img/banner5.png') }}" alt="QC6" /></li>
                    </ul>
                </div>
            </div>

            <div class="small-ads">
                <img src="{{ asset('asset/img/qc1.png') }}" alt="QC nhỏ 1" />
                <img src="{{ asset('asset/img/qc2.png') }}" alt="QC nhỏ 2" />
            </div>
        </div>

        <!-- Sản phẩm -->
        <section class="products">
            <h2>Sản phẩm Khuyến Mãi</h2>
            <div class="product-list">
                <a class="product-item" href="#">
                    <img src="{{ asset('asset/img/sp1.png') }}" alt="Chỉ nha khoa Oral-B">
                    <h3>Chỉ nha khoa Oral-B</h3>
                    <p class="old-price">65.000 đ</p>
                    <p class="price">52.000 đ/Hộp</p>
                    <button class="btn-item"><p>Chọn sản phẩm</p></button>
                </a>

                <a class="product-item" href="#">
                    <img src="{{ asset('asset/img/baby.png') }}" alt="Ferrolip">
                    <h3>Ferrolip</h3>
                    <p class="old-price">75.000 đ</p>
                    <p class="price">32.000 đ/Hộp</p>
                    <button class="btn-item"><p>Chọn sản phẩm</p></button>
                </a>

                <a class="product-item" href="#">
                    <img src="{{ asset('asset/img/sp2.png') }}" alt="Postinor">
                    <h3>Thuốc Postinor</h3>
                    <p class="old-price"></p>
                    <p class="price">37.000 đ/Hộp</p>
                    <button class="btn-item"><p>Chọn sản phẩm</p></button>
                </a>

                {{--<a class="product-item" href="{{ route('chi-tiet-san-pham', 'smecta') }}">
                    <img src="{{ asset('asset/img/sp3.png') }}" alt="Smecta">
                    <h3>Smecta</h3>
                    <p class="old-price">142.000 đ</p>
                    <p class="price">100.000 đ/Hộp</p>
                    <button class="btn-item"><p>Chọn sản phẩm</p></button>
                </a>

                <a class="product-item" href="{{ route('chi-tiet-san-pham', 'benadine') }}">
                    <img src="{{ asset('asset/img/sp4.png') }}" alt="Benadine">
                    <h3>Sát Khuẩn Benadine</h3>
                    <p class="old-price">65.000 đ</p>
                    <p class="price">52.000 đ/Chai</p>
                    <button class="btn-item"><p>Chọn sản phẩm</p></button>
                </a>

                <a class="product-item" href="{{ route('chi-tiet-san-pham', 'fabspar') }}">
                    <img src="{{ asset('asset/img/sp5.png') }}" alt="FABSPAR">
                    <h3>Thuốc FABSPAR</h3>
                    <p class="old-price"></p>
                    <p class="price">315.000 đ/lọ</p>
                    <button class="btn-item"><p>Chọn sản phẩm</p></button>
                </a>

                <a class="product-item" href="{{ route('chi-tiet-san-pham', 'nolpaza') }}">
                    <img src="{{ asset('asset/img/sp6.png') }}" alt="NOLPAZA">
                    <h3>Dạ dày NOLPAZA</h3>
                    <p class="old-price"></p>
                    <p class="price">Tư vấn với dược sỹ</p>
                    <button class="btn-item"><p>Chọn sản phẩm</p></button>
                </a> --}}
            </div>

            <!-- Sản phẩm mới -->
            <h2>Sản phẩm mới</h2>
            <div class="product-list">
                <a class="product-item" href="#">
                    <img src="{{ asset('asset/img/spm1.png') }}" alt="Salonpas">
                    <h3>Salonpas</h3>
                    <p class="old-price">16.000 đ</p>
                    <p class="price">12.000 đ/Gói</p>
                    <button class="btn-item"><p>Chọn sản phẩm</p></button>
                </a>
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