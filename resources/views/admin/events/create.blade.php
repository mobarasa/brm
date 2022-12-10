@extends('layouts.master', ['title' => 'New Event'])

@section('content')
    <section class="white-smooth-wrapper no-margin">
        <div class="row">
            <div class="col-md-12">
                <!-------------- event-wrapper -------------->
                <div class="wrapper-head semi-head-border with-btn-head clearfix"">
                    <h4>Create Form</h4>
                    <div class="btn-head-wrap">
                        <a href="{{ route('events.index') }}">Back</a>
                    </div>
                </div>
                <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="event-form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-wrapper-sm">
                                    <label>Title</label>
                                    <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Event title" required autofocus>
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- end of col-md-4 -->
                            <div class="col-md-12">
                                <div class="input-wrapper-sm">
                                    <label>Location</label>
                                    <input type="text" name="location" id="location" value="{{ old('location') }}" placeholder="Event location e.g. Lurambi" required>
                                    @error('location')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- end of col-md-4 -->
                            <div class="col-md-6">
                                <div class="input-wrapper-sm">
                                    <label>Start Date</label>
                                    <input class="date-1" type="text" name="start_date" id="start_date" value="{{ old('start_date') }}" placeholder="YYYY-MM-DD" required>
                                    @error('start_date')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- end of col-md-4 -->
                            <div class="col-md-6">
                                <div class="input-wrapper-sm">
                                    <label>End Date</label>
                                    <input class="date-2" type="text" name="end_date" id="end_date" value="{{ old('end_date') }}" placeholder="YYYY-MM-DD" required>
                                    @error('end_date')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- end of col-md-4 -->
                            <div class="col-md-6">
                                <div class="input-wrapper-sm">
                                    <label>Category</label>
                                    <select name="category_id" id="category_id" required>
                                        <option value="" disabled selected>--- Select category ---</option>
                                        @foreach($categories as $id => $category)
                                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $category }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- end of col-md-4 -->
                            @can('event_publish')
                            <div class="col-md-6">
                                <div class="input-wrapper-sm">
                                    <label>Publish</label>
                                    <select name="published" id="published" required>
                                        <option value="" disabled selected>--- Select publish ---</option>
                                        <option value="yes" @if (old('published') == 'yes') {{ 'selected' }} @endif>Yes</option>
                                        <option value="no" @if (old('published') == 'no') {{ 'selected' }} @endif>No</option>
                                    </select>
                                    @error('published')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            @endcan
                            <!-- end of col-md-4 -->
                            <div class="col-md-12">
                                <div class="input-wrapper-sm">
                                    <label>Event Image</label>
                                    <input type="file" name="upload_image" id="upload_image" value="{{ old('upload_image') }}">
                                    @error('upload_image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- end of col-md-4 -->
                            <div class="col-md-12">
                                <div class="input-wrapper-sm">
                                    <label>Media Link</label>
                                    <input type="text" name="media_link" id="media_link" value="{{ old('media_link') }}"
                                        placeholder="e.g. youtube link">
                                    @error('media_link')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- end of col-md-4 -->
                            <div class="col-md-12">
                                <div class="input-wrapper-sm">
                                    <label>Content</label>
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
                <!-- end of post-wrapper -->
            </div>
            <!-- end of col-md-12 -->
        </div>
        <!-- end of row -->
    </section>
@endsection

@push('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/datepicker/css/bootstrap-datepicker.min.css') }}">
<script src="{{ asset('assets/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
    tinymce.init({
        selector:'textarea',
        promotion: false
        });
</script>
@endpush
@push('script')
<script src="{{ asset('assets/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script>
    $('.date-1, .date-2').datepicker({
        autoclose:true,
        format:'yyyy-mm-dd',
    });
</script>
@endpush
