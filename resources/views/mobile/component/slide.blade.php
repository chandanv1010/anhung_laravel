@php
    $slideKeyword = 'mobile-slide';
@endphp
@if(count($slides[$slideKeyword]['item']))
<div class="panel-slide" data-setting="{{ json_encode($slides[$slideKeyword]['setting']) }}">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach($slides[$slideKeyword]['item'] as $key => $val )
            <div class="swiper-slide">
                <div class="slide-item">
                    <span class="image img-cover"><img src="{{ $val['image'] }}" alt="{{ $val['name'] }}"></span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
