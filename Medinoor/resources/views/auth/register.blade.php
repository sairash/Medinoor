@extends('layouts.app')

@section('content')

 <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Signup</h2>
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

                        

                        <form method="POST" action="{{ route('register') }}">
                        @csrf
                            <div class="row">
                                <div class="form-group mb-2 col-md-6 mb-3">
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

                                <div class="form-group mb-2 col-md-6 mb-3">
                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                    <div class="input-group">                                                                                         
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>                                    
                                </div><!--end form-group-->

                                <div class=" mb-2 col-md-6 mb-3">
                                    <label for="date">{{ __('Date OF Birth in (AD)') }}</label>
                                    <div class="input-group">
                                        <div class="select">
                                          <input id="date" type="number" name="year_start" class="form-control @error('date') is-invalid @enderror" id="year">
                                        </div>

                                        @error('date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>                                    
                                </div><!--end form-group-->



                                <div class="form-group mb-2 col-md-6 mb-3">
                                    <label for="bloodGroop">{{ __('Blood Group') }}</label>
                                    <div class="input-group">                                                                                         
                                        <select id="bloodGroop" name="bloodGroop" class="form-control @error('bloodGroop') is-invalid @enderror">
                                            <option>A+</option>
                                            <option>A-</option>
                                            <option>B+</option>
                                            <option>B-</option>
                                            <option>O+</option>
                                            <option>O-</option>
                                            <option>AB+</option>
                                            <option>AB-</option>
                                        </select>
                                        @error('bloodGroop')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>                                    
                                </div><!--end form-group-->
                                
                                <div class="form-group mb-2 col-md-6 mb-3">
                                    <label for="name">Gender</label>
                                    <div class="radio radio-success">                                                                                         
                                        <input type="radio" name="gender" class="radio-primary @error('gender') is-invalid @enderror" id="male" value="male" checked="">
                                        <label for="male">
                                            Male
                                        </label><br>
                                        <input type="radio" name="gender" class="radio-primary @error('gender') is-invalid @enderror" id="female" value="female">
                                        <label for="female">
                                            Female
                                        </label>
                                        
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>                                    
                                </div><!--end form-group--> 


                                <div class="form-group mb-2 col-md-6 mb-3">
                                    <label for="password">Password</label>                                            
                                    <div class="input-group">                                  
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>                               
                                </div><!--end form-group--> 

                                <div class="form-group mb-2 col-md-6 mb-3">
                                    <label for="password-confirm">Confirm Password</label>                                            
                                    <div class="input-group">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div><!--end form-group-->
                                
                                <div class="form-group mb-2 col-md-6 mb-3">
                                    <label for="number">{{ __('Number') }}</label>                                            
                                    <div class="input-group">
                                        <input id="number" type="number" class="form-control @error('number') is-invalid @enderror" name="number" required autocomplete="number">

                                        @error('number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>                               
                                </div><!--end form-group-->  
                                <div class="form-group row my-3">
                                    <div class="col-sm-12">
                                        <div class="custom-control custom-switch switch-success">
                                            <input type="checkbox" class="custom-control-input" id="customSwitchSuccess2">
                                            <label class="custom-control-label text-muted" for="customSwitchSuccess2">You agree to the Medinoor <a href="#" class="text-primary">Terms of Use</a></label>
                                        </div>
                                    </div><!--end col-->                                             
                                </div><!--end form-group--> 

                                <div class="form-group mb-0 row">
                                    <div class="col-12">
                                        <button type="submit" class="btn essence-btn btn-block waves-effect waves-light disabled" disabled type="button" id="registerButton">Register <i class="fas fa-sign-in-alt ml-1"></i></button>
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



        
        
