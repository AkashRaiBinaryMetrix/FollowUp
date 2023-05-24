@extends('admin.layouts.master')

@section('title','Add Testimonial')

@section('content')       

  <div class="content-wrapper">

    <div class="row">

      <div class="col-md-2"></div>

      <div class="col-md-12 grid-margin stretch-card">

        <div class="card">

          <div class="card-body">

            <div class="row">

              <div class="col-md-9">

                <h4 class="card-title">Update Testimonial | Enter updated details and submit</h4>

              </div>

            </div>

            <form action="{{ url('admin/addUpdateTestimonialPage') }}" enctype="multipart/form-data" method="post" class="forms-sample">

              @csrf

              <div class="form-group row">

                <label for="title" class="col-sm-3 col-form-label">Title<span style="color:red">*</span></label>

                <div class="col-sm-9">

                  <input type="text" class="form-control" id="title" name="title" onkeyup="convertToSlug(this.value)" placeholder="Title" value="{{$aDetail->title}}">

                  @error('title')

                    <div class="invalid-error">{{ $message }}</div>

                  @enderror

                </div>

              </div>

              <div class="form-group row">

                <label for="long_description" class="col-sm-3 col-form-label">Description<span style="color:red">*</span></label>

                <div class="col-sm-9">

                  <textarea type="text" class="form-control" id="" name="description" placeholder="Long Description">{{$aDetail->description}}</textarea>

                  @error('long_description')

                   <div class="invalid-error">{{ $message }}</div>

                  @enderror

                </div>

              </div>

              <input type="hidden" name="id" value="{{$aDetail->id}}">
              <button type="submit" class="btn btn-primary mr-2">Update</button>

            </form>

            <div class="table-responsive">

              <table class="table">

                <thead>

                  <tr>

                    <th>Title</th>

                    <th>Description</th>

                    <th>Action</th>

                  </tr>

                </thead>

                <tbody>

                   @include('admin.testimonial.list')

                </tbody>

                <input type="hidden" id="route" name="route" value="admin/fetchUserData">

                <input type="hidden" name="hidden_page" id="hidden_page" value="1" />

                <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />

                <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="desc" />

              </table>

            </div>

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

    function convertToSlug(Text) {

        let slug = Text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');

        $('#slug').val(slug);

    }

  </script>

@endsection