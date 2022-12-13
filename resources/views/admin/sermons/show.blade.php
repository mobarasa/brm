@extends('layouts.master', ['title' => 'View Sermon'])

@section('content')
    <section class="white-smooth-wrapper no-margin">
        <div class="row">
            <div class="col-md-12">
                <div class="wrapper-head semi-head-border with-btn-head clearfix"">
                    <h4>{!! $sermon->title !!}</h4>
                    <div class="btn-head-wrap">
                        <a href="{{ route('sermons.index') }}">Back</a>
                    </div>
                </div>
                <img src="{{ asset($sermon->image_exist ? 'storage/images/sermons/'.$sermon->upload_image : 'storage/default/no_image.jpg') }}" class="img-responsive" alt="">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th scope="row">Writer</th>
                                <td>{{ $sermon->user->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Category</th>
                                <td>{{ $sermon->category->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Created at</th>
                                <td>{{ $sermon->created_at->format('d F Y') }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Published</th>
                                <td>
                                    @if ($sermon->published != 'yes')
                                        <div class="inactive">Inactive</div>
                                    @else
                                        <div class="active">Active</div>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {!! nl2br($sermon->content) !!}

            </div>
            <!-- end of col-md-12 -->
        </div>
        <!-- end of row -->
    </section>
@endsection
