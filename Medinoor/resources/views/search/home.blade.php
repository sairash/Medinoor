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
                    <h5 onclick="location.href =' /search/map/?h={{$query}}';">Search In Map</h5>
                    <div class="position-relative">
                        <?php
                          $src="/html/mapWithNoLocaiton.php";
                          echo '<iframe src="'.asset($src).'" style="width: 100%; height: 200px;border: none;"></iframe>';
                      ?>
                      <a href=" /search/map/?h={{$query}}" class="position-absolute top-50 start-35  essence-div"><i class="fa fa-search" aria-hidden="true"></i> Search</a>
                    </div>
                    <h5>Search Human Anatomy</h5>
                    <div class="position-relative" style="background-image:url(https://i.ibb.co/L1f3VJY/human-wordpress.png); height: 400px;background-size: cover;">
                        
                      <a href=" /search/body" class="position-absolute top-50 start-35  essence-div"><i class="fa fa-search" aria-hidden="true"></i> Search</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8 col-lg-9">
              <div class="shop_grid_product_area">
                <h5>Search Result</h5>
                <div class="col">
                    <div id="image--container " style="background-image:url(https://i.ibb.co/K0gZZXY/heart-Beat.gif)">
                    
                    </div>
                <div class="col img_enable" id="searchItem">
                    
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
            url: 'search/request/?q={{$query}}',
        }).done(function(msg)
        {
            for (var i = 0; i < msg.length; i++) {
                if (msg[i]['NMC'] == undefined) {
                    $("#searchItem").append('<div class="row p-2 bg-white border rounded"><div class="col-md-3 mt-1 text-center"><img class="rounded img-fluid rounded-circle img-responsive rounded product-image" height="100" width="100" src="'+msg[i]['logo']+'"></div><div class="col-md-6 mt-1"><h5>'+msg[i]['name']+'</h5><div class="d-flex flex-row"><div class="ratings mr-2">'+msg[i]['totalRating']+' <i class="fa fa-star"></i></div><span>310</span></div><div class="mt-1 mb-1 spec-1"><span><a href="'+msg[i]['website']+'">Click here to visit Website</a></span></div><div class="mt-1 mb-1 spec-1"><span>Type '+msg[i]['typeOfHospital']+'</span></div><p class="text-justify text-truncate para mb-0">'+msg[i]['info']+'<br><br></p></div><div class="align-items-center align-content-center col-md-3 border-left mt-1"><h6 class="text-success">Hospital</h6><div class="d-flex flex-column mt-4"><button class="btn btn-primary btn-sm" onclick="location.href =\' /search/map/?h='+msg[i]['name']+'\';" type="button">Show This in Map</button><button onclick="location.href =\' /view?hospital='+msg[i]['id']+'\';" class="btn btn-outline-primary btn-sm mt-2" type="button">Show Hospital</button></div></div></div>')
                }else{
                    $("#searchItem").append('<div class="row p-2 bg-white border rounded"><div class="col-md-3 mt-1 text-center"><img height="100" width="100" class="rounded img-fluid rounded-circle img-responsive rounded product-image" src="'+msg[i]['Photo']+'"></div><div class="col-md-6 mt-1"><h5>'+msg[i]['Name']+'</h5><div class="d-flex flex-row"><div class="ratings mr-2">5.0 <i class="fa fa-star"></i></div><span>310</span></div><div class="mt-1 mb-1 spec-1"><span> Degree: '+msg[i]['Degree']+'</span></div><div class="mt-1 mb-1 spec-1"><span>NMC: '+msg[i]['NMC']+'</span></div><p class="text-justify text-truncate para mb-0">Speciality '+msg[i]['speciality']+'<br><br></p></div><div class="align-items-center align-content-center col-md-3 border-left mt-1"><h6 class="text-success">Doctor</h6><div class="d-flex flex-column mt-4"><button class="btn btn-primary btn-sm" onclick="location.href =\' /view?doctor='+msg[i]['NMC']+'\';" type="button">View where Doc Is</button><button class="btn btn-outline-primary btn-sm mt-2" onclick="location.href =\' /doc/where/cheap?doctor='+msg[i]['NMC']+'\';" type="button">Cheapest Hospital</button></div></div></div>')
                }
                $("#image--container").addClass('img_enable');
                $("#searchItem").removeClass('img_enable');
            }
            

            
        });
    });
    
</script>
@endsection

