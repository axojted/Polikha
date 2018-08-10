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
                <div class="col-12">
                    <div class="card-columns">
                        @foreach($photos as $photo)
                        <div class="card">
                            <img src="/storage/cover_images/{{$photo->cover_image}}" alt="" class="card-img-top">
                            <div class="card-img-overlay d-flex flex-column">
                                <h4 class="text-light p-0 mb-auto">
                                <img src="/storage/avatar/{{$photo->user->avatar}}" class="photo-list-avatar" width="50px" height="50px" alt="">                                    
                                    {{$photo->user->first}} {{$photo->user->last}}</h4>
                                <p class="text-light photo-list-counters p-0 m-0">
                                    <i class="photo-list-likes like-counter" alt="{{$photo->id}}">{{$photo->likes}}</i> likes
                                    <i class="photo-list-dislike dislike-counter" alt="{{$photo->id}}">{{count($photo->reactions->where('reaction','dislike'))}}</i> dislikes
                                </p>
                                @if(auth()->check())
                                <p class="text-light photo-list-reacts d-flex mb-0">
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
                                    <span class="ml-auto">{{$photo->created_at->diffForHumans()}}</span>
                                </p>
                                @endif
                                
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="col-12">
                    <p class="display-5 text-secondary">No Photos Posted.</p>
                </div>
                @endif
            </div>
        </div>
    </section>
@endsection