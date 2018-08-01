@extends('index')
@section('content')
    <section class="active-background position-relative">
        <div class="container-fluid background-hider position-absolute"></div>
        <div class="container py-5 mt-5">
            <div class="row pt-5">
                <div class="col-md-6 pb-5 my-5">
                    <h1 class="display-3">Hooray, Welcome!</h1>
                    <p class="lead">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis aliquam culpa velit reiciendis, consectetur, explicabo, maiores fugiat accusantium vero tenetur minus similique fugit voluptatum pariatur officia inventore sequi debitis magni.</p>
                </div>
                <div class="col-md-6 py-5 my-5">
                    <form action="/login" role="form" method="post" class="form custom-form">
                        {{csrf_field()}}
                        <h1 class="mb-3 text-center">Login</h1>
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