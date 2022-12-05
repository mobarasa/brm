@extends('layouts.master', ['title' => 'Edit User'])

@section('content')
    <section class="white-smooth-wrapper no-margin">
        <div class="row">
            <div class="col-md-12">
                <!-------------- user-wrapper -------------->
                <div class="wrapper-head semi-head-border with-btn-head clearfix"">
                    <h4>Edit Form</h4>
                    <div class="btn-head-wrap">
                        <a href="{{ route('users.index') }}">Back</a>
                    </div>
                </div>
                <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="user-form">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-wrapper-sm">
                                    <label>Name</label>
                                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" placeholder="e.g. John Doe" required autofocus>
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
                                        <option value="Male" {{old('gender',$user->gender)=="Male" ? 'selected':''}}>Male</option>
                                        <option value="Female" {{old('gender',$user->gender)=="Female" ? 'selected':''}}>Female</option>
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
                                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" placeholder="e.g. john@example.com" required>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- end of col-md-4 -->
                            <div class="col-md-6">
                                <div class="input-wrapper-sm">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $user->phone_number) }}" placeholder="Valid Phone Number" required>
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
                                        <option value="Director" {{old('position',$user->position)=="Director" ? 'selected':''}}>Director</option>
                                        <option value="Bishop" {{old('position',$user->position)=="Bishop" ? 'selected':''}}>Bishop</option>
                                        <option value="Pastor Snr." {{old('position',$user->position)=="Pastor Snr." ? 'selected':''}}>Pastor Snr.</option>
                                        <option value="Pastor" {{old('position',$user->position)=="Pastor" ? 'selected':''}}>Pastor</option>
                                        <option value="Pastor Asst." {{old('position',$user->position)=="Pastor Asst." ? 'selected':''}}>Pastor Asst.</option>
                                        <option value="Pastor Jnr." {{old('position',$user->position)=="Pastor Jnr." ? 'selected':''}}>Pastor Jnr.</option>
                                        <option value="Secretary" {{old('position',$user->position)=="Secretary" ? 'selected':''}}>Secretary</option>
                                        <option value="Women Leader" {{old('position',$user->position)=="Women Leader" ? 'selected':''}}>Women Leader</option>
                                        <option value="Praise and Worship Leader" {{old('position',$user->position)=="Praise and Worship Leader" ? 'selected':''}}>Praise and Worship Leader</option>
                                        <option value="Church Elder" {{old('position',$user->position)=="Church Elder" ? 'selected':''}}>Church Elder</option>
                                        <option value="Mama Kanisa" {{old('position',$user->position)=="Mama Kanisa" ? 'selected':''}}>Mama Kanisa</option>
                                        <option value="Administrator" {{old('position',$user->position)=="Administrator" ? 'selected':''}}>Administrator</option>
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
                                        <option value="yes" {{old('published',$user->published)=="yes" ? 'selected':''}}>Yes</option>
                                        <option value="no" {{old('published',$user->published)=="no" ? 'selected':''}}>No</option>
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
                                    <textarea rows="3" name="content" id="content">{{ old('content', $user->content) }}</textarea>
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
