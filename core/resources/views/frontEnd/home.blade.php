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

            </div>
        </section>
    @endif


    @if(count($HomePhotos)==0 && ($url_query == 'barcelona' || $url_query == 'dubai' || $url_query == 'paris' || $url_query == 'milano' || $url_query == 'prague'))
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="ticket-baslik">{{ ucfirst($url_query) }}</h4>
                    <p class="ticket-baslik" style="margin-top:50px !important;"><img alt="" src="{{ URL::to('/assets/frontend/img/info_image.png') }}"></p>
                    @if($url_query == 'barcelona')
                        <p class="ticket-info-text">
                            FOLLOWING THE SUCCESS OF THE EXHIBITION THE WORLD OF BANKSY IN PARIS,
                            IT IS NOW ESPACIO TRAFALGAR'S TURN IN BARCELONA TO PRESENT THE WORK OF THE BRISTOL STREET ARTIST.
                            EXPLORE MORE THAN 100 WORKS OF THE POLITICAL PROVOCATEUR, THE ICONIC UK ARTIST ON A SELF-GUIDED TOUR.
                            CHECK OUT REPLICAS OF FAMOUS PIECES LIKE GIRL WITH BALLOON AND GIRL FRISKING SOLDIER.
                        </p>
                        <div class="row" style="margin-top: 30px;">
                            <div class="col-lg-4">
                                <p class="ticket-baslik" style="margin-top:30px !important;"><img alt="" src="{{ URL::to('/assets/frontend/img/venue_image.png') }}"></p>
                                <p class="ticket-info-text">ESPACIO TRAFALGAR</p>
                            </div>
                            <div class="col-lg-4">
                                <p class="ticket-baslik" style="margin-top:30px !important;"><img alt="" src="{{ URL::to('/assets/frontend/img/address_image.png') }}"></p>
                                <p class="ticket-info-text">CARRER TRAFALGAR 34 08010<br>BARCELONA, SPAIN</p>
                            </div>
                            <div class="col-lg-4">
                                <p class="ticket-baslik" style="margin-top:30px !important;"><img alt="" src="{{ URL::to('/assets/frontend/img/contact_image.png') }}"></p>
                                <p class="ticket-info-text">+34 935 15 68 63</p>
                            </div>
                        </div>
                    @desktop
                        <div class="row" style="margin-top: 30px;max-width:50%;margin:0 auto;">
                    @elsedesktop
                        <div class="row" style="margin-top: 30px;margin:0;">
                    @enddesktop
                        @desktop
                            <div class="col-lg-6">
                        @elsedesktop
                            <div class="col-lg-6" style="padding: 0">
                        @enddesktop
                                <p class="ticket-baslik" style="margin-top:30px !important;">
                                    <a href="https://espaciotrafalgar.qidoon.com/events/152?lang=es" class="btn btn-theme2">
                                        <img alt="" src="{{ URL::to('/assets/frontend/img/website_button.png') }}">
                                    </a>
                                </p>
                            </div>
                        @desktop
                            <div class="col-lg-6">
                        @elsedesktop
                            <div class="col-lg-6" style="padding: 0">
                        @enddesktop
                                <p class="ticket-baslik" style="margin-top:30px !important;">
                                    <a href="https://espaciotrafalgar.es/" class="btn btn-theme2">
                                        <img alt="" src="{{ URL::to('/assets/frontend/img/ust-banner-buttons.png') }}">
                                    </a>
                                </p>
                            </div>
                        </div>
                    @endif
                    @if($url_query == 'dubai')
                        <p class="ticket-info-text">
                            FOR THE FIRST TIME IN THE EMIRATES, THE UNIQUE EXHIBITION “THE WORLD OF BANKSY - THE IMMERSIVE EXPERIENCE”
                            REVEALS OVER 120 BANKSY ARTWORKS SPREAD IN A GALLERY OF OVER 1000SQM.
                            THE REPRODUCTIONS OF GRAPHIC MURALS WILL ENABLE VISITORS TO REDISCOVER THE WELL-KNOWN WORKS BY BANKSY.
                            MOREOVER, FAMOUS BELGIAN PHOTOGRAPHER PHILIPPE BERNAERTS’
                            PHOTOGRAPHY PROJECT DEDICATED TO DUBAI IS SHOWN FOR THE FIRST TIME DURING THE EXHIBITION.
                        </p>
                        <div class="row" style="margin-top: 30px;">
                            <div class="col-lg-4">
                                <p class="ticket-baslik" style="margin-top:30px !important;"><img alt="" src="{{ URL::to('/assets/frontend/img/venue_image.png') }}"></p>
                                <p class="ticket-info-text">MALL OF EMIRATES THEATRE</p>
                            </div>
                            <div class="col-lg-4">
                                <p class="ticket-baslik" style="margin-top:30px !important;"><img alt="" src="{{ URL::to('/assets/frontend/img/address_image.png') }}"></p>
                                <p class="ticket-info-text">AL BARSHA SHEIKH ZAYED<br>ROAD INTERCHANGE FOUR DUBAI,<br>UNITED ARAB EMIRATES</p>
                            </div>
                            <div class="col-lg-4">
                                <p class="ticket-baslik" style="margin-top:30px !important;"><img alt="" src="{{ URL::to('/assets/frontend/img/contact_image.png') }}"></p>
                                <p class="ticket-info-text">+971 44099100<br>INFO.MOE@MAF.AE</p>
                            </div>
                        </div>
                    @desktop
                        <div class="row" style="margin-top: 30px;max-width:50%;margin:0 auto;">
                    @elsedesktop
                        <div class="row" style="margin-top: 30px;margin:0;">
                    @enddesktop
                        @desktop
                            <div class="col-lg-6">
                        @elsedesktop
                            <div class="col-lg-6" style="padding: 0">
                        @enddesktop
                                <p class="ticket-baslik" style="margin-top:30px !important;">
                                    <a href="https://theworldofbanksy.ae/" class="btn btn-theme2">
                                        <img alt="" src="{{ URL::to('/assets/frontend/img/website_button.png') }}">
                                    </a>
                                </p>
                            </div>
                        @desktop
                            <div class="col-lg-6">
                        @elsedesktop
                            <div class="col-lg-6" style="padding: 0">
                        @enddesktop
                                <p class="ticket-baslik" style="margin-top:30px !important;">
                                    <a href="https://dubai.platinumlist.net/event-tickets/81350/the-world-of-banksy-the-immersive-experience" class="btn btn-theme2">
                                        <img alt="" src="{{ URL::to('/assets/frontend/img/ust-banner-buttons.png') }}">
                                    </a>
                                </p>
                            </div>
                        </div>
                    @endif
                    @if($url_query == 'milano')
                        <p class="ticket-info-text">
                            SINCE 14.05 2021, THE TEATRO NUOVO IN MILAN IS HOSTING “THE WORLD OF BANKSY - THE IMMERSIVE EXPERIENCE”
                            EXHIBITION WITH OVER 60 SPLENDID ARTWORKS AND MORE THAN 30 LIFE-SIZE MURALS
                            BY THE MOST MYSTERIOUS ARTIST OF ALL TIME.
                        </p>
                        <div class="row" style="margin-top: 30px;">
                            <div class="col-lg-4">
                                <p class="ticket-baslik" style="margin-top:30px !important;"><img alt="" src="{{ URL::to('/assets/frontend/img/venue_image.png') }}"></p>
                                <p class="ticket-info-text">TEATRO NUOVO DI MILANO</p>
                            </div>
                            <div class="col-lg-4">
                                <p class="ticket-baslik" style="margin-top:30px !important;"><img alt="" src="{{ URL::to('/assets/frontend/img/address_image.png') }}"></p>
                                <p class="ticket-info-text">PIAZZA SAN BABILA 1/3 <br>20122 MILAN, ITALY</p>
                            </div>
                            <div class="col-lg-4">
                                <p class="ticket-baslik" style="margin-top:30px !important;"><img alt="" src="{{ URL::to('/assets/frontend/img/contact_image.png') }}"></p>
                                <p class="ticket-info-text">+39 02 794026<br>INFO@TEATRONUOVO.IT</p>
                            </div>
                        </div>
                    @desktop
                        <div class="row" style="margin-top: 30px;max-width:50%;margin:0 auto;">
                    @elsedesktop
                        <div class="row" style="margin-top: 30px;margin:0;">
                    @enddesktop
                        @desktop
                            <div class="col-lg-6">
                        @elsedesktop
                            <div class="col-lg-6" style="padding: 0">
                        @enddesktop
                                <p class="ticket-baslik" style="margin-top:30px !important;">
                                    <a href="https://theworldofbanksy.it/" class="btn btn-theme2">
                                        <img alt="" src="{{ URL::to('/assets/frontend/img/website_button.png') }}">
                                    </a>
                                </p>
                            </div>
                        @desktop
                            <div class="col-lg-6">
                        @elsedesktop
                            <div class="col-lg-6" style="padding: 0">
                        @enddesktop
                                <p class="ticket-baslik" style="margin-top:30px !important;">
                                    <a href="https://www.happyticket.it/milano/acquista-abbonamenti/417-the-world-of-bansky.htm" class="btn btn-theme2">
                                        <img alt="" src="{{ URL::to('/assets/frontend/img/ust-banner-buttons.png') }}">
                                    </a>
                                </p>
                            </div>
                        </div>
                    @endif
                    @if($url_query == 'paris')
                        <p class="ticket-info-text">
                            THE EXHIBITION REOPENS ON 19.05.2021 AND REVEALS AROUND 100 ARTWORKS IN 1200SQM
                            AT ESPACE LAFAYETTE-DROUOT ART GALLERY. HERE, YOU CAN ALSO GET THE CHANCE TO DISCOVER
                            ONE OF BANKSY'S MOST SURPRISING ACHIEVEMENTS! REPRODUCTION OF THE “WALLED OFF HOTEL IN BETHLEHEM”
                            IN THE HEART OF PARIS WILL SURPRISE YOU WITH ITS ORIGINALITY AND DECORATION.
                        </p>
                        <div class="row" style="margin-top: 30px;">
                            <div class="col-lg-4">
                                <p class="ticket-baslik" style="margin-top:30px !important;"><img alt="" src="{{ URL::to('/assets/frontend/img/venue_image.png') }}"></p>
                                <p class="ticket-info-text">ESPACE LAFAYETTE-DROUO</p>
                            </div>
                            <div class="col-lg-4">
                                <p class="ticket-baslik" style="margin-top:30px !important;"><img alt="" src="{{ URL::to('/assets/frontend/img/address_image.png') }}"></p>
                                <p class="ticket-info-text">44 RUE DU FAUBOURG<br>MONTMARTRE 75009PARIS, FRANCE</p>
                            </div>
                            <div class="col-lg-4">
                                <p class="ticket-baslik" style="margin-top:30px !important;"><img alt="" src="{{ URL::to('/assets/frontend/img/contact_image.png') }}"></p>
                                <p class="ticket-info-text">+33 182 83 28 55</p>
                            </div>
                        </div>
                    @desktop
                        <div class="row" style="margin-top: 30px;max-width:50%;margin:0 auto;">
                    @elsedesktop
                        <div class="row" style="margin-top: 30px;margin:0;">
                    @enddesktop
                        @desktop
                            <div class="col-lg-6">
                        @elsedesktop
                            <div class="col-lg-6" style="padding: 0">
                        @enddesktop
                                <p class="ticket-baslik" style="margin-top:30px !important;">
                                    <a href="https://theworldofbanksy.fr/" class="btn btn-theme2">
                                        <img alt="" src="{{ URL::to('/assets/frontend/img/website_button.png') }}">
                                    </a>
                                </p>
                            </div>
                        @desktop
                            <div class="col-lg-6">
                        @elsedesktop
                            <div class="col-lg-6" style="padding: 0">
                        @enddesktop
                                <p class="ticket-baslik" style="margin-top:30px !important;">
                                    <a href="https://tickets.theworldofbanksy.fr/events/153?lang=en" class="btn btn-theme2">
                                        <img alt="" src="{{ URL::to('/assets/frontend/img/ust-banner-buttons.png') }}">
                                    </a>
                                </p>
                            </div>
                        </div>
                    @endif
                    @if($url_query == 'prague')
                        <p class="ticket-info-text">
                            BANKSY IS WITHOUT A DOUBT THE WORLD’S MOST FAMOUS AND CELEBRATED GRAFFITI ARTIST.
                            NOW, A BRAND NEW SHOW PRESENTING THE ART ICON IS COMING BACK TO PRAGUE.
                            SET IN THE UNIQUE PREMISES, THE EXHIBITION WILL REVIVE THE STREET ATMOSPHERE INSIDE
                            THE BAROQUE STYLE CHURCH OF ST. MICHAEL BRINGING NEW ARTWORKS AND QUITE A FEW SURPRISES.
                        </p>
                        <div class="row" style="margin-top: 30px;">
                            <div class="col-lg-4">
                                <p class="ticket-baslik" style="margin-top:30px !important;"><img alt="" src="{{ URL::to('/assets/frontend/img/venue_image.png') }}"></p>
                                <p class="ticket-info-text">ST. MICHAEL CHURCH</p>
                            </div>
                            <div class="col-lg-4">
                                <p class="ticket-baslik" style="margin-top:30px !important;"><img alt="" src="{{ URL::to('/assets/frontend/img/address_image.png') }}"></p>
                                <p class="ticket-info-text">MICHALSKÁ 662/29 110 00<br>PRAGUE, CZECH REPUBLIC</p>
                            </div>
                            <div class="col-lg-4">
                                <p class="ticket-baslik" style="margin-top:30px !important;"><img alt="" src="{{ URL::to('/assets/frontend/img/contact_image.png') }}"></p>
                                <p class="ticket-info-text">INFO@THEWORLDOFBANKSY.DE</p>
                            </div>
                        </div>

                        <h4 class="ticket-baslik" style="font-size: 52px">BUY TICKETS</h4>

                    @desktop
                        <div class="row" style="margin-top: 10px;margin:0 auto;">
                    @elsedesktop
                        <div class="row" style="margin-top: 10px;margin:0;">
                    @enddesktop
                        @desktop
                            <div class="col-lg-4">
                        @elsedesktop
                            <div class="col-lg-4" style="padding: 0">
                        @enddesktop
                                <p class="ticket-baslik" style="margin-top:30px !important;">
                                    <a href="https://www.ticketportal.cz/event/THE-WORLD-OF-BANKSY-THE-IMMERSIVE-EXPERIENCE" class="btn btn-theme2">
                                        <img alt="" src="{{ URL::to('/assets/frontend/img/ticket_portal_image.png') }}">
                                    </a>
                                </p>
                            </div>
                        @desktop
                            <div class="col-lg-4">
                         @elsedesktop
                            <div class="col-lg-4" style="padding: 0">
                        @enddesktop
                                <p class="ticket-baslik" style="margin-top:30px !important;">
                                    <a href="https://goout.net/en/the-world-of-banksy-the-immersive-experience/ezrfueg/" class="btn btn-theme2">
                                        <img alt="" src="{{ URL::to('/assets/frontend/img/goout_image.png') }}">
                                    </a>
                                </p>
                            </div>
                        @desktop
                            <div class="col-lg-4">
                        @elsedesktop
                            <div class="col-lg-4" style="padding: 0">
                        @enddesktop
                                <p class="ticket-baslik" style="margin-top:30px !important;">
                                    <a href="https://www.ticketstream.cz/akce/the-world-of-banksy-143030" class="btn btn-theme2">
                                        <img alt="" src="{{ URL::to('/assets/frontend/img/ticket_stream_image.png') }}">
                                    </a>
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif


    @if(count($HomePhotos)==0 && ($url_query == 'barcelona' || $url_query == 'dubai' || $url_query == 'paris' || $url_query == 'milano' || $url_query == 'prague'))
        <section class="content-row-no-bg top-line" style="background-color: transparent;">
            <div class="container">
                <div class="row">
                    <h4 class="paragraf-baslik" style="margin-left: 25px;">Gallery</h4>
                    <div class="partners_carousel slide" style="direction: ltr">
                        <div class="carousel-inner">
                            <div class="item active">
                                <ul class="thumbnails aligncenter">
                                    <?php
                                    $sliders = [
                                        ['filename' => 'gallery-' . $url_query . '-1.png', 'title' => $url_query . ' slider', 'link' => '#'],
                                        ['filename' => 'gallery-' . $url_query . '-2.png', 'title' => $url_query . ' slider', 'link' => '#'],
                                        ['filename' => 'gallery-' . $url_query . '-3.png', 'title' => $url_query . ' slider', 'link' => '#'],
                                        ['filename' => 'gallery-' . $url_query . '-4.png', 'title' => $url_query . ' slider', 'link' => '#'],
                                        ['filename' => 'gallery-' . $url_query . '-5.png', 'title' => $url_query . ' slider', 'link' => '#'],
                                    ];
                                    ?>
                                    @foreach($sliders as $slider)
                                            <li class="col-sm-2" style="margin-left:1.5%;margin-right:1.5%;margin-top: 20px;">
                                                <div>
                                                    <div class="thumbnail cities">
                                                        <a href="#" class="pop image">
                                                            <img src="{{ URL::to('/assets/frontend/img/'.$slider['filename']) }}" data-placement="bottom" title="{{$slider['title']}}" alt="{{$slider['title']}}">
                                                        </a>
                                                    </div>
                                                </div>
                                                <br> <br>
                                            </li>

                                            <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span aria-hidden="true">&times;</span>
                                                                <span class="sr-only">Kapat</span>
                                                            </button>
                                                            <img src="" class="imagepreview" style="width: 100%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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


    @if(count($HomePhotos)==0 && $url_query == 'about-us')
        <section class="content-row-no-bg top-line" style="background-color: transparent;">
            <div class="container">
                <div class="row">
                    <h4 class="paragraf-baslik" style="margin-left: 25px;">Gallery</h4>
                    <div class="partners_carousel slide" style="direction: ltr">
                        <div class="carousel-inner">
                            <div class="item active">
                                <ul class="thumbnails aligncenter">
                                    <?php
                                    $sliders = [
                                        ['filename' => 'gallery-' . $url_query . '-1.png', 'title' => $url_query . ' slider', 'link' => '#'],
                                        ['filename' => 'gallery-' . $url_query . '-2.png', 'title' => $url_query . ' slider', 'link' => '#'],
                                        ['filename' => 'gallery-' . $url_query . '-3.png', 'title' => $url_query . ' slider', 'link' => '#'],
                                        ['filename' => 'gallery-' . $url_query . '-4.png', 'title' => $url_query . ' slider', 'link' => '#'],
                                        ['filename' => 'gallery-' . $url_query . '-5.png', 'title' => $url_query . ' slider', 'link' => '#'],
                                    ];
                                    ?>
                                    @foreach($sliders as $slider)
                                        <li class="col-sm-2" style="margin-left:1.5%;margin-right:1.5%;margin-top: 20px;">
                                            <div>
                                                <div class="thumbnail cities">
                                                    <a href="{{ url("") . $slider['link'] }}">
                                                        <img src="{{ URL::to('/assets/frontend/img/'.$slider['filename']) }}" data-placement="bottom" alt="{{$slider['title']}}">
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


    @if(count($HomePhotos)==0 && $url_query == 'contact-us')
        <section class="content-row-no-bg top-line" style="background-color: transparent;">
            <div class="container">
                <div class="row" style="margin-top: 50px;">
                    <h4 class="paragraf-baslik" style="margin-left: 25px;">Contact</h4>
                @desktop
                    <div class="row" style="margin-top: 30px;width: 70%; margin:0 auto">
                @elsedesktop
                    <div class="row" style="margin-top: 30px;width: 100%; margin:0 auto">
                @enddesktop
                        <div class="col-lg-6">
                            <p class="ticket-baslik" style="margin-top:30px !important;transform: scale(0.8);"><img alt="" src="{{ URL::to('/assets/frontend/img/address_image.png') }}"></p>
                            <p class="ticket-info-text" style="font-size:17px">ST. MICHAEL CHURCH,<br>MICHALSKÁ 662/29 110 00<br>PRAGUE, CZECH REPUBLIC </p>
                        </div>
                        <div class="col-lg-6">
                            <p class="ticket-baslik" style="margin-top:30px !important;transform: scale(0.8);"><img alt="" src="{{ URL::to('/assets/frontend/img/contact_image.png') }}"></p>
                            <p class="ticket-info-text" style="font-size:17px">INFO@THEWORLDOFBANKSY.DE</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    @include('frontEnd.includes.subscribe')
                </div>
            </div>
        </section>
    @endif


    @if(count($HomePhotos)==0 && $url_query == 'location')
        <section class="content-row-no-bg top-line" style="background-color: transparent;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="google-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2560.0018953985277!2d14.418070715718196!3d50.08625137942676!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470b95a5aa3ffe29%3A0x272fce97ba6fff66!2sThe%20World%20of%20Banksy%20-%20An%20Immersive%20Experience!5e0!3m2!1sen!2scz!4v1624627334617!5m2!1sen!2scz" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row" style="margin-top: 50px;">
                    <div class="row" style="margin-top: 30px;width: 70%; margin:0 auto">
                        <div class="col-lg-6">
                            <p class="ticket-baslik" style="margin-top:30px !important;transform: scale(0.8);"><img alt="" src="{{ URL::to('/assets/frontend/img/qrcode_image.png') }}"></p>
                            <p class="ticket-baslik" style="margin-top:0px !important;transform: scale(0.9);"><img alt="" src="{{ URL::to('/assets/frontend/img/qrcode.png') }}"></p>
                        </div>
                        <div class="col-lg-6">
                            <p class="ticket-baslik" style="margin-top:30px !important;transform: scale(0.8);"><img alt="" src="{{ URL::to('/assets/frontend/img/address_image.png') }}"></p>
                            <p class="ticket-info-text" style="font-size:17px">MICHALSKÁ 662/29 110 00<br>PRAGUE, CZECH REPUBLIC </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <style>
            #google-map {
                width: 80vw;
                height: 35vw;
                margin: 0 auto;
            }
            #google-map iframe{
                height: 100%;
                border: 1px solid #000;
                width: 100%;
            }
        </style>
    @endif


    @if(count($HomePhotos)==0 && $url_query == 'imprint')
        <section class="content-row-no-bg top-line" style="background-color: transparent;min-height: 850px;">
            <div class="container">
                <div class="row" style="margin-top: 50px;">
                    <h4 class="paragraf-baslik" style="margin-left: 25px;">IMPRINT</h4>
                    <p class="ticket-info-text" style="text-align: left;line-height: 40px;">
                        <b style="font-weight: 800">LEGAL WEBSITE OPERATOR IDENTIFICATION:</b><br>
                        Global Event‘s & Management‘s  s.r.o<br>
                        BISKUPSKÝ DVŮR 1154/1<br>
                        PRAHA 1 , NOVE MESTO<br>
                        PRAHA 1 , 110 00<br>
                        CZECH REPUBLIC<br>
                        <b style="font-weight: 800">TELEPHONE:</b><br>
                        + 420 777033070<br>
                        <b style="font-weight: 800">E-MAIL:</b> INFO@THEWORLDOFBANKSY.DE<br>
                        <b style="font-weight: 800">VAT NO.:</b> CZ09836322<br>
                        LISTED IN THE COMMERCIAL REGISTER OF THE LOCAL COURT PRAHA<br>
                        COMMERCIAL REGISTER.<br>
                        WE ARE A MEMBER OF THE INITIATIVE „FAIRCOMMERCE“ SINCE 16.11.2015. FOR<br>
                        MORE INFORMATION, SEE: WWW.FAIR-COMMERCE.DE<br>
                    </p>
                </div>
            </div>
        </section>
        <style>
            #google-map {
                width: 80vw;
                height: 35vw;
                margin: 0 auto;
            }
            #google-map iframe{
                height: 100%;
                border: 1px solid #000;
                width: 100%;
            }
        </style>
    @endif


    @if(count($HomePhotos)==0 && $url_query == 'data-preferences')
        <section class="content-row-no-bg top-line" style="background-color: transparent;">
            <div class="container">
                <div class="row" style="margin-top: 50px;">
                    <h4 class="paragraf-baslik" style="margin-left: 25px;">Data Preferences</h4>
                    <div class="row" style="margin-top: 30px;margin:0 auto">
                        <div class="wrapper">
                            <div class="accordion">
                                <div class="accordion_tab ticket-info-text">
                                    DATA PROTECTION DECLARATION
                                    <div class="accordion_arrow">
                                        <img src="{{ URL::to('/assets/frontend/img/acordion_arrow.png') }}" alt="arrow">
                                    </div>
                                </div>
                                <div class="accordion_content">
                                    <div class="accordion_item">
                                        <p>
                                            Unless stated otherwise below, the provision of your personal data is neither legally nor contractually obligatory, nor required for conclusion
                                            of a contract. You are not obliged to provide your data. Not providing it will have no consequences. This only applies as long as the
                                            processing procedures below do not state otherwise.
                                            “Personal data” is any information relating to an identified or identifiable natural person.
                                        </p>
                                        <p>
                                            <b>Server log files</b><br>
                                            You can use our websites without submitting personal data.
                                            Every time our website is accessed, user data is transferred to us or our web hosts/IT service providers by your internet browser and stored
                                            in server log files. This stored data includes for example the name of the site called up, date and time of the request, the IP address,
                                            amount of data transferred and the provider making the request. The processing is carried out on the basis of Article 6(1) f) GDPR due to
                                            our legitimate interests in ensuring the smooth operation of our website as well as improving our services.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion_tab ticket-info-text">
                                    CONTACT
                                    <div class="accordion_arrow">
                                        <img src="{{ URL::to('/assets/frontend/img/acordion_arrow.png') }}" alt="arrow">
                                    </div>
                                </div>
                                <div class="accordion_content">
                                    <div class="accordion_item">
                                        <p>
                                            <b>Responsible person</b>
                                            Contact us at any time. The contact details of the person responsible for data processing can be found in our legal notice.
                                        </p>
                                        <p>
                                            <b>Proactive contact of the customer by e-mail</b><br>
                                            If you make contact with us proactively via email, we shall collect your personal data (name, email address, message text) only to the extent
                                            provided by you. The purpose of the data processing is to handle and respond to your contact request.
                                            If the initial contact serves to implement pre-contractual measures (e.g. consultation in the case of purchase interest, order creation) or
                                            concerns an agreement already concluded between you and us, this data processing takes place on the basis of Article 6(1)(b) GDPR.
                                            If the initial contact occurs for other reasons, this data processing takes place on the basis of Article 6(1)(f) GDPR for the purposes of our
                                            overriding, legitimate interest in handling and responding to your request.
                                            <b><i>In this case, on grounds relating to your particular situation,
                                            you have the right to object at any time to this processing of personal data concerning you and carried out on the basis of
                                            Article 6(1)(f) GDPR.</i></b><br>
                                            We will only use your email address to process your request. Your data will subsequently be deleted in compliance with statutory retention
                                            periods, unless you have agreed to further processing and use.
                                        </p>

                                        <p>
                                            <b>Collection and processing when using the contact form</b><br>
                                            When you use the contact form we will only collect your personal data (name, email address, message text) in the scope provided by you.
                                            The data processing is for the purpose of making contact.
                                            If the initial contact serves to implement pre-contractual measures (e.g. consultation in the case of purchase interest, order creation) or
                                            concerns an agreement already concluded between you and us, this data processing takes place on the basis of Article 6(1)(b) GDPR.
                                            If the initial contact occurs for other reasons, this data processing takes place on the basis of Article 6(1)(f) GDPR for the purposes of our
                                            overriding, legitimate interest in handling and responding to your request.
                                            <b><i>In this case, on grounds relating to your particular situation,
                                            you have the right to object at any time to this processing of personal data concerning you and carried out on the basis of Article
                                            6(1)(f) GDPR.</i></b><br>
                                            We will only use your email address to process your request. Finally your data will be deleted, unless you have agreed to further processing
                                            and use.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion_tab ticket-info-text">
                                    REGISTRATION EVALUATIONS
                                    <div class="accordion_arrow">
                                        <img src="{{ URL::to('/assets/frontend/img/acordion_arrow.png') }}" alt="arrow">
                                    </div>
                                </div>
                                <div class="accordion_content">
                                    <div class="accordion_item">
                                        <p>
                                            <b>Registration</b><br>
                                            Our website gives you the option to register by providing your personal data. On registration we collect your personal data in the scope
                                            shown there. Your registration is required for the creation of comments and contributions on our website. The processing will be carried out
                                            on the basis of art. 6 (1) lit. a GDPR with your consent. You can withdraw your consent at any time by contacting us without affecting the
                                            legality of the processing carried out with your consent up to the withdrawal. This will end your registration, and your data saved in the
                                            course of the registration will then be deleted.
                                        </p>
                                        <p>
                                            <b>Data collection when you post a comment</b><br>
                                            When you comment on an article or a contribution, we collect your personal data (name, email address, comment text) only in the scope
                                            provided by you. The processing serves to allow you to comment and to display comments. By submitting the comment you agree to the
                                            processing of the transmitted data. The processing will be carried out on the basis of art. 6 (1) lit. a GDPR with your consent. You can
                                            withdraw your consent at any time by contacting us without affecting the legality of the processing carried out with your consent up to the
                                            withdrawal. You personal data will then be deleted.
                                        </p>
                                        <p>
                                            On publication of your comment the name and email address you have enteredwill be published.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion_tab ticket-info-text">
                                    COOKIES
                                    <div class="accordion_arrow">
                                        <img src="{{ URL::to('/assets/frontend/img/acordion_arrow.png') }}" alt="arrow">
                                    </div>
                                </div>
                                <div class="accordion_content">
                                    <div class="accordion_item">
                                        <p>
                                            Our website uses cookies. Cookies are small text files which are saved in a user’s internet browser or by the user’s internet browser on their
                                            computer system. When a user calls up a website, a cookie may be saved on the user’s operating system. This cookie contains a
                                            characteristic character string which allows the browser to be clearly identified when the website is called up again.
                                        </p>
                                        <p>
                                            Cookies will be stored on your computer. You therefore have full control over the use of cookies. By choosing corresponding technical
                                            settings in your internet browser, you can be notified before the setting of cookies and you can decide whether to accept this setting in each
                                            individual case as well as prevent the storage of cookies and transmission of the data they contain. Cookies which have already been saved
                                            may be deleted at any time. We would, however, like to point out that this may prevent you from making full use of all the functions of this
                                            website.<br>
                                            Using the links below, you can find out how to manage cookies (or deactivate them, among other things) in major browsers:
                                            Chrome Browser:
                                            <a href="https://support.google.com/accounts/answer/61416?hl=en">
                                                <small style="color: blue">https://support.google.com/accounts/answer/61416?hl=en</small>
                                            </a><br>
                                            Internet Explorer:
                                            <a href="https://support.google.com/accounts/answer/61416?hl=en">
                                                <small style="color: blue">https://support.google.com/accounts/answer/61416?hl=en</small>
                                            </a><br>
                                            Mozilla Firefox:
                                            <a href="https://support.google.com/accounts/answer/61416?hl=en">
                                                <small style="color: blue">https://support.google.com/accounts/answer/61416?hl=en</small>
                                            </a><br>
                                            Safari:
                                            <a href="https://support.google.com/accounts/answer/61416?hl=en">
                                                <small style="color: blue">https://support.google.com/accounts/answer/61416?hl=en</small>
                                            </a><br>
                                        </p>
                                        <p>
                                            <b>Technically necessary cookies</b><br>
                                            Insofar as no other information is given in the data protection declaration below we use only these technically necessary cookies cookies to
                                            make our offering more user-friendly, effective and secure. Cookies also allow our systems to recognise your browser after a page change
                                            and to offer you services. Some functions of our website cannot be offered without the use of cookies. These services require the browser
                                            to be recognised again after a page change.
                                        </p>
                                        <p>
                                            Processing is carried out on the basis of art. 6 (1) lit. f GDPR due to our largely justified interest in ensuring the optimal functionality of the
                                            website as well as a user-friendly and effective design of our range of services.<br>
                                            <b><i>You have the right to veto this processing of your personal data according to art. 6 (1) lit. f GDPR, for reasons relating to your
                                            personal situation.</i></b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion_tab ticket-info-text">
                                    ANALYSIS ADVERTISING TRACKING
                                    <div class="accordion_arrow">
                                        <img src="{{ URL::to('/assets/frontend/img/acordion_arrow.png') }}" alt="arrow">
                                    </div>
                                </div>
                                <div class="accordion_content">
                                    <div class="accordion_item">
                                        <p>
                                            <b>Use of Adobe Analytics</b><br>
                                            On our website, we use the web analytics service Adobe Analytics from Adobe Systems Incorporated (345 Park Avenue, San Jose, CA
                                            95110, USA; "Adobe").<br>
                                            Data processing is used to analyse this website and the user behaviour of its visitors as well as for marketing and advertising purposes. For
                                            this purpose, cookies are used which enable the browser to be recognised and thus enable more precise statistics. The following
                                            information may be collected and transmitted to Adobe: IP address, date and time of page view, click path, information about the browser
                                            and device you are using, information about the operating system you are using, pages visited, referrer URL (website from which you
                                            accessed our website), location data, purchasing activities. Adobe uses the information obtained on our behalf to evaluate your use of the
                                            website, to compile reports on website activity and to provide further services to the website operator in connection with website and internet
                                            use. The data recorded is generally transmitted to an Adobe server in the USA and stored there. Adobe has activated IP encryption. As a
                                            result, your IP address will be irreversibly anonymised by Adobe within member states of the European Union or in other states that are
                                            party to the Agreement on the European Economic Area.<br>
                                            The use of cookies or comparable technologies is based on § 15 para. 3 p. 1 TMG (German Teleservices Act). The processing of your
                                            personal data is based on Art. 6 para. 1 lit. f GDPR out of our predominantly legitimate interest in the needs-based and targeted design of
                                            the website. <b><i>On grounds relating to your particular situation, you have the right to object at any time to this processing of personal
                                            data concerning you.</i></b> To prevent data collection and storage by etracker across all devices, you can activate an opt-out cookie at
                                            <a href="https://www.adobe.com/de/privacy/opt-out.html#customeruse">
                                                <small style="color: blue">https://www.adobe.com/de/privacy/opt-out.html#customeruse</small>
                                            </a>. Opt-out cookies prevent the future collection of your data when you visit this
                                            website. You need to implement the opt-out on all systems and devices that you are using for this to work comprehensively. If you delete the
                                            opt-out cookie, requests will be sent to etracker again. Alternatively, you can prevent the use of cookies by third parties by accessing the
                                            Network Advertising Initiative deactivation page at
                                            <a href="https://www.networkadvertising.org/choices/">
                                                <small style="color: blue">https://www.networkadvertising.org/choices/</small>
                                            </a> and following the further opt-out instructions
                                            specified there. You then won’t be included in the conversion tracking statistics.
                                            Further information on data processing and data protection at Adobe Analytics can be found at
                                            <a href=" https://www.adobe.com/de/privacy.html">
                                                <small style="color: blue"> https://www.adobe.com/de/privacy.html</small>
                                            </a>, at
                                            <a href="https://www.adobe.com/de/analytics/general-data-protection-regulation.html ">
                                                <small style="color: blue">https://www.adobe.com/de/analytics/general-data-protection-regulation.html </small>
                                            </a> and at
                                            <a href="https://docs.adobe.com/content/help/de-DE/analytics/technotes/privacy-overview.html">
                                                <small style="color: blue">https://docs.adobe.com/content/help/de-DE/analytics/technotes/privacy-overview.html</small>
                                            </a>
                                        </p>
                                        <p>
                                            <b>Use of the Google Analytics</b><br>
                                            Our website uses the web analysis service Google Analytics from Google LLC. (1600 Amphitheatre Parkway, Mountain View, CA 94043,
                                            USA; "Google"). If you are ordinarily resident in the European Economic Area or Switzerland, Google Ireland Limited (Gordon House, Barrow
                                            Street, Dublin 4, Ireland) is the controller responsible for your data. Google Ireland Limited is therefore the company affiliated with Google
                                            responsible for processing your data and for compliance with the applicable data protection legislation.
                                            The processing of data serves to analyse this website and its visitors and for marketing and advertising purposes. Google will use this
                                            information on behalf of the operator of this website to evaluate your use of the website, to compile reports on website activity and to
                                            provide other services to the website operator relating to website and internet use. In this process the following information, inter alia, can
                                            be collected: IP address, date and time of the website access, click path, information on the browser and the device you are using, the
                                            pages visited, referrer URL (website via which you accessed our website), location data, purchasing activities. The IP address transmitted
                                            from your browser within the scope of Google Analytics is not associated with any other data held by Google. Google Analytics uses
                                            technology such as cookies, web storage in the browser, and tracking pixels which enable an analysis of your use of the website. The
                                            information generated by these regarding your use of this website is usually transferred to a Google server in the USA and stored
                                            there. Google relies on standard contractual clauses as suitable guarantees for the protection of personal data, available at:
                                            <a href="https://policies.google.com/privacy/frameworks">
                                                <small style="color: blue">https://policies.google.com/privacy/frameworks</small>
                                            </a>. Both Google and the US government authorities have access to your data. Google may
                                            combine your data with other data, such as your search history, personal accounts, usage data from other devices and any other
                                            information Google has about you.<br>
                                            IP anonymisation is activated on this website. Google uses this to shorten your IP address beforehand within Member States of the
                                            European Union or in other signatories to the Agreement on the European Economic Area. Only in exceptional cases will the full IP address
                                            be transferred to a Google server in the USA and shortened there.
                                            The use of cookies or comparable technologies is based on § 15 para. 3 p. 1 TMG. The processing of your personal data is based on
                                            Art. 6 para. 1 lit. f GDPR due to our overriding legitimate interest in the needs-based and targeted design of the website.
                                            <b><i>On grounds relating to your particular situation, you have the right to object at any time to this processing of personal data
                                            concerning you.</i></b><br>You can also prevent the collection of the data (including your IP address) generated by Google Analytics and related to your use of the
                                            website by Google as well as the processing of this data by Google by downloading and installing the browser plug-in available at the
                                            following link [
                                            <a href="https://tools.google.com/dlpage/gaoptout?hl=de">
                                                <small style="color: blue">https://tools.google.com/dlpage/gaoptout?hl=de</small>
                                            </a>]. To prevent the data collection and storage by Google Analytics across
                                            multiple devices you can place an opt-out cookie. Opt-out cookies prevent the future collection of your data when you visit this website. You
                                            need to implement the opt-out on all systems and devices that you are using, so that this works comprehensively. If you delete the opt-out
                                            cookie, requests will be transmitted to Google again. When you click here the opt-out cookie will be placed:
                                            Deactivate Google Analytics. You can find more detailed information on the terms and conditions of use and data protection at
                                            <a href="https://www.google.com/analytics/terms/de.html">
                                                <small style="color: blue">https://www.google.com/analytics/terms/de.html</small>
                                            </a> and/or at
                                            <a href="https://www.google.de/intl/de/policies/e">
                                                <small style="color: blue">https://www.google.de/intl/de/policies/</small>
                                            </a> and at
                                            <a href="https://policies.google.com/technologies/cookies?hl=de">
                                                <small style="color: blue">https://policies.google.com/technologies/cookies?hl=de</small>
                                            </a>.
                                        </p>
                                        <p>
                                            <b>Use of Facebook Pixel</b><br>
                                            Our website uses the remarketing function "Custom Audiences" by Facebook Inc. (1601 S. California Ave, Palo Alto, CA 94304, USA;
                                            "Facebook").<br>
                                            Facebook Ireland and we are jointly responsible for the collection of your data and the transfer of this data to Facebook when the service is
                                            integrated. The basis for this is an agreement between us and Facebook Ireland on the joint processing of personal data, in which the
                                            respective responsibilities are defined. The agreement is available at
                                            <a href="https://www.facebook.com/legal/controller_addendume">
                                                <small style="color: blue">https://www.facebook.com/legal/controller_addendum</small>
                                            </a>. According to this agreement, we are responsible in particular for the fulfilment of the information obligations in accordance
                                            with Art. 13, 14 GDPR, for compliance with the security requirements of Art. 32 GDPR with regard to the correct technical implementation and configuration of the
                                            service, and for compliance with the obligations in accordance with Art. 33, 34 GDPR, insofar as a violation of the protection of personal
                                            data affects our obligations under the agreement on joint processing. Facebook Ireland is responsible for enabling the rights of the data
                                            subject in accordance with articles 15-20 of the GDPR, for complying with the security requirements of article 32 of the GDPR with regard to
                                            the security of the service, and for complying with the obligations of articles 33, 34 of the GDPR, insofar as a breach of personal data
                                            protection concerns Facebook Ireland's obligations under the joint processing agreement.<br>
                                            This application serves to address the visitor to the website with interest-related advertising on the social network Facebook.
                                            We have implemented Facebook’s remarketing tag on our website for this purpose. This tag sets up a direct connection to Facebook’s
                                            servers when you visit our website. This informs the Facebook server which of our web pages you have visited. Facebook assigns this
                                            information to your personal Facebook user account. When you visit the social network Facebook you will then be shown personalised,
                                            interest-related Facebook ads.<br>
                                            Your data may be transmitted to the USA.<br>
                                            The use of cookies or comparable technologies is carried out with your consent on the basis of Art. 15 para. 3 p. 1 TMG in conjunction with
                                            Art. 6 para. 1 lit. a GDPR. The processing of your personal data is carried out with your consent on the basis of Art. 6 para. 1 lit. a GDPR.
                                            You can withdraw your consent at any time without affecting the legality of the processing carried out with your consent up to the withdrawal.
                                            You can find more detailed information on Facebook’s collection and use of data and your associated rights and options for protecting your
                                            privacy in Facebook’s privacy policy:
                                            <a href="https://www.facebook.com/about/privacy/">
                                                <small style="color: blue">https://www.facebook.com/about/privacy/</small>
                                            </a>.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion_tab ticket-info-text">
                                    PLUG-INS
                                    <div class="accordion_arrow">
                                        <img src="{{ URL::to('/assets/frontend/img/acordion_arrow.png') }}" alt="arrow">
                                    </div>
                                </div>
                                <div class="accordion_content">
                                    <div class="accordion_item">
                                        <p>
                                            <b>Use of the Google Tag Manager</b><br>
                                            Our website uses the Google Tag Manager from Google LLC. (1600 Amphitheatre Parkway, Mountain View, CA 94043, USA; "Google"). If
                                            you are ordinarily resident in the European Economic Area or Switzerland, Google Ireland Limited (Gordon House, Barrow Street, Dublin 4,
                                            Ireland) is the controller responsible for your data. Google Ireland Limited is therefore the company affiliated with Google responsible for
                                            processing your data and for compliance with the applicable data protection legislation. This application manages JavaScript tags and
                                            HTML tags which are used in particular to implement tracking and analysis tools. The data processing serves to facilitate the needs-based
                                            design and optimisation of our website. The Google Tag Manager itself neither stores cookies nor processes personal data. It does,
                                            however, enable the triggering of further tags which may collect and process personal data. You can find more detailed information on the
                                            terms and conditions of use and data protection at
                                            <a href="https://www.google.com/intl/de/tagmanager/use-policy.html">
                                                <small style="color: blue">https://www.google.com/intl/de/tagmanager/use-policy.html</small>
                                            </a>
                                        </p>
                                        <p>
                                            <b>Use of social plug-ins</b><br>
                                            Our website uses social network plug-ins. The integration of social plug-ins and the data processing associated with this serves the purpose
                                            of optimising the advertising for our products.<br>
                                            The integration of social plug-ins involves a connection between your computer and the servers of the service provider of the social network
                                            which then instructs your web browser to display the plug-in on that web page, provided you have expressly consented to this. In this
                                            process, both your IP address as well as the information on which web pages you have visited will be transmitted to the provider’s servers.
                                            This happens regardless of whether you are registered with or logged into the social network. The information is transferred even if users
                                            are not registered or logged in. Should you be connected simultaneously with one or more of your social network accounts, the collected
                                            information may also be assigned to your corresponding profiles. When using the plug-in functions (e.g. by pressing the appropriate
                                            button), this information will also be assigned to your user account. You can therefore prevent this assignment by logging yourself out
                                            before visiting our website and before activating the button for your social media accounts.<br>
                                            The processing is carried out on the basis of Article 6(1)(a) GDPR with your consent. You can withdraw your consent at any time without
                                            affecting the legality of the processing carried out with your consent up to the withdrawal. The following social networks are integrated in our
                                            website through social plug-ins. You can find more detailed information on the scope and purpose of collection and use of the data and
                                            your associated rights and options for protecting your privacy in the provider’s privacy policy via the link.
                                        </p>
                                        <p>
                                            Facebook by Facebook Inc. (1601 S. California Ave, Palo Alto, CA 94304, USA)<br>
                                            <a href="https://www.facebook.com/policy.php">
                                                <small style="color: blue">https://www.facebook.com/policy.php</small>
                                            </a><br>
                                            Facebook Ireland and we are jointly responsible for the collection of your data and the transfer of this data to Facebook when the service is
                                            integrated. The basis for this is an agreement between us and Facebook Ireland on the joint processing of personal data, in which the
                                            respective responsibilities are defined. The agreement is available at
                                            <a href="https://www.facebook.com/legal/controller_addendum">
                                                <small style="color: blue">https://www.facebook.com/legal/controller_addendum</small>
                                            </a>. According to
                                            this agreement, we are responsible in particular for the fulfilment of the information obligations in accordance with Art. 13, 14 GDPR, for
                                            compliance with the security requirements of Art. 32 GDPR with regard to the correct technical implementation and configuration of the
                                            service, and for compliance with the obligations in accordance with Art. 33, 34 GDPR, insofar as a violation of the protection of personal
                                            data affects our obligations under the agreement on joint processing. Facebook Ireland is responsible for enabling the rights of the data
                                            subject in accordance with articles 15-20 of the GDPR, for complying with the security requirements of article 32 of the GDPR with regard to
                                            the security of the service, and for complying with the obligations of articles 33, 34 of the GDPR, insofar as a breach of personal data
                                            protection concerns Facebook Ireland's obligations under the joint processing agreement.
                                        </p>
                                        <p>
                                            Instagram by Instagram LLC. (1601 Willow Road, Menlo Park, CA 94025, USA)<br>
                                            <a href="https://help.instagram.com/155833707900388">
                                                <small style="color: blue">https://help.instagram.com/155833707900388</small>
                                            </a>
                                        </p>
                                        <p>
                                            LinkedIn by LinkedIn Corporation (2029 Stierlin Court, Mountain View, CA 94043, USA)<br>
                                            <a href="https://www.linkedin.com/legal/privacy-policy?trk=uno-reg-guest-home-privacy-policy">
                                                <small style="color: blue">https://www.linkedin.com/legal/privacy-policy?trk=uno-reg-guest-home-privacy-policy</small>
                                            </a>
                                        </p>
                                        <p>
                                            <b>Use of GoogleMaps</b><br>
                                            Our website uses the function for embedding Google Maps by Google LLC (1600 Amphitheatre Parkway, Mountain View, CA 94043, USA;
                                            "Google").<br>
                                            If you are ordinarily resident in the European Economic Area or Switzerland, Google Ireland Limited (Gordon House, Barrow Street, Dublin
                                            4, Ireland) is the controller responsible for your data. Google Ireland Limited is therefore the company affiliated with Google responsible for
                                            processing your data and for compliance with the applicable data protection legislation.<br>
                                            This feature visually represents geographical information and interactive maps. Google also collects, processes, and uses data on visitors
                                            to the website when they call up pages with embedded Google maps.<br>
                                            Your data may also be transmitted to the USA.<br>
                                            The data processing, particularly the placing of cookies, is carried out on the basis of Article 6(1)(f) GDPR due to our legitimate interest in
                                            the needs-based and targeted design of the website.
                                            <b><i>On grounds relating to your particular situation, you have the right to object at
                                            any time to this processing of personal data concerning you and carried out in accordance with Article 6(1)(f) GDPR.</i></b><br>
                                            Further information on the data collected and used by Google, your rights and privacy can be found in Google’s privacy policy at
                                            <a href="https://www.google.com/privacypolicy.html">
                                                <small style="color: blue">https://www.google.com/privacypolicy.html</small>
                                            </a>. You also have the option of changing your settings in the data protection centre, allowing you to
                                            administer and protect the data processed by Google.
                                        </p>
                                        <p>
                                            <b>Use of YouTube</b><br>
                                            Our website uses the function for embedding YouTube videos by Google Ireland Limited (Gordon House, Barrow Street, Dublin 4, Ireland;
                                            "YouTube"). YouTube is a company affiliated with Google LLC (1600 Amphitheatre Parkway, Mountain View, CA 94043, USA; "Google").
                                            This feature shows YouTube videos in an iFrame on the website. The option "advanced privacy mode" is enabled here. This prevents
                                            YouTube from storing information on visitors to the website. It is only if you watch a video that information is transmitted to and stored by
                                            YouTube. Your data may be transmitted to the USA.<br>
                                            The data processing is carried out on the basis of Article 6(1)(f ) GDPR due to our legitimate interest in the needs-based and targeted
                                            design of the website.
                                            <b><i>On grounds relating to your particular situation, you have the right to object at any time to this processing of
                                            personal data concerning you and carried out in accordance with Article 6(1)(f) GDPR.</i></b><br>
                                            Further information on the data collected and used by YouTube and Google and your associated rights and options for protecting your
                                            privacy can be found in YouTube’s privacy policy
                                            <a href="https://www.youtube.com/t/privacy">
                                                <small style="color: blue">(https://www.youtube.com/t/privacy)</small>
                                            </a>.
                                        </p>
                                        <p>
                                            <b>Use of the authorized.by Badge </b><br>
                                            On our website we use the “authorized.by Badge” from Stayble Market GmbH (Theresienstraße 66, 80333 Munich; “Stayble Market”).
                                            The data processing serves the purpose of displaying and confirming to you our status as an authorised partner of the manufacturers
                                            whose products we distribute.<br>
                                            To display the badge, it is necessary that your data (e.g. IP address, device type, operating system, browser type) be transmitted to Stayble
                                            Market when you access the website.<br>
                                            This data processing is performed on the basis of Article 6(1)(f) of GDPR due to our predominant interest in the optimal marketing of our
                                            product and in proving ourselves to be authorised partners of the manufacturers whose products we distribute.
                                            <b><i>On grounds relating to your particular situation, you have the right to object at any time to this processing of personal data
                                            concerning you and carried out in accordance with Article 6(1)(f) of GDPR.</i></b><br>
                                            More information on data protection at Stayble Market can be found at:
                                            <a href="https://www.authorized.by/datenschutz/">
                                                <small style="color: blue">https://www.authorized.by/datenschutz/</small>
                                            </a>.
                                        </p>
                                        <p>
                                            <b>Use of Google Fonts</b><br>
                                            We use Google Fonts from Google Ireland Limited (Gordon House, Barrow Street, Dublin 4, Ireland; "Google") on our website.<br>
                                            The data processing serves to facilitate the consistent display of fonts on our website. In order to load the fonts, a connection to Google
                                            servers is established when the page is accessed. Among other things, your IP address and information about the browser you are using
                                            will be processed and transmitted to Google. This data is not linked to your Google account. Your data may be transmitted to the USA. For
                                            the USA, no adequacy decision from the EU Commission is available. The data transfer will be based, inter alia, on standard contractual
                                            clauses as appropriate guarantees for the protection of personal data, available at:
                                            <a href="https://policies.google.com/privacy/frameworks">
                                                <small style="color: blue">https://policies.google.com/privacy/frameworks</small>
                                            </a>.<br>
                                            The use of cookies or comparable technologies is based on § 15 para. 3 p. 1 TMG. The processing of your personal data is based on
                                            Art. 6 para. 1 lit. f GDPR due to our overriding legitimate interest in a user-friendly and aesthetic design of our website.
                                            <b><i>You have the right, for reasons relating to your personal situation, to object at any time to this processing of your personal
                                            data according to Art. 6 para. 1 lit. f GDPR by contacting us.</i></b><br>
                                            You can find more detailed information on the data processing and data protection at
                                            <a href="https://www.google.de/intl/de/policies/">
                                                <small style="color: blue">https://www.google.de/intl/de/policies/ /</small>
                                            </a> and at
                                            <a href="https://developers.google.com/fonts/faq">
                                                <small style="color: blue">https://developers.google.com/fonts/faq</small>
                                            </a>.
                                        </p>
                                        <p>
                                            <b>Use of Adobe Fonts</b><br>
                                            We use Adobe Fonts from Adobe Systems Software Ireland Limited (4-6 Riverwalk Citywest Business Campus, Dublin 24, Ireland; "Adobe")
                                            on our website.<br>
                                            The data processing serves to facilitate the consistent display of fonts on our website. In order to load the fonts, a connection to Adobe
                                            servers is established when the page is accessed. In the process, your IP address and information about the browser and operating system
                                            you are using are processed and transmitted to Adobe. Your data may be transmitted to third countries, such as the USA and India. For the
                                            USA and India, no adequacy decision from the EU Commission is available. The data transfer will be based, inter alia, on standard
                                            contractual clauses as appropriate guarantees for the protection of personal data, available at:<br>
                                            <a href="https://policies.google.com/privacy/frameworks">
                                                <small style="color: blue">https://policies.google.com/privacy/frameworks</small>
                                            </a>.
                                            The use of cookies or comparable technologies is based on § 15 para. 3 p. 1 TMG. The processing of your personal data is based on
                                            Art. 6 para. 1 lit. f GDPR due to our overriding legitimate interest in a user-friendly and aesthetic design of our website<br>
                                            <b><i>You have the right, for reasons relating to your personal situation, to object at any time to this processing of
                                            your personal data according to Art. 6 para. 1 lit. f GDPR by contacting us.</i></b><br>
                                            You can find more detailed information on the data processing and data protection at
                                            <a href="https://www.adobe.com/de/privacy/policy.html/">
                                                <small style="color: blue">https://www.adobe.com/de/privacy/policy.html</small>
                                            </a> and at
                                            <a href="https://www.adobe.com/de/privacy/policies/adobe-fonts.html">
                                                <small style="color: blue">https://www.adobe.com/de/privacy/policies/adobe-fonts.html</small>
                                            </a>.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion_tab ticket-info-text">
                                    RIGHTS OF PERSONS AFFECTED AND STORAGE DURATION
                                    <div class="accordion_arrow">
                                        <img src="{{ URL::to('/assets/frontend/img/acordion_arrow.png') }}" alt="arrow">
                                    </div>
                                </div>
                                <div class="accordion_content">
                                    <div class="accordion_item">
                                        <p>
                                            <b>Duration of Storage</b><br>
                                            The data will be stored under consideration of legal retention periods and then deleted after expiration of the period, unless you have not
                                            agreed to further processing and use.
                                        </p>
                                        <p>
                                            <b>Rights of the affected personDuration of Storage</b><br>
                                            If the legal requirements are fulfilled, you have the following rights according to art. 15 to 20 GDPR: Right to information, correction,
                                            deletion, restriction of processing, data portability. You also have a right of objection against processing based on art. 6 (1) GDPR, and to
                                            processing for the purposes of direct marketing, according to art. 21 (1) GDPR.
                                        </p>
                                        <p>
                                            <b>Right to complain to the regulatory authority</b><br>
                                            You have the right to complain to the regulatory authority according to art. 77 GDPR if you believe that your data is not being processed
                                            legally.
                                        </p>
                                        <p>
                                        <b>Right to object</b><br>
                                        If the data processing outlined here is based on our legitimate interests in accordance with Article 6(1)f) GDPR, you have the right for
                                        reasons arising from your particular situation to object at any time to the processing of your data with future effect.
                                        If the objection is successful, we will no longer process the personal data, unless we can demonstrate compelling legitimate grounds for the
                                        processing that outweigh your interests or rights and freedoms, or the processing is intended for the assertion, exercise or defence of legal
                                        claims.
                                        </p>
                                        <p>last update: 27.10.2020</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <style>
        .accordion{
            width: 90vw;
        @desktop
            height: 80px;
        @elsedesktop
            height: 90px;
        @enddesktop
            margin: 0 auto;
            overflow: hidden;
            transition: height 0.3s ease;
        }

        .accordion .accordion_tab{
            padding: 20px;
            cursor: pointer;
            user-select: none;
        @desktop
            font-size: 20px;
        @elsedesktop
            font-size: 17px;
        @enddesktop
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 2px;
            position: relative;
            margin: 0;
            text-align: left;
            border-bottom: 1px solid #000;
            border-top: 0;
            border-left: 0;
            border-right: 0;
        }

        .accordion .accordion_tab .accordion_arrow{
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 20px;
            width: 15px;
            height: 15px;
            transition: all 0.3s ease;
        }

        .accordion .accordion_tab .accordion_arrow img{
            transform: scale(1.5);
        }

        .accordion .accordion_tab.active .accordion_arrow{
            transform: translateY(-50%) rotate(180deg);
        }

        .accordion.active{
            height: 100%;
        }

        .accordion .accordion_content{
            @desktop
                padding: 20px;
            @elsedesktop
                padding: 30px 20px;
            @enddesktop
        }

        .accordion .accordion_content p{
            color: #000;
            font-size: 17px;
            font-family: arial;
        }

        .accordion .accordion_content .accordion_item{
            margin-bottom: 20px;
        }

        .accordion .accordion_content .accordion_item p.item_title{
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 18px;
            color: #6adda2;
        }
    </style>


    @if(count($HomePhotos)==0 && $url_query == 'press')
        <section class="content-row-no-bg top-line" style="background-color: transparent;">
            <div class="container">
                <div class="ticket-info-text" style="margin-top:80px;margin-bottom:80px;text-align:left;font-size:17px">
                    THE LATEST PRESS INFORMATION FROM THE WORLD OF BANKSY EXHIBITION PRAGUE.
                    <a href="/The-World-of-Banksy.docx">>> DOWNLOAD</a>
                </div>
                <div class="row">
                    <h4 class="paragraf-baslik" style="margin-left: 25px;">News Gallery</h4>
                    <div class="partners_carousel slide" style="direction: ltr">
                        <div class="carousel-inner">
                            <div class="item active">
                                <ul class="thumbnails aligncenter">
                                    <?php
                                    $sliders = [
                                        ['filename' => 'gallery-' . $url_query . '-1.png', 'title' => 'Blesk' . '  ', 'link' => 'https://www.blesk.cz/clanek/regiony-praha-praha-volny-cas/681874/banksy-se-po-roce-vratil-do-prahy-jeho-dila-splynula-s-kostelem-u-staromestskeho-namesti.html'],
                                        ['filename' => 'gallery-' . $url_query . '-2.png', 'title' => 'CNN' . '   ', 'link' => 'https://cnn.iprima.cz/porady/showtime/banksy-vystava-zdroj-cnn-prima-news'],
                                        ['filename' => 'gallery-' . $url_query . '-3.png', 'title' => 'CT24' . '  ', 'link' => 'https://ct24.ceskatelevize.cz/kultura/3113141-umelec-jakeho-svet-nevidel-prazska-galerie-vystavuje-banksyho'],
                                        ['filename' => 'gallery-' . $url_query . '-4.png', 'title' => 'Novinky' . '  ', 'link' => 'https://www.novinky.cz/kultura/clanek/banksy-transformuje-ulice-do-platen-jeho-dila-jsou-k-videni-v-praze-40326909'],
                                    ];
                                    ?>
                                    @foreach($sliders as $slider)
                                        <li class="col-sm-2" style="margin-left:4%;margin-right:4%;margin-top: 20px;">
                                            <div>
                                                <div class="thumbnail cities">
                                                    <a href="{{ $slider['link'] }}">
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


    @if(count($HomePhotos)==0 && $url_query == 'coming-soon')
        <section class="content-row-no-bg top-line" style="background-color: transparent;">
            <div class="container">
                <div class="row">
                    <div class="partners_carousel slide" style="direction: ltr">
                        <div class="carousel-inner">
                            <div class="item active">
                                <ul class="thumbnails aligncenter">
                                    <?php
                                    $sliders = [
                                        ['filename' => 'gallery-' . $url_query . '-1.png', 'title' => $url_query . ' slider', 'link' => '#'],
                                        ['filename' => 'gallery-' . $url_query . '-1.png', 'title' => $url_query . ' slider', 'link' => '#'],
                                        ['filename' => 'gallery-' . $url_query . '-1.png', 'title' => $url_query . ' slider', 'link' => '#'],
                                    ];
                                    ?>
                                    @foreach($sliders as $slider)
                                        <li class="col-sm-3" style="margin-left:4%;margin-right:4%;margin-top: 20px;">
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


    @if(count($HomePhotos)==0 && $url_query == 'request-partnership')
        <section class="content-row-no-bg top-line" style="background-color: transparent;">
            <div class="container">
                <div class="row" style="margin-top: 50px;">
                    <h4 class="paragraf-baslik" style="margin-left: 25px;">TOURING EXHIBITION</h4>
                    <h4 class="ticket-info-text" style="text-align:left;font-size:17px">LET’S ORGANIZE A “THE WORLD OF BANKSY “ EXHIBITION IN YOUR VENUE!</h4>
                    <h4 class="ticket-info-text" style="text-align:left;font-size:17px">PLEASE GET IN TOUCH WITH US TO GET THE DETAILS.</h4>
                </div>
            </div>
            <div class="container" style="margin-top: 50px">
                <div class="row">
                    @include('frontEnd.includes.subscribe')
                </div>
            </div>
        </section>
    @endif


    @if(count($HomePhotos)==0 && $url_query == 'tickets')
        <section class="content-row-no-bg top-line" style="background-color: transparent;">
            <div class="container">
                <div class="row" style="margin-top: 50px;">
                    <h4 class="paragraf-baslik" style="margin-left: 25px;">TICKETS</h4>
                </div>
            </div>
            <div class="container">
                <div class="row" style="border:1px solid #000;padding:0 30px;line-height:35px;">
                    <p class="ticket-info-text" style="text-align: left;line-height: 40px;font-size: 17px;">
                        <b style="font-weight: 800">INFORMATION</b><br>
                        ALL TICKETS ARE VALID FROM 10AM UNTIL CLOSING<br>
                        <b style="font-weight: 800">PERIOD</b><br>
                        JUNE 4 - SEPTEMBER 30, 2021<br>
                        <b style="font-weight: 800">LOCATION</b><br>
                        KOSTEL SVATÉHO MICHAELA ARCHANDĚLA, MICHALSKÁ 29, STARÉ MĚSTO, PRAHA 1<br>
                        <b style="font-weight: 800">OPENING HOURS</b><br>
                        OPEN FROM MONDAY TO SUNDAY (10AM - 8PM – LAST ENTRY AT 7:15PM)<br>
                        <b style="font-weight: 800">TICKETS AND PRICES</b><br>
                        EXHIBITION TICKETS ARE NOW AVAILABLE!<br>
                        FOR VISITORS WHO DO NOT HAVE THE OPPORTUNITY TO BUY THEIR TICKETS ONLINE, TICKETS MAY ALSO BE PURCHASED AT THE BOXOFFICE FROM THE START
                        OF THE EXHIBITION.<br>
                        <u>IMPORTANT:</u> DUE TO THE COVID-RELATED LIMITATION OF THE NUMBER OF VISITORS, IT IS RECOMMENDED TO BUY A TICKET ONLINE IN ADVANCE FOR THE DESIRED
                        DAY AND THE DESIRED TIME SLOT, AS OTHERWISE LONGER WAITING TIMES MAY OCCUR.
                    </p>
                    <br>
                    <br>
                    <p class="ticket-info-text" style="text-align: left;line-height: 40px;font-size: 17px;">
                        <b style="font-weight: 800">DETAILED INFORMATION ON ADMISSION FEES TO THE WORLD OF BANKSY EXHIBITION CAN BE FOUND BELOW</b><br>
                        ADULT: <b style="font-weight: 800">360 KČ</b><br>
                        PAIR: <b style="font-weight: 800">690 KČ</b><br>
                        STUDENT & DISCOUNTED: <b style="font-weight: 800">190 KČ</b><br>
                        CHILDREN (7-15): <b style="font-weight: 800">150 KČ</b><br>
                        FAMILY (2 ADULT & 2 CHILDREN OR 1+3): <b style="font-weight: 800">910 KČ</b><br>
                        GROUP (10 PERSON AND MORE): <b style="font-weight: 800">2400 KČ</b><br>
                        SCHOOL CLASS: <b style="font-weight: 800">130 KČ</b><br>
                    </p>
                    <p class="ticket-info-text" style="text-align: left">
                        <b style="font-weight: 800">THE EXHIBITION IS BILINGUAL;</b> ALL EXHIBITION TEXT IS PRESENTED IN BOTH CZECH AND ENGLISH.
                    </p>
                </div>
            </div>
            @desktop
                <div class="row" style="margin-top: 30px;max-width:50%;margin:0 auto;">
            @elsedesktop
                <div class="row" style="margin-top: 30px;margin:0;">
            @enddesktop
            @desktop
                <div class="col-lg-12">
            @elsedesktop
                <div class="col-lg-12" style="padding: 0">
            @enddesktop
                    <p class="ticket-baslik" style="margin-top:30px !important;">
                        <a href="/prague" class="btn btn-theme2">
                            <img alt="" src="{{ URL::to('/assets/frontend/img/ust-banner-buttons.png') }}">
                        </a>
                    </p>
                </div>
            </div>
            <div class="container">
                <div class="row" style="margin-top: 50px;">
                    <h4 class="paragraf-baslik" style="margin-left: 25px;">SAFETY AND HYGIENE</h4>
                    <h4 class="ticket-info-text" style="text-align:left;font-size:17px">
                        THESE ARE SOME OF THE MEASURES WE HAVE PUT IN PLACE FOR YOUR SAFETY AND THE SAFETY OF OUR STAFF.
                    </h4>
                    <div class="row" style="margin-top:30px;margin:0 auto;margin-left:-60px">
                        <div class="wrapper">
                            <div class="accordion">
                                <div class="accordion_tab ticket-info-text">
                                    PROTECTION AGAINST COVID-19
                                    <div class="accordion_arrow">
                                        <img src="{{ URL::to('/assets/frontend/img/acordion_arrow.png') }}" alt="arrow">
                                    </div>
                                </div>
                                <div class="accordion_content">
                                    <div class="accordion_item">
                                        <p>
                                            All regulations and hygiene measures are required to make your visit safe. Thank you for your understanding.


                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion_tab ticket-info-text">
                                    MASK REQUIREMENT
                                    <div class="accordion_arrow">
                                        <img src="{{ URL::to('/assets/frontend/img/acordion_arrow.png') }}" alt="arrow">
                                    </div>
                                </div>
                                <div class="accordion_content">
                                    <div class="accordion_item">
                                        <p>
 In all exhibition areas, wearing an FFP2 mask is compulsory for visitors age 7 and older.
                                            For your safety and the safety of other visitors and staff, you must wear a face covering during your visit unless you are exempt; this is in line with government guidelines.

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion_tab ticket-info-text">
                                    SOCIAL DISTANCING
                                    <div class="accordion_arrow">
                                        <img src="{{ URL::to('/assets/frontend/img/acordion_arrow.png') }}" alt="arrow">
                                    </div>
                                </div>
                                <div class="accordion_content">
                                    <div class="accordion_item">
                                        <p>
