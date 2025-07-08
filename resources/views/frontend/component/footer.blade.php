<footer class="footer">
    <div class="panel-official" id="system">
        <div class="uk-container uk-container-center">
            <div class="uk-grid uk-grid-large">
                <div class="uk-width-large-1-2">
                    <div class="official-item">
                        <div class="panel-head">
                            Văn Phòng Hà Nội
                        </div>
                        <div class="panel-body">
                            <div class="row uk-clearfix">
                                <span class="label">
                                    <i class="fa fa-home"></i>Địa chỉ:</span>
                                <a href="{{ $system['contact_office_map'] }}" title="{{ $system['contact_office'] }}" class="value" target="_blank">
                                    {{ $system['contact_office'] }}
                                    <img src="/userfiles/image/logo/map.png" alt="{{ $system['contact_office'] }}">
                                </a>
                            </div>
                            <div class="row uk-clearfix">
                                <span class="label"><i class="fa fa-phone"></i>Điện thoại: </span>
                                <span class="value">{{ $system['contact_hotline'] }}</span>
                            </div>
                            <div class="row uk-clearfix">
                                <span class="label"><i class="fa fa-envelope"></i>Email: </span>
                                <span class="value">{{ $system['contact_email'] }}</span>
                            </div>
                            <div class="row uk-clearfix">
                                <span class="label"><i class="fa fa-university" aria-hidden="true"></i>Xưởng:</span>
                                <a href="{{ $system['contact_xuong_map'] }}" title="{{ $system['contact_xuong'] }}" class="value" target="_blank">
                                    {{ $system['contact_xuong'] }}
                                    <img src="/userfiles/image/logo/map.png" alt="{{ $system['contact_xuong'] }}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-large-1-2">
                    <div class="official-item">
                        <div class="panel-head">
                            Văn Phòng Hồ Chí Minh
                        </div>
                        <div class="panel-body">
                            <div class="row uk-clearfix">
                                <span class="label"><i class="fa fa-home"></i>Địa chỉ:</span>
                                <a href="{{ $system['hcm_office_map'] }}" title="{{ $system['hcm_office'] }}" class="value" target="_blank">
                                    {{ $system['hcm_office'] }}
                                    <img src="/userfiles/image/logo/map.png" alt="{{ $system['hcm_office'] }}">
                                </a>
                            </div>
                            <div class="row uk-clearfix">
                                <span class="label"><i class="fa fa-phone"></i>Điện thoại: </span>
                                <span class="value">{{ $system['hcm_hotline'] }}</span>
                            </div>
                            <div class="row uk-clearfix">
                                <span class="label"><i class="fa fa-envelope"></i>Email: </span>
                                <span class="value">{{ $system['hcm_email'] }}</span>
                            </div>
                            <div class="row uk-clearfix">
                                <span class="label"><i class="fa fa-university" aria-hidden="true"></i>Xưởng:</span>
                                <a href="{{ $system['hcm_xuong_map'] }}" class="value" target="_blank">
                                    {{ $system['hcm_xuong'] }}
                                    <img src="/userfiles/image/logo/map.png" alt="{{ $system['hcm_xuong'] }}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-footer">
        <div class="uk-container uk-container-center">
            <div class="main-footer-container">
                <div class="footer-contact">
                    <div class="footer-heading">{{ $system['homepage_company'] }}</div>
                    <div class="footer-row">
                        <strong>Giấy phép kinh doanh số</strong>
                        <p>0107017623 do phòng Kinh doanh sở KH&ĐT TP.Hà NộiCấp ngày: 06/10/2015</p>
                    </div>
                    <div class="footer-row">
                        <strong>Ngân hàng BIDV: Trần Đăng Dũng</strong>
                        <p>1991.0000.263.050</p>
                    </div>
                    <div class="footer-row">
                        <strong>Techcombank: Trần Đăng Dũng</strong>
                        <p>1902.3397.720.013</p> 
                    </div>
                    <div class="footer-row">
                        <strong>Mở cửa:  </strong>
                        <p>8h30 - 20h30 cả thứ 7 và CN, có vị trí đậu xe ôtô</p>
                    </div>
                    <div class="footer-social">
                        <div class="uk-flex uk-flex-middle">
                            <a href="{{ $system['social_facebook'] }}" title="Facebook" class="social-item" target="_blank">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="{{ $system['social_youtube'] }}" title="Youtube" class="social-item" target="_blank">
                                <i class="fa fa-youtube"></i>
                            </a>
                            <a href="{{ $system['social_instagram'] }}" title="Instagram" class="social-item" target="_blank">
                                <i class="fa fa-instagram"></i>
                            </a>
                            <a href="{{ $system['social_tiktok'] }}" title="Tiktok" class="social-item" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 448 512">
                                    <path d="M448 209.91a210.06 210.06 0 0 1-122.77-39.25v178.72A162.55 162.55 0 1 1 185 188.31v89.89a74.62 74.62 0 1 0 52.23 71.18V0h88a121 121 0 0 0 1.86 22.17A122.18 122.18 0 0 0 381 102.39a121.43 121.43 0 0 0 67 20.14Z"></path>
                                </svg>
                            </a>
                            <a href="https://www.pinterest.com/noithatanhung/"  title="pinterest"  class="social-item" target="_blank">
                                <i class="fa fa-pinterest"></i>
                            </a> 
                        </div>
                    </div>
                </div>
                <div class="footer-menu">
                    <div class="uk-grid uk-grid-medium">
                        @foreach($menu['footer-menu'] as $key => $val)
                        @php
                            $nameC = $val['item']->languages->first()->pivot->name;
                        @endphp
                        <div class="uk-width-medium-1-2">
                            <div class="menu-item">
                                <div class="menu-heading">{{ $nameC }}</div>
                                @if($val['children'] && count($val['children']))
                                <ul class="uk-list uk-clearfix">
                                    @foreach($val['children'] as $keyChild => $valChild)
                                        @php
                                            $name = $valChild['item']->languages->first()->pivot->name;
                                            $canonical = write_url($valChild['item']->languages->first()->pivot->canonical);
                                        @endphp
                                        <li>
                                            <a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="footer-network">
                    <div class="menu-heading">Fanpage</div>
                    <div class="footer-logo mb20">
                        <a href="." title="Logo" class="image"><img src="{{ asset('frontend/resources/img/footer-logo.png') }}" alt="Logo Footer"></a>
                    </div>
                    <div class="page" style="padding:0;">
                        <div class="fb-page" data-href="<?php echo $system['social_facebook'] ?>" data-tabs="" data-width="400" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?php echo $system['social_facebook'] ?>" class="fb-xfbml-parse-ignore"><a href="<?php echo $system['social_facebook'] ?>">Facebook</a></blockquote></div>
                    </div>
                    <div class="text-contact">
                        Quý khách hàng liên hệ phản ánh về chất lượng dịch vụ theo số hotline: 0904.922.223
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="uk-container uk-container-center">
            <div class="uk-text-center">
                Bản quyền thuộc về <strong>CÔNG TY SẢN XUẤT NỘI THẤT AN HƯNG</strong>. Mọi sự sao chép đều phải ghi nguồn và được sự cho phép bằng văn bản của chúng tôi.
            </div>
        </div>
    </div>
