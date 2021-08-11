@extends('layouts.app')

@section('content')

 <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Register Doctor</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->

                <div class="container pb-5">
                <div class="row justify-content-center">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        

                        <form method="POST" action="/hospital/register/doctor">
                        @csrf
                            <div class="row">
                                <div class="form-group  col-md-6 mb-3">
                                    <label for="name">Name</label>
                                    <div class="input-group">                                                                                         
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span> 
                                        @enderror
                                    </div>                                    
                                </div><!--end form-group--> 

                                <div class="form-group  col-md-6 mb-3">
                                    <label for="nmc">{{ __('NMC Number') }}</label>
                                    <div class="input-group">                                                                      
                                        <input id="nmc" type="nmber" class="form-control @error('nmc') is-invalid @enderror" name="nmc" value="{{ old('nmc') }}" required autocomplete="nmc">

                                        @error('nmc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>                                    
                                </div><!--end form-group-->
                                <div class="form-group  col-md-6 mb-3">
                                    <label for="photo">{{ __('Photo Url') }}</label>
                                    <div class="input-group">                                                                      
                                        <input id="photo" type="nmber" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}" required autocomplete="photo">

                                        @error('photo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>                                    
                                </div><!--end form-group-->
                                 <div class="form-group  col-md-6 mb-3">
                                    <label for="degree">{{ __('Degree') }}</label>
                                    <div class="input-group">                                                                      
                                        <input id="degree" type="text" class="form-control @error('degree') is-invalid @enderror" name="degree" value="{{ old('degree') }}" required autocomplete="degree">

                                        @error('degree')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>                                    
                                </div><!--end form-group-->
                                <div class="form-group   mb-3">
                                    <label for="speciality">{{ __('speciality') }}</label>
                                    <div class="input-group">                                                                      
                                        <input id="speciality" type="text" class="form-control block @error('speciality') is-invalid @enderror" name="speciality" value="{{ old('speciality') }}" required autocomplete="speciality">

                                        @error('speciality')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>                                    
                                </div><!--end form-group-->

                               
                                
                                <div class="form-group ">
                                    <div class="input-group">
                                        <button type="submit" class="btn essence-btn btn-block waves-effect waves-light" type="button" id="registerButton">Register <i class="fas fa-sign-in-alt ml-1"></i></button>
                                    </div><!--end col--> 
                                </div> <!--end form-group-->  
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- <div class="checkout_area section-padding-80"> -->

<script type="text/javascript">
    $("#customSwitchSuccess2").click(function() {
      $("#registerButton").attr("disabled", !this.checked);
      $("#registerButton").toggleClass("disabled")
    });
</script>
@endsection



        
        
