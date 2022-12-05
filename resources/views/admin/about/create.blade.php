@extends('layouts.master', ['title' => 'About Settings'])
@section('icon', 'circle-dollar-to-slot')
@section('content')
    <section class="white-smooth-wrapper no-margin">
        <div class="row">
            <div class="col-md-12">
                <div class="wrapper-head semi-head-border with-btn-head clearfix"">
                    <h4>Create Church History</h4>
                    <div class="btn-head-wrap">
                        <a href="{{ route('about.index') }}">Back</a>
                    </div>
                </div>

                <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="organization-form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-wrapper-sm">
                                    <label>About Image</label>
                                    <input type="file" name="upload_image" id="upload_image" value="{{ old('upload_image') }}">
                                    @error('upload_image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- end of col-md-12 -->
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
