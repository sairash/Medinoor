@extends('layouts.app')

@section('content')
<div class="breadcumb_area bg-img" style="background-image: url(https://thumbs.dreamstime.com/b/black-medicine-bottle-icon-isolated-seamless-pattern-white-background-bottle-pill-sign-pharmacy-design-vector-black-medicine-185911551.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <div class="d-flex justify-content-center px-5">
                        <h1>View Medicine</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <div class="checkout_area section-padding-80">
    <div class="container">
        <div class="text-break" style="width: 100%;">
            <button class="btn essence-btn mb-3" onclick='window.location.href = "/medicine/buy" '>Buy Medicines</button>
            <table class="table">
              <thead>
                <tr class='text-center'>
                  <th scope="row">Order Number</th>
                  <th>Interval</th>
                  <th>Starting</th>
                  <th>When Next</th>
                  <th>Valid</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($medicine_data as $value) {
                    if ($value->valid == true) {
                      echo "<tr style='cursor:default;' class='text-center'><th scope='row'>".$value->post_id."<td>".$value->interval."</td><td>2021-02-28</td><td>2021-02-28</td><td class='text-success'><i class='fa fa-check-circle'></i></td>";
                    }else{
                      echo "<tr style='cursor:default;' class='text-center'><th scope='row'>".$value->post_id."<td>".$value->interval."</td><td>2021-02-28</td><td>2021-02-28</td><td class='text-danger'><i class='fa fa-times-circle'></i></td>";
                    }
                  }
                ?>
              </tbody>
            </table>
            <h1 class="text-center"> Prescription </h1>
            <?php
              $images = explode(' ', $value->image);
              foreach ($images as $image) {
                echo('<div class="text-center"><img src="'.$image.'"></div><br>');
              }
            ?>
        </div>
    </div>
</div>

@endsection
