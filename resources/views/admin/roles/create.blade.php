@extends('layouts.master', ['title' => 'New Role'])

@section('content')
<section class="white-smooth-wrapper no-margin">
    <div class="row">
        <div class="col-md-12">
           <!-------------- role-wrapper -------------->
           <div class="wrapper-head semi-head-border with-btn-head clearfix"">
             <h4>Create Form</h4>
             <div class="btn-head-wrap">
                <a href="{{ route('roles.index') }}">Back</a>
             </div>
          </div>
          <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
             @csrf
             <div class="organization-form">
                 <div class="row">
                 <div class="col-md-12">
                     <div class="input-wrapper-sm">
                         <label>Name</label>
                         <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Role name" required autofocus>
                         @error('name')
                             <small class="text-danger">{{ $message }}</small>
                         @enderror
                     </div>
                 </div>
                 <!-- end of col-md-4 -->
                 <div class="col-md-12">
                     <div class="input-wrapper-sm">
                         <label>Permission</label>
                         <select class="role-multiple" name="permissions[]" id="permissions" multiple="multiple" required>
                            @foreach($permissions as $id => $permissions)
                            <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || isset($role) && $role->permissions->contains($id)) ? 'selected' : '' }}>
                              {{ ucfirst(str_replace("_", " ", $permissions)) }}
                            </option>
                            @endforeach
                          </select>
                         @error('permissions')
                             <small class="text-danger">{{ $message }}</small>
                         @enderror
                     </div>
                 </div>
                 <!-- end of col-md-4 -->
                 </div>
                 <!-- end of row -->
             </div>
             <div class="form-footer clearfix">
                 <button type="submit" class="btn sm-custom-btn sm-save-btn pull-right">Save</button>
             </div>
         </form>
           <!-- end of role-wrapper -->
        </div>
        <!-- end of col-md-12 -->
     </div>
    <!-- end of row -->
 </section>
@endsection

@push('style')
<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" />
@endpush

@push('script')
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
    $('.role-multiple').select2();
});
</script>
@endpush

