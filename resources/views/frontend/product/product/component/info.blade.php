<div class="product-info">
    <h1 class="title product-main-title"><span>{{ $name }}</span>
    </h1>
    <div class="rating">
        <div class="uk-flex uk-flex-middle uk-flex-space-between">
            <div>
                <div class="star-rating">
                    <div class="stars" style="--star-width: {{ $review['star'] }}%"></div>
                </div>
            </div>
            <div class="spec-row">Code: <strong>{{ $product->code }}</strong></div>
        </div>
    </div>
    <div class="product-detail__description">
        {!! $product->description !!}
    </div>

</div>