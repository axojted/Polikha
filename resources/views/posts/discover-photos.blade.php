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
                <div class="col-4 position-relative photo-list-container custom-background-image" style="background-image:url('/storage/cover_images/{{$photo->cover_image}}');">
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