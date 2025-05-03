 {{-- @dd($widgets['news']) --}}
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
                        $canonical = write_url($post->languages->first()->pivot->canonical);
                        $image = thumb($post->image, 344, 230);
                        $description = cutnchar(strip_tags($post['description']), 150);
                        $cat = $post->post_catalogues[0]->languages->first()->pivot->name;
                    @endphp
                    <div class="uk-width-medium-1-3 ">
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