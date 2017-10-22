<!-- 
Main header
-->
<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a href="/" class="navbar-brand">
                    <img src="{{asset("/images/logo.png")}}" alt="">
                </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/"><i class="fa fa-area-chart"></i> MSC-S</a></li>
		    <li><a href="/mgw"><i class="fa fa-bar-chart"></i> M-MGw</a></li>
                    <li class="dropdown">
		        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-cloud"></i> Network Graph<span class="caret"></span></a>
                        <ul class="dropdown-menu">
			    <li><a href="/ngvms"><i class="fa fa-bars" aria-hidden="true"></i> NGVMS</a></li>
			    <li><a href="/ussd"><i class="fa fa-pie-chart" aria-hidden="true"></i> USSD</a></li>
			    <li><a href="/mnp"><i class="fa fa-bar-chart" aria-hidden="true"></i> MNP</a></li>
			    <li><a href="/m1"><i class="fa fa-university" aria-hidden="true"></i> M1</a></li>
                            <li><a href="/starhub"><i class="fa fa-line-chart" aria-hidden="true"></i> StarHub</a></li>
			    <li><a href="/sgsn"><i class="fa fa-magnet" aria-hidden="true"></i> SGSN</a></li>
                            <li><a href="/lbs"><i class="fa fa-signal" aria-hidden="true"></i> LBS</a></li>
                            <li><a href="/istp"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> I-STP</a></li>
                            <li><a href="/rms"><i class="fa fa-street-view" aria-hidden="true"></i> RMS</a></li>
                            <li><a href="/prbt"><i class="fa fa-user-secret" aria-hidden="true"></i> PRBT</a></li>
                            <li><a href="/mms"><i class="fa fa-sliders" aria-hidden="true"></i> MMSITP</a></li>
                            <li><a href="/jwstp"><i class="fa fa-exchange" aria-hidden="true"></i> JWSTP</a></li>
                            <li><a href="/isg"><i class="fa fa-th-list" aria-hidden="true"></i> ISG</a></li>
                            <li><a href="/hepta"><i class="fa fa-align-left" aria-hidden="true"></i> HEPTA</a></li>
                            <li><a href="/cds"><i class="fa fa-spinner" aria-hidden="true"></i> CDS</a></li>
                            <li><a href="/eapgw"><i class="fa fa-tty" aria-hidden="true"></i> EAP-GW</a></li>
                            <li><a href="/ivr"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i> IVR</a></li>
                            <li><a href="/htsms"><i class="fa fa-paper-plane" aria-hidden="true"></i> HTSMS</a></li>
                            <li><a href="/ssu"><i class="fa fa-map-signs" aria-hidden="true"></i> SSU</a></li>
			    <li><a href="/femto"><i class="fa fa-industry" aria-hidden="true"></i> Femto RNC</a></li>
                            <li><a href="/ig"><i class="fa fa-signal" aria-hidden="true"></i> IG</a></li> 
                        </ul> 
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
		    {{-- @if(Auth::user()->inRole('super')) --}}
                        <li><a href="/user">Users</a></li>
		    {{-- @endif  --}}
                <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="{{asset("/images/kari.jpg")}}"
                                 class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">Askari Azikin{{-- {{ Auth::user()->name }} --}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="{{asset("/images/kari.jpg")}}"
                                     class="img-circle" alt="User Image">

                                <p>
				  {{--  {{ Auth::user()->name }} --}}
				  {{--  <small>{{Auth::user()->email}}</small> --}}
                                    <!-- <small>Member since Nov. 2012</small> -->
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <form action="{{ url('/logout') }}" method="POST">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <button type="submit" class="btn btn-default btn-flat">Sign out</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</header>

