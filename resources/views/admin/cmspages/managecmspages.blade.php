@extends('admin.layouts.master')

@section('title','Manage CMS Pages')

@section('content')       

  <div class="content-wrapper">

    <div class="row">

      <div class="col-md-2"></div>

      <div class="col-md-8 grid-margin stretch-card">

        <div class="card">

          <div class="card-body">

            <div class="row">

              <div class="col-md-9">

                <h4 class="card-title">Manage CMS</h4>

              </div>

            </div>

            <div class="success-message" style="color:green">{{isset($message) ? $message : ''}}</div>
            <div class="error-message" style="color:red">{{isset($error) ? $error : ''}}</div>

            <h3>Our Story</h3>
            <form action="{{ url('admin/update-cms-process') }}" enctype="multipart/form-data" method="post" class="forms-sample">

              @csrf

              <div class="form-group row">

                <label for="long_description" class="col-sm-3 col-form-label">Description<span style="color:red">*</span></label>

                <div class="col-sm-9">

                  <textarea type="text" class="form-control" id="long_description" name="long_description" placeholder="Long Description" required>{{$data_privacy[0]->value}}</textarea>

                </div>

              </div>

              <input type="hidden" name="val" value="privacy_policy">
              <button type="submit" class="btn btn-primary mr-2">Submit</button>

            </form>

            <br/><br/>
            <h3>About Us</h3>
            <form action="{{ url('admin/update-cms-process') }}" enctype="multipart/form-data" method="post" class="forms-sample">

              @csrf

              <div class="form-group row">

                <label for="long_description" class="col-sm-3 col-form-label">Description<span style="color:red">*</span></label>

                <div class="col-sm-9">

                  <textarea type="text" class="form-control" id="long_description_privacy" name="long_description" placeholder="Long Description" required>{{$data_about[0]->value}}</textarea>

                </div>

              </div>

              <input type="hidden" name="val" value="about_us">
              <button type="submit" class="btn btn-primary mr-2">Submit</button>

            </form>

          </div>

        </div>

      </div>

      <div class="col-md-2"></div>

    </div>

  </div>

  <!-- content-wrapper ends -->

  <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

  <script type="text/javascript">

    CKEDITOR.replace('long_description', {

        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",

        filebrowserUploadMethod: 'form'

    });

    CKEDITOR.replace('long_description_privacy', {

        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",

        filebrowserUploadMethod: 'form'

    });

    CKEDITOR.replace('long_description_option1', {

filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",

filebrowserUploadMethod: 'form'

});

    function convertToSlug(Text) {

        let slug = Text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');

        $('#slug').val(slug);

    }

  </script>

@endsection