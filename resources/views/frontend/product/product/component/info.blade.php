<div class="product-info">
    <div class="price-container">
        {!! $price['html'] !!}
    </div>
    
    <div class="product-detail__description">
        {!! $product->description !!}
    </div>
    <div class="uk-grid uk-grid-medium">
        <div class="uk-width-large-1-2">
            <a class="button-item suggest">
                <span class="main-text">Yêu cầu tư vấn</span>
                <span class="small-text">Thông tin chi tiết nhất</span>
            </a>
        </div>
        <div class="uk-width-large-1-2">
            <a class="button-item book">
                <span class="main-text">Hẹn lịch đến xem</span>
                <span class="small-text">Được sắp chỗ để xe miễn phí</span>
            </a>
        </div>
    </div>
    <div class="quick-consult">
        <div class="quick-consult-title">Tư vấn nhanh</div>
        <div class="quick-consult-form">
            <input type="tel" class="phone-input" placeholder="Nhập số điện thoại..." required>
            <button type="submit" class="submit-button">Gửi</button>
        </div>
    </div>
    <div class="shopware mb20">
        <p>HỆ THỐNG SHOWROOM CHÍNH HÃNG:</p>
        <p>Hà Nội: {{ $system['contact_office'] }}</p>
        <p>TP. HCM: {{ $system['hcm_office'] }}</p>
    </div>

    <div class="order-group">
        <div class="uk-grid uk-grid-medium">
            <div class="uk-width-large-1-2">
                <button class="btn-product-button addToCart order-button-item" data-id="{{ $product->id }}">
                    Thêm vào giỏ hàng
                </button>
            </div>
            <div class="uk-width-large-1-2">
                <button class="order-button-item order-buy-now">
                    Mua ngay
                </button>
            </div>
        </div>
    </div>
</div>