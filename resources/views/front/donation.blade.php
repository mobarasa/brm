@extends('layouts.main')

@section('content')
    <div class="home">
        <div class="home_background" style="background-image: url({{ asset('fronts/images/events.jpg') }})"></div>
        <div class="home_content">
            <div class="container">
                <div class="row">
                    <div class="col d-flex flex-row align-items-center justify-content-start">
                        <div class="home_title">{{ __('Giving & Donations') }}</div>
                        <div class="breadcrumbs ml-auto">
                            <ul>
                                <li><a href="{{ route('page.index') }}">{{ __('Home') }}</a></li>
                                <li>{{ __('giving and donations') }}</li>
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
                        <div class="section_title">Donate now and make a difference</div>
                        <div class="section_subtitle">
                            Your help matters, no matter how big or small.
                        </div>
                    </div>
                </div>
            </div>
            <div class="row about_row">
                <div class="col-lg-12">
                    <div class="about_content">
                        <div class="about_text">
                            @forelse ($donate as $item)
                                {!! $item->content !!}
                            @empty
                            <div class="row h-100 justify-content-center align-items-center">
                                <h3>There currently no guideline to display.</h3>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
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
