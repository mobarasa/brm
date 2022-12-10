@extends('layouts.master', ['title' => 'Edit Post'])

@section('content')
<section class="white-smooth-wrapper no-margin">
    <div class="row">
        <div class="col-md-12">
           <!-------------- post-wrapper -------------->
           <div class="wrapper-head semi-head-border with-btn-head clearfix"">
             <h4>Edit Form</h4>
             <div class="btn-head-wrap">
                <a href="{{ route('posts.index') }}">Back</a>
             </div>
          </div>
          <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
             @csrf
             @method('PUT')
             <div class="organization-form">
                 <div class="row">
                 <div class="col-md-12">
                     <div class="input-wrapper-sm">
                         <label>Title</label>
                         <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" placeholder="Post title" required autofocus>
                         @error('title')
                             <small class="text-danger">{{ $message }}</small>
                         @enderror
                     </div>
                 </div>
                 <!-- end of col-md-4 -->
                 <div class="col-md-12">
                     <div class="input-wrapper-sm">
                         <label>Category</label>
                         <select name="category_id" id="category_id" required>
                             @foreach($categories as $id =>  $category)
                                <option value="{{ $id }}" {{ ($post->category ? $post->category->id : old('category_id')) == $id ? 'selected' : '' }}>{{ $category }}</option>
                             @endforeach
                         </select>
                         @error('category_id')
                             <small class="text-danger">{{ $message }}</small>
                         @enderror
                     </div>
                 </div>
                 <!-- end of col-md-4 -->
                 <div class="col-md-12">
                     <div class="input-wrapper-sm">
                         <label>Post Image</label>
                         <input type="file" name="upload_image" id="upload_image" value="{{ old('upload_image') }}">
                         @error('upload_image')
                             <small class="text-danger">{{ $message }}</small>
                         @enderror
                     </div>
                 </div>
                 <!-- end of col-md-4 -->
                 @can('post_publish')
                 <div class="col-md-12">
                    <div class="input-wrapper-sm">
                        <label>Publish</label>
                        <select name="published" id="published" required>
                           <option value="yes" {{old('published',$post->published)=="yes" ? 'selected':''}}>Yes</option>
                           <option value="no" {{old('published',$post->published)=="no" ? 'selected':''}}>No</option>
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
                         <label>Content</label>
                         <textarea rows="3" name="content" id="content">{{ old('content', $post->content) }}</textarea>
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
<script src="{{ asset('assets/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
    tinymce.init({
        selector:'textarea',
        promotion: false
        });
</script>
@endpush
