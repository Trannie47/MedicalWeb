{{-- resources\views\GioHang\index.blade.php --}}
@extends('app')

@section('title', 'Giỏ Hàng')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/GioHang') }}?v={{ time() }}">
@endpush

@section('content')

    <div class="storage-container">
        <div class="cart-page">
            <!-- LEFT: Cart Items -->
            <div class="shoping__cart__table">
                <div class="cart__header">
                    <div class="cart__item">
                        <span>Sản phẩm</span>
                        <div class="image-placeholder"></div> <!-- giữ chỗ cho ảnh -->
                    </div>
                    <div>Giá</div>
                    <div>Số lượng</div>
                    <div>Tổng</div>
                    <div></div>
                </div>


                <div class="cart__body">
                    <!-- Cart Item 1 -->
                    <div class="cart__row" data-price="12000">
                        <div class="cart__col cart__product">
                            <div class="cart__item">
                                <img src="/asset/img/spm1.png" alt="" width="100px">
                                <div class="cart__name">Cao dán Salonpas Hisamitsu</div>
                            </div>
                        </div>
                        <div class="cart__col cart__price">12.000 đ</div>
                        <div class="cart__col cart__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <div class="dec">-</div>
                                    <div class="quantity-input">1</div>
                                    <div class="inc">+</div>
                                </div>
                            </div>
                        </div>
                        <div class="cart__col cart__total">12.000 đ</div>
                        <div class="cart__col cart__remove">
                            <div class="icon_close"></div>
                        </div>
                    </div>

                    <!-- Cart Item 2 -->
                    <div class="cart__row" data-price="35000">
                        <div class="cart__col cart__product">
                            <div class="cart__item">
                                <img src="/asset/img/sp1.png" alt="" width="100px">
                                <div class="cart__name">Postinor</div>
                            </div>
                        </div>
                        <div class="cart__col cart__price">35.000 đ</div>
                        <div class="cart__col cart__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <div class="dec">-</div>
                                    <div class="quantity-input">1</div>
                                    <div class="inc">+</div>
                                </div>
                            </div>
                        </div>
                        <div class="cart__col cart__total">35.000 đ</div>
                        <div class="cart__col cart__remove">
                            <div class="icon_close"></div>
                        </div>
                    </div>

                    <!-- Cart Item 3 -->
                    <div class="cart__row" data-price="140000">
                        <div class="cart__col cart__product">
                            <div class="cart__item">
                                <img src="/asset/img/sp3.png" alt="" width="100px">
                                <div class="cart__name">Smecta</div>
                            </div>
                        </div>
                        <div class="cart__col cart__price">140.000 đ</div>
                        <div class="cart__col cart__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <div class="dec">-</div>
                                    <div class="quantity-input">1</div>
                                    <div class="inc">+</div>
                                </div>
                            </div>
                        </div>
                        <div class="cart__col cart__total">140.000 đ</div>
                        <div class="cart__col cart__remove">
                            <div class="icon_close"></div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- RIGHT: Order Summary -->
            <div class="order-summary">
                <h2>Thông tin đơn hàng</h2>
                <div class="total">
                    <span>Tổng tiền:</span>
                    <strong>3,870,000 ₫</strong>
                </div>
                <button class="checkout-btn">Thanh toán</button>
            </div>
        </div>
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
    <script src="{{ asset('js/GioHang') }}?v={{ time() }}"></script>
@endpush