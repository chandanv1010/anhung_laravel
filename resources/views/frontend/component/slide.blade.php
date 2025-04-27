@php
    $slideKeyword = App\Enums\SlideEnum::MAIN;
@endphp
@if(count($slides[$slideKeyword]['item']))
<div class="panel-slide page-setup" data-setting="{{ json_encode($slides[$slideKeyword]['setting']) }}">
    <div class="swiper-container">
        {{-- <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div> --}}
        <div class="swiper-wrapper">
            @foreach($slides[$slideKeyword]['item'] as $key => $val )
            <div class="swiper-slide">
                <div class="slide-item">
                    @if(isset($val['description']) && strpos($val['description'], 'iframe') !== false)
                        <a href="#modal-{{ $key }}" class="image img-cover" data-uk-modal>
                            <img src="{{ $val['image'] }}" alt="{{ $val['image'] }}">
                        </a>
                        <a href="#modal-{{ $key }}" class="play-button" data-uk-modal><img src="{{ asset('frontend/resources/img/IconPlay.png') }}" alt="Play"></a>
                        
                    @else
                        <span class="image img-cover"><img src="{{ $val['image'] }}" alt="{{ $val['name'] }}"></span>
                    @endif
                </div>
                
            </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>
@endif

@foreach($slides[$slideKeyword]['item'] as $key => $val )
    @if(isset($val['description']) && strpos($val['description'], 'iframe') !== false)
    <div id="modal-{{ $key }}" class="uk-modal">
        <div class="uk-modal-dialog">
            <a class="uk-modal-close uk-close"></a>
            {!! $val['description'] !!}
        </div>
    </div>
    @endif
@endforeach