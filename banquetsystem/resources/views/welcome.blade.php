<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Nuptials a Wedding Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Nuptials Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen" charset="utf-8">
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- script -->
    <script src="js/jquery.chocolat.js"></script>
        <!--light-box-files-->
    <script type="text/javascript" charset="utf-8">
        $(function() {
            $('.portfolio-grids a').Chocolat();
        });
    </script>
<!-- script -->
<!-- animation-effect -->
<link href="css/animate.min.css" rel="stylesheet"> 
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->
<!-- timer -->
<link rel="stylesheet" href="css/jquery.countdown.css" />
<!-- //timer -->
<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){     
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });

    CountDownTimer('03/08/2019 10:1 AM', 'counter');
    CountDownTimer('02/20/2012 10:1 AM', 'newcountdown');

    function CountDownTimer(dt, id)
    {
        var end = new Date(dt);

        var _second = 1000;
        var _minute = _second * 60;
        var _hour = _minute * 60;
        var _day = _hour * 24;
        var timer;

        function showRemaining() {
            var now = new Date();
            var distance = end - now;
            if (distance < 0) {

                clearInterval(timer);
                document.getElementById(id).innerHTML = 'EXPIRED!';

                return;
            }
            var days = Math.floor(distance / _day);
            var hours = Math.floor((distance % _day) / _hour);
            var minutes = Math.floor((distance % _hour) / _minute);
            var seconds = Math.floor((distance % _minute) / _second);

            document.getElementById(id).innerHTML = days + 'days ';
            document.getElementById(id).innerHTML += hours + 'hrs ';
            document.getElementById(id).innerHTML += minutes + 'mins ';
            document.getElementById(id).innerHTML += seconds + 'secs';
        }

        timer = setInterval(showRemaining, 1000);
    }
</script>
<!-- start-smoth-scrolling -->
</head>
    
<body>
     <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Wedding Banquet System') }}
                    </a>
                </div>
    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
<!-- banner -->
    <div class="banner" id="home1">
        <div class="container">
            <div class="banner-phone animated wow slideInLeft" data-wow-delay=".5s">
                <!--<p><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>+0000 123 456</p>-->
            </div>
            <div class="logo animated wow zoomIn" data-wow-delay=".5s">
                @foreach($wed_info2 as $wedinfo)
                <h1><a href="index.html"><span></span><font color="#8A2BE2">{{$wedinfo->groom_name}} & {{$wedinfo->bride_name}}</font></a></h1>
                @endforeach
            </div>
            <div class="banner-social animated wow slideInRight" data-wow-delay=".5s">
                <!--<ul class="social-icons">
                    <li><a href="#" class="icon-button facebook"><i class="icon-facebook"></i><span></span></a></li>
                    <li><a href="#" class="icon-button instagram"><i class="icon-instagram"></i><span></span></a></li>
                    <li><a href="#" class="icon-button twitter"><i class="icon-twitter"></i><span></span></a></li>
                    <li><a href="#" class="icon-button g-plus"><i class="icon-g-plus"></i><span></span></a></li>
                </ul>-->
            </div>
            <div class="clearfix"> </div>
            <div class="banner-info animated wow zoomIn" data-wow-delay=".5s">
                <p><font color="#8A2BE2">wedding invitation</font></p>
            </div>
            <div class="navigation">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                        <nav class="link-effect-14" id="link-effect-14">
                            <ul class="nav navbar-nav">
                                <li><a href="#home1"><span>Home</span></a></li>
                                <!--<li><a href="#about" class="scroll"><span>About</span></a></li>
                                <li><a href="#team" class="scroll"><span>Team</span></a></li> -->
                                <li><a href="#services" class="scroll"><span>About US</span></a></li>
                                <!--<li><a href="#events" class="scroll"><span>News & Events</span></a></li>-->
                                <li><a href="#gallery" class="scroll"><span>Gallery</span></a></li>
                                <li><a href="#location" class="scroll"><span>Location</span></a></li>
                                <li><a href="/insert" target="_blank"><span>Guest Registration</span></a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>
            </div>
        </div>
    </div>
