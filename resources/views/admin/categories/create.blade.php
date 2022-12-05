@extends('layouts.master', ['title' => 'New Category'])

@section('content')
<section class="white-smooth-wrapper no-margin">
    <div class="row">
       <div class="col-md-12">
          <!-------------- category-wrapper -------------->
          <div class="wrapper-head semi-head-border with-btn-head clearfix">
            <h4>Create Form</h4>
            <div class="btn-head-wrap">
               <a href="{{ route('categories.index') }}">Back</a>
            </div>
            <!-- end of btn-head-wrap -->
         </div>
         <form action="{{ route('categories.store') }}" method="POST" autocomplete="off">
            @csrf
            <div class="organization-form">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-wrapper-sm">
                            <label>Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="e.g. Bible Study" required autofocus>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                <!-- end of col-md -->
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
