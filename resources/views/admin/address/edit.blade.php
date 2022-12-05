@extends('layouts.master', ['title' => 'Edit Address'])

@section('content')
<section class="white-smooth-wrapper no-margin">
    <div class="row">
        <div class="col-md-12">
           <!-------------- post-wrapper -------------->
           <div class="wrapper-head semi-head-border with-btn-head clearfix"">
             <h4>Social Media Profile</h4>
             <div class="btn-head-wrap">
                <a href="{{ route('address.index') }}">Back</a>
             </div>
          </div>
          <form action="{{ route('address.update', $address) }}" method="POST" autocomplete="off">
             @csrf
             @method('PUT')
             <div class="organization-form">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-wrapper-sm">
                            <label>Enter website address</label>
                            <input type="text" name="website" id="website" value="{{ old('website', $address->website) }}" placeholder="e.g. https://www.webestica.com" required autofocus>
                            @error('website')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <!-- end of col-md -->
                    <div class="col-md-12">
                        <div class="input-wrapper-sm">
                            <label>Enter email address</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $address->email) }}" placeholder="e.g. company@mail.com" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <!-- end of col-md -->
                    <div class="col-md-12">
                        <div class="input-wrapper-sm">
                            <label>Enter phone number</label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone', $address->phone) }}" placeholder="e.g. 0723000000" required>
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <!-- end of col-md -->
                    <div class="col-md-12">
                        <div class="input-wrapper-sm">
                            <label>Enter church address</label>
                            <input type="text" name="address" id="address" value="{{ old('address', $address->address) }}" placeholder="e.g. 1195 - 50100 Kakamega-Lurambi" required>
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <!-- end of col-md -->
                    <div class="col-md-12">
                        <div class="input-wrapper-sm">
                            <label>Enter facebook username</label>
                            <input type="text" name="facebook" id="facebook" value="{{ old('facebook', $address->facebook) }}" placeholder="e.g. username">
                            @error('facebook')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <!-- end of col-md -->
                    <div class="col-md-12">
                        <div class="input-wrapper-sm">
                            <label>Enter whatsapp username</label>
                            <input type="text" name="whatsapp" id="whatsapp" value="{{ old('whatsapp', $address->whatsapp) }}" placeholder="e.g. username">
                            @error('whatsapp')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <!-- end of col-md -->
                    <div class="col-md-12">
                        <div class="input-wrapper-sm">
                            <label>Enter instagram username</label>
                            <input type="text" name="instagram" id="instagram" value="{{ old('instagram', $address->instagram) }}" placeholder="e.g. username">
                            @error('instagram')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <!-- end of col-md -->
                    <div class="col-md-12">
                        <div class="input-wrapper-sm">
                            <label>Add your youtube profile URL</label>
                            <input type="text" name="youtube" id="youtube" value="{{ old('youtube', $address->youtube) }}" placeholder="e.g. https://www.youtube.com/in/Booking-05620abc">
                            @error('youtube')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <!-- end of col-md -->
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
