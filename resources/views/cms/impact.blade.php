@extends('web.layouts.master')

@section('page_name') {{ __('lang.impact') }}@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/Impact.css?v=1.0')}}">
@endsection

@php
    $title = 'title' . '_' . app()->getLocale();
    $details = 'details' . '_' . app()->getLocale();
    $position = 'position' . '_' . app()->getLocale();
@endphp

@section('content')

    <section id="Impacts">
        <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h1 class="GeneralTitle">{{ __('lang.impact') }}</h1>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div>
        <div class="Impacts">
            @forelse ($impact_main_output as $title => $impact_main)
            <div class="Impact">
                <div class="title">
                    <h1>{{ $title }}</h1>
                </div>
                <div class="details">
                    @forelse ($impact_main as $item)
                            <p>{{ $item->$details }}</p>
                    @empty
                    @endforelse
                </div>
            </div>
            @empty
            @endforelse
        </div>

        <section id="numbers">
            <div class="title">
                <h1>{{ __('lang.achievements') }}</h1>
                <a href="/pages/impact">{{ __('lang.more') }} <img src="{{asset('img/nav/Arrow.svg')}}" alt="arrow" width="30" height="30"></a>
                <img class="persons-icons" src="{{asset('img/nav/persons-icons.svg')}}" alt="persons-icons" width="100" height="100">
            </div>
            <div class="glide slider-numbers">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        @forelse ($impact_numbers as $number)
                            @php
                                $title = 'title' . '_' . app()->getLocale();
                                $details = 'details' . '_' . app()->getLocale();
                                $position = 'position' . '_' . app()->getLocale();
                            @endphp
                            <li class="glide__slide">
                                <img src="{{ asset('storage/' . $number->image) }}" alt="{{ $number->$title }}" width="100" height="100">
                                <span  class="counter">{{ $number->number }}</span>
                                <p>{{ $number->$title }}</p>
                            </li>
                        @empty
                        @endforelse
                    </ul>
                </div>
                <div class="glide__arrows" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><span>&#8592;</span></button>
                    <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><span>&#8594;</span></button>
                </div>
                <div class="glide__bullets" data-glide-el="controls[nav]">
                    @forelse ($impact_numbers as $number)
                        <span class="glide__bullet" data-glide-dir="={{$number->id - 1}}" title="bullet"></span>
                    @empty
                    @endforelse
                </div>
            </div>
        </section>

        <div class="slider">
            <div class="glide AllImpacts">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        @forelse ($stories as $story)
                            <li class="glide__slide">
                                <a href="{{ route('web.stories.show',$story->id) }}">
                                    @php
                                        $title = 'title' . '_' . app()->getLocale();
                                        $details = 'details' . '_' . app()->getLocale();
                                        $position = 'position' . '_' . app()->getLocale();
                                    @endphp
                                    <img alt="{{$story->$title}}" src="{{ asset('storage/' . $story->image) }}">
                                    <h1>{{$story->$title}}</h1>
                                </a>
                            </li>
                        @empty
                        @endforelse
                    </ul>
                </div>
                <div class="glide__arrows" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><img src="{{asset('img/Home/blue-arrow.svg')}}" alt="blue-arrow" width="80px" height="80px"></button>
                    <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><img src="{{asset('img/Home/blue-arrow.svg')}}" alt="blue-arrow" width="80px" height="80px"></button>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script src="{{asset('js/Impact.js?v=1.0')}}"></script>
@endsection

