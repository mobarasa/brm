<div>
    <!-------------- User Profile -------------->
    <div class="wrapper-head semi-head-border with-btn-head clearfix"">
        <h4>{{ __('Update your account\'s profile information and email address.') }}</h4>
    </div>
    @if (Session::has('text_success'))
        <div class="success-message" id='hideMe'>
            <span class="success-text">{{ Session::get('text_success') }}</span>
        </div>
    @endif
    <form action="#" wire:submit.prevent="updateProfile">
        @csrf
        <div class="organization-form">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-wrapper-sm">
                        <label>Name</label>
                        <input type="text" name="name" id="name" placeholder="e.g. John Doe" required wire:model="name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <!-- end of col-md-6 -->
                <div class="col-md-6">
                    <div class="input-wrapper-sm">
                        <label>Gender</label>
                        <select name="gender" id="gender" required wire:model="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        @error('gender')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <!-- end of col-md-6 -->
                <div class="col-md-6">
                    <div class="input-wrapper-sm">
                        <label>Email</label>
                        <input type="email" name="email" id="email" placeholder="e.g. john@example.com" required wire:model="email">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <!-- end of col-md-6 -->
                <div class="col-md-6">
                    <div class="input-wrapper-sm">
                        <label>Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" placeholder="Valid Phone Number" required wire:model="phone_number">
                        @error('phone_number')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <!-- end of col-md-4 -->
                <div class="col-md-12">
                    <div class="input-wrapper-sm">
                        <label>Profile Image</label>
                        <input type="file" name="upload_image" id="upload_image" wire:model="newimage">
                        @if ($newimage)
                            <img src="{{ $newimage->temporaryUrl() }}" width="100" height="100" />
                        @else
                            <img src="{{ asset(Auth::user()->image_exist ? 'storage/users/'.Auth::user()->upload_image : 'storage/default/no_avatar.png') }}" class="img-responsive" alt="" width="100" height="100">
                        @endif
                        @error('upload_image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <!-- end of col-md-4 -->
                <div class="col-md-12">
                    <div class="input-wrapper-sm" wire:ignore>
                        <label>Profile Description</label>
                        <textarea rows="3" name="content" id="content" wire:model="content"></textarea>
                        @error('content')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <!-- end of col-md-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of organization-form -->
        <div class="form-footer clearfix">
            <button type="submit" class="btn sm-custom-btn sm-save-btn pull-right">Update Info</button>
        </div>
        <!-- end of form-footer -->
    </form>
</div>
