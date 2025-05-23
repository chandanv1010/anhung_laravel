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
                                <span class="label"><i class="fa fa-home"></i>Địa chỉ:</span>
                                <span class="value">{{ $system['contact_office'] }}</span>
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
                                <span class="value">{{ $system['contact_xuong'] }}</span>
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
                                <span class="value">{{ $system['hcm_office'] }}</span>
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
                                <span class="value">{{ $system['hcm_xuong'] }}</span>
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
                        <p>0107017623 do phòng Kinh doanh sở KH&ĐT TP.Hà Nội Cấp ngày: 06/10/2015</p>
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
                            <a href="{{ $system['social_facebook'] }}" class="social-item" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="{{ $system['social_twitter'] }}" class="social-item" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="{{ $system['social_instagram'] }}" class="social-item" target="_blank"><i class="fa fa-instagram"></i></a>
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
                                    <li><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a></li>
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
                        <a href="." class="image"><img src="{{ asset('frontend/resources/img/footer-logo.png') }}" alt="Logo Footer"></a>
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
            <a href="https://zalo.me/{{ $system['social_zalo'] }}" target="_blank">
                <img src="/userfiles/image/logo/q-BI_3-uzZ.png" alt="">
            </a>
        </li>
        <li>
            <a href="" data-uk-modal="{target:'#advise'}">
                <img src="/userfiles/image/logo/q-Dfr87qKq.png" alt="">
            </a>
            @include('frontend.component.advise')
        </li>
        <li>
            <a href="#system">
                <img src="/userfiles/image/logo/q-DVjHfTNn.png" alt="">
            </a>
        </li>
        <li>
            <a href="https://m.me/{{ $system['social_messenger'] }}" target="_blank">
                <img src="/userfiles/image/logo/q-ByOnyI_n.webp" alt="">
            </a>
        </li>
        <li>
            <a href="tel:{{ $system['contact_hotline'] }}" class="hotline">
                <img src="/userfiles/image/logo/q-B6gPmnEf.webp" alt="">
                <span>{{ $system['contact_hotline'] }}</span>
            </a>
        </li>
    </ul>
</div>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v22.0&appId=103609027035330"></script>