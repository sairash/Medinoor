@extends('layouts.app')

@section('content')
<style type="text/css">
    .btn-essence-small{
      background-color: #02c39a;
      color:white;
    }
    .btn-essence-small:hover{
      background-color: black;
      color: white;
    }

    .essence-div{
        color: white;
        background-color: #02c39a;
        cursor: pointer;
        padding: 5px;
    }
    .essence-div:hover{
        color: white;
        background-color: black;
    }
    .btn-primary{
        border-color: #02c39a !important;
        color: white !important;
        background-color: #02c39a;
    }
    .btn-primary:hover{
        color: white !important;
        background-color: black !important;
        border-color: black !important;
    }
    .btn-outline-primary{
        border-color: #02c39a !important;
        color: #02c39a !important;
    }
    .btn-outline-primary:hover{
        border-color: black !important;
        color: black !important;
        background-color: white;
    }
    .img_enable{
        display: none;
    }
</style>
<div class="single-blog-wrapper">

    <!-- Single Blog Post Thumb -->
    <div class="single-blog-post-thumb">
      <?php
          $src="html/mapOnlyShow.php?".$hospital->latitude."&".$hospital->longitude;
          echo '<iframe src="/'.$src.'" style="width: 100%; height: 400px;border: none;"></iframe>';
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
                        <h6 class="widget-title mb-30 d-flex justify-content-center">Hospital Profile</h6>

                        <!--  Catagories  -->
                        <div class="catagories-menu mb-4">
                            <img src="{{$hospital->logo}}" class="pb-3 rounded mx-auto d-block" style="max-height: 1000px;max-width: 1000px;"> 
                            <div class="widget brands mb-50">
                              <!-- Widget Title 2 -->
                              <h6 class="widget-title d-flex justify-content-center">About Hospital</h6>
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

                        <div class="text-center"><a>Doctor Profile</b></a></div>
                        <br>
                      <div class="container">

                        <div id="docInfo">
                            
                          </div>
                          <br>
                          <div class="row">
                              <div class="col-12">
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <td colspan="7" class="text-center"><h5>Schedule Time For This Week</h5></td>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr id="day_after_today">
                                      
                                    </tr>
                                    <tr id="day_after_today_appointment">
                                      
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>


<!-- Modal -->
<div class="modal fade" id="Conform" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="align-middle">Appointment With <img src="https://i.ibb.co/n84SnZW/medinoor-perf.png" width="100"></div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>You have an appointment with <b id="doctor_name_modal">{}</b> in <b>{{$user->name}}.</b></p>
        <p id="modalDate"></p>
        <h4>Pay With</h4>
        <img src="https://www.nepalitrends.com/wp-content/uploads/2018/03/khalti.png" width="100">
        <img src="https://i.ibb.co/j8GyXKL/kisspng-esewa-fonepay-pvt-ltd-logo-portable-network-grap-index-of-inheadline-public-assets-uploads-n.png" width="100">
      </div>
      <div class="modal-footer">
        <button type="button" onclick="get_appointment()" id="modelButton" onclick="" class="btn essence-btn">Conform Your Appointment</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

function get_appointment() {
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
      method:'POST',
      url: '/appointment/get',
      data:{date: dateABZ,doctor_nmc:'{{$doctor_DB}}',hospital_id:'{{$hospital->id}}',time:time,doctor_name:doctorName,doctor_photo:doctorPhoto,user_name:'{{ $auth_user->name}}',},
  }).done(function(msg){
      window.location.href = "/home";
  })
}

  var result = new Date();
  var week = new Array(
    "Sunday",
    "Monday",
    "Tuesday",
    "Wednesday",
    "Thursday",
    "Friday",
    "Saturday"
  );  
  var month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
  Date.prototype.addDays = function(days) {
      var date = new Date(this.valueOf());
      date.setDate(date.getDate() + days);
      return date;
  }

  var date = new Date();

  var day = new Date();
  function select_appointment(argument,id) {
    time=$("#"+id).text();
    dateArgumentAdd=date.addDays(argument)
    dateABZ=new Date(dateArgumentAdd)
    var dd = dateABZ.getDate();
    var mm = dateABZ.getMonth()+1; //January is 0!
    var yyyy = dateABZ.getFullYear();

    if(dd<10) {
        dd="0"+dd
    } 

    if(mm<10) {
        mm="0"+mm
    } 
    dateABZ = yyyy+"-"+mm+"-"+dd+" "+dateABZ.getHours() + ":" + dateABZ.getMinutes()+":" + dateABZ.getSeconds() +"."+dateABZ.getMilliseconds();
    $("#modalDate").html("On <b>"+month[ dateArgumentAdd.getMonth()]+" "+ dateArgumentAdd.getDate()+" '" +week[dateArgumentAdd.getDate() % 7]+"'</b> in between <b>"+$("#"+id).text()+'</b>')

  }


  $.ajax({
        method:'GET',
        url: '/view/return/{{$hospital->id}}/{{$doctor_DB}}',
    }).done(function(msg)
    {
      doctorName=msg[0].doctor_name;
      doctorPhoto=msg[0].doctor_photo;
      $("#docInfo").html('<div class="row p-2 bg-white border rounded"><div class="col-md-3 mt-1 text-center"><img height="100" width="100" class="rounded img-fluid rounded-circle img-responsive rounded product-image" src="'+msg[0].doctor_photo+'"></div><div class="col-md-6 mt-1"><h5>'+msg[0].doctor_name+'</h5><div class="d-flex flex-row"><div class="ratings mr-2">5.0 <i class="fa fa-star"></i></div><span>310</span></div><div class="mt-1 mb-1 spec-1"><span> Degree: '+msg[0].doctor_degree+'</span></div><div class="mt-1 mb-1 spec-1"><span>NMC: '+msg[0].doctor_nmc+'</span></div><p class="text-justify text-truncate para mb-0">Speciality '+msg[0].doctor_speciality+'<br><br></p></div><div class="align-items-center align-content-center col-md-3 border-left mt-1"><h6 class="text-success">Doctor</h6><div class="d-flex flex-column mt-4"><button class="btn btn-primary btn-sm" onclick="location.href =\' /view?doctor={{$doctor_DB}}\';" type="button">View where Doc Is</button><button class="btn btn-outline-primary btn-sm mt-2" onclick="location.href =\' /doc/where/cheap?doctor='+msg[0]['NMC']+'\';" type="button">Cheapest Hospital</button></div></div></div>')
      $("#doctor_name_modal").text(msg[0].doctor_name)

      for (i = 0; i < 7; i++) {
        addedDays=(day.getDay() + 1 + i) % 7;
        $('#day_after_today').append('<th scope="col">'+week[addedDays]+'</th>')
        if (msg[0][week[addedDays].toLowerCase()] != null) {
          $('#day_after_today_appointment').append('<td scope="col" data-toggle="modal" data-target="#Conform" onclick="select_appointment('+(parseInt(i)+1)+', \'div_for_day_'+week[addedDays]+'\')" id="button_for_day_'+week[addedDays]+'"><div class="btn btn-essence-small" id="div_for_day_'+week[addedDays]+'">'+msg[0][week[addedDays].toLowerCase()]+'</div></td>')
        }else{
          $('#day_after_today_appointment').append('<td scope="col" ></td>')
        }
        
      }
      
    });

    
    

    

</script>

@endsection