In compliance with hygiene regulations, visitors must keep a minimum 2 meters distance from one another.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion_tab ticket-info-text">
                                    DISINFECTION
                                    <div class="accordion_arrow">
                                        <img src="{{ URL::to('/assets/frontend/img/acordion_arrow.png') }}" alt="arrow">
                                    </div>
                                </div>
                                <div class="accordion_content">
                                    <div class="accordion_item">
                                        <p>
                                            The exhibition venue provides hand disinfectant, please use it while entering and exiting the area of the exhibition.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion_tab ticket-info-text">
                                    IF YOU’RE FEELING UNWELL
                                    <div class="accordion_arrow">
                                        <img src="{{ URL::to('/assets/frontend/img/acordion_arrow.png') }}" alt="arrow">
                                    </div>
                                </div>
                                <div class="accordion_content">
                                    <div class="accordion_item">
                                        <p>

                                          If you or anyone you live with displays symptoms associated with COVID-19, please delay your visit until it is safe to do so.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion_tab ticket-info-text">
                                    PHOTOGRAPHY
                                    <div class="accordion_arrow">
                                        <img src="{{ URL::to('/assets/frontend/img/acordion_arrow.png') }}" alt="arrow">
                                    </div>
                                </div>
                                <div class="accordion_content">
                                    <div class="accordion_item">
                                        <p>
                                            Feel free to take photographs for personal, non-commercial use, unless a sign says you shouldn't.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif


    @if(count($HomePhotos)==0 && $url_query == 'merchandise')
        <section class="content-row-no-bg top-line" style="background-color: transparent;min-height: 850px;">
            <div class="container">
                <div class="row" style="margin-top: 50px;">
                    <h4 class="paragraf-baslik" style="margin-left: 25px;">TREAT YOURSELF WITH PERFECT BANKSY INSPIRED GIFTS</h4>
                    <h4 class="ticket-info-text" style="text-align:left;font-size:17px">
                        WE HAVE A WHOLE HOST OF CUSTOM MERCH OPTIONS TO COMPLIMENT THE EXHIBITION FROM BOOKLETS AND POSTERS TO T-SHIRTS AND CUSTOM MUGS, HIGH QUALITY ITEMS
                        WILL BE AVAILABLE IN THE GALLERY SHOP.
                    </h4>
                    <h4 class="ticket-info-text" style="text-align:left;font-size:17px">
                        GIFT AN ART-INSPIRED STATEMENT PIECE TO YOUR LOVED ONES OR BRIGHTEN UP YOUR EVERYDAY TABLEWARE WITH ONE OF OUR GLASSES OR A MUG FEATURING “GIRL AND
                        BALLOON” DESIGNED EXCLUSIVELY FOR THIS EXHIBITION. OUR EXCITING ASSORTMENT OF UNIQUE GIFTS INCLUDES SOMETHING SPECIAL FOR EVERYONE!
                    </h4>
                    <h4 class="ticket-info-text" style="text-align:left;font-size:17px">
                        THE GALLERY SHOP IS OPEN BETWEEN 10AM - 8PM FOR YOU TO EXPLORE A SELECTION OF BANKSY EXCLUSIVE MERCHANDISE.
                    </h4>
                    <h4 class="ticket-info-text" style="text-align:left;font-size:17px">
                        FOLLOW US ON INSTAGRAM @BANKSYPRAGUE AND GET A SPECIAL BANKSY POSTER FOR FREE! DETAILS IN THE GALLERY SHOP.
                    </h4>
                </div>
            </div>
        </section>
    @endif


    @if(count($HomePhotos)==0 && $url_query == 'ibanksy')
        <section class="content-row-no-bg top-line" style="background-color: transparent;min-height: 850px;">
            <div class="container">
                <div class="row" style="margin-top: 50px;">
                    <h4 class="paragraf-baslik" style="margin-left: 25px;">A NEW CONCEPT: IBANKSY</h4>
                    <h4 class="ticket-info-text" style="text-align:left;font-size:17px">
                        SHARING THE SAME LOVE FOR ANIMATION AND DIGITISATION, WE NOW BRING BANKSY’S SATIRICAL AND SUBVERSIVE STREET ART TO LIFE! .
                    </h4>
                    <h4 class="ticket-info-text" style="text-align:left;font-size:17px">
                        FOR THE FIRST TIME IN PRAGUE EXHIBITION, BANKSY’S MOST ICONIC ARTWORKS WILL BE DISPLAYED AS ANIMATIONS. THIS NEW ADDITION TO THE WORLD OF BANKSY NOT ONLY
                        TURNS THE TRADITIONAL EXHIBITION INTO A THOROUGHLY ENJOYABLE EXPERIENCE BUT IT ALSO ADDS A NEW VIBE TO YOUR IMPRESSIONS AND HOW YOU PERCEIVE THE ART
                        PIECES.
                    </h4>
                    <h4 class="ticket-info-text" style="text-align:left;font-size:17px">
                        WE KINDLY INVITE YOU TO VISIT THE EXHIBITION TO EXPERIENCE THEM FOR YOURSELF. FURTHER DETAILS WILL BE SHARED SOON.
                    </h4>
                    <h4 class="ticket-info-text" style="text-align:left;font-size:17px">
                        “POLICE RIOT VAN” FROM THE DISMALAND SERIES WHERE CHILDREN PLAY ON A DERELICT POLICE RIOT VAN ILLUSTRATING A DARK TWIST ON THE ORIGINAL DISNEYLAND “THEME
                        PARK” SCENES.
                    </h4>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <img class="vidyard-player-embed" src="https://play.vidyard.com/biVLUmUwyQGtQTdpRtYrdm.jpg"
                             data-uuid="biVLUmUwyQGtQTdpRtYrdm"
                             data-v="4" data-type="inline" data-muted="0" data-autoplay="1"
                             data-disable_redirect="0" data-no_html5_fullscreen="0"
                             data-loop="0" data-hide_html5_playlist="1" data-hidden_controls="1" data-hide_playlist="1"
                             data-height="600px" data-viral_sharing="0" />
                    </div>
                </div>
            </div>
        </section>
    @endif


    @if(count($HomePhotos)>0)
        <section class="content-row-bg" style="background-color: #000;margin: 50px 0;padding: 0;">
            <div class="container" style="padding: 0;margin-right: 0px;border-right-width: 0px;">

                <div id="section-banksy">
                    <div class="row" style="background-color: #000;margin:0">

                        <div class="col-lg-8" style="padding: 0 50px;">
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

                        <div class="col-lg-4" style="padding:0;">
                            <div class="wpb_text_column wpb_content_element pull-right">
                                <img data-animation="fade-in" src="{{ url("") . "/uploads/topics/" }}whoisbanksy_600x800px.jpg" alt="" style="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(count($HomePhotos)>0)
        <section class="content-row-no-bg top-line" style="background-color: transparent;">
            <div class="container">
                <div class="row">
                    <div class="partners_carousel slide" style="direction: ltr">
                        <div class="carousel-inner">
                            <div class="item active">
                                <ul class="thumbnails aligncenter">
                                    <?php
                                        $sliders = [
                                            ['filename' => 'slider-prague.png', 'title' => 'Prague', 'link' => '/prague'],
                                            ['filename' => 'slider-milano.png', 'title' => 'Milano', 'link' => '/milano'],
                                            ['filename' => 'slider-paris.png', 'title' => 'Paris', 'link' => '/paris'],
                                            ['filename' => 'slider-barcelona.png', 'title' => 'Barcelona', 'link' => '/barcelona'],
                                            ['filename' => 'slider-dubai.png', 'title' => 'Dubai', 'link' => '/dubai'],
                                        ];
                                    ?>
                                    @foreach($sliders as $slider)
                                        <li class="col-sm-2" style="margin-left:1.5%;margin-right:1.5%;margin-top: 20px;">
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
                    .moreinfo
                    {
                        font-family : Arial;
                        font-weight : bold;
                        font-style : italic;
                        font-size : 18px;
                        letter-spacing : 0.45px;
                        text-transform : uppercase;
                        color : #DF0909;
                    }
                    .paragraf-icerik-satir
                    {
                        font-family : Arial;
                        font-size : 18px;
                        letter-spacing : 0.45px;
                        text-transform : uppercase;
                        color : #DF0909;
                        font-weight: bold;
                    }
                @desktop
                @elsedesktop
                    .btn.btn-theme2 {
                        padding: 0 !important;
                    }
                @enddesktop
                    .btn.btn-theme2 img:hover {
                        transform: scale(1.1);
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
                                        $seo_url = "seo_url_slug_" . @Helper::currentLanguage()->code;
                                        $seo_url2 = "seo_url_slug_" . env('DEFAULT_LANGUAGE');
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
                                            if ($HomePartner->$seo_url != "") {
                                                $seo_url = $HomePartner->$seo_url;
                                            } else {
                                                $seo_url = $HomePartner->$seo_url2;
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
                                       <li class="col-sm-2" style="margin-left:1.5%;margin-right:1.5%;margin-top: 20px;">
                                            <div>
                                                <div class="thumbnail">
                                                    <a href="{{ $seo_url }}" target="_blank">
                                                        <img src="{{ URL::to('uploads/topics/'.$HomePartner->photo_file) }}" data-placement="bottom" title="{{ $title }}" alt="{{ $title }}">
                                                    </a>
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

    <style>
        .row .box-bottom {
            position: absolute;
            bottom: -60px;
            width: 100%;
            z-index: 100;
            background: none;
        }

        .ticket-baslik {
            font-family : Mind the gap;
        @desktop
            font-size : 73px;
        @elsedesktop
            font-size : 50px;
        @enddesktop
            letter-spacing : -2.19px;
            text-transform : uppercase;
            color : #000000;
            margin-top: 90px;
            text-align: center;
        }

        .ticket-info-text
        {
            font-family : Arial;
            font-weight : bold;
        @desktop
            font-size : 25px;
        @elsedesktop
            font-size : 17px;
        @enddesktop
            letter-spacing : 0.63px;
            text-transform : uppercase;
            color : #000000;
            text-align: center;
            margin-top: 30px;
        }

        .paragraf-baslik {
            font-family: Morganite;
            font-weight: bold;
            letter-spacing: 1.75px;
            text-transform: uppercase;
            color: #DF0909;
            text-align: left;
            @desktop
            font-size: 46px;
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

@endsection

