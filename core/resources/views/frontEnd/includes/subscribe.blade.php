@if(Helper::GeneralSiteSettings("style_subscribe"))
    <div class="col-lg-2" style=""></div>
@desktop
    <div class="col-lg-8" style="padding: 0 20px;">
@elsedesktop
    <div class="col-lg-8" style="">
@enddesktop
        <div class="widget">
            <div id="subscribesendmessage"><i class="fa fa-check-circle"></i> &nbsp;{{ __('frontend.subscribeToOurNewsletterDone') }}</div>
            <div id="subscribeerrormessage">{{ __('frontend.youMessageNotSent') }}</div>

            {{Form::open(['route'=>['Home'],'method'=>'POST','class'=>'subscribeForm'])}}
            <div class="form-group" style="width:45%;display: inline-block;float:left">
                {!! Form::text('subscribe_name',"", array('placeholder' => __('frontend.yourName'),
                        'class' => 'form-control','id'=>'subscribe_name', 'data-msg'=> __('frontend.enterYourName'),'data-rule'=>'minlen:4')) !!}
                <div class="alert alert-warning validation"></div>
            </div>

            <div class="form-group" style="width:45%;display: inline-block;float:right">
                {!! Form::email('subscribe_email',"", array('placeholder' => __('frontend.yourEmail'),
                    'class' => 'form-control','id'=>'subscribe_email', 'data-msg'=> __('frontend.enterYourEmail'),'data-rule'=>'email')) !!}
                <div class="validation"></div>
            </div>

            <div class="form-group">
                {!! Form::textarea('subscribe_message',"", array('placeholder' => __('frontend.yourMessage'),
                    'class' => 'form-control','id'=>'subscribe_message', 'data-msg'=> __('frontend.enterYourMessage'),'data-rule'=>'required')) !!}
                <div class="validation"></div>
            </div>
        @desktop
            <button type="submit" class="btn btn-info" style="width:220px;float:right">
        @elsedesktop
            <button type="submit" class="btn btn-info" style="margin: 0 auto;">
        @enddesktop
                <span>{{ __('frontend.subscribe') }}</span>
            </button>
            {{Form::close()}}
        </div>
    </div>
    <div class="col-lg-2" style=""></div>
    <style>
        .widget form input {
            color: #000;
            border: 2px solid #000;
            height: 40px;
            font-size: 18px;
            text-transform: uppercase;
        }
        .widget form textarea {
            color: #000;
            border: 2px solid #000;
            font-size: 18px;
            text-transform: uppercase;
        }
        .widget form button[type='submit'] {
            border: none;
            background: transparent url('/assets/frontend/img/send_button.png') no-repeat center center !important;
            width: 100%;
            height: 100px;
            transform: scale(.6);
            margin-top: -20px;
        }
        .widget form button[type='submit'] span {
            font-size: 40px;
            font-family: Autobahn;
            color: #000000;
            width: 100%;
            left: 7px;
            top: 26px;
            position: absolute;
        }
    </style>
@endif
