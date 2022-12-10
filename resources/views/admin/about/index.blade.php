@extends('layouts.master', ['title' => 'About Settings'])
@section('icon', 'circle-dollar-to-slot')
@section('content')
    <section class="white-smooth-wrapper no-margin">
        <div class="row">
            <div class="col-md-12">
                <div class="wrapper-head semi-head-border with-btn-head clearfix"">
                    <h4>Church History</h4>
                    <div class="btn-head-wrap">
                        <a href="{{ route('settings') }}">Back</a>
                        @if (count($about))
                        @foreach ($about as $item)
                        @can('about_edit')
                            <a href="{{ route('about.edit', $item->id) }}">Edit</a>
                        @endcan
                        @endforeach
                        @else
                        @can('about_create')
                            <a href="{{ route('about.create') }}">Create</a>
                        @endcan
                        @endif
                    </div>
                </div>

                {{-- <div class="main_policy_wrapper"> --}}
                    @forelse ($about as $item)
                    <div>
                        <img src="{{ asset($item->image_exist ? 'storage/abouts/'.$item->upload_image : 'storage/default/no_image.jpg') }}" class="img-responsive" alt="">
                    </div>
                    <div style="margin-top: 20px;">
                        {!! nl2br($item->content) !!}
                    </div>
                    @empty
                    <div class="alert alert-warning">
                        <strong>Take note!</strong> In this area, there are no church history to list.
                    </div>
                    @endforelse
                 {{-- </div> --}}
            </div>
            <!-- end of col-md-12 -->
        </div>
        <!-- end of row -->
    </section>
@endsection
