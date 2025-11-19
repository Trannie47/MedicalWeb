<!-- resources/views/components/header.blade.php -->
<header>
    <div class="top-header">
        <div class="logo">
            <img src="{{ asset('asset/img/logo.png') }}" alt="Logo">
        </div>
        <div class="search-bar">
            <div class="search-container">
                <input id="search-input" type="text" placeholder="Tìm kiếm sản phẩm">
                <button class="search-btn">
                    <i class="fa fa-search"></i>
                </button>
            </div>
            <div class="menu-icon">Menu</div>
        </div>
        <div class="user-bar">
            <a href="#" id="cart-toggle"><i class="fa-solid fa-cart-shopping"></i></a>
            <a id="user-card" 
               href="{{ route('dang-nhap') }}"
            >
                <i class="fa-solid fa-circle-user"></i>
                <p>Đăng nhập/ Đăng ký</p>
            </a>
        </div>
    </div>

    <nav class="nav">
        <div class="nav-wrapper">
            <div class="category-dropdown">
                <button class="dropdown-toggle">
                    <i class="fa fa-bars"></i> Danh mục sản phẩm <i class="fa fa-chevron-down"></i>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('loai-thuoc') }}">Thuốc kê đơn</a></li>
                    <li><a href="{{ route('loai-thuoc-khong-ke-don') }}">Thuốc không kê đơn</a></li>
                </ul>
            </div>
            <ul class="menu-bar">
                <li><a href="{{ route('trang-chu') }}"> <i class="fa-solid fa-home"></i> Trang chủ</a></li>
                <li><a href="{{ route('tin-tuc') }}">Tin tức</a></li>
                <li><a href="{{ route('lien-he') }}">Liên lạc</a></li>
                <li><a href="{{ route('gioi-thieu') }}">Giới thiệu</a></li>
                <li><a href="{{ route('lab-thuc-hanh') }}">Lab Thực Hành</a></li>
            </ul>
        </div>
    </nav>

    <div class="cart-wrapper">
        <div id="cart-modal" class="cart-modal">
            <ul class="cart-items">
                <li id="sp-1">
                    <img src="{{ asset('asset/img/spm1.png') }}" alt="">
                    <div class="item-info">
                        <p>Cao dán Salonpas Hisamitsu</p>
                        <div class="item-info-price">
                            <small>1</small>
                            <small>x</small>
                            <small class="storage-price">12.000</small>
                            <small>đ</small>
                        </div>
                    </div>
                    <button class="remove">×</button>
                </li>
                <li id="sp-2">
                    <img src="{{ asset('asset/img/sp2.png') }}" alt="">
                    <div class="item-info">
                        <p>Postinor</p>
                        <div class="item-info-price">
                            <small>1</small>
                            <small>x</small>
                            <small class="storage-price">35.000</small>
                            <small>đ</small>
                        </div>
                    </div>
                    <button class="remove">×</button>
                </li>
                <li id="sp-3">
                    <img src="{{ asset('asset/img/sp3.png') }}" alt="">
                    <div class="item-info">
                        <p>Smecta</p>
                        <div class="item-info-price">
                            <small>1</small>
                            <small>x</small>
                            <small class="storage-price">140.000</small>
                            <small>đ</small>
                        </div>
                    </div>
                    <button class="remove">×</button>
                </li>
            </ul>
            <div class="cart-footer">
                <p><strong>Tổng:</strong> 187.000 đ</p>
                <div class="cart-actions">
                    <a href="{{ route('gio-hang') }}" class="btn">Xem Giỏ Hàng</a>
                    <a href="#" class="btn">Thanh Toán</a>
                </div>
            </div>
        </div>
    </div>
</header>