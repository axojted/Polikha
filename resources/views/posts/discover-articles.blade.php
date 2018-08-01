@extends('index')
@section('content')
    <section>
        <div class="container py-5">
            <div class="row pt-5">
                <div class="col-12">
                    @if(url()->current() === route('discover-articles') )
                    <h2 class="mb-5"><b>Latest Articles</b></h2>
                    @elseif(url()->current() === route('popular-articles'))
                    <h2 class="mb-5"><b>Popular Articles</b></h2>
                    @endif
                </div>
                @if(isset($articles))
                @if(!count($articles)>0)
                <div class="col-12">
                    <p class="display-5 text-secondary">No Articles Posted.</p>
                </div>
                @else
                @foreach($articles as $article)
                <div class="col-6">
                    <div class="row article-list-container m-1">
                        <div class="col-6 article-list-image" style="background-image: url('storage/cover_images/{{$article->cover_image}}');"></div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row bg-darker p-2">
                                        <div class="col-3">
                                            @if(auth()->id() === $article->user->id)
                                            <a href="/profile" class="article-list-avatar d-inline-block custom-background-image"  style="background-image: url('storage/avatar/{{$article->user->avatar}}');"></a>
                                            @else
                                            <a href="/view-profile/{{$article->user->id}}" class="article-list-avatar d-inline-block custom-background-image"  style="background-image: url('storage/avatar/{{$article->user->avatar}}');"></a>
                                            @endif
                                        </div>
                                        <div class="col-9">
                                            @if(auth()->id() === $article->user->id)
                                                <a href="/profile" class="article-list-user d-inline text-light m-0">
                                            @else
                                                <a href="/view-profile/{{$article->user->id}}" class="article-list-user d-inline text-light m-0">
                                            @endif
                                                <h5 class="m-0">{{$article->user->first}} {{$article->user->last}}</h5>
                                            </a>
                                            <div class="article-list-hobbies m-0">
                                                <a href="" class="text-light">Read</a>
                                                <a href="" class="text-light">Write</a>
                                                <a href="" class="text-light">Learn</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 px-3">
                                    <h2 class="article-list-title text-center"><q>{{$article->title}}</q></h2>
                                    <a href="/view-post/{{$article->id}}" class="text-dark"><i>Continue Reading...</i></a>

                                </div>
                                <div class="col-12 pt-3">
                                    <p class="m-0"><i class="like-counter" alt='{{$article->id}}'>{{count($article->reactions->where('reaction','like'))}}</i> likes - <i class="dislike-counter" alt='{{$article->id}}'>{{count($article->reactions->where('reaction','dislike'))}}</i> dislikes</p>
                                    @if(auth()->check())
                                </div>
                                <div class="col-12 w-100 pb-3 d-flex">
                                    
                                    <span class="article-list-reacts">
                                        @if(count($article->reactions->where('user_id',auth()->id())->where('reaction','like')) > 0)
                                            <a href="/react" class="text-dark react-btn like-btn react-btn-active" name="{{$article->id}}" alt="like">Like</a>
                                        @else
                                            <a href="/react" class="text-dark react-btn like-btn" name="{{$article->id}}" alt="like">Like</a>
                                        @endif
                                        @if(count($article->reactions->where('user_id',auth()->id())->where('reaction','dislike')) > 0)
                                            <a href="/react" class="text-dark react-btn react-btn-active dislike-btn" name="{{$article->id}}" alt="dislike">Dislike</a>
                                        @else
                                            <a href="/react" class="text-dark react-btn dislike-btn" name="{{$article->id}}" alt="dislike">Dislike</a>
                                        @endif
                                        {{-- <a href="" class="text-dark">Report</a> --}}
                                    </span>
                                    @endif
                                    <i class="article-list-time ml-auto">{{$article->created_at->diffForHumans()}}</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                @endif
            </div>
        </div>
    </section>
@endsection