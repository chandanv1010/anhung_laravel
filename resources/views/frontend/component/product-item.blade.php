@php
    $name = $product->languages->first()->pivot->name;
    $canonical = write_url($product->languages->first()->pivot->canonical);
    $image = thumb(image($product->image), 350, 196);
    $price = getPrice($product);
    $catName = $product->product_catalogues->first()->languages->first()->pivot->name;
    $review = getReview($product);
@endphp


<div class="product-item">
    <a href="{{ $canonical }}" class="image img-cover img-zoomin"><img src="{{ $image }}" alt="{{ $name }}"></a>
    <div class="info">
        <h3 class="title"><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a></h3>
        <div class="uk-flex uk-flex-middle uk-flex-space-between">
            <div class="product-price">
                {!! $price['html'] !!}
            </div>
            <div class="rate">
                <div class="uk-flex uk-flex-middle">
                    <div class="star-rating">
                        <div class="stars" style="--star-width: {{ $review['star'] }}%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>