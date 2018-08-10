@extends('admin.index')
@section('content')
<canvas id="canvas-background" class="position-fixed"></canvas>
    <section class="h-100 admin-login-section">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-md-6 py-5 my-auto mx-auto">
                    <form action="{{route('login')}}" role="form" method="post" class="form custom-form">
                        {{csrf_field()}}
                        <h1 class="mb-3 text-center">Admin Login</h1>
                        <div class="form-group mb-0">
                            <input type="text" placeholder="Username*" name="username" id="username" class="form-control custom-input-start" autofocus>
                        </div>
                        <div class="form-group mt-0">
                            <input type="password" placeholder="Password*" name="password" id="password" class="form-control custom-input-end">
                            <a href="/password-forgot" class="btn btn-link text-dark">Forgot Password?</a>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="LOGIN" name="submit" id="submit" class="btn btn-dark btn-block">
                        </div>
                        @if(session('message'))
                        <div class="form-group">
                            <p>{{session('message')}}</p>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection