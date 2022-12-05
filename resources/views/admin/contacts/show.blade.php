@extends('layouts.master', ['title' => 'View Message'])

@section('content')
<section class="white-smooth-wrapper no-margin">
    <div class="row">
        <div class="col-md-12">
            <div class="wrapper-head semi-head-border with-btn-head clearfix"">
                <h4>{!! $contact->name !!}</h4>
                <div class="btn-head-wrap">
                    <a href="{{ route('contact.index') }}">Back</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th scope="row">Writer</th>
                            <td>{!! $contact->name !!}</td>
                        </tr>
                        <tr>
                            <th scope="row">Category</th>
                            <td>{{ $contact->email }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Created at</th>
                            <td>{{ $contact->created_at->format('d F Y') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {!! nl2br($contact->content) !!}

        </div>
        <!-- end of col-md-12 -->
    </div>
    <!-- end of row -->
</section>
@endsection
