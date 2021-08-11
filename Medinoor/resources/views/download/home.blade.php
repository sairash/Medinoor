@extends('layouts.app')

@section('content')
<style type="text/css">
 
 
  body .container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }
  body .container > div {
    flex-basis: 100%;
    width: 0;
  }
  body .container .button {
    margin: 16px;
  }
  @media (max-width: 400px) {
    body .container .button {
      margin: 12px;
    }
  }
  body .dribbble {
    position: fixed;
    display: block;
    right: 20px;
    bottom: 20px;
  }
  body .dribbble img {
    display: block;
    height: 28px;
  }
</style>
<div class="container p-5">

   <h1> Android

    <a href="https://drive.google.com/uc?export=download&id=11EGYo2PRMA5F3eoaYNLXvgJ-kEu9FQwC" target="_blank" class="button dark-single">
        Download
    </a></h1>

    <div></div>

   <h1> IOS Apple
    <a href="/adorio/medinoor.ipa" class="button white-single">
        Download
    </a></h1>


@endsection
