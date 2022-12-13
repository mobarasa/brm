@extends('layouts.main')

@section('content')
    <div class="home">
        <div class="home_background" style="background-image: url({{ asset('fronts/images/events.jpg') }})"></div>
        <div class="home_content">
            <div class="container">
                <div class="row">
                    <div class="col d-flex flex-row align-items-center justify-content-start">
                        <div class="home_title">{{ __('About') }}</div>
                        <div class="breadcrumbs ml-auto">
                            <ul>
                                <li><a href="{{ route('page.index') }}">{{ __('Home') }}</a></li>
                                <li>{{ __('About') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="about">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title_container text-center">
                        <div class="section_title">About Believers Revival Mission</div>
                        <div class="section_subtitle">
                            It's the start of an amazing journey of faith
                        </div>
                    </div>
                </div>
            </div>
            <div class="row about_row">
                <div class="col-lg-12">
                    <div class="about_content">
                        <div class="about_text">
                           @forelse ($about as $item)
                               {!! $item->content !!}
                           @empty
                            <div class="row h-100 justify-content-center align-items-center">
                                <h3>There currently no church summary to display.</h3>
                            </div>
                           @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mission">
        @include('layouts.partials.mission')
    </div>

    <div class="team">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title_container text-center">
                        <div class="section_title">our leaders</div>
                        <div class="section_subtitle">
                            It’s leader of a Christian congregation
                        </div>
                    </div>
                </div>
            </div>
            <div class="row team_row">

                @forelse ($users as $item)
                <div class="col-lg-4 team_col">
                    <div class="team_item">
                        <div class="team_image">
                            <img src="{{ asset($item->image_exist ? 'storage/images/users/'.$item->upload_image : 'storage/default/no_avatar.png') }}" class="img-responsive" alt="" style="height:360px;">
                            <div class="team_overlay d-flex flex-column align-items-center justify-content-end text-center trans_200">
                                <div class="team_overlay_text">
                                    <p>
                                        {!! Str::limit($item->content, $limit = 125, $end = '...') !!}
                                    </p>
                                </div>
                                <div class="team_overlay_contact">
                                    <ul>
                                        <li>
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                            <div> : {{ $item->email }}</div>
                                        </li>
                                        <li>
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <div>: {{ $item->phone_number }}</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="team_content text-center">
                            <div class="team_name">{{ $item->name }}</div>
                            <div class="team_title">{{ $item->position }}</div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="row h-100 justify-content-center align-items-center">
                    <h3>There currently no church leaders to display.</h3>
                </div>
                @endforelse

            </div>
        </div>
    </div>
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('fronts/styles/about.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fronts/styles/about_responsive.css') }}">
@endpush

@push('script')
    <script src="{{ asset('fronts/js/about.js') }}"></script>
@endpush
