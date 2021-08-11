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

<script type="text/javascript">

   function showData(id,date_b) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    dateABZ = new Date(date_b)
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
        url: '/appointment/doctor/request',
        data:{date: date},
    }).done(function(msg){
      if (msg.length == 0) {
        $("#data_to_show"+id).html('Medinoor <b>doesnot</b> have any data for that day.');
      }
      for (var i = msg.length - 1; i >= 0; i--) {
        $("#data_to_show"+id).html('Doc Sees <b id="msg[i].amount_of_patient'+id+'">'+msg[i].amount_of_patient+'</b> patients everyday <b>'+msg[i].appointments+'</b> already registered in Medinoor.');
      }
    })    
  }

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
      method:'POST',
      url: '/appointment/request',
  }).done(function(msg){
    for (var i = msg.length - 1; i >= 0; i--) {
      $("#docInfo").append('<div id="allDivContainer'+i+'"><div id="div_main_'+i+'" class="row p-2 bg-white border rounded"><div class="col-md-3 mt-1 text-center"><img height="100" width="100" class="rounded img-fluid rounded-circle img-responsive rounded product-image" id="doctor_photo'+i+'" src="'+msg[i].doctor_photo+'"></div><div class="col-md-6 mt-1"><h5 id="doctor_name'+i+'">'+msg[i].doctor_name+'</h5><div class="d-flex flex-row"><div class="ratings mr-2">Request From: <b id="user_name_'+i+'">'+msg[i].user_name+'</b> </div></div><div class="mt-1 mb-1 spec-1"><span>Request User ID: <b id="user_id_'+i+'">'+msg[i].user_id+'</b></span></div><div class="mt-1 mb-1 spec-1"><span>Doc NMC: <b id="doctor_nmc'+i+'">'+msg[i].doctor_nmc+'</b></span></div><div class="mt-1 mb-1 spec-1"><span>On Date: <input type="date" disabled id="doc_appointment_date_'+i+'" value="'+msg[i].appointment_date.split(" ")[0]+'"></span></div><div class="mt-1 mb-1 spec-1"><span>Time: <b id="doc_time_'+i+'">'+msg[i].time+'</b></span></div></div><div class="align-items-center align-content-center col-md-3 border-left mt-1"><h6 class="text-success">Doctor</h6><div class="d-flex flex-column mt-4"><button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#collapse_'+i+'" aria-expanded="false" aria-controls="collapse_'+i+'" onclick="showData('+i+',\''+msg[i].appointment_date+'\')">Show Data</button><button class="btn btn-outline-primary btn-sm mt-2" onclick="reject_accept('+i+',1, '+msg[0].id+',\''+msg[i].appointment_date+'\',\''+msg[i].doctor_photo+'\' ,\''+msg[i].id+'\')" type="button">Accept</button><button class="btn btn-primary btn-sm mt-2" onclick="reject_accept('+i+',0, '+msg[i].id+',\''+msg[i].appointment_date+'\',\''+msg[i].doctor_photo+'\',\''+msg[i].id+'\')" type="button">Reject</button></div></div></div><div class="row p-2 bg-white border rounded"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text">Time / Reason</span></div><textarea  id="textAreaReason_'+i+'" class="form-control" aria-label="Time / Reason"></textarea></div></div><div class="collapse row p-2 bg-white border rounded" id="collapse_'+i+'"><div id="data_to_show'+i+'">Loading...</div></div>')
    }
  });



  function reject_accept(id,value,post_id,date,src,request_id) {
    if ($("textarea#textAreaReason_"+id).val()=='') {

      alert('Please Give Time on accept or Give Reason why it was Rejected.')
    }else{
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
          method:'POST',
          url: '/appointment/set',
          data:{date: date,doctor_nmc:$("#doctor_nmc"+id).text(),user_id:$("#user_id_"+id).text(),time:$("#doc_time_"+id).text(),doctor_name:$("#doctor_name"+id).text(),doctor_photo:src,approved:value,reason:$("textarea#textAreaReason_"+id).val(),date:date,amount_of_patient:10,id:request_id,hospital_name:'{{$user->name}}',user_name:$("#user_name_"+id).text()},
      }).done(function(msg){
        $('#allDivContainer'+id).html('');
      })    
    }

  }

</script>

@endsection
