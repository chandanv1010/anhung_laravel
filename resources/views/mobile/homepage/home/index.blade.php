@extends('mobile.homepage.layout')
@section('content')
    <div id="mobile-container">
        @include('mobile.component.slide')
        @if(isset($widgets['intro']))
        <div class="panel-mobile-intro">
            <h2 class="heading-1"><span>{{ $widgets['intro']->name }}</span></h2>
            <div class="description">
                {!! $widgets['intro']->description[1] !!}
            </div>
        </div>
        @endif
        @if(isset($widgets['category-mobile']))
        <div class="panel-category">
            @foreach($widgets['category-mobile']->object as $category)
            @php
                $name = $category->languages->first()->pivot->name;
                $canonical = write_url($category->languages->first()->pivot->canonical);
                $image = thumb($category->image, 360, 240)
            @endphp
            <div class="category-item">
                <a href="{{ $canonical }}" class="image img-cover"><img src="{{ $image }}" alt="{{ $name }}"></a>
                <h3 class="title"><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a></h3>
            </div>
            @endforeach
        </div>
        @endif
        @if(isset($widgets['services-1']))
        <div class="mobile-service-container">
            @foreach($widgets['services-1']->object as $key => $val)
            @php
                $nameC = $val->languages->first()->pivot->name;
                $canonicalC = write_url($val->languages->first()->pivot->canonical);
                $descriptionC = $val->languages->first()->pivot->description;
            @endphp
            <div class="panel-service-1">
                <div class="uk-container uk-container-center">
                    <div class="panel-head">
                        <div class="top-heading">{{ $widgets['services-1']->name }}</div>
                        <h2 class="heading-5"><span>{{ $nameC }}</span></h2>
                        <div class="description">
                            {!! $descriptionC  !!}
                        </div>
                        <a class="readmore button-style" href="{{ $canonicalC }}">Xem thêm</a>
                    </div>
                    @if(isset($val->posts) && count($val->posts))
                    <div class="panel-body">
                        
                        <div class="swiper-container">
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-wrapper">
                                @foreach($val->posts as $keyPost => $post )
                                @php
                                    $name = $post->languages->first()->pivot->name;
                                    $canonical = write_url($post->languages->first()->pivot->canonical);
                                    $image = thumb($post->image, 630, 362)
                                @endphp
                                <div class="swiper-slide">
                                    <div class="service-item">
                                        <a href="{{ $canonical }}" class="image img-cover img-zoomin"><img src="{{ $image }}" alt="{{ $name }}"></a>
                                        {{-- <h3 class="title"><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a></h3> --}}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @endif
        <div class="product-container">
            @if(isset($widgets['products']))
                @foreach($widgets['products']->object as $cat)
                @php
                    $nameC = $cat->languages->first()->pivot->name;
                    $canonicalC = write_url($cat->languages->first()->pivot->canonical)
                @endphp
                <div class="panel-product">
                    <div class="uk-container uk-container-center">
                        <div class="panel-head uk-flex uk-flex-middle uk-flex-space-between">
                            <h2 class="heading-3"><a href="{{ $canonicalC }}" title="{{  $nameC }}">{{  $nameC }}</a></h2>
                            <a href="{{ $canonicalC }}" class="readmore button-style">Xem thêm <i class="fa fa-angle-right"></i></a>
                        </div>
                        @if($cat->products)
                        <div class="panel-body">
                            <div class="uk-grid uk-grid-medium">
                                @foreach($cat->products as $keyProduct => $product)
                                @if($keyProduct > 2) @break @endif
                                <div class="uk-width-medium-1-3">
                                    @include('frontend/component/product-item', ['product' => $product])
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            @endif
        </div>
        @if($widgets['video'])
            @foreach($widgets['video']->object as $key => $val)
            @php
                $nameC = $val->languages->first()->pivot->name;
                $canonicalC = write_url($val->languages->first()->pivot->canonical);
            @endphp
            <div class="panel-video ">
                <div class="uk-container uk-container-center">
                    <div class="panel-head">
                        <h2 class="heading-6">
                            <span>{{ $nameC }}</span>
                            <i class="fa fa-play"></i>
                            <span class="line"></span>
                        </h2>
                    </div>
                    @if($val->posts)
                    <div class="panel-body">
                        @foreach($val->posts as $keyPost => $post)
                        @php
                            if($keyPost > 4) break;
                            $name = $post->languages->first()->pivot->name;
                            $canonical = write_url($post->languages->first()->pivot->canonical);
                            $image = thumb($post->image, 210, 315)
                        @endphp
                        <div class="video-item">
                            <a href="{{ $canonical }}" class="image img-cover img-zoomin">
                                <img src="{{ $image }}" alt="{{ $name }}">
                                <span><i class="fa fa-play"></i></span>
                            </a>
                            <h3 class="title"><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a></h3>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    <div class="panel-foot uk-text-center mt40">
                        <a href="{{ $canonicalC }}" title="Readmore" class="readmore button-style">Xem thêm <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
        @include('mobile.component.news-outstanding')
        @if($slides['brand-baochi'])
        <div class="panel-paper">
            <div class="uk-container uk-container-center">
                <div class="panel-head">
                    <div class="top-heading-1">Báo Chí</div>
                    <h2 class="heading-5"><span>Báo chí nói về An Hưng</span></h2>
                </div>
                <div class="panel-body">
                    <div class="uk-grid uk-grid-small">
                        @foreach($slides['brand-baochi']['item'] as $item)
                        <div class="uk-width-medium-1-6">
                            <div class="paper-item">
                                <a target="_blank" href="{{ $item['canonical'] }}" class="image img-scaledown img-zoomin">
                                    <img src="{{ thumb($item['image']) }}" alt="{{ $item['name'] }}">
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection