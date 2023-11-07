@extends('web.layouts.master')

@section('page_name') {{ __('lang.board_members') }} @endsection


@section('style')
    <link rel="stylesheet" href="{{asset('css/Staff.css?v=1.1')}}">
@endsection

@section('content')

    <div class="showStaff">
        <div class="member">
            <div class="StaffMemberWithImage">
                @if (app()->getLocale() == 'ar')
                    <div class="title">
                        <h1>{{ $team_member->name }}</h1>
                        <p>{{ $team_member->position }}</p>
                    </div>
                @else
                    <div class="title">
                        <h1>{{ $team_member->name_en }}</h1>
                        <p>{{ $team_member->position_en }}</p>
                    </div>
                @endif
                <a class="staffImage" href="{{ route('web.team_members.show',$team_member->id) }}" aria-label="{{ $team_member->name }}"><div style="--background: url(../storage/{{str_replace("\\" , "/",$team_member->image)}})"></div></a>
                <div class="socialMedia">
                    @forelse(App\Models\SocialMediaStaff::where('board_name',$team_member->id)->get() as $socialMedia)
                        <a class="social" href="{{$socialMedia->link}}" aria-label="{{ $team_member->name . ' ' . $socialMedia->title }}"><img src="/storage/{{$socialMedia->image}}" alt="{{$socialMedia->title}}" width="40" height="40"></a>
                    @empty
                    @endforelse
                </div>
            </div>
            <div class="description">
                @if (app()->getLocale() == 'ar')
                    <p >{!! $team_member->details !!}</p>
                @else
                    <p >{!! $team_member->details_en !!}</p>
                @endif
            </div>
        </div>
    </div>
@endsection

