@extends('index')
@section('content')
    <section>
        <div class="container pt-5">
            <div class="row p-5">
                <form action="{{route('post-store')}}" method="post" role="form" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="type" value="article">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" placeholder="Title*" class="form-control" min="10">
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea name="body" id="body" class="form-control" min="100"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" name="cover_image" id="cover_image" >
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