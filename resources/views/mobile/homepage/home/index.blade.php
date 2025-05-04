@extends('mobile.homepage.layout')
@section('content')
    <div id="homepage-mobile" class="homepage-mobile">
        @include('mobile.component.slide')
        @if(isset($widgets['intro']))
            <div class="panel-intro">
                <div class="uk-container uk-container-center">
                    <h2 class="heading-2"><span>{{ $widgets['intro']->name }}</span></h2>
                    <div class="intro-container uk-container-center">
                        <div class="intro-item-container">
                            @foreach($widgets['intro']->object as $key => $val)
                            @php
                                $name = $val->languages->first()->pivot->name;
                                $canonical = write_url($val->languages->first()->pivot->canonical);
                                $description = cutnchar(strip_tags($val->languages->first()->pivot->description), 100);
                            @endphp
                            <div class="intro-item">
                                <h3 class="title"><a href="{{ write_url($val['canonical']) }}" title="{{ $name }}">{{ $name }}</a></h3>
                                <div class="description">
                                    {{ $description  }}
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
                        <div class="description">{!! $description !!}</div>
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
                        <div class="wr-bt">
                            <a href="{{ $canonicalC }}" class="readmore button-style">Xem thêm <i class="fa fa-angle-right"></i></a>
                        </div>
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
                            <div class="wrapper-button">
                                <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                    <a href="{{ $canonicalC }}" class="readmore button-style">
                                        Xem thêm <i class="fa fa-angle-right"></i>
                                    </a>
                                    <div class="block-right">
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-container">
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
        @if($widgets['video'])
            @foreach($widgets['video']->object as $key => $val)
                @php
                    $nameC = $val->languages->first()->pivot->name;
                    $canonicalC = write_url($val->languages->first()->pivot->canonical);
                @endphp
                <div class="panel-video">
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
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach($val->posts as $keyPost => $post)
                                        @php
                                            $name = $post->languages->first()->pivot->name;
                                            $canonical = write_url($post->languages->first()->pivot->canonical);
                                            $image = thumb($post->image, 210, 315)
                                        @endphp
                                        <div class="swiper-slide">
                                            <div class="video-item">
                                                <a href="{{ $canonical }}" class="image img-cover img-zoomin">
                                                    <img src="{{ $image }}" alt="{{ $name }}">
                                                    <span><i class="fa fa-play"></i></span>
                                                </a>
                                                <h3 class="title"><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a></h3>
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
        @if(isset($widgets['news']))
            @foreach($widgets['news']->object as $key => $val)
            @php
                $catCanonical = write_url($val->languages->first()->pivot->canonical);
            @endphp
            <div class="panel-news">
                <div class="uk-container uk-container-center">
                    <div class="panel-head uk-text-center">
                        <div class="top-heading-1">Tin tức</div>
                        <h2 class="heading-5"><span>{{ $widgets['news']->name }}</span></h2>
                    </div>
                    <div class="panel-body">
                        @if($val->posts)
                        <div class="uk-grid uk-grid-medium">
                            @foreach($val->posts as $keyPost => $post)
                            @php
                                if($keyPost > 2) break;
                                $name = $post->languages->first()->pivot->name;
                                $canonical = write_url($post->languages->first()->pivot->name);
                                $image = thumb($post->image, 344, 230);
                                $description = cutnchar(strip_tags($val['description']), 150);
                                $cat = $post->post_catalogues[0]->languages->first()->pivot->name;
                            @endphp
                            <div class="uk-width-medium-1-3">
                                <div class="news-item">
                                    <a href="{{ $canonical }}" class="image img-cover img-zoomin"><img src="{{ $image }}" alt=""></a>
                                    <div class="info">
                                        <div class="category-name">{{ $cat }}</div>
                                        <h3 class="title"><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }} </a></h3>
                                        <div class="time">
                                            <div class="uk-flex uk-flex-middle">
                                                <div class="created_at">
                                                    <i class="fa fa-calendar"></i>
                                                    <span>{{ $post->created_at }}</span>
                                                </div>
                                                <div class="user-created">
                                                    <i class="fa fa-user"></i>
                                                    <span>Admin</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    <div class="panel-foot mt30 uk-text-center">
                        <a href="{{ $catCanonical }}" class="readmore button-style">Xem thêm <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
@endsection