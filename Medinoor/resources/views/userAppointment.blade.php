@extends('layouts.app')

@section('content')
<style type="text/css">
    .top-40{
        top: 37%;
    }
    .start-35{
        left: 35%;
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


<div class="breadcumb_area bg-img" style="background-image: url(https://thumbs.dreamstime.com/b/black-medicine-bottle-icon-isolated-seamless-pattern-white-background-bottle-pill-sign-pharmacy-design-vector-black-medicine-185911551.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <div class="d-flex justify-content-center px-5">
                        <h1>Appointment </h1>
                    </div>
                    <small>Dashboard</small>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

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
                                <li><a href="/app">Sekhmed app</a></li>
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
                  <div>
                    <h5>Appointments</h5>
                    <div class="container">

                        <div id="docInfo">
                            
                          </div>
                          <br>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<div class="modal fade" id="QRCodeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Medinoor Appointment QR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="" id="QRCodeModalImage">
      </div>
    </div>
  </div>
</div>

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
<script type="text/javascript">


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



  function QRCode(code) {
    $("#QRCodeModalImage").attr("src","https://api.qrserver.com/v1/create-qr-code/?size=1000x1000&data="+code+"&color=02c39a&margin=50")
    // body...
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

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
      method:'POST',
      url: '/appointment/user/all/request',
  }).done(function(msg){
    for (var i = msg.length - 1; i >= 0; i--) {
      if (msg[i].approved == 1) {
         $("#docInfo").append('<div id="div_main_'+i+'" class="row p-2 bg-white border rounded"><div class="col-md-3 mt-1 text-center"><img height="100" width="100" class="rounded img-fluid rounded-circle img-responsive rounded product-image" id="doctor_photo'+i+'" src="'+msg[i].doctor_photo+'"></div><div class="col-md-6 mt-1"><h5 id="doctor_name'+i+'">'+msg[i].doctor_name+'</h5><div class="d-flex flex-row"><div class="ratings mr-2">Hospital : <b><a href="/view?hospital='+msg[i].hospital_id+'" class="text-primary" style="text-decoration: underline;">'+msg[i].hospital_name+'</a></b> </div></div><div class="mt-1 mb-1 spec-1"><span>Appointment Hospital ID: <b id="user_id_'+i+'">'+msg[i].hospital_id+'</b></span></div><div class="mt-1 mb-1 spec-1"><span>Doc NMC: <b id="doctor_nmc'+i+'">'+msg[i].doctor_nmc+'</b></span></div><div class="mt-1 mb-1 spec-1"><span>On Date: <input type="date" disabled id="doc_appointment_date_'+i+'" value="'+msg[i].appointment_date.split(" ")[0]+'"></span></div><div class="mt-1 mb-1 spec-1"><span>Time: <b id="doc_time_'+i+'">'+msg[i].time+'</b> on <b>'+msg[i].reason+'</b></span></div></div><div class="align-items-center align-content-center col-md-3 border-left mt-1"><h6 class="text-success">Doctor</h6><div class="d-flex flex-column mt-4"><button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#collapse_'+i+'" aria-expanded="false" aria-controls="collapse_'+i+'">Show Code</button><button class="btn btn-outline-primary btn-sm mt-2" onclick="QRCode(\''+msg[i].code+'\')" type="button" data-toggle="modal" data-target="#QRCodeModal">Show QR</button><button class="btn btn-primary btn-sm mt-2" onclick="retractAppointment(\''+msg[i].code+'\')" type="button">Retract Appointment</button></div></div></div><div class="collapse row p-2 bg-white border rounded" id="collapse_'+i+'"><div id="data_to_show'+i+'"> Code: '+msg[i].code+'</div>')
       }else{
          appointmentDate= new Date(msg[i].appointment_date);
          var dd = appointmentDate.getDate();
          var mm = appointmentDate.getMonth()+1; //January is 0!
          var yyyy = appointmentDate.getFullYear();
          $("#RejectedAlerts").append('<div class="bs-example"> <div class="alert alert-danger  alert-dismissible fade show"><strong>Appointment Rejected!</strong> Your appointment for <b>'+month[mm-1]+' '+ dd +' '+yyyy +'</b> with <b>DR.'+msg[i].doctor_name+' </b> was rejected.<br>Reason: '+msg[i].reason+'<br><a href="/message?h='+msg[i].hospital_id+'">Contact Hospital.<i class="fa fa-share-square-o"></i></a><button type="button" data-toggle="modal" data-target="#RejectDelete" onclick="conformRejectDelete(\''+msg[i].code+'\')" class="close">&times;</button></div></div>')

       }
     
    }
  });



</script>

@endsection
