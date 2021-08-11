@extends('layouts.app')

@section('content')
<style type="text/css">
    .span4 img {
        margin-right: 10px;
    }
    .span4 .img-left {
        float: left;
    }
    .span4 .img-right {
        float: right;
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
<div class="card m-5">
  <div style="background-color:#02c39a; color: white;" class="p-1"><i class="fa fa-shield"></i> New! Available </div>
        <div class="card-body" style=" border: none;">
            <div class="row">
                <div class="span4">
                    <img alt="" class="img-left" style="width: 120px;" src="https://d1uhlocgth3qyq.cloudfront.net/VaccineIllustration___21J4X.svg">
                    <div class="content-heading"><h6>Find a Covid-19 vaccine appointment </h6></div>
                    <p>We can help you find available vaccine appointments near you or notify you when availability opens up.</p>
                    <button class="btn btn-primary mt-2" href="/vaccine">Find vaccine appointments</button>
                </div>
            </div>
        </div>
        <div style="background-color:#02c39a; color: white;" class="p-1">&nbsp; </div>
    </div>
@endsection
