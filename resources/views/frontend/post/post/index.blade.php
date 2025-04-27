@extends('frontend.homepage.layout')
@section('content')

<div class="post-detail">
    <div class="banner">
        <span class="image img-cover"><img src="{{ asset('frontend/resources/img/breadcrumb.jpg') }}" alt=""></span>
    </div>
    @include('frontend.component.breadcrumb', ['model' => $postCatalogue, 'breadcrumb' => $breadcrumb])
    <div class="uk-container uk-container-center" style="padding-top:30px;padding-bottom:30px;">
        <div class="uk-grid uk-grid-collapse">
            <div class="uk-width-large-3-4 uk-container-center">
                <div class="detail-wrapper">
                    <h1 class="post-title">{{ $post->name }}</h1>
                    <div class="description">
                        {!! $post->description !!}
                    </div>
                    <div class="content">
                        {!! $post->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
