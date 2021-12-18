@extends('layouts.master')

@section('content')
    <div id="carousel-dashboard" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        @php ($i=0)

        <ol class="carousel-indicators">
            @foreach ($images as $image)
                <button type="button" data-bs-target="#carousel-dashboard" data-bs-slide-to="{{$i}}" class="{{($i==0) ? 'active' : ''}}" aria-current="{{($i==0) ? 'true' : 'false'}}" aria-label="Slide {{$i + 1}}"></button>
                @php ($i++)
            @endforeach
        </ol>

        <!-- Wrapper for slides -->
        @php ($i=0)
        <div class="carousel-inner">
            @foreach ($images as $image)
            <div class="{{($i == 0) ? 'carousel-item active' : 'carousel-item'}}">
                <img src="{{asset('storage/carousel/'.$image->image_name)}}" alt="" class="d-block w-100">
            </div>
            @php ($i++)
            @endforeach
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-dashboard" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel-dashboard" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
@endsection