@extends('frontend.homepage.layout')

@section('content')
    <div id="homepage" class="homepage">
        <div class="panel-slide-group">
            <div class="uk-container uk-container-center">
                <div class="container">
                    <div class="categories">
                        <h2 class="heading-1"><span>{{ $widgets['categories']->name }}</span></h2>
                        @if($widgets['categories'])
                            <div class="category-item">
                                <ul class="uk-list uk-clearfix">
                                    @foreach($widgets['categories']->object as $key => $item)
                                    @php
                                        $name = $item->short_name ?? $item->languages->first()->pivot->name;
                                        $canonical = write_url($item->languages->first()->pivot->canonical);
                                        $icon = $item->icon ?? '/userfiles/image/logo/ban-an.png';
                                    @endphp
                                    <li>
                                        <a href="{{ $canonical }}" title="{{ $name }}" class="uk-flex uk-flex-middle">
                                            <img src="{{ $icon }}" alt="{{ $name }}">
                                            <span>{{ $name }}</span>
                                        </a>
                                    </li>
                                    @endforeach
                                    <li class="uk-position-relative">
                                        <a href="#" class="uk-flex uk-flex-middle uk-flex-space-between">
                                            <span class="uk-flex uk-flex-middle">
                                                <img src="{{ asset('frontend/resources/img/xem-them.png') }}" alt="">
                                                <span>Xem thêm</span>
                                            </span>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                        <div class="dropright-menu">
                                            @if(isset($widgets['categories-readmore']))
                                            <div class="dropright-container">
                                                <div class="sub-menu">
                                                    <ul class="uk-list uk-clearfix">
                                                        @foreach($widgets['categories-readmore']->object as $key => $item)
                                                        @php
                                                            $name = $item->languages->first()->pivot->name;
                                                            $canonical = write_url($item->languages->first()->pivot->canonical);
                                                            $icon = $item->icon
                                                        @endphp
                                                        <li>
                                                            <a href="{{ $canonical }}" title="{{ $name }}" class="uk-flex uk-flex-middle">
                                                                <span>{{ $name }}</span>
                                                            </a>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="dropright-image">
                                                    <span class="image img-cover"><img src="{{ $widgets['categories-readmore']->album[0] }}" alt=""></span>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        @endif
                        <div class="category-item category-service">
                            <h2 class="heading-1"><span>Dịch Vụ</span></h2>
                            <ul class="uk-list uk-clearfix">
                                @foreach($widgets['services']->object as $key => $item)
                                @php
                                    $name = $item->languages->first()->pivot->name;
                                    $canonical = write_url($item->languages->first()->pivot->canonical);
                                    $icon = $item->image
                                @endphp
                                <li class="uk-position-relative">
                                    <a href="{{ $canonical }}" class="uk-flex uk-flex-middle uk-flex-space-between">
                                        <span class="uk-flex uk-flex-middle">
                                            <img src="{{ $icon }}" alt="">
                                            <span>{{ $name }}</span>
                                        </span>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                    <div class="dropright-menu">
                                        @if(isset($item['children']))
                                        <div class="dropright-container">
                                            <div class="sub-menu">
                                                <ul class="uk-list uk-clearfix">
                                                    @foreach($item['children']->object as $keyVal => $val)
                                                    @php
                                                        $nameC = $val->languages->first()->pivot->name;
                                                        $canonicalC = write_url($val->languages->first()->pivot->canonical);
                                                        $iconC = $val->icon
                                                    @endphp
                                                    <li>
                                                        <a href="{{ $canonicalC }}" title="{{ $nameC }}" class="uk-flex uk-flex-middle">
                                                            <span>{{ $nameC }}</span>
                                                        </a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="main-slide">
                        @include('frontend.component.slide')
                    </div>
                    <div class="banner">
                        @foreach($slides['banner-1']['item'] as $key => $val )
                        <div class="banner-item">
                            <a href="{{ $val['canonical'] }}" class="image img-cover img-zoomin">
                                <img src="{{ $val['image'] }}" alt="{{ $val['name'] }}">
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @if(isset($widgets['intro']))
            <div class="panel-intro">
                <div class="uk-container uk-container-center">
                    <h2 class="heading-2">
                        <a href="{{ write_url('ve-chung-toi') }}">{{ $widgets['intro']->name }}</a>
                    </h2>
                    <div class="intro-container uk-container-center">
                        <span class="image img-cover img-zoominhgh">
                            <img src="{{ $widgets['intro']->album[0] }}" alt="">
                        </span>
                        <div class="intro-item-container">
                            @foreach($widgets['intro']->object as $key => $val)
                                @php
                                    $name = $val->languages->first()->pivot->name;
                                    $canonical = write_url($val->languages->first()->pivot->canonical);
                                    $description = cutnchar(strip_tags($val->languages->first()->pivot->description), 100);
                                @endphp
                                <div class="intro-item">
                                    <h3 class="title">
                                        <a href="{{ write_url('ve-chung-toi') }}" title="{{ $name }}">{{ $name }}</a>
                                    </h3>
                                    <div class="description">
                                        {!! $description !!}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if(isset($widgets['category-1'] ))
            @php
                $description = $widgets['category-1']['description'][1]
            @endphp
            <div class="panel-category">
                <div class="uk-container uk-container-center">
                    <div class="panel-head">
                        <div class="top-heading">Danh Mục</div>
                        <h2 class="heading-2"><span>{{ $widgets['category-1']->name }}</span></h2>
                    </div>
                    <div class="panel-body">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @foreach($widgets['category-1']->object as $key => $val )
                                @php
                                    $name = $val->languages->first()->pivot->name;
                                    $canonical = write_url($val->languages->first()->pivot->canonical);
                                    $image = thumb($val->image, 185, 123)
                                @endphp
                                <div class="swiper-slide">
                                    <div class="cat-item">
                                        <a href="{{ $canonical }}" class="image img-cover img-zoomin"><img src="{{ $image }}" alt="{{ $name }}"></a>
                                        <h3 class="title"><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a></h3>
                                    </div>
                                    
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
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

        @if(isset($widgets['services-1']))
            <div class="service-container">
                @foreach($widgets['services-1']->object as $key => $val)
                @php
                    $nameC = $val->languages->first()->pivot->name;
                    $canonicalC = write_url($val->languages->first()->pivot->canonical);
                @endphp
                <div class="panel-service-1">
                    <div class="uk-container uk-container-center">
                        <div class="panel-head">
                            <div class="top-heading">{{ $widgets['services-1']->name }}</div>
                            <h2 class="heading-5"><span>{{ $nameC }}</span></h2>
                        </div>
                        @if(isset($val->posts) && count($val->posts))
                            <div class="panel-body">
                                <div class="uk-grid uk-grid-medium">
                                    @foreach($val->posts as $keyPost => $post)
                                        @if($keyPost > 5) @break; @endif
                                        <div class="uk-width-medium-1-3 mb25">
                                            @php
                                                $name = $post->languages->first()->pivot->name;
                                                $canonical = write_url($post->languages->first()->pivot->canonical);
                                                $image = thumb($post->image, 630, 362)
                                            @endphp
                                            <div class="service-item">
                                                <a href="{{ $canonical }}" class="image img-cover img-zoomin">
                                                    <img src="{{ $image }}" alt="{{ $name }}">
                                                </a>
                                                <div class="text-content">
                                                    <h3 class="heading-2">
                                                        <a href="{{ $canonical }}">{{ $name }}</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        @endif

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
                            <span>{{$widgets['video']->name }}</span>
                            <i class="fa fa-play"></i>
                            <span class="line"></span>
                        </h2>
                    </div>
                    @if($val->posts)
                    <div class="panel-body">
                        <div class="uk-grid uk-grid-small">
                            @foreach($val->posts as $keyPost => $post)
                                @php
                                    if($keyPost > 4) break;
                                    $name = $post->languages->first()->pivot->name;
                                    $canonical = write_url($post->languages->first()->pivot->canonical);
                                    $image = thumb($post->image, 210, 315);
                                @endphp
                                <div class="uk-width-small-1-5">
                                    <div class="video-item">
                                        <a href="" class="image img-scaledown">
                                            {!! $post->video !!}
                                        </a>
                                        <h3 class="title"><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a></h3>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    <div class="panel-foot uk-text-center mt20">
                        <a href="{{ $canonicalC }}" title="Readmore" class="readmore button-style">Xem thêm <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        @endif

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

       @include('frontend.component.news')
    </div>
@endsection
