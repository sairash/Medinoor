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
                        <form action="/search"  method="POST" class="search-main-big shadow-sm"> @csrf <input value="{{$query ?? null}}" type="text" name="search" class="search-main-big-input" placeholder="Search Disease, Doctor, Hospital, Clinic" name=""><button class="search-main-big-icon"> <i class="fa fa-search"></i> </button> </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                            <img src="" id="doctorPhoto" class="pb-3 rounded mx-auto d-block" style="max-height: 100px;max-width: 100px;"> 
                            <div class="widget brands mb-50">
                              <!-- Widget Title 2 -->
                              <h6 class="widget-title d-flex justify-content-center">About User</h6>
                              <div class="widget-desc">
                                  <ul>
                                      <table class="table">
                                          <tbody>
                                              <tr>
                                                  <td scope="col" style='border:none;'><b>Name: </b></td>
                                                  <td scope="col" style='border:none;' id="userName" class="text-break"></td>
                                              </tr>
                                              <tr>
                                                  <td scope="col" style='border:none;'><b>Address: </b></td>
                                                  <td scope="col" style='border:none;'>Nepal</td>
                                              </tr>
                                              <tr >
                                                  <td scope="col" style='border:none;'><b>Rating: </b></td>
                                                  <td scope="col" style='border:none;' id="rating" class="text-break" >5.0 <i class="fa fa-star"></i> 32</td>
                                              </tr>
                                              <tr>
                                                  <td scope="col" style='border:none;'><b>NMC: </b></td>
                                                  <td scope="col" style='border:none;'>{{$doctor_DB}}</td>
                                              </tr>
                                              <tr >
                                                  <td scope="col" style='border:none;'><b>Degree: </b></td>
                                                  <td scope="col" style='border:none;' id="degree" class="text-break" ></td>
                                              </tr>
                                              <tr >
                                                  <td scope="col" style='border:none;'><b>Speciality: </b></td>
                                                  <td scope="col" style='border:none;' id="speciality" class="text-break" ></td>
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
                  <h5>Search Reasult</h5>
                  <div class="col">
                    <div id="image--container " style="background-image:url(https://i.ibb.co/K0gZZXY/heart-Beat.gif)">
                    
                    </div>
                  <div class="col img_enable" id="searchItem">
                      
                  </div>
                </div>
            </div>
        </div>
      </div>
  </div>
</section>

<script type="text/javascript">
    $( document ).ready(function() {
        $.ajax({
            method:'GET',
            url: '/doc/where/request/?nmc={{$doctor_DB}}',
        }).done(function(msg)
        {
            for (var i = 0; i < msg.length; i++) {
              console.log(msg[i]);
              $('#doctorPhoto').attr("src",msg[i]['doctor_photo']);
              $("#userName").text(msg[i]['doctor_name'])
              $("#degree").text(msg[i]['doctor_degree'])
              $("#speciality").text(msg[i]['doctor_speciality'])
              $("#searchItem").append('<div class="row p-2 bg-white border rounded"><div class="col-md-3 mt-1 text-center"><img class="rounded img-fluid rounded-circle img-responsive rounded product-image" height="100" width="100" src="'+msg[0]['hospital_logo']+'"></div><div class="col-md-6 mt-1"><h5>'+msg[0]['hospital_name']+'</h5><div class="d-flex flex-row"><div class="ratings mr-2">'+msg[0]['totalRating']+' <i class="fa fa-star"></i></div><span>310</span></div><div class="mt-1 mb-1 spec-1"><span><a href="'+msg[0]['hospital_website']+'">Click here to visit Website</a></span></div><div class="mt-1 mb-1 spec-1"><span>Type '+msg[0]['hospital_typeOfHospital']+'</span></div><p class="text-justify text-truncate para mb-0">'+msg[0]['hospital_info']+'<br><br></p></div><div class="align-items-center align-content-center col-md-3 border-left mt-1"><h6 class="text-success">Hospital</h6><div class="d-flex flex-column mt-4"><button class="btn btn-primary btn-sm" onclick="location.href =\' /view?hospital='+msg[0]['hospital_id']+'&doctor={{$doctor_DB}}\';" type="button">Get Appointment</button><button onclick="location.href =\' /view?hospital='+msg[0]['hospital_id']+'\';" class="btn btn-outline-primary btn-sm mt-2" type="button">Show Hospital</button></div></div></div>')
                $("#image--container").addClass('img_enable');
                $("#searchItem").removeClass('img_enable');
            }
        });
    });
    
</script>
@endsection


