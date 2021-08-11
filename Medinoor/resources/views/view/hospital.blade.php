@extends('layouts.app')

@section('content')
<!-- ##### Header Area End ##### -->
<style type="text/css">
  .disableVisible{
    display: none !important;
  }
</style>
<!-- ##### Breadcumb Area Start ##### -->

<div class="single-blog-wrapper">

    <!-- Single Blog Post Thumb -->
    <div class="single-blog-post-thumb">
      <?php
          $src="/html/mapOnlyShow.php?".$hospital->latitude."&".$hospital->longitude;
          echo '<iframe src="'.asset($src).'" style="width: 100%; height: 400px;border: none;"></iframe>';
      ?>
    </div>

</div>
<!-- ##### Breadcumb Area End ##### -->
<section class="shop_grid_area section-padding-80">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
                <div class="shop_sidebar_area">

                    <!-- ##### Single Widget ##### -->
                    <div class="widget catagory mb-50">
                        <!-- Widget Title -->
                        <h6 class="widget-title mb-30 d-flex justify-content-center">User Profile</h6>

                        <!--  Catagories  -->
                        <div class="catagories-menu mb-4">
                            <img src="{{$hospital->logo}}" class="pb-3 rounded mx-auto d-block" style="max-height: 1000px;max-width: 1000px;"> 
                            <div class="widget brands mb-50">
                              <!-- Widget Title 2 -->
                              <h6 class="widget-title d-flex justify-content-center">About User</h6>
                              <div class="widget-desc">
                                  <ul>
                                      <table class="table">
                                          <tbody>
                                              <tr>
                                                  <td scope="col" style='border:none;'><b>Username: </b></td>
                                                  <td scope="col" style='border:none;' class="text-break">{{ $user->name}}</td>
                                              </tr>
                                              <tr>
                                                  <td scope="col" style='border:none;'><b>Address: </b></td>
                                                  <td scope="col" style='border:none;'>Nepal</td>
                                              </tr>
                                              <tr >
                                                  <td scope="col" style='border:none;'><b>E-mail: </b></td>
                                                  <td scope="col" style='border:none;' class="text-break" >{{ $user->email}}</td>
                                              </tr>
                                              <tr>
                                                  <td scope="col" style='border:none;'><b>Phone: </b></td>
                                                  <td scope="col" style='border:none;'>+977 {{ $user->number ?? 'N/A'}}</td>
                                              </tr>
                                              <tr>
                                                  <td scope="col" style='border:none;'><b>Links: </b></td>
                                                  <td scope="col" style='border:none;'>
                                                    <div class="d-flex justify-content-between" >
                                                      <div><a href="{{ $hospital->instagram ?? '#'}}" target="_blank"><i class="fa fa-instagram"></i></a>
                                                      </div>
                                                      <div>
                                                          <a href="{{ $hospital->facebook ?? '#'}}" target="_blank"><i class="fa fa-facebook"></i></a>
                                                      </div> 
                                                      <div>
                                                          <a href="{{ $hospital->twitter ?? '#'}}" target="_blank"><i class="fa fa-twitter"></i></a>
                                                      </div> 
                                                    </div>
                                                  </td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </ul>
                              </div>
                          </div>
                        </div>
                        
                        
                    </div>
                    <div class="widget brands mb-50">
                        <!-- Widget Title 2 -->
                        <p class="widget-title2 mb-30">Some Important Links</p>
                        <div class="widget-desc">
                            <ul>
                                <li><a href="/sekhmed/app">Sekhmed app</a></li>
                                <li><a href="#">Resource center</a></li>
                                <li><a href="#">Plan your move</a></li>
                                <li><a href="#">Manage Finance</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-8 col-lg-9">
              <div class="shop_grid_product_area">
                  <div class="cta-area pb-5">

                      <div class="container">
                          <div class="row">
                              <div class="col-12">
                                  <div class="cta-content bg-img background-overlay" style="background-image: url(https://nams.org.np/images/slider1.jpg);">
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <h2> <u>Info</u></h2>
                  <div>
                    {{$hospital->info}}<br>
                    <h5><u>Details</u></h5>
                    <table>
                      <tbody>
                        <tr>
                          <td class="align-middle" scope="row">Rating: </td>
                          <td class="align-middle" scope="row">{{$hospital->totalRating}} <i class="fa fa-star"></i></td>
                        </tr>
                        <tr>
                          <td class="align-middle" scope="row">Date: </td>
                          <td class="align-middle" scope="row"> {{$user->DOB}}</td>
                        </tr>
                        <tr>
                          <td class="align-middle" scope="row">Phone: </td>
                          <td class="align-middle" scope="row">{{$user->number}}</td>
                        </tr>
                        <tr>
                          <td class="align-middle" scope="row">Doctors: </td>
                          <td class="align-middle" scope="row">{{$hospital->totalDoctors}}</td>
                        </tr>
                        <tr>
                          <td class="align-middle" scope="row">Beds: </td>
                          <td class="align-middle" scope="row">{{$hospital->bedCapacity}} than 100</td>
                        </tr>
                        <tr>
                          <td class="align-middle" scope="row">Type: </td>
                          <td class="align-middle" scope="row">{{$hospital->typeOfHospital}}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <hr>
                  <h2> <u>Doctors</u><button onclick="location.href = '/view/doctors/?hospital={{$hospital->id}}'"  style="border:none;border-radius: 10px;font-size: 20px;" class="pl-2 pr-2 pull-right">View All</button></h2>
                  <div>
                    <table class="table">
                      <tbody id="doctors_in_database_display">
                        
                      </tbody>
                    </table>
                  </div>
                  <hr>
                  <h2> <u>Services</u></h2>
                  <div>
                      <table class="table">
                          <tbody>
                              <tr>
                                  <th scope="col" style='border:none;'>
                                      <div>
                                          <img src="http://medinoor.herokuapp.com/img/svg/carParking.svg" style="width: 70px;height: auto;">
                                          <p><b style="color: black;">Parking</b></p>
                                          
                                      </div>
                                  </th>
                                 
                                  <th scope="col" style='border:none;'>

                                      <div>
                                          <img src="http://medinoor.herokuapp.com/img/svg/pharmacy.svg" style="width: 70px;height: auto;">
                                          <p><b style="color: black;">Pharmacy</b></p>
                                      </div>
                                  </th>
                                 
                                  <th scope="col" style='border:none;'>

                                      <div>
                                          <img src="http://medinoor.herokuapp.com/img/svg/cafe.svg" style="width: 70px;height: auto;">
                                          <p><b style="color: black;">Cafeteria</b></p>
                                      </div>
                                  </th>
                                  
                              </tr>
                              <tr>
                                  
                                  <th scope="row" style='border:none;'>
                                      <div>
                                          <img src="http://medinoor.herokuapp.com/img/svg/ambulance.svg" style="width: 70px;height: auto;">
                                          <p><b style="color: black;">Ambulance</b></p>
                                      </div>
                                  </th>
                                  
                                  <td style='border:none;'>

                                      <div>
                                          <img src="http://medinoor.herokuapp.com/img/svg/waiting.svg" style="width: 70px;height: auto;">
                                          <p><b style="color: black;">Waiting Room</b></p>
                                      </div>
                                  </td>
                                  
                                  <td style='border:none;'>
                                      <div>
                                          <img src="http://medinoor.herokuapp.com/img/svg/atm.svg" style="width: 70px;height: auto;">
                                          <p><b style="color: black;">ATM</b></p>
                                      </div>
                                  </td>
                                  
                              </tr>
                              <tr>
                                  <th scope="col" style='border:none;'>
                                      <div>
                                          <img src="http://medinoor.herokuapp.com/img/svg/beds.svg" style="width: 70px;height: auto;">
                                          <p><b style="color: black;">Beds</b></p>
                                          
                                      </div>
                                  </th>
                                 
                                  <th scope="col" style='border:none;'>

                                      <div>
                                          <img src="http://medinoor.herokuapp.com/img/svg/bloodBank.svg" style="width: 70px;height: auto;">
                                          <p><b style="color: black;">Blood Bank</b></p>
                                      </div>
                                  </th>
                                 
                                  <th scope="col" style='border:none;'>

                                      <div>
                                          <img src="http://medinoor.herokuapp.com/img/svg/freeWifi.svg" style="width: 70px;height: auto;">
                                          <p><b style="color: black;">Free Wifi</b></p>
                                      </div>
                                  </th>
                                  
                              </tr>
                              
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

<script type="text/javascript">

  $.ajax({
      method:'GET',
      url: 'doctor/get/request/{{$hospital->id}}',
  }).done(function(msg)
  {
    if (msg.length > 0) {
      $("#doctors_in_database_display").append('<tr><th scope="col">Photo</th><th scope="col">Name</th><th scope="col">Speciality</th><th scope="col">Degree</th></tr>')
      for (var i = 0; i < msg.length; i++) {
        console.log(msg[i])
        console.log(msg[i].doctor_degree)
        $("#doctors_in_database_display").append('<tr style="cursor:pointer" onclick="location.href = \'/view?hospital={{$hospital->id}}&doctor='+msg[i].doctor_nmc+'\'"><th class="align-middle" scope="row"><img src="'+msg[i].doctor_photo+'" width="50"></th><td class="align-middle">'+msg[i].doctor_name+'</td><td class="align-middle">'+msg[i].doctor_speciality+'</td><td class="align-middle"> '+msg[i].doctor_degree+' </td></tr>')
      }
    }
  });
</script>
@endsection
