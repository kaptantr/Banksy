@extends('frontEnd.layout')

@section('content')

    @if(count($TextBanners)>0)
        @foreach($TextBanners->slice(0,1) as $TextBanner)
            <?php
            try {
                $TextBanner_type = $TextBanner->webmasterBanner->type;
            } catch (Exception $e) {
                $TextBanner_type = 0;
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

        $col_width = 12;
        if (count($TextBanners) == 2) {
            $col_width = 6;
        }
        if (count($TextBanners) == 3) {
            $col_width = 4;
        }
        if (count($TextBanners) > 3) {
            $col_width = 3;
        }
        ?>

        <section class="content-row-no-bg p-b-0" style="padding: 0px 0 50px 0;background-color: transparent;">
            <div class="container" style="padding: 0;margin-left: 0px;">
                @if(count($HomePhotos)>0)
                    <!-- start Home Slider -->
                @include('frontEnd.includes.slider-top')
                    <!-- end Home Slider -->
                @endif

                <style>
                    .row .box-bottom {
                        position: absolute;
                        bottom: -60px;
                        width: 100%;
                        z-index: 100;
                        background: none;
                    }

                    .paragraf-baslik {
                        font-family: Morganite;
                        font-weight: bold;
                        letter-spacing: 1.75px;
                        text-transform: uppercase;
                        color: #DF0909;
                        color: rgb(223, 9, 9);
                        text-align: left;
                    @desktop
                        font-size: 56px;
                        margin-left: 70px;
                    @elsedesktop
                        font-size: 40px;
                        margin-left: 0px;
                    @enddesktop
                    }

                    .paragraf-icerik {
                        font-family: Arial;
                        font-weight: bold;
                        font-size: 16px;
                        letter-spacing: 0.45px;
                        text-transform: uppercase;
                        color: #000000;
                        color: rgb(0, 0, 0);
                        text-align: justify;
                    }

                    .ayrac {
                        background: #DF0909;
                        width: 6px;
                        height: 135px;
                        position: absolute;
                        top: 100px;
                        left: -3px;
                    }

                </style>

                <?php $sayac = 0 ?>

                @desktop
                    <div class="row" style="margin-left: 50px;margin: 0px;">
                @elsedesktop
                    <div class="row" style="margin-left: 10px;margin: 0px;">
                @enddesktop
                    <div class="col-lg-12">
                        <div class="row" style="margin-bottom: 0;margin: 0px;">
                            @foreach($TextBanners as $TextBanner)
                                <?php
                                if ($TextBanner->$title_var != "") {
                                    $BTitle = $TextBanner->$title_var;
                                } else {
                                    $BTitle = $TextBanner->$title_var2;
                                }
                                if ($TextBanner->$details_var != "") {
                                    $BDetails = $TextBanner->$details_var;
                                } else {
                                    $BDetails = $TextBanner->$details_var2;
                                }
                                if ($TextBanner->$file_var != "") {
                                    $BFile = $TextBanner->$file_var;
                                } else {
                                    $BFile = $TextBanner->$file_var2;
                                }
                                $sayac++;
                                if ($sayac > 2) {
                                    break;
                                }
                                ?>
                                <div class="col-lg-12">
                                    <div class="box">
                                    @desktop
                                        <div class="aligncenter" style="margin-right: 0px;">
                                    @elsedesktop
                                        <div class="aligncenter" style="">
                                    @enddesktop
                                            @if($TextBanner->code !="")
                                                {!! $TextBanner->code !!}
                                            @else
                                                @if($TextBanner->icon !="")
                                                    <div class="icon">
                                                        <i class="fa {{$TextBanner->icon}} fa-3x"></i>
                                                    </div>
                                                @elseif($BFile !="")
                                                    <img src="{{ URL::to('uploads/banners/'.$BFile) }}" alt="{{ $BTitle }}"/>
                                                @endif
                                                <h4 class="paragraf-baslik">{!! $BTitle !!}</h4>
                                                @if($BDetails !="")
                                                    <p class="bannercontent paragraf-icerik">{!! nl2br($BDetails) !!}</p>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                <?php $sayac = 0 ?>

                @desktop
                    <div class="row" style="margin-left: 50px;margin: 0px;">
                @elsedesktop
                    <div class="row" style="margin-left: 10px;margin: 0px;">
                @enddesktop
                    <div class="col-lg-12">
                        <div class="row" style="margin-bottom: 0;margin: 0px;">
                            @foreach($TextBanners as $TextBanner)
                                <?php
                                if ($TextBanner->$title_var != "") {
                                    $BTitle = $TextBanner->$title_var;
                                } else {
                                    $BTitle = $TextBanner->$title_var2;
                                }
                                if ($TextBanner->$details_var != "") {
                                    $BDetails = $TextBanner->$details_var;
                                } else {
                                    $BDetails = $TextBanner->$details_var2;
                                }
                                if ($TextBanner->$file_var != "") {
                                    $BFile = $TextBanner->$file_var;
                                } else {
                                    $BFile = $TextBanner->$file_var2;
                                }
                                $sayac++;
                                if ($sayac <= 2) {
                                    continue;
                                }
                                if ($sayac > 4) {
                                    break;
                                }
                                ?>
                                <div class="col-lg-6">
                                    @if($sayac == 4)
                                        @desktop
                                            <div class="ayrac"></div>
                                        @enddesktop
                                    @endif
                                    <div class="box">
                                        @desktop
                                            <div class="aligncenter" style="margin-right: 0px;">
                                        @elsedesktop
                                            <div class="aligncenter" style="">
                                        @enddesktop
                                            @if($TextBanner->code !="")
                                                {!! $TextBanner->code !!}
                                            @else
                                                @if($TextBanner->icon !="")
                                                    <div class="icon">
                                                        <i class="fa {{$TextBanner->icon}} fa-3x"></i>
                                                    </div>
                                                @elseif($BFile !="")
                                                    <img src="{{ URL::to('uploads/banners/'.$BFile) }}" alt="{{ $BTitle }}"/>
                                                @endif
                                                <h4 class="paragraf-baslik">{!! $BTitle !!}</h4>
                                                @if($BDetails !="")
                                                    <p class="bannercontent paragraf-icerik">{!! nl2br($BDetails) !!}</p>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif


    @if(count($HomePhotos)>0)
        <!-- start Home Slider -->
        @include('frontEnd.includes.slider')
        <!-- end Home Slider -->
    @endif


    @if(count($HomePhotos)>0)
        <section class="content-row-bg" style="background-color: #000;margin: 50px 0;padding: 0;">
            <div class="container" style="padding: 0;margin-right: 0px;border-right-width: 0px;">

                <div id="section-banksy">
                    <div class="row" style="background-color: #000;margin:0">

                        <div class="col-lg-1"></div>

                        <div class="col-lg-5">
                            <div class="wpb_wrapper aligncenter" style="padding-top: 0px;">
                                <div class="wpb_text_column wpb_content_element" style="max-width: 850px; display: inline-block;">
                                    <div class="aligncenter">
                                        <img alt="" src="{{ URL::to('/assets/frontend/img/orta-banner-1.png') }}" style="margin-top: 0px;">
                                    </div>
                                </div>
                                <style>
                                    .orta-banner-icerik p {
                                        font-family: Myriad Pro;
                                        font-size: 14px;
                                        letter-spacing: 0.35px;
                                        text-transform: uppercase;
                                        color: #FFFFFF;
                                        color: rgb(255, 255, 255);
                                        text-align: justify;
                                    }
                                </style>

                                <div class="wpb_text_column wpb_content_element" style="margin-top: 20px;">
                                    <div class="wpb_wrapper orta-banner-icerik">
                                        <p>
                                            Banksy, the British graffiti artist, is considered one of the main representatives of contemporary street art. His works,
                                            often satirical, address universal issues such as politics, culture or ethics.
                                        </p>
                                        <p>
                                            He is one of the most famous “unknown people” whose thought-provoking works have appeared in some of the most controversial
                                            places around the world. While he transformed streets from London to New York, from Berlin to Timbuktu, from Gaza to Tokyo
                                            into a giant canvas, he was also hung on the walls of major art institutions such as the British Museum, Tate Modern and the
                                            Louvre Museum.
                                        </p>
                                        <p></p>
                                        <p style="color: #DF0909;font-weight: bold;"> Banksy is a mysterious artist with a secret identity but globally recognized works. </p>
                                        <p>
                                            His criticism of pop-cultural imagery, politics and even art and museums has been viewed as a simple revolt by some;
                                            and interpreted as ingenious by the majority of others. The pop star Christina Aguilera bought Banksy's work depicting
                                            Queen Victoria as a lesbian and Justin Bieber got the “Red Balloon Girl” tattooed on his arm. Despite standing up
                                            against the commodification of art, auction houses found buyers for Banksy's works at record prices. In 2010, alongside
                                            Lady Gaga, Obama, Robert Pattinson, Sir Elton John, and Prince, Banksy was also named one of the world’s most influential
                                            people by Time Magazine.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-1"></div>

                        <div class="col-lg-5" style="padding:0;">
                            <div class="wpb_text_column wpb_content_element pull-right">
                                <img data-animation="fade-in" src="{{ url("") . "/uploads/topics/" }}whoisbanksy_600x800px.jpg" alt="" style="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(count($HomePartners)>0)
        <section class="content-row-no-bg top-line" style="background-color: transparent;">
            <div class="container">
                <div class="row">
                    <div class="partners_carousel slide" style="direction: ltr">
                        <div class="carousel-inner">
                            <div class="item active">
                                <ul class="thumbnails aligncenter">
                                    <?php
                                        $sliders = [
                                            ['filename' => 'slider-prague.png', 'title' => 'Prague', 'link' => '/products/topic/29'],
                                            ['filename' => 'slider-milano.png', 'title' => 'Milano', 'link' => '/products/topic/29'],
                                            ['filename' => 'slider-paris.png', 'title' => 'Paris', 'link' => '/products/topic/29'],
                                            ['filename' => 'slider-barcelona.png', 'title' => 'Barcelona', 'link' => '/products/topic/29'],
                                            ['filename' => 'slider-dubai.png', 'title' => 'Dubai', 'link' => '/products/topic/29'],
                                        ];
                                    ?>
                                    @foreach($sliders as $slider)
                                        <li class="col-sm-2" style="margin-right: 3%;margin-top: 20px;">
                                            <div>
                                                <div class="thumbnail cities">
                                                    <a href="{{ url("") . $slider['link'] }}">
                                                        <img src="{{ URL::to('/assets/frontend/img/'.$slider['filename']) }}" data-placement="bottom" title="{{$slider['title']}}"
                                                             alt="{{$slider['title']}}">
                                                    </a>
                                                </div>
                                            </div>
                                            <br> <br>
                                        </li>
                                    @endforeach
                                    <style> .thumbnail.cities img:hover { transform: scale(1.1); } </style>
                                </ul>
                            </div><!-- /Slide -->
                        </div>

                    </div><!-- /#myCarousel -->
                </div>

            </div>

        </section>
    @endif


    @if(count($HomePartners)>0)
        <section class="content-row-no-bg top-line" style="background-color: transparent;">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="home-row-head">
                            <h2 class="heading font-mind">{{ __('frontend.partners') }}</h2>
                        </div>
                    </div>
                </div>
                <style>
                    h2.font-mind
                    {
                        font-family : 'Mind the gap';
                        font-size : 55px;
                        letter-spacing : -2.19px;
                        text-transform : uppercase;
                        color : #000000;
                    }
                    span.arrow-autobahn
                    {
                        font-family : Autobahn;
                        font-size : 98px;
                        letter-spacing : 2.45px;
                        text-transform : uppercase;
                        color : #000000;
                    }

                </style>
                @desktop
                    <?php $slideCount = 6; ?>
                @elsedesktop
                    <?php $slideCount = 1; ?>
                @enddesktop
                <div class="row">
                    <div class="partners_carousel slide" id="myCarousel" style="direction: ltr">
                        <div class="carousel-inner">
                            <div class="item active">
                                <ul class="thumbnails">
                                    <?php
                                        $ii = 0;
                                        $title_var = "title_" . @Helper::currentLanguage()->code;
                                        $title_var2 = "title_" . env('DEFAULT_LANGUAGE');
                                        $details_var = "details_" . @Helper::currentLanguage()->code;
                                        $details_var2 = "details_" . env('DEFAULT_LANGUAGE');
                                        $section_url = "";
                                    ?>

                                    @foreach($HomePartners as $HomePartner)
                                        <?php
                                            if ($HomePartner->$title_var != "") {
                                                $title = $HomePartner->$title_var;
                                            } else {
                                                $title = $HomePartner->$title_var2;
                                            }

                                            if ($section_url == "") {
                                                $section_url = Helper::sectionURL($HomePartner->webmaster_id);
                                            }

                                            if ($ii == $slideCount) {
                                                echo "
                                </ul>
                            </div><!-- /Slide -->
                            <div class='item'>
                                <ul class='thumbnails'>
                                                            ";
                                                $ii = 0;
                                            }
                                        ?>
                                        <li class="col-sm-2">
                                            <div>
                                                <div class="thumbnail">
                                                    <img src="{{ URL::to('uploads/topics/'.$HomePartner->photo_file) }}" data-placement="bottom" title="{{ $title }}" alt="{{ $title }}">
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                        </li>
                                        <?php $ii++; ?>
                                    @endforeach

                                </ul>
                            </div><!-- /Slide -->
                        </div>
                        <nav>
                            <ul class="control-box pager">
                                <li>
                                    <a data-slide="prev" href="#myCarousel" style="background: none;border: none;">
                                        <span class="arrow-autobahn">&lt;</span>
                                    </a>
                                </li>
                                <li>
                                    <a data-slide="next" href="#myCarousel" style="background: none;border: none;">
                                        <span class="arrow-autobahn">&gt;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <!-- /.control-box -->

                    </div><!-- /#myCarousel -->
                </div>

            </div>

        </section>
    @endif

@endsection

