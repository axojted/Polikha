@extends('index')
@section('content')
    <section class="active-background position-relative">
        <div class="container-fluid background-hider position-absolute"></div>
        <div class="container py-5 mt-5">
            <div class="row pt-5">
                <div class="col-md-6 pb-5 my-5">
                    <h1 class="display-3">Contribute To Our Community!</h1>
                    <p class="lead">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis aliquam culpa velit reiciendis, consectetur, explicabo, maiores fugiat accusantium vero tenetur minus similique fugit voluptatum pariatur officia inventore sequi debitis magni.</p>
                </div>
                <div class="col-md-6 py-5 my-5">
                    <a href="/upload-photos" class="btn btn-dark">Photo</a>
                    <a href="/create-article" class="btn btn-dark">Article</a>
                </div>
            </div>
        </div>
    </section>
@endsection