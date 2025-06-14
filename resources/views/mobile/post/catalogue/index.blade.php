@extends('mobile.homepage.layout')
@section('content')
    <div id="mobile-container">
        {{-- @include('frontend.component.breadcrumb', ['model' => $postCatalogue, 'breadcrumb' => $breadcrumb]) --}}
        <div class="post-catalogue-wrapper panel-product">
            <div class="product-catalogue-wrapper">
                <div class="uk-container uk-container-center">
                    <h1 class="page-heading">{{ $postCatalogue->languages->first()->pivot->name }}</h1>
                    <div class="description">
                        {!! $postCatalogue->languages->first()->pivot->description !!}
                    </div>
                </div>
            </div>
            <div class="uk-container uk-container-center" style="padding-top:20px;padding-bottom:20px;">
                <div class="wrapper">
                    <div class="uk-grid uk-grid-medium">
                        @foreach($posts as $keyPost => $post)
                            @php
                                $name = $post->languages->first()->pivot->name;
                                $canonical = write_url($post->languages->first()->pivot->canonical);
                                $image = thumb($post->image, 344, 230);
                                $description = cutnchar(strip_tags($post['description']), 150);
                                $cat = $post->post_catalogues[0]->languages->first()->pivot->name;
                            @endphp
                            <div class="uk-width-medium-1-3 mb20">
                                <div class="news-item">
                                    <a href="{{ $canonical }}" class="image img-cover img-zoomin"><img src="{{ $image }}" alt=""></a>
                                    <div class="info">
                                        <h3 class="title"><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }} </a></h3>
                                        <div class="description">
                                            {!! $description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="uk-text-center">
                        @include('mobile.component.pagination', ['model' => $posts])
                    </div>    
                </div>
            </div>
        </div>
        @if(isset($widgets['design_construction_interior']))
            @foreach($widgets['design_construction_interior']->object as $key => $val)
                <div class="panel-design">
                    <div class="uk-container uk-container-center">
                        <h2 class="heading-6">
                            <span>
                                {{ $val->languages->name }}
                            </span>
                        </h2>
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @foreach($val->posts as $k => $item)
                                    @php
                                        $name = $item->languages[0]->name;
                                        $canonical = write_url($item->languages[0]->canonical);
                                        $createdAt = $item->created_at;
                                        $image = thumb($item->image, 280, 186);
                                    @endphp
                                    <div class="swiper-slide">
                                        <div class="post-feature-item">
                                            <a href="{{ $canonical }}" class="image img-cover"><img src="{{ $image }}" alt="{{ $name }}"></a>
                                            <h3 class="title"><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a></h3>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        @if(isset($widgets['projects-feature']))
            <div class="uk-container uk-container-center">
                <div class="post-featured project-featured index">
                    <h2 class="heading-6">
                        <span>{{ $widgets['projects-feature']->name }}</    span>
                    </h2>
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($widgets['projects-feature']->object as $key => $val)
                                @php
                                    $name = $val->languages->name;
                                    $canonical = write_url($val->languages->canonical);
                                    $createdAt = $val->created_at;
                                    $image = thumb($val->image, 280, 186);
                                @endphp
                                <div class="swiper-slide">
                                    <div class="post-feature-item">
                                        <a href="{{ $canonical }}" class="image img-cover"><img src="{{ $image }}" alt="{{ $name }}"></a>
                                        <h3 class="title"><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a></h3>
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
                    $catCanonical = write_url($val->languages->canonical);
                @endphp
                <div class="panel-news fix index">
                    <div class="uk-container uk-container-center">
                        <div class="panel-head uk-text-center">
                            <h2 class="heading-6"><span>{{ $widgets['news']->name }}</span></h2>
                        </div>
                        <div class="panel-body">
                            @if($val->posts)
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach($val->posts as $keyPost => $post)
                                            @php
                                                if($keyPost > 2) break;
                                                $name = $post->language[0]->name;
                                                $canonical = write_url($post->language[0]->canonical);
                                                $image = thumb($post->image, 344, 230);
                                                $description = cutnchar(strip_tags($post['description']), 150);
                                                $cat = $post->post_catalogues[0]->language[0]->name;
                                            @endphp
                                            <div class="swiper-slide">
                                                <div class="news-item">
                                                    <a href="{{ $canonical }}" class="image img-cover img-zoomin"><img src="{{ $image }}" alt=""></a>
                                                    <div class="info">
                                                        <h3 class="title"><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }} </a></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection