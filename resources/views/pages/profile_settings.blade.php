@extends('index')
@section('content')
    <section>
        <div class="container py-5">
            <div class="row pt-5">
                <div class="col-6 mx-auto d-flex flex-column">
                    <form action="/profile-settings" id="profile-setting-form" method="post" class="custom-form profile-setting-form" enctype="multipart/form-data
                        {{csrf_field()}}
                        <div class="form-group d-flex profset-avatar-holder">
                            <img src="../storage/avatar/{{auth()->user()->avatar}}" id="profile-setting-avatar" alt="profile-avatar" width="150px" height="130px" class="profile-setting-avatar">
                        </div>
                        <div class="form-group my-3 d-flex">
                            <label for="avatar" class="btn btn-dark btn-customs mx-auto file-label">CHANGE AVATAR</label>
                            <input type="file" name="avatar" id="avatar" class="d-none" alt="{{route('change-avatar')}}">
                        </div>
                        <div class="form-group d-flex">
                            <label for="">Username</label>
                            <input type="text" name="username" id="username" class="form-control custom-input-start">
                        </div>
                        <div class="form-group d-flex">
                            <label for="">Last Name</label>
                            <input type="text" name="last" id="last" class="form-control custom-input-center">
                        </div>
                        <div class="form-group d-flex">
                            <label for="">First Name</label>
                            <input type="text" name="first" id="first" class="form-control custom-input-center">
                        </div>
                        <div class="form-group d-flex">
                            <label for="">Email</label>
                            <input type="text" name="email" id="email" class="form-control custom-input-center">
                        </div>
                        <div class="form-group d-flex">
                            <label for="">Number</label>
                            <input type="text" name="number" id="number" class="form-control custom-input-center">
                        </div>
                        <div class="form-group d-flex">
                            <label for="">Facebook</label>
                            <input type="text" name="facebook" id="facebook" class="form-control custom-input-center">
                        </div>
                        <div class="form-group d-flex">
                            <label for="">Twitter</label>
                            <input type="text" name="twitter" id="twitter" class="form-control custom-input-center">
                        </div>
                        <div class="form-group d-flex">
                            <label for="">Instagram</label>
                            <input type="text" name="instagram" id="instagram" class="form-control custom-input-end">
                        </div>
                        <div class="form-group d-flex mt-3">
                            <label for="">Description</label>
                            <textarea name="description" id="description" class="form-control custom-input-center"></textarea>
                        </div>
                        <div class="form-group d-flex mt-3">
                            <input type="submit" name="submit" value="SAVE" class="btn btn-dark btn-customs ml-auto">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection