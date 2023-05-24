@extends('admin.layouts.master')

@section('title','Manage Social Links')

@section('content')       

  <div class="content-wrapper">

    <div class="row">

      <div class="col-md-2"></div>

      <div class="col-md-8 grid-margin stretch-card">

        <div class="card">

          <div class="card-body">

            <div class="row">

              <div class="col-md-9">

                <h4 class="card-title">Manage Social Links</h4>

              </div>

            </div>

            <form action="{{ url('admin/create-sociallinks-process') }}" enctype="multipart/form-data" method="post" class="forms-sample">

              @csrf

              <div class="form-group row">

                <label for="title" class="col-sm-3 col-form-label">Facebook<span style="color:red">*</span></label>

                <div class="col-sm-9">

                  <input type="text" class="form-control" id="facebook" name="facebook" onkeyup="convertToSlug(this.value)" placeholder="Facebook" value="{{$facebook_value}}" required>

                </div>

              </div>

              <div class="form-group row">

                <label for="title" class="col-sm-3 col-form-label">Linked-In<span style="color:red">*</span></label>

                <div class="col-sm-9">

                  <input type="text" class="form-control" id="linkedin" name="linkedin" onkeyup="convertToSlug(this.value)" placeholder="Linked-In" value="{{$linkedin_value}}" required>

                </div>

              </div>

              <div class="form-group row">

                <label for="title" class="col-sm-3 col-form-label">Twitter<span style="color:red">*</span></label>

                <div class="col-sm-9">

                  <input type="text" class="form-control" id="twitter" name="twitter" onkeyup="convertToSlug(this.value)" placeholder="Twitter" value="{{$twitter_value}}" required>

                </div>

              </div>

              <div class="form-group row">

                <label for="title" class="col-sm-3 col-form-label">Instagram<span style="color:red">*</span></label>

                <div class="col-sm-9">

                  <input type="text" class="form-control" id="instagram" name="instagram" onkeyup="convertToSlug(this.value)" placeholder="Instagram" value="{{$instagram_value}}" required>

                </div>

              </div>

              <div class="form-group row">

                <label for="title" class="col-sm-3 col-form-label">Youtube<span style="color:red">*</span></label>

                <div class="col-sm-9">

                  <input type="text" class="form-control" id="youtube" name="youtube" onkeyup="convertToSlug(this.value)" placeholder="Youtube" value="{{$youtube_value}}" required>

                </div>

              </div>

              <div class="form-group row">

              <label for="title" class="col-sm-3 col-form-label">TikTok<span style="color:red">*</span></label>

              <div class="col-sm-9">

                <input type="text" class="form-control" id="tiktok" name="tiktok" onkeyup="convertToSlug(this.value)" placeholder="tiktok" value="{{$tiktok_value}}" required>

              </div>

              </div>

              <button type="submit" class="btn btn-primary mr-2">Submit</button>

            </form>

          </div>

        </div>

      </div>

      <div class="col-md-2"></div>

    </div>

  </div>

  <!-- content-wrapper ends -->

@endsection