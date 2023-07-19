@if (@Auth::check())
    @if(!Helper::GeneralSiteSettings("site_status"))
        <div class="text-center bg-warning">
            <div class="row m-b-0">
                <div class="h6">
                    {{__('backend.websiteClosedForVisitors')}}
                </div>
            </div>
        </div>
    @endif
@endif
<header>
    <div class="ust-menu navbar navbar-default">
        <div class="container">
        @desktop
            <div class="navbar-header" style="margin-left: 0px;">
        @elsedesktop
            <div class="navbar-header" style="">
        @enddesktop
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route("Home") }}">
                    @if(Helper::GeneralSiteSettings("style_logo_" . @Helper::currentLanguage()->code) !="")
                        <img alt="" style="width:150px" src="{{ URL::to('uploads/settings/'.Helper::GeneralSiteSettings("style_logo_" . @Helper::currentLanguage()->code)) }}">
                    @else
                        <img alt="" src="{{ URL::to('uploads/settings/nologo.png') }}">
                    @endif

                </a>
				<style scoped>
				/*normal pc*/
				@media all and (min-width: 1200px) {
					a.navbar-brand {
						margin-right: 0px !important;
						margin-top: 20px !important;
					}
				}

				/*small pc*/
				@media all and (max-width: 1200px) {
					a.navbar-brand {
						margin-right: 0px !important;
						margin-top: 20px !important;
					}
				}
				/* tablet */
				@media all and (max-width: 1024px) {
					a.navbar-brand {
						margin-left: -10px !important;
					}
				}

                @media all and (max-width: 1024px) {
                    .navbar .nav > li > a {
                        font-size: 18px !important;
                    }
                }
                @media all and (max-width: 1024px) {
                    .navbar .nav {
                        margin-left: 0px !important;
                    }
                }
                @media all and (max-width: 1200px) {
                    .navbar .nav > li > a {
                        font-size: 18px !important;
					}
				}
                @media all and (max-width: 1200px) {
                    .navbar .nav {
                        margin-left: 0px !important;
                    }
				}

				/* mobile phone */
				@media all and (max-width: 768px) {
					a.navbar-brand {
						margin-left: -10px !important;
						margin-top: 0px !important;
					}
				}
				</style>
            </div>
            @include('frontEnd.includes.menu')
        </div>
    </div>
</header>
<style>
    .ust-menu
    {
        background : #FFFFFF99 !important;
        border-bottom: 2px solid #000000;
    }
</style>
