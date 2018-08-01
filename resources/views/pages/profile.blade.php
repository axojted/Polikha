@extends('index')
@section('content')
    <section class="profile-header-container">
        <div class="container pt-5 pb-3">
            <div class="row pt-5">
                <div class="col-12 d-flex flex-column pt-2">
                    <img src="/storage/avatar/{{$array['user']->avatar}}" class=" mx-auto" alt="" width="150px" height="130px">
                    <h1 class="text-center profile-name-text">{{$array['user']->first}} {{$array['user']->last}}</h1>
                    <div class="text-center">
                        <a href="#" title="facebook"><i class="social-medias text-dark fa fa-facebook"></i></a>
                        <a href="#" title="twitter"><i class="social-medias text-dark fa fa-twitter"></i></a>
                        <a href="#" title="instagram"><i class="social-medias text-dark fa fa-instagram"></i></a>
                    </div>
                    @if($array['user']->description)
                        <p class="lead text-center w-25 profile-desc-text mx-auto">{{$array['user']->description}}</p>
                    @endif
                </div>
                <div class="col-12 d-flex d-column">
                    @if(!auth()->check())
                    @elseif(Route::is('profile'))
                    <a href="/profile-settings" class="btn-settings btn-customs mx-auto d-inline-block">Settings</a>
                    @elseif(Route::is('view-profile'))
                        @if(\App\Follow::where('user_id',$array['user']->id)->where('follower_id',auth()->id())->first())
                            <a href="/follow" alt="{{auth()->id()}}" name="{{$array['user']->id}}" class="btn-unfollow btn-customs ml-auto mr-1 d-inline-block" id="follow-btn">Unfollow</a>
                        @else
                            <a href="/follow" alt="{{auth()->id()}}" name="{{$array['user']->id}}" class="btn-follow btn-customs ml-auto mr-1 d-inline-block" id="follow-btn">Follow</a>
                        @endif
                        <a href="/message" class="btn-message btn-customs d-inline-block ml-1 mr-auto" id="message-btn">Message</a>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="bg-dark">
        <div class="container">
            <div class="row py-1">
                <div class="col-2 ml-auto text-center">
                    <h5 class="text-light m-0">Followers</h5>
                    <p class="m-0 profile-counter-text">12</p>
                </div>
                <div class="col-2 text-center">
                    <h5 class="text-light m-0">Likes</h5>
                    <p class="m-0 profile-counter-text">{{$array['likes']}}</p>
                </div>
                <div class="col-2 mr-auto text-center">
                    <h5 class="text-light m-0">Contributions</h5>
                    <p class="m-0 profile-counter-text">{{count($array['user']->posts)}}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="profile-post-section">
        <div class="container pb-5">
            <div class="row pt-3 pb-5">
                <div class="col-4">
                    @if($_GET['post'] == '1')
                        <a href="{{url()->current()}}?post=1&sort={{$_GET['sort']}}" class="h3 profile-active-btn">Photos</a>
                        <a href="{{url()->current()}}?post=2&sort={{$_GET['sort']}}" class="h3 profile-inactive-btn">Articles</a>
                    @elseif($_GET['post'] == '2')
                        <a href="{{url()->current()}}?post=1&sort={{$_GET['sort']}}" class="h3 profile-inactive-btn">Photos</a>
                        <a href="{{url()->current()}}?post=2&sort={{$_GET['sort']}}" class="h3 profile-active-btn">Articles</a>
                    @endif
                </div>
                <div class="col-4 ml-auto text-right mt-auto">
                    @if($_GET['sort'] == 'latest')
                        <a href="{{url()->current()}}?post={{$_GET['post']}}&sort=latest" class="profile-active-btn">Latest</a>
                        <a href="{{url()->current()}}?post={{$_GET['post']}}&sort=popular" class="profile-inactive-btn">Popular</a>
                    @elseif($_GET['sort'] == 'popular')
                        <a href="{{url()->current()}}?post={{$_GET['post']}}&sort=latest" class="profile-inactive-btn">Latest</a>
                        <a href="{{url()->current()}}?post={{$_GET['post']}}&sort=popular" class="profile-active-btn">Popular</a>
                    @endif
                </div>
            </div>
            <div class="row pb-5" id="post-holder">
                @if(count($array['posts']) >0)
                    @foreach($array['posts'] as $post)
                        @if($post->type == 'photo')
                        <div class="col-4 profile-photo-cont sample-photo" style="background:url('/storage/cover_images/{{$post->cover_image}}')">
                            <a href="{{$post->id}}"></a>
                        </div>
                        @elseif($post->type == 'article')
                        
                        @endif
                    @endforeach
                @else
                    <h1>No posts yet.</h1>
                @endif
            </div>
        </div>
    </section>
@endsection