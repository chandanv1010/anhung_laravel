
 @if(isset($widgets['news']))
    @foreach($widgets['news']->object as $key => $val)
        @php
            $catName = $val->languages->name;
            $catCanonical = write_url($val->languages->canonical);
        @endphp
        <div class="panel-news fix">
            <div class="uk-container uk-container-center">
                <div class="panel-head uk-text-center">
                    <div class="top-heading-1">Tin tức</div>
                    <h2 class="heading-5"><span>{{ $widgets['news']->name }}</span></h2>
                </div>
                <div class="panel-body">
                    @if(isset($val->posts))
                        @php
                            $postCount = 0;
                        @endphp
                        <div class="uk-grid uk-grid-medium">
                            @foreach($val->posts as $keyPost => $post)
                            @php
                                if($postCount > 2) break;
                                $name = $post->languages[0]->name;
                                $canonical = write_url($post->languages[0]->canonical);
                                $image = thumb($post->image, 344, 230);
                                
                            @endphp
                            <div class="uk-width-medium-1-3 ">
                                <div class="news-item">
                                    <a href="{{ $canonical }}" title="{{ $name }}" class="image img-cover img-zoomin">
                                        <div class="skeleton-loading"></div>
                                        <img class="lazy-image" data-src="{{ $image }}" alt="{{ $name }}">
                                    </a>
                                    <div class="info">
                                        <h3 class="title"><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }} </a></h3>
                                    </div>
                                </div>
                            </div>
                            @php
                                $postCount++
                            @endphp
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="panel-foot mt30 uk-text-center">
                    <a href="{{ $catCanonical }}" title="{{ $catName }}" class="readmore button-style">Xem thêm <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    @endforeach
@endif