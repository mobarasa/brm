@extends('layouts.master', ['title' => 'Donation Settings'])
@section('icon', 'circle-dollar-to-slot')
@section('content')
    <section class="white-smooth-wrapper no-margin">
        <div class="row">
            <div class="col-md-12">
                <div class="wrapper-head semi-head-border with-btn-head clearfix"">
                    <h4>Create Donation Policy and Procedure</h4>
                    <div class="btn-head-wrap">
                        <a href="{{ route('donations.index') }}">Back</a>
                    </div>
                </div>

                <form action="{{ route('donations.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="organization-form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-wrapper-sm">
                                    <textarea rows="3" name="content" id="content">{{ old('content') }}</textarea>
                                    @error('content')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- end of col-md-12 -->
                        </div>
                        <!-- end of row -->
                    </div>
                    <div class="form-footer clearfix">
                        <button type="submit" class="btn sm-custom-btn sm-save-btn pull-right">Save</button>
                    </div>
                </form>
            </div>
            <!-- end of col-md-12 -->
        </div>
        <!-- end of row -->
    </section>
@endsection

@push('style')
<script src="{{ asset('assets/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
    tinymce.init({
        selector:'textarea',
        promotion: false
        });
</script>
@endpush