<!-- //banner -->

<!-- services -->
    <div class="services" id="services">
        <div class="container">
            <h3 class="animated wow zoomIn" data-wow-delay=".5s"><span>ABOUT US</span></h3>
            
            <div class="services-grids-wedding">
                <div class="services-grids-wedding1">
                    <div class="services-grids-wedding-left animated wow slideInLeft" data-wow-delay=".5s">
                        @foreach($wed_info2 as $wedinfo)
                        <img src="uploads/{{$wedinfo->groom_img}}" alt=" " width="100" height="130" />
                        <h4>{{$wedinfo->groom_name}}</h4>
                    </div>
                    <div class="services-grids-wedding-right animated wow slideInRight" data-wow-delay=".5s">
                        <img src="uploads/{{$wedinfo->bride_img}}" alt=" " width="100" height="130" />
                        <h4>{{$wedinfo->bride_name}}</h4>
                        @endforeach
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <h5 class="animated wow slideInUp" data-wow-delay=".5s">We are getting married</h5>
                @foreach($wed_info2 as $wedinfo)
                <p class="animated wow slideInUp" data-wow-delay=".5s">{{$wedinfo->venue}}</p>
                @endforeach
                <!--<div class="clearfix" id="counter"> </div>-->
                <script src="js/jquery.countdown.js"></script>
                <script src="js/script.js"></script>
            </div>
        </div>
    </div>
<!-- //services -->


<!-- gallery -->
    <div class="gallery" id="gallery">
        <h3 class="animated wow zoomIn" data-wow-delay=".5s"><span>PHOTO GALLERY</span></h3>
        <div class="gallery-grids">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <!--<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">All</a></li>
                    <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Wedding</a></li>
                    <li role="presentation"><a href="#costumes" role="tab" id="costumes-tab" data-toggle="tab" aria-controls="costumes">Costumes</a></li>
                    <li role="presentation"><a href="#honeyMoon" role="tab" id="honeyMoon-tab" data-toggle="tab" aria-controls="honeyMoon">HoneyMoon</a></li>
                    <li role="presentation"><a href="#celebrations" role="tab" id="celebrations-tab" data-toggle="tab" aria-controls="celebrations">Celebrations</a></li>-->
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                        <div class="tab_img">
                            <?php 
                $wed = DB::table('wedding_photos')->where('cust_id', '=', auth()->id())->pluck('photo_url');
            
            foreach($wed as $wed_photo){
            ?>
                            <div class="col-md-3 portfolio-grids">
                                <a href="images/{{$wed_photo}}" rel="wedding" class="b-link-stripe b-animate-go thickbox">
                                    <img src="images/{{$wed_photo}}" class="img-responsive" alt=""/>
                                    
                                </a>
                            </div>
                           <?php } ?>
                            <!--<div class="col-md-3 portfolio-grids">
                                <a href="images/pic2.jpg" rel="title" class="b-link-stripe b-animate-go thickbox">
                                    <img src="images/pic2.jpg" class="img-responsive" alt=""/>
                                    <div class="b-wrapper">
                                        <h5>Nuptials</h5>
                                        <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
                                    </div>
                                </a>
                            </div>-->
                            
                            <div class="clearfix"> </div>
                        </div>
                        
                    
                    
                    
                    
                </div>
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="clearfix">&nbsp;</div>
        <div class="location" id="location">
        <div><h3>WHERE ARE WE</h3></div>
        <div class="map animated wow slideInLeft" data-wow-delay=".5s">
            <?php 
                $wed = DB::table('main_page')->where('cust_id', '=', auth()->id())->pluck('gmap_embed');
            
            foreach($wed as $wed_gmap){
            ?>
            <iframe src="{{$wed_gmap}}" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            <?php } ?>
        </div>
    </div>
</div>
<!-- //gallery -->

<!-- for bootstrap working -->
    <script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>