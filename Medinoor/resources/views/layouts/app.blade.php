
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta https-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Medinoor</title>
    
    <!-- Favicon  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <link rel="icon" href="https://i.ibb.co/MnxkFdV/medinoor-Logo.png" type="image/icon type">
    <!-- Core Style CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://medinoor.herokuapp.com/css/core-style.css">
    <link rel="stylesheet" href="https://medinoor.herokuapp.com/css/colors/color.css"/>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript">
        
    </script>
</head>
<style type="text/css">
    .downloadButton{
        display: flex;
        justify-content: center;
        position:fixed;
        bottom: 30px;
        left: 10px;
        z-index: 99999;
      }
    .androidLogo{
      margin-left:10px; 
    }
</style>
<body>
   <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="{{ url('/') }}"><img src="https://i.ibb.co/n84SnZW/medinoor-perf.png" style="height: 50px"></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>

                        <!-- ss -->

                            @guest
                             
                            @else 

                                <li><a href="#">Settings</a>
                                    <ul class="dropdown">
                                        <li><a href="#">I am a Pro</a>
                                            <ul class="dropdown">
                                                <li><a href="single-blog.html">Agent resource</a></li>
                                                <li><a href="regular-page.html">Change to agent</a></li>
                                                <li><a href="contact.html">Real estate plan</a></li>
                                                <li><a href="contact.html">Real estate scripts</a></li>
                                                <li><a href="contact.html">Flyers tamplate</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="index.html">Edit Profile</a></li>
                                        <li><a href="/appointment">Appointments</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    </ul>
                                </li>
                            @endguest
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <div class="search-area">
                    <form action="/search" method="POST">
                        @csrf
                        <input type="search"  value="{{$query ?? null}}" name="search" id="headerSearch" placeholder="Hospital/ Doctor">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <!-- Favourite Area -->
                <div class="cart-area">
                    <a href="/search/map" data-toggle="tooltip" data-placement="top" title="Search By Location"><img src="https://image.flaticon.com/icons/svg/2919/2919679.svg" alt=""> <span>NP</span></a>
                </div>
                
                <!-- Favourite Area -->
                <div class="favourite-area">
                    <a href="/medicine" data-toggle="tooltip" data-placement="top" title="Buy Medicine"><img src="https://medinoor.herokuapp.com/img/svg/button.svg" alt=""></a>
                </div>
                
                <!-- Search Area -->

                <!-- User Login Info -->
                @guest
                    <div class="cart-area">
                        <a href="{{ route('login') }}">Login</a>
                    </div>
                     @if (Route::has('register'))
                        <div class="user-login-info">
                            <a href="{{ route('register') }}">Signup</a>
                        </div>
                    @endif
                @else
                    <div class="cart-area" data-toggle="modal" data-target="#notificationModalLong">
                        <a style="cursor: pointer;" data-toggle="tooltip" data-placement="top" onclick="readNotification()" title="Notification"><img src="https://medinoor.herokuapp.com/img/svg/notification.svg" alt=""><span>+</span></a>
                    </div>
                    <div class="user-login-info">
                        <a href="/home" data-toggle="tooltip" data-placement="top" title="View Profile"><img src="https://img.icons8.com/android/24/000000/user.png"/></a>
                    </div>
                @endguest
                <!-- Cart Area -->
            </div>

        </div>
    </header>
    <!-- Scripts -->
    <script src="https://medinoor.herokuapp.com/js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
