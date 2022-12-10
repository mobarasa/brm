@extends('layouts.master', ['title' => 'View Event'])

@section('content')
    <section class="white-smooth-wrapper no-margin">
        <div class="row">
            <div class="col-md-12">
                <div class="wrapper-head semi-head-border with-btn-head clearfix"">
                    <h4>{!! $event->title !!}</h4>
                    <div class="btn-head-wrap">
                        <a href="{{ route('events.index') }}">Back</a>
                    </div>
                </div>
                <img src="{{ asset($event->image_exist ? 'storage/events/'.$event->upload_image : 'storage/default/no_image.jpg') }}" class="img-responsive" alt="">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th scope="row">Writer</th>
                                <td>{{ $event->user->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Category</th>
                                <td>{{ $event->category->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Created at</th>
                                <td>{{ $event->created_at->format('d F Y') }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Published</th>
                                <td>
                                    @if ($event->published != 'yes')
                                        <div class="inactive">Inactive</div>
                                    @else
                                        <div class="active">Active</div>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {!! nl2br($event->content) !!}

            </div>
            <!-- end of col-md-12 -->
        </div>
        <!-- end of row -->
    </section>
@endsection
