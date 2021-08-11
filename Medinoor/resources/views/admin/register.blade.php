
<!DOCTYPE html>
<html lang="en">

    
<head>
        <meta charset="utf-8" />
        <title>Register</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <!-- <link rel="shortcut icon" href="/images/favicon.ico"> -->

        <!-- App css -->
        <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="account-body accountbg">

        <!-- Log In page -->
        <div class="container">
            <div class="row vh-100 d-flex justify-content-center">
                <div class="col-12 align-self-center">
                    <div class="row">
                        <div class="col-lg-5 mx-auto">
                            <div class="card">
                                <div class="card-body p-0 auth-header-box">
                                    <div class="text-center p-3">
                                        <a href="index.html" class="logo logo-admin">
                                            <img src="images/logo-sm-dark.png" height="50" alt="logo" class="auth-logo">
                                        </a>
                                        <h4 class="mt-3 mb-1 font-weight-semibold text-white font-18">Let's Get Started Dastone</h4>   
                                        <p class="text-muted  mb-0">Sign in to continue to Dastone.</p>  
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <ul class="nav-border nav nav-pills" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link  font-weight-semibold" href="/login">Log In</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active font-weight-semibold" href="/register">Register</a>
                                        </li>
                                    </ul>
                                     <!-- Tab panes -->
                                    <div>
                                        <div class="active px-3 pt-3" id="Register_Tab" role="tabpanel">
                                            <form class="form-horizontal auth-form" action="{{ route('register') }}" method="POST">
                                                @csrf
                                                <input type="checkbox" name="isHospital" checked style="display: none;">
                                                <div class="form-group mb-2">
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
            
                                                <div class="form-group mb-2">
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

                                                <div class="form-group mb-2">
                                                    <label for="lat">{{ __('Latitude') }}</label>
                                                    <div class="input-group">                                                                                         
                                                        <input id="lat" type="text" class="form-control @error('lat') is-invalid @enderror" name="lat" value="{{ old('lat') }}" required autocomplete="lat">

                                                        @error('lat')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>                                    
                                                </div><!--end form-group-->

                                                <div class="form-group mb-2">
                                                    <label for="lon">{{ __('Longitude') }}</label>
                                                    <div class="input-group">                                                                                         
                                                        <input id="lon" type="text" class="form-control @error('lon') is-invalid @enderror" name="lon" value="{{ old('lon') }}" required autocomplete="lon">

                                                        @error('lon')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>                                    
                                                </div><!--end form-group-->

                                                <div class="form-group mb-2">
                                                    <label for="date">{{ __('Date OF Establishment') }}</label>
                                                    <div class="input-group">
                                                        <select id="year" name="year_start" class="form-control @error('date') is-invalid @enderror">
                                                        </select>

                                                        @error('date')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>                                    
                                                </div><!--end form-group-->

                                                <div class="form-group mb-2">
                                                    <label for="hospitalType">{{ __('Type of Hospital') }}</label>
                                                    <div class="input-group">
                                                        <select id="hospitalType" name="hospitalType" class="form-control @error('date') is-invalid @enderror">
                                                            <option value="hospital">Hospital</option>
                                                            <option value="clinic">Clinic</option>
                                                        </select>

                                                        @error('hospitalType')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>                                    
                                                </div><!--end form-group-->

                                                <div class="form-group mb-2">
                                                    <label for="totalDoctors">{{ __('Total Doctors') }}</label>
                                                    <div class="input-group">                                                                                         
                                                        <input id="totalDoctors" type="text" class="form-control @error('totalDoctors') is-invalid @enderror" name="totalDoctors" value="{{ old('totalDoctors') }}" required autocomplete="totalDoctors" autofocus>
                                                        
                                                        @error('totalDoctors')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>                                    
                                                </div><!--end form-group-->
                                                
                                                <div class="form-group mb-2">
                                                    <label for="bedCapacity">Bed Capacity</label>
                                                    <div class="radio radio-success">                                                                                         
                                                        <input type="radio" name="bedCapacity" class="radio-primary @error('bedCapacity') is-invalid @enderror" id="more" value="more" checked="">
                                                        <label for="more">
                                                            More than 100
                                                        </label><br>
                                                        <input type="radio" name="bedCapacity" class="radio-primary @error('bedCapacity') is-invalid @enderror" id="less" value="less">
                                                        <label for="less">
                                                            Less than 100
                                                        </label>
                                                        
                                                        @error('bedCapacity')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>                                    
                                                </div><!--end form-group--> 


                                                <div class="form-group mb-2">
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
            
                                                <div class="form-group mb-2">
                                                    <label for="password-confirm">Confirm Password</label>                                            
                                                    <div class="input-group">                                   
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                    </div>
                                                </div><!--end form-group-->
                                                
                                                <div class="form-group mb-2">
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

                                                <div class="form-group mb-2">
                                                    <label for="logo">{{ __('Logo Link') }}</label>                                            
                                                    <div class="input-group">
                                                        <input id="logo" type="text" class="form-control @error('logo') is-invalid @enderror" name="logo" required autocomplete="logo">

                                                        @error('logo')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>                               
                                                </div><!--end form-group-->  

                                                <div class="form-group mb-2">
                                                    <label for="website">{{ __('Website Link') }}</label>                                            
                                                    <div class="input-group">
                                                        <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website"  autocomplete="website">

                                                        @error('website')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>                               
                                                </div><!--end form-group-->  

                                                <div class="form-group mb-2">
                                                    <label for="facebook">{{ __('Facebook Link') }}</label>                                            
                                                    <div class="input-group">
                                                        <input id="facebook" type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook"  autocomplete="facebook">

                                                        @error('facebook')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>                               
                                                </div><!--end form-group-->  

                                                <div class="form-group mb-2">
                                                    <label for="instagram">{{ __('instagram Link') }}</label>                                            
                                                    <div class="input-group">
                                                        <input id="instagram" type="text" class="form-control @error('instagram') is-invalid @enderror" name="instagram"  autocomplete="instagram">

                                                        @error('instagram')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>                               
                                                </div><!--end form-group-->  

                                                <div class="form-group mb-2">
                                                    <label for="info">{{ __('Info') }}</label>
                                                    <div class="input-group">                                                                                         
                                                        <textarea id="info" type="text" class="form-control @error('info') is-invalid @enderror" name="info" value="{{ old('info') }}" required autocomplete="info">Info about hospital</textarea>

                                                        @error('info')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>                                    
                                                </div><!--end form-group-->
                                                
                                                 <div class="form-group mb-2">
                                                    <label for="totalRating">{{ __('Total Rating out of 5') }}</label>
                                                    <div class="input-group">                                                                                         
                                                        <input id="totalRating" type="text" class="form-control @error('totalRating') is-invalid @enderror" name="totalRating" value="{{ old('totalRating') }}" required autocomplete="info">

                                                        @error('totalRating')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>                                    
                                                </div><!--end form-group-->
                    


                                                <div class="form-group mb-0 row">
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary btn-block waves-effect waves-light"  type="button" id="registerButton">Register <i class="fas fa-sign-in-alt ml-1"></i></button>
                                                    </div><!--end col--> 
                                                </div> <!--end form-group-->
                                            </form><!--end form-->
                                            <p class="my-3 text-muted">Already have an account ?<a href="/login" class="text-primary ml-2">Log in</a></p>                                                    
                                        </div>
                                    </div>
                                </div><!--end card-body-->
                                <div class="card-body bg-light-alt text-center">
                                    <span class="text-muted d-none d-sm-inline-block">Halfpast © 2020</span>                                            
                                </div>
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
        <!-- End Log In page -->

        <!-- jQuery  -->
        <script src="/js/jquery.min.js"></script>
        <script src="/js/bootstrap.bundle.min.js"></script>
        <script src="/js/waves.js"></script>
        <script src="/js/feather.min.js"></script>
        <script src="/js/simplebar.min.js"></script>
        <script type="text/javascript">
            
                (function () {
                    var year_start = 1850;
                    var year_end = (new Date).getFullYear(); //current year
                    var selected_year = 1992; // 0 first option

                    var option = '<option>year</option>';  //first option

                    for (var i = 0; i <= (year_end - year_start); i++) {
                        var year = (year_start+i);
                        var selected = (year == selected_year) ? ' selected' : '';
                        option += '<option value="' + year + '"'+selected+'>' + year + '</option>';
                    }
                    document.getElementById('year').innerHTML = option;
                })();    
        </script>
        
    </body>


</html>
