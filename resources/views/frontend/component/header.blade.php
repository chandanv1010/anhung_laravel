<div id="header" class="pc-header uk-visible-large">
    <div class="header-top">
        <div class="uk-container uk-container-center">
            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                <div class="slogan">{{ $system['homepage_slogan'] }}</div>
                <div class="header-widget uk-flex uk-flex-middle">
                    <div class="header-top-menu">
                        @if($menu['menu-top'] && is_array($menu['menu-top']) )
                        <ul class="uk-list uk-clearfix uk-flex uk-flex-middle">
                            @foreach($menu['menu-top'] as $key => $val)
                            @php
                                $name = $val['item']->languages->first()->pivot->name;
                                $canonical = write_url($val['item']->languages->first()->pivot->canonical)
                            @endphp
                            <li><a href="{{ $canonical }}">{{ $name }}</a></li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    <div class="header-social uk-flex uk-flex-middle">
                        <a href="{{ $system['social_facebook'] }}" class="social-item"><i class="fa fa-facebook"></i></a>
                        <a href="" class="social-item"><i class="fa fa-youtube"></i></a>
                        <a href="" class="social-item"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .header-top -->
    <div class="header-middle">
        <div class="uk-container uk-container-center">
            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                <div class="logo">
                    <a href="." title="logo"><img src="{{ $system['homepage_logo'] }}" alt="logo"></a>
                    @if(isset($ishome) && $ishome === true)
                    <h1 class="uk-hidden">{{ $system['seo_meta_title'] }}</h1>
                    @endif
                </div>
                <div class="search-form">
                    <form action="{{ write_url('tim-kiem') }}" class="uk-form form">
                        <div class="form-row">
                            <input 
                                type="text"
                                name="keyword"
                                value=""
                                class="input-text"
                                placeholder="Tìm kiếm"
                            >
                            <button type="submit" name="search" value="search"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="header-contact">
                    <div class="contact-heading">Hỗ trợ khách hàng</div>
                    <div class="number">{{ $system['contact_hotline'] }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-lower">
        <div class="uk-container uk-container-center">
           <div class="uk-flex uk-flex-middle uk-flex-space-between">
                <ul class="uk-flex uk-flex-middle navigation">
                    {!! $menu['main-menu'] !!}
                </ul>
                <div class="certificate">
                    <span class="quality">100%</span>
                    <div class="certificate-content">
                        <div class="certificate-title">Gỗ óc chó</div>
                        <div class="certificate-title">Nhập khẩu</div>
                    </div>
                </div>
           </div>
        </div>
    </div>
</div>
