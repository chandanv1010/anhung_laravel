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
                    <div id="toc" class="widget-toc">
                        <h3 class="toc-title">Mục Lục <i class="fa fa-angle-down" aria-hidden="true"></i></h3>
                    </div>
                    <div class="content" id="contents">
                        @php
                            $content = $post->languages->first()->pivot->content;
                            // Sửa cấu trúc HTML sai
                            $content = preg_replace(
                                '/(<div class="widget-toc">.*?<\/ol>)(.*?)(<\/div>)/s',
                                '$1</div>$2',
                                $content
                            );
                        @endphp
                        {!! $content !!}
                    </div>
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

<script>


    window.onload = function () {
    var toc = "";
    var level = 0;


    function cleanText(text) {
        return text.replace(/<\/?[^>]+(>|$)/g, "").trim().replace(/ /g, "_");
    }

    document.getElementById("contents").innerHTML =
        document.getElementById("contents").innerHTML.replace(
            /<h([\d])[^>]*>(.*?)<\/h\1>/gi,
            function (str, openLevel, titleText) {
                if (openLevel > level) {
                    toc += (new Array(openLevel - level + 1)).join("<ul>");
                } else if (openLevel < level) {
                    toc += (new Array(level - openLevel + 1)).join("</ul>");
                }

                level = parseInt(openLevel);

                var anchor = cleanText(titleText);

                toc += "<li><a href=\"#"+ anchor + "\">" + titleText + "</a></li>";

                return "<h" + openLevel + "><a id=\"" + anchor + "\">" + titleText + "</a></h" + openLevel + ">";
            }
        );

    if (level) {
        toc += (new Array(level + 1)).join("</ul>");
    }

    document.getElementById("toc").innerHTML += toc;
    };

    $(document).ready(function() {
        var h_header = 10;
        $(document).on('click', '#toc a', function(event) {
            event.preventDefault();
            let _this = $(this);
            let target = _this.attr('href');
            let offset = $(target).offset().top - h_header;
            $('html').animate({scrollTop: offset}, 0)
            return false;
        });
    });
</script>