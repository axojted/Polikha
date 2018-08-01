@extends('index')
@section('content')
    <section class="active-background position-relative">
        <div class="container-fluid background-hider position-absolute"></div>
        <div class="container pt-5">
            <div class="row p-5">
                <div class="col-md-6 py-5 my-5">
                    <h1 class="display-3">Join Our Community!</h1>
                    <p class="lead">Be one of us and start contributing with us. Gain popularity by posting good articles and amazing photos. Create an outstanding album using our website and immortalize the memories. Share your greatest ideas, arts, articles, words, and many more.</p>
                </div>
                <div class="col-md-6 py-5 my-5">
                    <form action="/signup" role="form" method="post" class="form custom-form">
                        {{csrf_field()}}
                        <h1 class="mb-3 text-center">Signup</h1>
                        <div class="form-group mb-0">
                            <input type="text" placeholder="First Name*" name="first" id="first" class="form-control custom-input-start" autofocus>
                            <input type="text" placeholder="Last Name*" name="last" id="last" class="form-control custom-input-center">
                        </div>
                        <div class="form-group mb-0">
                            <input type="email" placeholder="E-Mail*" name="email" id="email" class="form-control custom-input-center">
                        </div>
                        <div class="form-group mt-0">
                            <input type="password" placeholder="Password*" name="password" id="password" class="form-control custom-input-end">
                            <a href="/login" class="btn btn-link text-dark">Already have an account?</a>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="JOIN" name="submit" id="submit" class="btn btn-dark btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection