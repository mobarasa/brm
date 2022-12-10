@extends('layouts.master', ['title' => 'Edit Sermon'])

@section('content')
<section class="white-smooth-wrapper no-margin">
    <div class="row">
        <div class="col-md-12">
            <!-------------- sermon-wrapper -------------->
            <div class="wrapper-head semi-head-border with-btn-head clearfix"">
                <h4>Edit Form</h4>
                <div class="btn-head-wrap">
                    <a href="{{ route('sermons.index') }}">Back</a>
                </div>
            </div>
            <form action="{{ route('sermons.update', $sermon) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="sermon-form">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="input-wrapper-sm">
                                <label>Title</label>
                                <input type="text" name="title" id="title" value="{{ old('title', $sermon->title) }}" placeholder="Sermon title" required autofocus>
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- end of col-md-4 -->
                        <div class="col-md-4">
                            <div class="input-wrapper-sm">
                                <label>Bible Passage</label>
                                <input type="text" name="bible_passage" id="bible_passage" value="{{ old('bible_passage', $sermon->bible_passage) }}" placeholder="e.g. Proverbs 3:5–6" required>
                                @error('bible_passage')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- end of col-md-4 -->
                        <div class="col-md-8">
                            <div class="input-wrapper-sm">
                                <label>Preacher</label>
                                <input type="text" name="preacher" id="preacher" value="{{ old('preacher', $sermon->preacher) }}" placeholder="Preacher's Name" required>
                                @error('preacher')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- end of col-md-4 -->
                        <div class="col-md-4">
                            <div class="input-wrapper-sm">
                                <label>Date Preached</label>
                                <input class="demo-2" type="text" name="date_preached" id="date_preached" value="{{ old('date_preached', $sermon->date_preached) }}" placeholder=" YYYY-MM-DD" required>
                                @error('date_preached')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- end of col-md-4 -->
                        <div class="col-md-12">
                            <div class="input-wrapper-sm">
                                <label>Location</label>
                                <input type="text" name="location" id="location" value="{{ old('location', $sermon->location) }}" placeholder="Sermon location e.g. Lurambi" required>
                                @error('location')
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
                                    <option value="{{ $id }}" {{ ($sermon->category ? $sermon->category->id : old('category_id')) == $id ? 'selected' : '' }}>{{ $category }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- end of col-md-4 -->
                       @can('sermon_publish')
                       <div class="col-md-6">
                        <div class="input-wrapper-sm">
                            <label>Publish</label>
                            <select name="published" id="published" required>
                                <option value="yes" {{old('published',$sermon->published)=="yes" ? 'selected':''}}>Yes</option>
                                <option value="no" {{old('published',$sermon->published)=="no" ? 'selected':''}}>No</option>
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
                                <label>Cover Image</label>
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
                                <input type="text" name="media_link" id="media_link" value="{{ old('media_link', $sermon->media_link) }}"
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
                                <textarea rows="3" name="content" id="content">{{ old('content', $sermon->content) }}</textarea>
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
    $('.demo-2').datepicker({
        autoclose:true,
        format:'yyyy-mm-dd',
    });
</script>
@endpush
