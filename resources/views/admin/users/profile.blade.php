@extends('layouts.master', ['title' => 'Profile Information'])
@section('icon', 'circle-dollar-to-slot')
@section('content')

<section class="white-smooth-wrapper no-margin">
    <div class="row">
        <div class="col-md-12">
            @livewire('show-profile')

            @livewire('show-password')
        </div>
        <!-- end of col-md-12 -->
    </div>
</section>

@endsection

@push('style')
<style>
    .success-message {
        background-color: #b3fbbe;
        border: 1px solid #c2fcc4;
        display: block;
        text-align: center;
        padding: 5px 20px;
    }

    .success-text {
        color: #138a01;
        font-family: Helvetica, Arial, sans-serif;
        font-size: 10px;
        font-weight: bold;
        line-height: 20px;
        text-shadow: 1px 1px rgba(250,250,250,.3);
    }

    .error-message {
        background-color: #fab8ab;
        border: 1px solid #f4a597;
        display: block;
        text-align: center;
        padding: 5px 20px;
    }

    .error-text {
        color: #f52707;
        font-family: Helvetica, Arial, sans-serif;
        font-size: 10px;
        font-weight: bold;
        line-height: 20px;
        text-shadow: 1px 1px rgba(250,250,250,.3);
    }
</style>
@endpush

@push('script')
<script>
    $(function() {
        setTimeout(function() { $("#hideMe").fadeOut(1500); }, 5000)
    })
</script>
@endpush