</footer>
<div class="contact-fixed">
    <ul>
        <li>
            <a href="https://zalo.me/{{ $system['social_zalo'] }}" title="Zalo" target="_blank">
                <img src="/userfiles/image/logo/q-BI_3-uzZ.png" alt="Zalo">
            </a>
        </li>
        <li>
            <a href="" data-uk-modal="{target:'#advise'}" title="Advise">
                <img src="/userfiles/image/logo/q-Dfr87qKq.png" alt="Advise">
            </a>
            @include('frontend.component.advise')
        </li>
        <li>
            <a href="#system" title="System">
                <img src="/userfiles/image/logo/q-DVjHfTNn.png" alt="System">
            </a>
        </li>
        <li>
            <a href="{{ $system['social_facebook'] }}" title="Messenger" target="_blank">
                <img src="{{ asset('frontend/resources/img/logo-facebook.png') }}" alt="Messenger">
            </a>
        </li>
        <li>
            <a href="tel:{{ $system['contact_hotline'] }}" title="Hotline" class="hotline">
                <img src="/userfiles/image/logo/q-B6gPmnEf.webp" alt="Hotline">
                <span>{{ $system['contact_hotline'] }}</span>
            </a>
        </li>
    </ul>
</div>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v22.0&appId=103609027035330"></script>