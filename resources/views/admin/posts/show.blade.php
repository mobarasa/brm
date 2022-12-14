@extends('layouts.master', ['title' => 'View Post'])

@section('content')
    <section class="white-smooth-wrapper no-margin">
        <div class="row">
            <div class="col-md-12">
                <div class="wrapper-head semi-head-border with-btn-head clearfix"">
                    <h4>{!! $post->title !!}</h4>
                    <div class="btn-head-wrap">
                        <a href="{{ route('posts.index') }}">Back</a>
                    </div>
                </div>
                <img src="{{ asset($post->image_exist ? 'storage/images/posts/'.$post->upload_image : 'storage/default/no_image.jpg') }}" class="img-responsive" alt="">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th scope="row">Writer</th>
                                <td>{{ $post->user->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Category</th>
                                <td>{{ $post->category->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Created at</th>
                                <td>{{ $post->created_at->format('d F Y') }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Published</th>
                                <td>
                                    @if ($post->published != 'yes')
                                        <div class="inactive">Inactive</div>
                                    @else
                                        <div class="active">Active</div>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {!! nl2br($post->content) !!}

            </div>
            <!-- end of col-md-12 -->
        </div>
        <!-- end of row -->
    </section>
@endsection
