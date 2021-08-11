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
                              <a href="/edit" class="d-flex justify-content-center btn essence-btn">Edit Profile</a>
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
                  <h2> <u>Doctors</u> 
                    @if($auth_id == $hospital->id)
                    
                    <button style="width: 40px;border:none;border-radius: 10px;" data-toggle="modal" data-target="#exampleModal">+</button>
                    @endif
                  </h2>
                  <div>
                    <table class="table">
                      <tbody id="doctors_in_database_display">
                        <?php 
                          foreach ($allDoc as $value) {
                            echo('<tr style="cursor:pointer" onclick="location.href = \'/view?hospital='.$hospital->id.'&doctor='.$value->doctor_nmc.'\'"><th class="align-middle" scope="row"><img src="'.$value->doctor_photo.'" width="50"></th><td class="align-middle">'.$value->doctor_name.'</td><td class="align-middle">'.$value->doctor_speciality.'</td><td class="align-middle"> '.$value->doctor_degree.' </td></tr>');
                          }
                         ?>
                      </tbody>
                    </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

@if($auth_id == $hospital->id)
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Doctor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="input-group mb-3" id="nmcAll">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">NMC</span>
          </div>
          <input type="number" class="form-control" id="DoctorNMC" placeholder="Code" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="form-group" id="suggestDoctorsDiv" style="position: relative; background-color: white; z-index: 10000">
          <table class="table"  style="position: absolute;background-color: white; cursor: pointer;">
                <tbody id="suggestDoctors">
                  
                </tbody>
          </table>
       </div>
       <h3>Days</h3>
        <div class="input-group mb-3" id="nmcAll">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Sun</span>
          </div>
          <input type="text" id="sunday" class="form-control" autocomplete="off" placeholder="From - To" aria-label="Username" aria-describedby="basic-addon1">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Mon</span>
          </div>
          <input type="text" id="monday" class="form-control" autocomplete="off" placeholder="From - To" aria-label="Username" aria-describedby="basic-addon1">
        </div>
          <div class="input-group mb-3" id="nmcAll">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Tue</span>
            </div>
            <input type="text" id="tuesday" class="form-control" autocomplete="off" placeholder="From - To" aria-label="Username" aria-describedby="basic-addon1">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Wed</span>
            </div>
            <input type="text" id="wednesday" class="form-control" autocomplete="off" placeholder="From - To" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3" id="nmcAll">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Thr</span>
            </div>
            <input type="text" id="thursday" class="form-control" autocomplete="off" placeholder="From - To" aria-label="Username" aria-describedby="basic-addon1">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Fri</span>
            </div>
            <input type="text" id="friday" class="form-control" autocomplete="off" placeholder="From - To" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3" id="nmcAll">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Sat</span>
            </div>
             <input type="text" id="saturday" class="form-control" autocomplete="off" placeholder="From - To" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="row disableVisible" id="registerDoctor">
            <div class="form-group  col-md-6 mb-3">
                <label for="name">Name</label>
                <div class="input-group">                                                                                         
                    <input id="name" type="text" class="form-control " name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                   
                </div>                                    
            </div><!--end form-group--> 

            <div class="form-group  col-md-6 mb-3">
                <label for="nmc">{{ __('NMC Number') }}</label>
                <div class="input-group">                                                                      
                    <input id="nmc" type="nmber" class="form-control " name="nmc" value="{{ old('nmc') }}" required autocomplete="nmc">

                    
                </div>                                    
            </div><!--end form-group-->
            <div class="form-group  col-md-6 mb-3">
                <label for="photo">{{ __('Photo Url') }}</label>
                <div class="input-group">                                                                      
                    <input id="photo" type="nmber" class="form-control " name="photo" value="{{ old('photo') }}" required autocomplete="photo">

                   
                </div>                                    
            </div><!--end form-group-->
             <div class="form-group  col-md-6 mb-3">
                <label for="degree">{{ __('Degree') }}</label>
                <div class="input-group">                                                                      
                    <input id="degree" type="text" class="form-control " name="degree" value="{{ old('degree') }}" required autocomplete="degree">

                    
                </div>                                    
            </div><!--end form-group-->
            <div class="form-group   mb-3">
                <label for="speciality">{{ __('speciality') }}</label>
                <div class="input-group">                                                                      
                    <input id="speciality" type="text" class="form-control block " name="speciality" value="{{ old('speciality') }}" required autocomplete="speciality">

                    
                </div>                                    
            </div><!--end form-group-->
            <div class="form-group disableVisible" id="suggestspecialityDiv" style="position: relative; background-color: white; z-index: 10000">
              <table class="table"  style="position: absolute;background-color: white; width: 95%;">
                <tbody id="suggestspeciality">

                </tbody>
              </table>
           </div>
            
            <div class="form-group ">
                <div class="input-group">
                    <button type="submit" data-dismiss="modal" class="btn essence-btn btn-block waves-effect waves-light" onclick="registerDoctorSend()" type="button" id="registerButton">Register and Save <i class="fas fa-sign-in-alt ml-1"></i></button>
                </div><!--end col--> 
            </div> <!--end form-group-->  
      </div>
      
         
      <div class="modal-footer" id="modal-footer">
        <button type="button" class="btn essence-btn" onclick="send_new_hospital()" data-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- <div class="checkout_area section-padding-80">-->

