@extends('layouts.master', ['title' => 'New User'])

@section('content')
    <section class="white-smooth-wrapper no-margin">
        <div class="row">
            <div class="col-md-12">
                <!-------------- user-wrapper -------------->
                <div class="wrapper-head semi-head-border with-btn-head clearfix"">
                    <h4>Create Form</h4>
                    <div class="btn-head-wrap">
                        <a href="{{ route('users.index') }}">Back</a>
                    </div>
                </div>
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="user-form">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-wrapper-sm">
                                    <label>Name</label>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="e.g. John Doe" required autofocus>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- end of col-md-4 -->
                            <div class="col-md-4">
                                <div class="input-wrapper-sm">
                                    <label>Gender</label>
                                    <select name="gender" id="gender" required>
                                        <option value="" disabled selected>--- Select gender ---</option>
                                        <option value="Male" @if (old('gender') == 'Male') {{ 'selected' }} @endif>Male</option>
                                        <option value="Female" @if (old('gender') == 'Female') {{ 'selected' }} @endif>Female</option>
                                    </select>
                                    @error('gender')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- end of col-md-4 -->
                            <div class="col-md-6">
                                <div class="input-wrapper-sm">
                                    <label>Email</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="e.g. john@example.com" required>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- end of col-md-4 -->
                            <div class="col-md-6">
                                <div class="input-wrapper-sm">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" placeholder="Valid Phone Number" required>
                                    @error('phone_number')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- end of col-md-4 -->
                            <div class="col-md-6">
                                <div class="input-wrapper-sm">
                                    <label>Position</label>
                                    <select name="position" id="position" required>
                                        <option value="" disabled selected>--- Select position ---</option>
                                        <option value="Director" @if (old('position') == 'Director') {{ 'selected' }} @endif>Director</option>
                                        <option value="Bishop" @if (old('position') == 'Bishop') {{ 'selected' }} @endif>Bishop</option>
                                        <option value="Pastor Snr." @if (old('position') == 'Pastor Snr.') {{ 'selected' }} @endif>Pastor Snr.</option>
                                        <option value="Pastor" @if (old('position') == 'Pastor') {{ 'selected' }} @endif>Pastor</option>
                                        <option value="Pastor Asst." @if (old('position') == 'Pastor Asst.') {{ 'selected' }} @endif>Pastor Asst.</option>
                                        <option value="Pastor Jnr." @if (old('position') == 'Pastor Jnr.') {{ 'selected' }} @endif>Pastor Jnr.</option>
                                        <option value="Secretary" @if (old('position') == 'Secretary') {{ 'selected' }} @endif>Secretary</option>
                                        <option value="Women Leader" @if (old('position') == 'Women Leader') {{ 'selected' }} @endif>Women Leader</option>
                                        <option value="Praise and Worship Leader" @if (old('position') == 'Praise and Worship Leader') {{ 'selected' }} @endif>Praise and Worship Leader</option>
                                        <option value="Church Elder" @if (old('position') == 'Church Elder') {{ 'selected' }} @endif>Church Elder</option>
                                        <option value="Mama Kanisa" @if (old('position') == 'Mama Kanisa') {{ 'selected' }} @endif>Mama Kanisa</option>
                                    </select>
                                    @error('position')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- end of col-md-4 -->
                            <div class="col-md-6">
                                <div class="input-wrapper-sm">
                                    <label>Publish to Team</label>
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
                            <!-- end of col-md-4 -->
                            <div class="col-md-12">
                                <div class="input-wrapper-sm">
                                    <label>Role</label>
                                    <select name="roles[]" id="roles" class="role-multiple" multiple="multiple" required>
                                        @foreach($roles as $id => $roles)
                                            <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                                        @endforeach
                                    </select>
                                    @error('roles')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- end of col-md-4 -->
                            <div class="col-md-12">
                                <div class="input-wrapper-sm">
                                    <label>Profile Image</label>
                                    <input type="file" name="upload_image" id="upload_image" value="{{ old('upload_image') }}">
                                    @error('upload_image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- end of col-md-12 -->
                            <div class="col-md-12">
                                <div class="input-wrapper-sm">
                                    <label>Profile Description</label>
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
