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
                        <form action="/search/map"  method="POST" class="search-main-big shadow-sm"> @csrf <input value="{{$query ?? null}}" type="text" name="search" class="search-main-big-input" placeholder="Search Hospital, Clinic" name=""><button class="search-main-big-icon"> <i class="fa fa-search"></i> </button> </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="shop_grid_area" style="height: 100vh; padding-top: 20px;">
	<iframe src="/html/mapSearchFullScreen.php?{{$h}}" style="width: 100%; height: 92%;border: none;"></iframe>
</section>

@endsection
