@extends('layouts.app')

@section('content')
<style type="text/css">
    .main-box-layout{
        margin: 0px;
        margin-top: 30px;
        position: relative;
        box-shadow: -3px 3px 3px 0px #c1c1c1;
    }
    
    .box-icon-section{
        display: table;
        height:100px;
        color:#fff;
    }
    .box-icon-section i{
        font-size:30px;
        display: table-cell;
        vertical-align: middle;
        transition:transform 0.4s ease-in-out;
        transition: 1s;
    }
    .box-text-section{
        background-color:#02c39a;
    }
    .box-text-section p{
        margin: 0px;
        color:#fff;
        padding:10px 0px; 
    }
    .label .badge{
        position: absolute;
        top:-19px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #f1f1f1;
        color: #fff;
        box-shadow: 0px 0px 3px 0px #fff;
        border: 3px solid #fff;
    }

    dl {
  display: flex;
  background-color: white;
  flex-direction: column;
  width: 100%;
  max-width: 900px;
  position: relative;
}


.text {
  font-weight: 600;
  display: flex;
  align-items: center;
  height: 40px;
  width: 10px;
  background-color: white;
  position: absolute;
  left: 0;
  padding-right: 10px;
  justify-content: flex-end;
}

.percentage {
  font-size: 0.8em;
  line-height: 1;
  text-transform: uppercase;
  width: 100%;
  height: 40px;
  margin-left: 10px;
  background: repeating-linear-gradient(to right, #ddd, #ddd 1px, #fff 1px, #fff 99.6%);
}
.percentage:after {
  border-radius: 50px;
  content: "";
  display: block;
  background-color: #02c39a;
  width: 50px;
  margin-bottom: 10px;
  height: 60%;
  position: relative;
  top: 50%;
  transform: translateY(-50%);
  transition: background-color 0.3s ease;
  cursor: pointer;
}
.percentage:hover:after, .percentage:focus:after {
  background-color: #aaa;
}

.percentage-0:after {
  width: 0%;
}

.percentage-100:after {
  width: 100%;
}

.bs-example{
    margin: 20px;
    margin-bottom: 0px;
  }
</style>

<div class="breadcumb_area bg-img" style="background-image: url(https://thumbs.dreamstime.com/b/black-medicine-bottle-icon-isolated-seamless-pattern-white-background-bottle-pill-sign-pharmacy-design-vector-black-medicine-185911551.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <div class="d-flex justify-content-center px-5">
                        <form action="/search"  method="POST" class="search-main-big shadow-sm"> @csrf <input value="{{$query ?? null}}" type="text" name="search" class="search-main-big-input" placeholder="Search Disease, Doctor, Hospital, Clinic" name=""><button class="search-main-big-icon"> <i class="fa fa-search"></i> </button> </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="RejectedAlerts">
</section>
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
                            <img src="https://ui-avatars.com/api/?name={{$user->name}}&background=02c39a&color=fff" class="pb-3 rounded mx-auto d-block" style="max-height: 1000px;max-width: 1000px;"> 
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
                                                  <td scope="col" style='border:none;'><b>DOB: </b></td>
                                                  <td scope="col" style='border:none;'>{{$user->DOB}}</td>
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
                                                  <td scope="col" style='border:none;'><b>Blood Group: </b></td>
                                                  <td scope="col" style='border:none;'>{{$user->bloodGroop}}</td>
                                              </tr>
                                              <tr>
                                                  <td scope="col" style='border:none;'><b>Gender: </b></td>
                                                  <td scope="col" style='border:none;'>{{$user->gender}}</td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </ul>
                              </div>
                              <a href="/edit" class="d-flex justify-content-center btn essence-btn">Edit Profile</a>
                          </div>
                        </div>
                        
                        
                    </div>
                    <div class="widget brands mb-50">
                        <!-- Widget Title 2 -->
                        <p class="widget-title2 mb-30">Some Important Links</p>
                        <div class="widget-desc">
                            <ul>
                                <li><a href="/app">Medinoor app</a></li>
                                <li><a href="#">Resource center</a></li>
                                <li><a href="#">Plan your move</a></li>
                                <li><a href="#">Manage Finance</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <link rel="stylesheet" type="text/css" href="https://medinoor.herokuapp.com/css/jquery.simple-bar-graph.min.css">
            <script type="text/javascript" src="https://medinoor.herokuapp.com/js/jquery.simple-bar-graph.min.js"></script>
            <link rel="stylesheet" type="text/css" href="https://medinoor.herokuapp.com/css/simple-calendar.css">
            <script type="text/javascript" src="https://medinoor.herokuapp.com/js/jquery.simple-calendar.js"></script>
            <div class="col-12 col-md-8 col-lg-9">
              <div class="shop_grid_product_area">
                  <div class="cta-area pb-5">

                      <div class="container">
                          <div class="row">
                              <div class="col-sm">

                                <div class="row mb-4" style="max-width: 400px;width: 100%;"><h6>Appointments Week</h6>
                                    <div class="align-middle" >
                                      <dl id="user-week-appointment">
                                        
                                      </dl>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <h6>Info</h6>
                                    <div class="row justify-content-md-center">
                                        <div class="col-lg-3  text-center">
                                            <div class="row main-box-layout img-thumbnail">
                                                <div class="col-lg-12  box-icon-section" style="background-color: #02c390;">
                                                    <i class="fa fa-balance-scale" aria-hidden="true"></i>
                                                </div>
                                                <div class="col-lg-12  box-text-section">
                                                    <p>Weight</p>
                                                </div>
                                                <div class="label">
                                                    <h3><span class="badge badge-pill " style="background-color: #02c390;">70 KG</span></h3>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-3  text-center">
                                            <div class="row main-box-layout img-thumbnail">
                                                <div class="col-lg-12  box-icon-section" style="background-color: #02c390;">
                                                    <i class="fa fa-android" aria-hidden="true"></i>
                                                </div>
                                                <div class="col-lg-12  box-text-section">
                                                    <p>Height</p>
                                                </div>
                                                <div class="label">
                                                    <h3><span class="badge badge-pill" style="background-color: #02c390;">6.0 FT</span></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3  text-center">
                                            <div class="row main-box-layout img-thumbnail">
                                                <div class="col-lg-12  box-icon-section" style="background-color: #02c390;">
                                                    <i class="fa  fa-heartbeat" aria-hidden="true"></i>
                                                </div>
                                                <div class="col-lg-12  box-text-section">
                                                    <p>Pulse</p>
                                                </div>
                                                <div class="label">
                                                    <h3><span class="badge badge-pill" style="background-color: #02c390;">102 BPM</span></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3  text-center">
                                            <div class="row main-box-layout img-thumbnail">
                                                <div class="col-lg-12  box-icon-section" style="background-color: #02c390;">
                                                    <i class="fa fa-fort-awesome" aria-hidden="true"></i>
                                                </div>
                                                <div class="col-lg-12  box-text-section">
                                                    <p>Sleep</p>
                                                </div>
                                                <div class="label">
                                                    <h3><span class="badge badge-pill" style="background-color: #02c390;">7: 30 hr</span></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                              <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                                <div class="order-details-confirmation">
                                    <div class="cart-page-heading">
                                      <h6>All Appointments</h6>
                                        <div class="vertically-middle" style="height: 150px;">
                                          <div class="breadcumb_area bg-img" style="background-image: url(https://i.ibb.co/58BJ7Yk/image.png);">
                                              <div class="container h-100">
                                                  <div class="row h-100 align-items-center">
                                                      <div class="col-12">
                                                          <div class="page-title text-center">
                                                              <div class="d-flex justify-content-center px-5">
                                                                  <a href="/appointment" class="d-flex justify-content-center btn essence-btn">
                                                                      View All
                                                                  </a>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                    <h6>Manage Your Meds</h6>
                                    <div class="vertically-middle" style="height: 150px;">
                                        <div class="breadcumb_area bg-img" style="background-image: url(https://i.ibb.co/bzHHLx8/image.png);">
                                            <div class="container h-100">
                                                <div class="row h-100 align-items-center">
                                                    <div class="col-12">
                                                        <div class="page-title text-center">
                                                            <div class="d-flex justify-content-center px-5">
                                                                <a href="/medicine" class="d-flex justify-content-center btn essence-btn">
                                                                    Your Meds
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4"><h6>Diet</h6>
                                        <div class="vertically-middle" style="height: 130px;">
                                            <div class="breadcumb_area bg-img" style="background-image: url(https://i.ibb.co/2k7R2zs/image.png);">
                                                <div class="container h-100">
                                                    <div class="row h-100 align-items-center">
                                                        <div class="col-12">
                                                            <div class="page-title text-center">
                                                                <div class="d-flex justify-content-center px-5">
                                                                    <a href="/medicine" class="d-flex justify-content-center btn essence-btn">
                                                                        Best Diet For You
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

      </div>

  </div>

</section>

<div class="modal fade" id="RejectDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Medinoor Appointment QR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to Delete?<br>
        It can't be un-done.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="yesConformDelete" onclick="deleteRejected()" class="btn btn-primary">Yes Delete</button>
      </div>
    </div>
  </div>
</div>

<script>
     function conformRejectDelete(code) {
      $("#yesConformDelete").attr("onclick","deleteRejected('"+code+"')")
    }

    function deleteRejected(code) {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
          method:'POST',
          url: '/appointment/delete',
          data:{code:code}
      }).done(function(msg){
          location.reload();
      })
    }
    var week_short = new Array(
      "Sun",
      "Mon",
      "Tue",
      "Wed",
      "Thu",
      "Fri",
      "Sat"
    );  
    var month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    Date.prototype.addDays = function(days) {
        var date = new Date(this.valueOf());
        date.setDate(date.getDate() + days);
        return date;
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    dateABZ = new Date()
    var dd = dateABZ.getDate();
    var mm = dateABZ.getMonth()+1; //January is 0!
    var yyyy = dateABZ.getFullYear();

    if(dd<10) {
        dd="0"+dd
    } 

    if(mm<10) {
        mm="0"+mm
    }
    date=yyyy+"-"+mm+"-"+dd
    $.ajax({
        method:'POST',
        url: '/appointment/user/request',
        data:{date: date},
    }).done(function(msg){
      x=0;
      for (var i = 0; i <= 7; i++) {
          dateArgumentAdd=dateABZ.addDays(i)
          addedDays=(dateArgumentAdd.getDay()) % 7;
          if (msg[x] == undefined) {
            x = x+1
            $("#user-week-appointment").append('<dd class="percentage percentage-0"><span class="text">'+week_short[addedDays]+'</span></dd>')
          }else{
            var dd = dateArgumentAdd.getDate();
            var mm = dateABZ.getMonth()+1; //January is 0!
            var yyyy = dateABZ.getFullYear();
            date_abc=yyyy+"-"+mm+"-"+dd
            appointmentDate= new Date(msg[x].appointment_date);
            var dd = appointmentDate.getDate();
            var mm = appointmentDate.getMonth()+1; //January is 0!
            var yyyy = appointmentDate.getFullYear();
            date_xyz=yyyy+"-"+mm+"-"+dd
            if (date_abc == date_xyz) {
              if (msg[x].approved == 1) {
                $("#user-week-appointment").append('<dd onclick="location.href = \'/appointment\'" class="percentage percentage-100"><span class="text">'+week_short[addedDays]+'</span></dd>')
              }else{
                $("#RejectedAlerts").append('<div class="bs-example"> <div class="alert alert-danger  alert-dismissible fade show"><strong>Appointment Rejected!</strong> Your appointment for <b>'+month[mm-1]+' '+ dd +' '+yyyy +'</b> with <b>DR.'+msg[x].doctor_name+' </b> was rejected.<br>Reason: '+msg[x].reason+'<br><a href="/message?h='+msg[x].hospital_id+'">Contact Hospital.<i class="fa fa-share-square-o"></i></a><button  type="button" data-toggle="modal" data-target="#RejectDelete" onclick="conformRejectDelete(\''+msg[x].code+'\')" class="close">&times;</button></div></div>')
                $("#user-week-appointment").append('<dd class="percentage percentage-0"><span class="text">'+week_short[addedDays]+'</span></dd>')
              }
              x =x +1
            }else {
            $("#user-week-appointment").append('<dd class="percentage percentage-0"><span class="text">'+week_short[addedDays]+'</span></dd>')
          }
          }
          console.log(msg[x])
        }

    })


</script>
@endsection
