@extends('layouts.content')
@section('header')
<h1>{{ $event->title }}</h1>

@endsection
@section('content')
<article class="single-event">
    <section class="header">
        @if($event->photo)
            <img src="{{ asset('/storage/'. $event->photo) }}" alt="{{ $event->title }}" >
        @else
            <img src="/images/placeholder.jpg" alt="placeholder image">
        @endif
        <div class="details">
            <div class="when">
                <div class="icon">
                    @include('partials.icons.calendar')
                </div>
                <div class="text">
                <h3>When is it?</h3>
                <p> {{ \Carbon\Carbon::parse($event->start_date)->format('F j, Y') }} @if($event->end_date)- {{ \Carbon\Carbon::parse($event->end_date)->format('F j, Y') }} @endif </p>
                </div>
            </div>
            <div class="who">
                <div class="icon">
                    @include('partials.icons.user-group')
                </div>
                <div class="text">
                <h3>Who is it for?</h3>
                <p> {{$event->for}}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        {!! $event->body !!}
    </section>
    <section class="footer">
        <a href="/events">View All Events</a>
    </section>
</article>
@endsection
