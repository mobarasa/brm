@extends('layouts.master', ['title' => 'Profile'])

@section('content')
<section class="white-smooth-wrapper no-margin">
    <div class="row">
       <!-- ================================
             profile-left-wrapper
             ================================-->
       <div class="profile-left-wrapper">
          <div class="profile-details">
             <div class="profile-img">
                @if (Auth::user()->upload_image)
                    <img src="{{ asset('storage/uploads/users/' . Auth::user()->upload_image) }}" class="img-responsive" alt="" />
                @else
                    <img src="{{ asset('storage/uploads/no_avatar.png') }}" class="img-responsive" alt="" />
                @endif
             </div>
             <!-- end of profile-img -->
             <h4>{{ Auth::user()->name }}</h4>
             <h5>{{ Auth::user()->position }}</h5>
             <a href="#" class="sm-custom-btn edit-profile-btn">Change Password</a>
          </div>
          <!-- end of profile-details -->
       </div>
       <!-- end of profile-left-wrapper -->
       <!-- === Recent Activities ===-->
       <div class="profile-details-wrapper">
          <div class="row">
             <!-- === message table ===-->
             <div class="col-md-12 si-box-padding">
                <div class="border-table widget-wrapper-sm">
                   <!-- end of table-head -->



                   <div class="organization-form">
                    <div class="row">
                       <div class="col-md-3">
                          <div class="input-wrapper-sm">
                             <label>Title</label>
                             <input type="text" name="title" placeholder="Enter the Title">
                          </div>
                       </div>
                       <!-- end of col-md-3 -->
                       <div class="col-md-3">
                          <div class="input-wrapper-sm">
                             <label>First Name</label>
                             <input type="text" name="fname" placeholder="Enter the first name">
                          </div>
                       </div>
                       <!-- end of col-md-3 -->
                       <div class="col-md-3">
                          <div class="input-wrapper-sm">
                             <label>Middle Name</label>
                             <input type="text" name="mname" placeholder="Enter the middle name">
                          </div>
                       </div>
                       <!-- end of col-md-3 -->
                       <div class="col-md-3">
                          <div class="input-wrapper-sm">
                             <label>Last Name</label>
                             <input type="text" name="lname" placeholder="Enter the last name">
                          </div>
                       </div>
                       <!-- end of col-md-3 -->
                       <div class="col-md-4">
                          <div class="input-wrapper-sm">
                             <label>Gender</label>
                             <input type="text" name="gender" placeholder="Enter the gender">
                          </div>
                       </div>
                       <!-- end of col-md-4 -->
                       <div class="col-md-4">
                          <div class="input-wrapper-sm">
                             <label>Designation</label>
                             <input type="text" name="designation" placeholder="Enter the designation">
                          </div>
                       </div>
                       <!-- end of col-md-4 -->
                       <div class="col-md-4">
                          <div class="input-wrapper-sm">
                             <label>Language</label>
                             <input type="text" name="languagege" placeholder="Enter the Languagege">
                          </div>
                       </div>
                       <!-- end of col-md-4 -->
                       <div class="col-md-4">
                          <div class="input-wrapper-sm">
                             <label>Phone</label>
                             <input type="text" name="phone" placeholder="Enter the Phone number">
                          </div>
                       </div>
                       <!-- end of col-md-4 -->
                       <div class="col-md-4">
                          <div class="input-wrapper-sm">
                             <label>Mobile</label>
                             <input type="text" name="mobile" placeholder="Enter the mobile number">
                          </div>
                       </div>
                       <!-- end of col-md-4 -->
                       <div class="col-md-4">
                          <div class="input-wrapper-sm">
                             <label>Email</label>
                             <input type="email" name="email" placeholder="Enter the email">
                          </div>
                       </div>
                       <!-- end of col-md-4 -->
                       <div class="col-md-4">
                          <div class="input-wrapper-sm">
                             <label>Fax</label>
                             <input type="text" name="faxno" placeholder="Enter the fax">
                          </div>
                       </div>
                       <!-- end of col-md-4 -->
                       <div class="col-md-4">
                          <div class="input-wrapper-sm">
                             <label>Skype</label>
                             <input type="text" name="skname" placeholder="Enter skype ID">
                          </div>
                       </div>
                       <!-- end of col-md-4 -->
                       <div class="col-md-4">
                          <div class="input-wrapper-sm">
                             <label>Others</label>
                             <input type="text" name="others" placeholder="Others">
                          </div>
                       </div>
                       <!-- end of col-md-4 -->
                    </div>
                    <!-- end of row -->
                 </div>



                   <!-- end of table-resposive -->
                </div>
                <!-- end of border-table -->
             </div>
             <!-- end of si-box-padding -->
          </div>
          <!-- end of row -->
       </div>
       <!-- end of profile-details -->
    </div>
    <!-- end of row -->
</section>
@endsection

