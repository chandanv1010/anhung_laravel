@extends('frontend.homepage.layout')
@section('content')

<div class="post-detail">
    @include('frontend.component.breadcrumb', ['model' => $postCatalogue, 'breadcrumb' => $breadcrumb])
    <div class="product-catalogue-wrapper post-container">
        <div class="uk-container uk-container-center">
            <h1 class="page-heading">{{ $post->languages->first()->pivot->name }}</h1>
            <div class="description">
                {!! $postCatalogue->languages->first()->pivot->description !!}
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="uk-container uk-container-center" style="padding-top:30px;padding-bottom:30px;">
            <div class="post-detail-container">
                <div class="post-content {{ $post->status_menu == 2 ? 'full' : '' }}">
                    <div class="description">
                        {!! $post->languages->first()->pivot->description !!}
                    </div>
                    @if(!empty($post->languages->first()->pivot->content))
                    <div class="content" id="contents">
                        <x-table-of-contents :content="$contentWithToc" />
                        {!! $contentWithToc !!}
                    </div>
                    @endif
                </div>
                @if($post->status_menu != 2)
                    <div class="post-aside">
                        @if($widgets['news-feature'])
                        <div class="post-featured">
                            <div class="aside-heading">{{ $widgets['news-feature']->name }}</div>
                            <div>
                                @foreach($widgets['news-feature']->object as $key => $val)
                                    @php
                                        $name = $val->languages->name;
                                        $canonical = write_url($val->languages->canonical);
                                        $createdAt = $val->created_at;
                                    @endphp
                                    <div class="post-feature-item">
                                        <h3 class="title"><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a></h3>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        @if($widgets['projects-feature'])
                            <div class="post-featured mt40" data-uk-sticky="{boundary: true}">
                                <div class="aside-heading">
                                    {{ $widgets['projects-feature']->name }}
                                </div>
                                <div class="post-feature">
                                    @foreach($widgets['projects-feature']->object as $key => $val)
                                        @php
                                            $name = $val->languages->name;
                                            $canonical = write_url($val->languages->canonical);
                                            $createdAt = $val->created_at;
                                            $image = thumb($val->image, 600, 400);
                                        @endphp
                                        <div class="post-feature-item">
                                            <a href="{{ $canonical }}" class="image img-cover"  style="height: auto !important;"><img src="{{ $image }}" alt="{{ $name }}"  style="height: auto !important;"></a>
                                            <h3 class="title"><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a></h3>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
    @include('frontend.component.news')
</div>

@endsection