<script type="text/javascript">




  chooseAnSpecialityFromDB=false
  chooseADoctorFromDB=false

  function specialityChose(id) {
    chooseAnSpecialityFromDB = true
    $('#speciality').val($('#speciality'+id).text())
    $('#suggestspecialityDiv').addClass('disableVisible')
  }

  function doctorChoose(id) {
    chooseADoctorFromDB = true
    $('#DoctorNMC').val(parseInt($('#nmc'+id).text()))
    $('#suggestDoctorsDiv').addClass('disableVisible')
  }

  function send_new_hospital() {
    if (chooseADoctorFromDB) {
      url_save_doctor_to_hospital = "/hospital/register/doctor/work/hospital/?nmc="+$('#DoctorNMC').val()+"&hospital={{$hospital->id}}&sunday="+$('#sunday').val()+"&monday="+$('#monday').val()+"&tuesday="+$('#tuesday').val()+"&wednesday="+$('#wednesday').val()+"&thursday="+$('#thursday').val()+"&friday="+$('#friday').val()+"&saturday="+$('#saturday').val()+"&hasData=no"
      url_save_doctor_to_hospital = url_save_doctor_to_hospital.replaceAll(/\s/g,'')
      $.ajax({
            method:'GET',
            url: url_save_doctor_to_hospital,
        })
    }
    
    // body...
  }


  function addNewDoctor() {
    $('#suggestDoctorsDiv').addClass('disableVisible')
    $('#registerDoctor').removeClass('disableVisible')
    $('#nmcAll').addClass('disableVisible')
    $('#modal-footer').addClass('disableVisible')
  }

    var typeTimer;                //timer identifier
    var doneTypingInterval = 1000;  //time in ms, 1 second for example
    var $inputDoctorNMC= $('#DoctorNMC');
    //on keyup, start the countdown
    $inputDoctorNMC.on('keyup', function () {
      $('#suggestDoctorsDiv').addClass('disableVisible')
      clearTimeout(typeTimer);
      typeTimer = setTimeout(doneTypingDoctor, doneTypingInterval);
    });

    //on keydown, clear the countdown 
    $inputDoctorNMC.on('keydown', function () {
      chooseADoctorFromDB =false
      clearTimeout(typeTimer);
    });

  
    function doneTypingDoctor () {
        $.ajax({
            method:'GET',
            url: 'doctor/search/request?nmc='+$('#DoctorNMC').val(),
        }).done(function(msg)
        {
            if (msg.length == 0) {
              $("#suggestDoctors").empty();
                $("#suggestDoctors").append('<tr  onclick="addNewDoctor()"><th><button type="button" class="btn essence-btn">Add New Doctor</button></th></tr>')
                $('#suggestDoctorsDiv').removeClass('disableVisible')
            }else{
                $("#suggestDoctors").empty();
                for (var i = msg.length - 1; i >= 0; i--) {
                  $("#suggestDoctors").append('<tr id=doc'+msg[i]['id']+' onclick="doctorChoose('+msg[i]['id']+')"><th><img src="'+msg[i]['Photo']+'" width="50"></th><td class="align-middle">'+msg[i]['Name']+'</td><td class="align-middle" id="nmc'+msg[i]['id']+'">'+msg[i]['NMC']+'</td></tr>')
                }
                $('#suggestDoctorsDiv').removeClass('disableVisible')
          }
        });
    }



  function registerDoctorSend() {
    if (chooseAnSpecialityFromDB) {
      url_save_doctor_to_hospital = "/hospital/register/doctor/work/hospital/?nmc="+$('#nmc').val()+"&hospital={{$hospital->id}}&sunday="+$('#sunday').val()+"&monday="+$('#monday').val()+"&tuesday="+$('#tuesday').val()+"&wednesday="+$('#wednesday').val()+"&thursday="+$('#thursday').val()+"&friday="+$('#friday').val()+"&saturday="+$('#saturday').val()+"&hasData=yes&"+"&name="+$('#name').val()+"&photo="+$('#photo').val()+"&degree="+$('#degree').val()+"&speciality="+$('#speciality').val()
      url_save_doctor_to_hospital = url_save_doctor_to_hospital.replaceAll(/\s/g,'')
      $.ajax({
            method:'GET',
            url: url_save_doctor_to_hospital,
        })
      
      $.ajax({
            method:'GET',
            url: '/doctor/register/request?nmc='+$('#nmc').val()+'&name='+$('#name').val()+'&photo='+$('#photo').val()+'&degree='+$('#degree').val()+'&speciality='+$('#speciality').val(),
        }).done(function(){
          $('#suggestDoctorsDiv').removeClass('disableVisible')
          $('#registerDoctor').addClass('disableVisible')
          $('#nmcAll').removeClass('disableVisible')
          $('#modal-footer').removeClass('disableVisible')
        })
    }
  }


    var typingTimer;                //timer identifier
    var $input = $('#speciality');
    //on keyup, start the countdown
    $input.on('keyup', function () {
      $('#suggestspecialityDiv').addClass('disableVisible')
      clearTimeout(typingTimer);
      typingTimer = setTimeout(doneTyping, doneTypingInterval);
    });

    //on keydown, clear the countdown 
    $input.on('keydown', function () {
      chooseAnSpecialityFromDB =false
      clearTimeout(typingTimer);
    });

  
    function doneTyping () {
        $.ajax({
            method:'GET',
            url: 'disease/search/request?query='+$('#speciality').val(),
        }).done(function(msg)
        {
            $("#suggestspeciality").empty();
            for (var i = msg.length - 1; i >= 0; i--) {
              $("#suggestspeciality").append('<tr id=speciality'+msg[i]['id']+' onclick="specialityChose('+msg[i]['id']+')"><th>'+msg[i]['Name']+'</th></tr>')
            }
            $('#suggestspecialityDiv').removeClass('disableVisible')
        });
    }


</script>
@endif
@endsection
