@extends('layouts.app')

@section('content')
<!-- ##### Header Area End ##### -->
<div class="alert alert-warning alert-dismissible fade show">
    DEMO User ACCOUNT: sairash@gmail.com || PASSWORD: 12345678
    <hr>
    DEMO Hospital ACCOUNT: birhospital@gmail.com || PASSWORD: 12345678
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Login</h2>
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

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-4">
                            <label for="email_address">Email Address</label>
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus value="">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="custom-control custom-checkbox d-block mb-2">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-12 mb-3 justify-content-center">
                            <div class="align-items-center" >
                                <button href="#" class="btn essence-btn btn-block"type="submit">Proceed</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <div class="checkout_area section-padding-80">-->
@endsection
