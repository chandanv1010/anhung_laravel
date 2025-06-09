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
                            <li>
                                <a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    <div class="header-social uk-flex uk-flex-middle">
                        <a href="{{ $system['social_facebook'] }}" title="Facebook" class="social-item" target="_blank">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="{{ $system['social_youtube'] }}"  title="Youtube" class="social-item" target="_blank">
                            <i class="fa fa-youtube"></i>
                        </a>
                        <a href="{{ $system['social_instagram'] }}"  title="Instagram"  class="social-item" target="_blank">
                            <i class="fa fa-instagram"></i>
                        </a> 
                        <a href="{{ $system['social_tiktok'] }}"  title="Tiktok" class="social-item" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 448 512">
                                <path d="M448 209.91a210.06 210.06 0 0 1-122.77-39.25v178.72A162.55 162.55 0 1 1 185 188.31v89.89a74.62 74.62 0 1 0 52.23 71.18V0h88a121 121 0 0 0 1.86 22.17A122.18 122.18 0 0 0 381 102.39a121.43 121.43 0 0 0 67 20.14Z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                    <form action="{{ 'tim-kiem' }}" class="uk-form form">
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
                    <div class="uk-flex uk-flex-middle">
                        <div class="support">
                            <div class="contact-heading">Hỗ trợ khách hàng</div>
                            <div class="number">{{ $system['contact_hotline'] }}</div>
                        </div>
                        <div class="cart-link">
                            <a href="{{ write_url('gio-hang') }}" title="Giỏ hàng" class="nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 576 512" class="w-5 h-5 cursor-pointer fill-bottom-nav-mb  box-content"><path d="M0 24C0 10.7 10.7 0 24 0h45.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5l-51.6-271c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24m128 440a48 48 0 1 1 96 0 48 48 0 1 1-96 0m336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96"></path></svg>
                                <span class="count">{{ $cartShare['cartTotalItems'] }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-lower" data-uk-sticky>
        <div class="uk-container uk-container-center">
           <div class="uk-flex uk-flex-middle uk-flex-space-between">
                <ul class="uk-flex uk-flex-middle navigation">
                    {!! $menu['main-menu'] !!}
                </ul>
                <a href="{{ write_url( $system['link_1']) }}" title="Gỗ óc chó" class="certificate">
                    <span class="quality">100%</span>
                    <div class="certificate-content">
                        <div class="certificate-title">Gỗ óc chó</div>
                        <div class="certificate-title">Nhập khẩu</div>
                    </div>
                </a>
           </div>
        </div>
    </div>
</div>
