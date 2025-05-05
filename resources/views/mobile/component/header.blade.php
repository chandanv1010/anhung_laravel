<div class="mobile-header">
    <div class="mobile-upper">
        <div class="uk-container uk-container-center">
            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                <div class="mobile-logo">
                    <a href="." title="{{ $system['seo_meta_title'] }}" class="image img-cover">
                        <img src="{{ $system['homepage_logo'] }}" alt="Mobile Logo">
                    </a>
                </div>
                <div class="tool">
                    <div class="search-link">
                        <a href="{{ write_url('tim-kiem') }}" title="" class="nav-link">
                            <svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M25.1592 21.6162L20.291 16.748C20.0713 16.5283 19.7734 16.4062 19.4609 16.4062H18.665C20.0127 14.6826 20.8135 12.5146 20.8135 10.1562C20.8135 4.5459 16.2676 0 10.6572 0C5.04688 0 0.500977 4.5459 0.500977 10.1562C0.500977 15.7666 5.04688 20.3125 10.6572 20.3125C13.0156 20.3125 15.1836 19.5117 16.9072 18.1641V18.96C16.9072 19.2725 17.0293 19.5703 17.249 19.79L22.1172 24.6582C22.5762 25.1172 23.3184 25.1172 23.7725 24.6582L25.1543 23.2764C25.6133 22.8174 25.6133 22.0752 25.1592 21.6162ZM10.6572 16.4062C7.20508 16.4062 4.40723 13.6133 4.40723 10.1562C4.40723 6.7041 7.2002 3.90625 10.6572 3.90625C14.1094 3.90625 16.9072 6.69922 16.9072 10.1562C16.9072 13.6084 14.1143 16.4062 10.6572 16.4062Z" fill="#FEE9B5"/>
                            </svg>
                        </a>
                    </div>
                    <div class="cart-link">
                        <a href="{{ write_url('gio-hang') }}" title="" class="nav-link">
                            <svg width="25" height="23" viewBox="0 0 25 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M24.9737 4.0503L22.9219 13.0781C22.8141 13.5523 22.3925 13.8889 21.9061 13.8889H9.18281L9.46688 15.2778H21.117C21.7854 15.2778 22.2809 15.8985 22.1327 16.5503L21.8933 17.6039C22.7045 17.9977 23.2639 18.8293 23.2639 19.7917C23.2639 21.134 22.1757 22.2222 20.8333 22.2222C19.491 22.2222 18.4028 21.134 18.4028 19.7917C18.4028 19.1114 18.6826 18.4967 19.1329 18.0556H10.0337C10.4841 18.4967 10.7639 19.1114 10.7639 19.7917C10.7639 21.134 9.67569 22.2222 8.33333 22.2222C6.99097 22.2222 5.90278 21.134 5.90278 19.7917C5.90278 18.8898 6.39431 18.1033 7.12374 17.6838L4.07478 2.77778H1.04167C0.466363 2.77778 0 2.31141 0 1.73611V1.04167C0 0.466363 0.466363 0 1.04167 0H5.49171C5.98655 0 6.41311 0.348134 6.51224 0.832899L6.91007 2.77778H23.9579C24.6263 2.77778 25.1218 3.39848 24.9737 4.0503ZM22.75 5.5H7.75L8.78448 11.5H21.1983L22.75 5.5Z" fill="#FEE9B5"/>
                            </svg>
                        </a>
                    </div>
                    <div class="menu-link">
                        <a href="#mobileCanvas" class="mobile-menu-button" data-uk-offcanvas>
                            <svg width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.34375 3.51562H21.6562C22.0877 3.51562 22.4375 3.16587 22.4375 2.73438V0.78125C22.4375 0.349756 22.0877 0 21.6562 0H1.34375C0.912256 0 0.5625 0.349756 0.5625 0.78125V2.73438C0.5625 3.16587 0.912256 3.51562 1.34375 3.51562ZM1.34375 11.3281H21.6562C22.0877 11.3281 22.4375 10.9784 22.4375 10.5469V8.59375C22.4375 8.16226 22.0877 7.8125 21.6562 7.8125H1.34375C0.912256 7.8125 0.5625 8.16226 0.5625 8.59375V10.5469C0.5625 10.9784 0.912256 11.3281 1.34375 11.3281ZM1.34375 19.1406H21.6562C22.0877 19.1406 22.4375 18.7909 22.4375 18.3594V16.4062C22.4375 15.9748 22.0877 15.625 21.6562 15.625H1.34375C0.912256 15.625 0.5625 15.9748 0.5625 16.4062V18.3594C0.5625 18.7909 0.912256 19.1406 1.34375 19.1406Z" fill="#FEE9B5"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('mobile.component.navigation')
</div>
<div id="mobileCanvas" class="uk-offcanvas offcanvas" >
    <div class="uk-offcanvas-bar" >
        @if(isset($menu['mobile']))
            <ul class="l1 uk-nav uk-nav-offcanvas uk-nav uk-nav-parent-icon" data-uk-nav>
                @foreach ($menu['mobile'] as $key => $val)
                    @php
                        $name = $val['item']->languages->first()->pivot->name;
                        $canonical = ($name == 'Trang chủ') ?  '' : write_url($val['item']->languages->first()->pivot->canonical, true, true);
                    @endphp
                    <li class="l1 {{ (count($val['children']))?'uk-parent uk-position-relative':'' }}">
                        <?php echo (isset($val['children']) && is_array($val['children']) && count($val['children']))?'<a href="#" title="" class="dropicon"></a>':''; ?>
                        <a href="{{ $canonical }}" title="{{ $name }}" class="l1">{{ $name }}</a>
                        @if(count($val['children']))
                        <ul class="l2 uk-nav-sub">
                            @foreach ($val['children'] as $keyItem => $valItem)
                            @php
                                $name_2 = $valItem['item']->languages->first()->pivot->name;
                                $canonical_2 = write_url($valItem['item']->languages->first()->pivot->canonical, true, true);
                            @endphp
                            <li class="l2">
                                <a href="{{ $canonical_2 }}" title="{{ $name_2 }}" class="l2">{{ $name_2 }}</a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                @endforeach
                @if(isset($customerAuth))
                    <li>
                        <a href="{{ route('buyer.profile') }}" class="l1">Xin chào: {{ $customerAuth->name }}</a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('buyer.login') }}" class="l1">Đăng nhập</a>
                    </li>
                @endif
            </ul>
		@endif
	</div>
</div>