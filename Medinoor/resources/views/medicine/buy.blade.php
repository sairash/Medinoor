@extends('layouts.app')

@section('content')
<div class="breadcumb_area bg-img" style="background-image: url(https://thumbs.dreamstime.com/b/black-medicine-bottle-icon-isolated-seamless-pattern-white-background-bottle-pill-sign-pharmacy-design-vector-black-medicine-185911551.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <div class="d-flex justify-content-center px-5">
                        <h1>Buy Medicine</h1>
                    </div>
                    <small>(Prescription required!)</small>
                </div>
            </div>
        </div>
    </div>
</div>

 <div class="checkout_area section-padding-80">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-6">
                <div class="checkout_details_area mt-50 clearfix">

                    <div>
                        <div class="row">
                            
                            <div class="col-12 mb-3">
                                <label for="type">What interval?</label>
                                <select class="w-100" id="type" name="type" >
                                    <option value="1">Only once</option>
                                    <option value="1">Every month</option>
                                    <option value="2">Every 2 months</option>
                                    <option value="3">Every 3 months</option>
                                    <option value="6">Every 6 months</option>
                                    <option value="12">Every 12 months</option>
                                </select>
                            </div>
                            <div>
                                <div class="col-12 mb-3">
                                    <label for="city">Images of Prescription</label>
                                    <input class="form-control"id="file-input" required type="file" name="multipleImage[]" multiple>
                                    @error('multipleImage')
                                    <script type="text/javascript">
                                        toastr.error('{{ $errors->first("multipleImage") }}')
                                    </script>
                                    @enderror
                                </div>

                            </div>
                                <button onclick="sendAll()" class="btn essence-btn">Get me my Medicine</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                <div class="order-details-confirmation">
                    <div class="cart-page-heading">
                        <h5>Content</h5>
                        <p>Prescription is Shown here</p>
                    </div>
                    <ul class="order-details-form mb-4">
                        <li><p id="status"></p><img id="output"></li>
                    </ul>
                    <div class="cart-page-heading">
                    </div>
                    <div id="preview" class="pb-4"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    function sendAll(argument) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method:'POST',
            url: 'buy',
            data:{interval: $('#type').find(":selected").text()},
        }).done(function(msg)
          {
            var prn = $('#preview');
            $('img.class3').each(function () {
                $.ajax({
                method:'POST',
                url: 'buy/photo',
                data:{post_id: msg.post_id, user_id: msg.user_id, data: this.src},
            });

          });
            window.location.href = "/medicine";
        });
    }
    const status = document.getElementById('status');
    const output = document.getElementById('output');
    function previewImages() {

      var $preview = $('#preview').empty();
      if (this.files) $.each(this.files, readAndPreview);
            

              function readAndPreview(i, file) {
                
                if (!/\.(jpe?g|png|gif|webp|svg)$/i.test(file.name)){
                  return alert(file.name +" is not an image");
                } // else...
                
                var reader = new FileReader();

                $(reader).on("load", function() {
                      
                    $preview.append($("<img/>", {src:this.result, height:100, class:'class3'}));
                });

                reader.readAsDataURL(file);
            
          }

        }

    $('#file-input').on("change", previewImages);
</script>

@endsection
