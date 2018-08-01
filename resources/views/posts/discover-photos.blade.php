@extends('index')
@section('content')
    <section class="p-5">
        <div class="container p-5">
            <div class="row">
                <div class="col-12">
                    @if(url()->current() === route('discover-photos') )
                    <h2 class="mb-5"><b>Latest Photos</b></h2>
                    @elseif(url()->current() === route('popular-photos'))
                    <h2 class="mb-5"><b>Popular Photos</b></h2>
                    @endif
                </div>
                @if(isset($photos) && count($photos->all()))
                    @foreach($photos as $photo)
                        <div class="col-4 d-flex photo-list-container custom-background-image p-0" style="background-image:url('/storage/cover_images/{{$photo->cover_image}}');">
                            <div class="photo-list-desc row mx-0 position-relative">
                                <div class="col-2 p-3">
                                    <img src="/storage/avatar/{{$photo->user->avatar}}" alt="" width="35px" height="35px" class="photo-list-avatar">
                                </div>
                                <div class="col-10">
                                    <h4 class="text-light m-0 p-0">{{$photo->user->first}} {{$photo->user->last}}</h4>
                                    <p class="text-light photo-list-counters p-0 m-0">
                                        <i class="photo-list-likes like-counter" alt="{{$photo->id}}">{{$photo->likes}}</i> likes
                                        <i class="photo-list-dislike dislike-counter" alt="{{$photo->id}}">{{count($photo->reactions->where('reaction','dislike'))}}</i> dislikes
                                    </p>
                                    {{-- 
                                        <p class="m-0"><i class="like-counter" alt='{{$article->id}}'>{{count($article->reactions->where('reaction','like'))}}</i> likes - <i class="dislike-counter" alt='{{$article->id}}'>{{count($article->reactions->where('reaction','dislike'))}}</i> dislikes</p>
                                        <a href="/react" name="{{$photo->id}}" alt="like" class="react-btn like-btn">like</a> |
                                        <a href="/react" name="{{$photo->id}}" alt="dislike" class="react-btn dislike-btn">dislike</a>
                                     --}}
                                     @if(auth()->check())
                                    <p class="text-light photo-list-reacts">
                                        @if(count($photo->reactions->where('user_id',auth()->id())->where('reaction','like')) > 0)
                                            <a href="/react" class="text-light react-btn like-btn react-btn-active" name="{{$photo->id}}" alt="like">Like</a>
                                        @else
                                            <a href="/react" class="text-light react-btn like-btn" name="{{$photo->id}}" alt="like">Like</a>
                                        @endif
                                        @if(count($photo->reactions->where('user_id',auth()->id())->where('reaction','dislike')) > 0)
                                            <a href="/react" class="text-light react-btn react-btn-active dislike-btn" name="{{$photo->id}}" alt="dislike">Dislike</a>
                                        @else 
                                            <a href="/react" class="text-light react-btn dislike-btn" name="{{$photo->id}}" alt="dislike">Dislike</a>
                                        @endif
                                    </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                <div class="col-12">
                    <p class="display-5 text-secondary">No Photos Posted.</p>
                </div>
                @endif
            </div>
        </div>
    </section>
@endsection