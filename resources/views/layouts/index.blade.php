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
<section>
    <div class="container py-5">
        <div class="row py-5">
            <div class="col-12">
                <h1>Articles</h1>
                @if(isset($posts))
                    @if(count($posts['articles']) > 0)
                    <div class="card-columns articles-column">
                        @foreach($posts['articles'] as $article)
                        <div class="card">
                            <img src="/storage/cover_images/{{$article->cover_image}}" alt="{{$article->user->last . "'s Article Cover Image"}}" class="card-img-top">
                            <div class="card-body">
                                <h4 class="p-0 mb-auto">
                                    <img src="/storage/avatar/{{$article->user->avatar}}" class="photo-list-avatar" width="50px" height="50px" alt="">                                    
                                    <a href="/view-profile/{{$article->user->id}}" class="text-secondary">{{$article->user->first}} {{$article->user->last}}</a>
                                </h4>
                                <h4 class="card-title index-article-title">{{$article->title}}</h4>
                                <p class="card-text index-article-body">{{$article->body}}</p>
                                <p class="text-secondary article-list-counters p-0 pt-3 m-0">
                                    <i class="article-list-likes like-counter" alt="{{$article->id}}">{{$article->likes}}</i> likes
                                    <i class="article-list-dislike dislike-counter" alt="{{$article->id}}">{{count($article->reactions->where('reaction','dislike'))}}</i> dislikes
                                </p>
                                @if(auth()->check())
                                <p class="text-light photo-list-reacts d-flex mb-0">
                                    @if(count($article->reactions->where('user_id',auth()->id())->where('reaction','like')) > 0)
                                        <a href="/react" class="text-dark react-btn like-btn react-btn-active pr-3" name="{{$article->id}}" alt="like">Like</a>
                                    @else
                                        <a href="/react" class="text-dark react-btn like-btn pr-3" name="{{$article->id}}" alt="like">Like</a>
                                    @endif
                                    @if(count($article->reactions->where('user_id',auth()->id())->where('reaction','dislike')) > 0)
                                        <a href="/react" class="text-dark react-btn react-btn-active dislike-btn" name="{{$article->id}}" alt="dislike">Dislike</a>
                                    @else 
                                        <a href="/react" class="text-dark react-btn dislike-btn" name="{{$article->id}}" alt="dislike">Dislike</a>
                                    @endif
                                    <span class="ml-auto text-muted">{{$article->created_at->diffForHumans()}}</span>
                                </p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                        <h5 class="text-muted">No Articles Yet.</h5>
                    @endif
                @else
                <h5 class="text-muted">No Articles Yet.</h5>
                @endif
            </div>
            <div class="col-12">
                <h1>Photos</h1>
                @if(isset($posts))
                    @if(count($posts['photos']) > 0)
                    <div class="card-columns">
                        @foreach($posts['photos'] as $photo)
                        <div class="card">
                            <img src="/storage/cover_images/{{$photo->cover_image}}" alt="{{$photo->user->last}}'s Photo Cover Image" class="card-img-top img-fluid">
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
                                        <a href="/react" class="text-light react-btn like-btn react-btn-active pr-3" name="{{$photo->id}}" alt="like">Like</a>
                                    @else
                                        <a href="/react" class="text-light react-btn like-btn pr-3" name="{{$photo->id}}" alt="like">Like</a>
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
                    @else
                        <h5 class="text-muted">No Articles Yet.</h5>
                    @endif
                @else
                <h5 class="text-muted">No Photos Yet.</h5>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection