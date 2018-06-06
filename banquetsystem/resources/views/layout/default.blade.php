<?php
use App\guest_list;
use App\User;
?>
<!doctype html>
<html>
<head>
<title>Dynasty Jade Restaurant</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/treant.css"/>
<link rel="stylesheet" type="text/css" href="../css/basic-example.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="/plugins/bootstrap-pager.js"></script>
<script src="/plugins/bootstrap-select.min.js"></script>
<script src="/js/TableLock.js"></script>
<script data-cfasync="false" src="/codemirror/jquery.codemirror.js"></script>
<script data-cfasync="false" src="/beautifier.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>


<style>
    .css {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

.css2 {
    float: left;
}

.css3 {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.css3 hover {
    background-color: #111;
}

</style>
<script>
  $(document).ready(function() {
    $('#guest_tbl').DataTable();
} );
</script>

</head>
<body>
<div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand">
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
                            <li><a href="{{ route('login') }}"><font color="red">Login</font></a></li>
                            <li><a href="{{ route('register') }}"><font color="red">Register</font></a></li>
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
            </div>
        </nav>

        
    </div>
<ul class="css">
    <?php 
   $count = DB::table('main_page')->where('cust_id', '=', auth()->id())->count();

   if($count==0){
    ?>
  <li class="css2"><a class="css3" href="/registration">Wedding Registration</a></li>
   <?php              }else{ ?>
   <li class="css2"><a class="css3" href="/welcome">Wedding Details</a></li>
<?php
   }
  ?>
  <li class="css2"><a class="css3" href="/insert">Guest Registration</a></li>
  <li class="css2"><a class="css3" href="/guestbylist">Guest Attendance</a></li>
  <!--<li class="css2"><a class="css3" href="/guestbytbl">Guest By Table </a></li>-->
  <li class="css2"><a class="css3" href="/tblstats">Table Statistics</a></li>
  <?php 
   $count = DB::table('table_layout')->where('uid', '=', auth()->id())->count();

   if($count==0){
   ?>
  <li class="css2"><a class="css3" href="/tbl_layout">Upload Table View</a></li>
  <?php  }else{  ?>
  <li class="css2"><a class="css3" href="/table_view">Table View</a></li>
 <?php  } 
  ?>
  @php
  $acc_type = DB::table('users')->where('acc_type', '=', 'ADMIN')
                                ->where('id', '=', auth()->id())
                                ->count();
  if($acc_type!=' '){
  @endphp
  <li class="css2"><a class="css3" href="/member_pointsAddPage">Manage Member Points</a></li>
  @php
}else{
  @endphp
  <li class="css2"><a class="css3" href="/member_pointsPage">Member Points</a></li>
  @php
   }
  @endphp

</ul>
@yield('content')
</body>
</html>