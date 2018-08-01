@extends('index')
@section('content')
    <section>
        <div class="container py-5">
            <div class="row py-5">
                <div class="col-6 py-5 my-5">
                    <h1>Why do you need to set your <b>Username</b>?</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut sit repellendus in dicta velit, cum fuga. Illum nobis expedita ullam. Sequi, placeat fugiat quidem consequatur dolores sit quasi illum! Delectus recusandae ex nisi non harum!</p>
                </div>
                <div class="col-4 mx-auto py-5 my-5">
                    <form action="{{route('set-profile-store')}}" method="post" role="form">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="username" class="text-dark lead mt-5"><b>Username</b></label>
                            <input type="text" name="username" id="username" placeholder="Username*" class="form-control">
                        </div>
                        <div class="form-group ml-auto d-flex">
                            <input type="submit" name="submit" id="submit" value="SET" class="btn btn-dark btn-customs ml-auto">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection