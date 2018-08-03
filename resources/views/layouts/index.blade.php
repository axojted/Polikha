@extends('index')
@section('content')
<section class="main-background bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-12 h-100 position-relative">
                <h1 class="position-absolute">Polikha</h1>
            </div>
        </div>
    </div>
</section>
<section class="">
    <div class="container position-relative first-section">
        <div class="row h-100 clearfix">
            @if(isset($posts))
            @if(count($posts->all()))
            @foreach($posts as $post)
            <div class="col-4 post-blog d-flex flex-column p-0" style="background-image: url('/img/indexbg.jpg');">
                <span>
                    <h3><a href="">{{$post->title}}</a></h3>
                    <small>Created {{$post->created_at->diffForHumans()}}</small>
                    <p>By <a href="">{{$post->user->first}}{{$post->user->last}}</a></p>
                </span>
            </div>
            @endforeach
            @endif
            @endif
        </div>
    </div>
</section>
@endsection