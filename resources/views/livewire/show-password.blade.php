<div>
    <!-------------- User Password -------------->
    <div class="wrapper-head semi-head-border with-btn-head clearfix"">
        <h4>{{ __('Update your account\'s password.') }}</h4>
    </div>
    @if(Session::has('text_success'))
    <div class="success-message" id='hideMe'>
        <span class="success-text">{{ Session::get('text_success') }}</span>
    </div>
    @endif

    @if(Session::has('text_error'))
    <div class="error-message" id='hideMe'>
        <span class="error-text">{{ Session::get('text_error') }}</span>
    </div>
    @endif
    <form action="#" wire:submit.prevent="changePassword">
        @csrf
        <div class="organization-form">
            <div class="row">
                <div class="col-md-12">
                    <div class="input-wrapper-sm">
                        <label>Current Password</label>
                        <input type="password" placeholder="Current Password" name="current_password" id="current_password" wire:model="current_password" />
                        @error('current_password') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                </div>
                <!-- end of col-md-12 -->
                <div class="col-md-12">
                    <div class="input-wrapper-sm">
                        <label>New Password</label>
                        <input type="password" placeholder="New Password" name="password" wire:model="password" />
                        @error('password') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                </div>
                <!-- end of col-md-12 -->
                <div class="col-md-12">
                    <div class="input-wrapper-sm">
                        <label>Confirm Password</label>
                        <input type="password" placeholder="Confirm Password" name="password_confirmation" wire:model="password_confirmation" />
                        @error('password_confirmation') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                </div>
                <!-- end of col-md-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of organization-form -->
        <div class="form-footer clearfix">
            <button type="submit" class="btn sm-custom-btn sm-save-btn pull-right">Update Password</button>
        </div>
        <!-- end of form-footer -->
    </form>
</div>
