@extends('frontend.homepage.layout')
@section('content')
    
    <div class="post-catalogue page-wrapper intro-wrapper">
        @include('frontend.component.breadcrumb', ['model' => $postCatalogue, 'breadcrumb' => $breadcrumb])
        <div class="product-catalogue-wrapper">
            <div class="uk-container uk-container-center">
                <h1 class="page-heading">{{ $postCatalogue->languages->first()->pivot->name }}</h1>
                <div class="description">
                    {!! $postCatalogue->languages->first()->pivot->description !!}
                </div>
            </div>
        </div>
        <div class="post-container">
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
                    <div class="uk-text-center">
                        @include('frontend.component.pagination', ['model' => $posts])
                    </div>    
                </div>
             
                <div class="mt--80">
                    @include('frontend.component.news')
                </div>

               
            </div>
        </div>

    </div>
@endsection