</head>
<body>
    <div id="app">
        
        <main >
            @yield('content')
        </main>
        
 <!-- ##### Brands Area End ##### -->
  <div style="background-color: #21d192;">
    <div class="container">

      <!-- Grid row-->
      <div class="row py-4 d-flex align-items-center">

        <!-- Grid column -->
        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
          <h6 class="mb-0">Download App For Native System</h6>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-6 col-lg-7 text-center text-md-right">

            <a href="https://drive.google.com/uc?export=download&id=1a4BmnAQONi1WtF7tN2v2pyUkMndyCYWc" target="_blank"  data-toggle="tooltip" class="white-text mr-4" style="font-size: 15px" data-placement="top" title="Windows App"><i class="fa fa-windows" aria-hidden="true"></i></a>
            <a href="https://drive.google.com/uc?export=download&id=11EGYo2PRMA5F3eoaYNLXvgJ-kEu9FQwC"  target="_blank" data-toggle="tooltip" class="white-text mr-4" style="font-size: 15px" data-placement="top" title="Android App"><i class="fa fa-android" aria-hidden="true"></i></a>
            <a href="/adorio/medinoor.ipa"  target="_blank" data-toggle="tooltip" class="white-text mr-4" style="font-size: 15px" data-placement="top" title="Ios App"><i class="fa fa-apple " aria-hidden="true"></i></a>
          
        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
  </div>
    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix" style="background-color: white; color: gray">
        <div class="container">
            <div class="row">
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area d-flex mb-30">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <h6 class="text-uppercase font-weight-bold">Medinoor</h6>
                                <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                                <p><small>Medinoor Good.<!-- Gharsar Group is committed to bring the best of digital accessibility for individuals in Real Estate of Nepal. We are continuously working to improve the accessibility of our web experience for everyone, and we welcome feedback and accommodation requests. --></small></p>
                        </div>
                        <!-- Footer Menu -->
                        
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area mb-30">
                        <ul class="footer_widget_menu" style="color: gray">
                            <li><!-- Grid column -->
                                <!-- Links -->
                                <h6 class="text-uppercase font-weight-bold">Useful links</h6>
                                <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                                <p>
                                  <a class="dark-grey-text" href="/public_content/workwithmedinoor" style="color: gray">Work with Medinoor</a>
                                </p>
                                <p>
                                  <a class="dark-grey-text" href="/public_content/mobile_app" style="color: gray">Mobile App</a>
                                </p>
                                <p>
                                  <a class="dark-grey-text" href="/public_content/about" style="color: gray">About</a>
                                </p>
                                <p>
                                  <a class="dark-grey-text" href="/public_content/help" style="color: gray">Help</a>
                                </p>
                            </li>
                            <li>
                                <!-- Grid column -->
                                <!-- Links -->
                                <h6 class="text-uppercase font-weight-bold">Contact Us</h6>
                                <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                                <p>
                                  <small class="dark-grey-text" href="/public_content/workwithgharsar" style="color: gray" >Bagmati, KTM 44600, Nepal</small>
                                </p>
                                <p>
                                  <small class="dark-grey-text" href="/public_content/advertise" style="color: gray">support@medinoor.com</small>
                                </p>
                                <p>
                                  <small class="dark-grey-text" href="/public_content/about" style="color: gray">+ 01 234 567 88</small>
                                </p>
                                <p>
                                  <small class="dark-grey-text" href="/public_content/help" style="color: gray">+ 01 234 567 89</small>
                                </p>
                            </li>
                            </li>
                            </ul>
                        </div></li>
                        </ul>
                    </div>
                </div>

            </div>


<div class="footer-copyright text-center text-black-50 py-3">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by <a href="https://www.halfpast.com.np" target="_blank">HalfPast</a>
  </div>
    </footer>
    <!-- ##### Footer Area End ##### -->


    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    
    <script src="https://medinoor.herokuapp.com/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="https://medinoor.herokuapp.com/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="https://medinoor.herokuapp.com/js/plugins.js"></script>
    <!-- Classy Nav js -->
    <script src="https://medinoor.herokuapp.com/js/classy-nav.min.js"></script>
    <!-- Active js -->
    <script src="https://medinoor.herokuapp.com/js/active.js"></script>

</body>

@guest

@else
<div class="modal fade" id="notificationModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Notifications</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
          <tbody id="notificationHolder">
            <div id="noNotificationr">No Notification</div>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- <script type="text/javascript">

    function readNotification() {
        $.ajax({
          method:'GET',
          url: 'notification/read/{{$user->id ?? null}}',
      });

    }


    $.ajax({
          method:'GET',
          url: 'notification/get/{{$user->id ?? null}}',
      }).done(function(msg)
      {
        $("#noNotificationr").remove();
        for (var i = msg.length - 1; i >= 0; i--) {
            $("#notificationHolder").append('<tr><th>'+msg[i]['content']+'</th><td><p>'+msg[i]['time']+'</p></td></tr>')
            console.log(msg[i]);
        }
      });
</script> -->
@endguest



</html>
