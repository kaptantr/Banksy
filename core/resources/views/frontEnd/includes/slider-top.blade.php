@if(count($SliderBanners)>0)
    <section id="featured">
        <!-- start slider -->
        <!-- Slider -->
        @foreach($SliderBanners->slice(0,1) as $SliderBanner)
            <?php
            try {
                $SliderBanner_type = $SliderBanner->webmasterBanner->type;
            } catch (Exception $e) {
                $SliderBanner_type = 0;
            }
            ?>
        @endforeach
        <?php
            $title_var = "title_" . @Helper::currentLanguage()->code;
            $title_var2 = "title_" . env('DEFAULT_LANGUAGE');
            $details_var = "details_" . @Helper::currentLanguage()->code;
            $details_var2 = "details_" . env('DEFAULT_LANGUAGE');
            $file_var = "file_" . @Helper::currentLanguage()->code;
            $file_var2 = "file_" . env('DEFAULT_LANGUAGE');
        ?>
        @if($SliderBanner_type==0)
            {{-- Text/Code Banners--}}
            <div class="text-center">
                @foreach($SliderBanners as $SliderBanner)
                    <?php
                    if ($SliderBanner->$details_var != "") {
                        $BDetails = $SliderBanner->$details_var;
                    } else {
                        $BDetails = $SliderBanner->$details_var2;
                    }
                    ?>
                    @if($BDetails !="")
                        <div>{!! $BDetails !!}</div>
                    @endif
                @endforeach
            </div>
        @elseif($SliderBanner_type==1)
            {{-- Photo Slider Banners--}}
            <div id="top-slider" class="flexslider">
                <ul class="slides">
                    @foreach($SliderBanners as $SliderBanner)
                        <?php
                            if($SliderBanner->video_type != '120') {
                                continue;
                            }
                            if ($SliderBanner->$title_var != "") {
                                $BTitle = $SliderBanner->$title_var;
                            }
                            else {
                                $BTitle = $SliderBanner->$title_var2;
                            }
                            $BDetails = $SliderBanner->$details_var;
                            if ($SliderBanner->$file_var != "") {
                                $BFile = $SliderBanner->$file_var;
                            }
                            else {
                                $BFile = $SliderBanner->$file_var2;
                            }
                        ?>
                        <li>
                            <img src="{{ URL::to('uploads/banners/'.$BFile) }}" alt="{{ $BTitle }}"/>
                            @if($BDetails !="" || $SliderBanner->link_url!="")
                                @desktop
                                    <div style="background-color: transparent;bottom: 10px;right: 5%;width: 300px;position: absolute;">
                                @elsedesktop
                                    <style>ol.flex-control-nav.flex-control-paging { display:none; }</style>
                                    <div style="background-color: transparent;bottom: -20px;right: 0%;width: 200px;position: absolute;">
                                @enddesktop

                                    @if($BTitle !="")
                                        <a href="/tickets" class="btn btn-theme2">
                                            @desktop
                                                <img src="{{ URL::to('assets/frontend/img/ust-banner-buttons.png') }}" alt=""/>
                                            @elsedesktop
                                                <img src="{{ URL::to('assets/frontend/img/ust-banner-buttons_mobile.png') }}" alt=""/>
                                            @enddesktop

                                            <style> .btn.btn-theme2 img:hover { transform: scale(1.1); } </style>
                                        </a>
                                    @endif
                                </div>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            {{-- Video Banners--}}
            <div class="text-center">
                @foreach($SliderBanners as $SliderBanner)
                    <?php
                    if ($SliderBanner->$title_var != "") {
                        $BTitle = $SliderBanner->$title_var;
                    } else {
                        $BTitle = $SliderBanner->$title_var2;
                    }
                    if ($SliderBanner->$details_var != "") {
                        $BDetails = $SliderBanner->$details_var;
                    } else {
                        $BDetails = $SliderBanner->$details_var2;
                    }
                    if ($SliderBanner->$file_var != "") {
                        $BFile = $SliderBanner->$file_var;
                    } else {
                        $BFile = $SliderBanner->$file_var2;
                    }
                    ?>
                    @if($BDetails !="")
                        <div>{!! $BDetails !!}</div>
                    @endif
                @endforeach
            </div>
    @endif
    <!-- end slider -->
    </section>
@endif
