	<!-- subscribe -->
    <div id="colorlib-subscribe">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="col-md-6 text-center">
                        <h2><i class="icon-paperplane"></i>Đăng ký nhận bản tin</h2>
                    </div>
                    <div class="col-md-6">
                        <form class="form-inline qbstp-header-subscribe">
                            <div class="row">
                                <div class="col-md-12 col-md-offset-0">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="email" placeholder="Nhập email của bạn">
                                        <button type="submit" class="btn btn-primary">Đăng ký</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end  subscribe -->
    <!-- footer -->
    <footer id="colorlib-footer" role="contentinfo">
        <div class="container">
            <div class="row row-pb-md">
                <div class="col-md-5 colorlib-widget">
                    <h4>Giới thiệu</h4>
                    @if ($setting)
                    {!!$setting->logo!!}
                    @endif
                </div>
                <div class="col-md-3 colorlib-widget">
                    <h4>Chăm sóc khách hàng</h4>
                    <p>
                        <ul class="colorlib-footer-links">
                            <li><a href="{{route('site.contact')}}">Liên hệ </a></li>
                            <li><a href="{{route('site.about')}}">Giới thiệu </a></li>
                        </ul>
                    </p>
                </div>
                <div class="col-md-4">
                    <h4>Thông tin liên hệ</h4>
                    <ul class="colorlib-footer-links">
                        @if ($setting)
                        {!!$setting->contact!!}
                        @endif
                    </ul>
                </div>
            </div>
        </div>

    </footer>
    <!--end  footer -->
