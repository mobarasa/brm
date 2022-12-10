@extends('layouts.master', ['title' => 'Edit Event'])

@section('content')
<section class="white-smooth-wrapper no-margin">
    <div class="row">
        <div class="col-md-12">
            <!-------------- event-wrapper -------------->
            <div class="wrapper-head semi-head-border with-btn-head clearfix"">
                <h4>Edit Form</h4>
                <div class="btn-head-wrap">
                    <a href="{{ route('events.index') }}">Back</a>
                </div>
            </div>
            <form action="{{ route('events.update', $event) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="event-form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-wrapper-sm">
                                <label>Title</label>
                                <input type="text" name="title" id="title" value="{{ old('title', $event->title) }}" placeholder="Event title" required autofocus>
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- end of col-md-4 -->
                        <div class="col-md-12">
                            <div class="input-wrapper-sm">
                                <label>Location</label>
                                <input type="text" name="location" id="location" value="{{ old('location', $event->location) }}" placeholder="Event location e.g. Lurambi" required>
                                @error('location')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- end of col-md-4 -->
                        <div class="col-md-6">
                            <div class="input-wrapper-sm">
                                <label>Start Date</label>
                                <input class="date-1" type="text" name="start_date" id="start_date" value="{{ old('start_date', $event->start_date) }}" placeholder="YYYY-MM-DD" required>
                                @error('start_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- end of col-md-4 -->
                        <div class="col-md-6">
                            <div class="input-wrapper-sm">
                                <label>End Date</label>
                                <input class="date-2" type="text" name="end_date" id="end_date" value="{{ old('end_date', $event->end_date) }}" placeholder="YYYY-MM-DD" required>
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
                                    @foreach($categories as $id => $category)
                                    <option value="{{ $id }}" {{ ($event->category ? $event->category->id : old('category_id')) == $id ? 'selected' : '' }}>{{ $category }}</option>
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
                                    <option value="yes" {{old('published',$event->published)=="yes" ? 'selected':''}}>Yes</option>
                                    <option value="no" {{old('published',$event->published)=="no" ? 'selected':''}}>No</option>
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
                        <!-- end of col-md-4 -->
                        <div class="col-md-12">
                            <div class="input-wrapper-sm">
                                <label>Media Link</label>
                                <input type="text" name="media_link" id="media_link" value="{{ old('media_link', $event->media_link) }}"
                                    placeholder="e.g. youtube link">
                                @error('media_link')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-wrapper-sm">
                                <label>Content</label>
                                <textarea rows="3" name="content" id="content" required>{{ old('content', $event->content) }}</textarea>
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
                    <button type="submit" class="btn sm-custom-btn sm-save-btn pull-right">Update</button>
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
