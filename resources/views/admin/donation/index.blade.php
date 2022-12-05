@extends('layouts.master', ['title' => 'Donation Settings'])
@section('icon', 'circle-dollar-to-slot')
@section('content')
    <section class="white-smooth-wrapper no-margin">
        <div class="row">
            <div class="col-md-12">
                <div class="wrapper-head semi-head-border with-btn-head clearfix"">
                    <h4>Donation Policy and Procedure</h4>
                    <div class="btn-head-wrap">
                        <a href="{{ route('settings') }}">Back</a>
                        @if (count($donate))
                        @foreach ($donate as $item)
                        <a href="{{ route('donations.edit', $item->id) }}">Edit</a>
                        @endforeach
                        @else
                        <a href="{{ route('donations.create') }}">Create</a>
                        @endif
                    </div>
                </div>

                <div class="main_policy_wrapper">
                    @forelse ($donate as $item)
                        {!! $item->content !!}
                    @empty
                    <div class="alert alert-warning">
                        <strong>Take note!</strong> In this area, there are no donation guidelines to list.
                    </div>
                    @endforelse
                 </div>
            </div>
            <!-- end of col-md-12 -->
        </div>
        <!-- end of row -->
    </section>
@endsection
