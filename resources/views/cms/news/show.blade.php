@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
    $details = 'details' . '_' . app()->getLocale();
@endphp

@section('page_name')
    {{ $new->$title }}
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/MediaCenter.css') }}">
@endsection

@section('content')
    <section class="ShowNew new{{ $new->id }}">
        <h1>{{ $new->$title }}</h1>
        <p>{{ $date }}</p>
        <img src="/storage/{{ $new->image }}" alt="{{ $new->title }}">
        <p>{!! $new->$details !!}</p>
    </section>
    <aside>
        <h1>{{ __('lang.read_too') }}</h1>
        <div class="news">
            @forelse($other_news as $new)
                @include('cms.news.components.news_item')
            @empty
            @endforelse
        </div>
    </aside>
@endsection

{{-- <script>
    function changeImage(image_src){
        $('#main-image').attr("src",image_src);
        $('#main-image').parent().css("opacity", "1 !important")
    }
</script> --}}
