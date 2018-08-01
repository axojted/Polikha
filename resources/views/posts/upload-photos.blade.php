@extends('index')
@section('content')
    <section>
        <div class="container pt-5">
            <div class="row p-5">
                <form action="{{route('post-store')}}" method="post" role="form" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="type" value="photo">
                    <div class="form-group">
                        <input type="file" name="cover_image" id="cover_image" multiple>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" value="POST" class="btn btn-dark">
                    </div>
                    @include('layouts.err')
                </form>
            </div>
        </div>
    </section>
@endsection