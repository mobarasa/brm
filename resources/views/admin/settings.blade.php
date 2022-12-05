@extends('layouts.master', ['title' => 'Settings'])

@section('content')

<div class="row">
    <div class="col-md-12">
       <section class="dash-main-widget-box">
          <div class="row">
             <div class="col-sm-3 si-box-padding">
                <a href="{{ route('address.index') }}">
                    <div class="dash-box">
                        <h2><i class="fa-regular fa-gear"></i></h2>
                        <p>Address</p>
                     </div>
                </a>
                <!-- end of dash-box -->
             </div>
             <!-- end of si-box-padding -->
             <div class="col-sm-3 si-box-padding">
                <a href="{{ route('donations.index') }}">
                    <div class="dash-box">
                        <h2><i class="fa-regular fa-circle-dollar-to-slot"></i></h2>
                        <p>Donation</p>
                     </div>
                </a>
                <!-- end of dash-box -->
             </div>
             <!-- end of si-box-padding -->
             <div class="col-sm-3 si-box-padding">
                <a href="{{ route('about.index') }}">
                    <div class="dash-box">
                        <h2><i class="fa-regular fa-book-open-reader"></i></h2>
                        <p>About</p>
                     </div>
                </a>
                <!-- end of dash-box -->
             </div>
             <!-- end of si-box-padding -->
             <div class="col-sm-3 si-box-padding">
                <div class="dash-box">
                   <h2>35</h2>
                   <p>New Users</p>
                </div>
                <!-- end of dash-box -->
             </div>
             <!-- end of si-box-padding -->
          </div>
          <!-- end of row -->
       </section>
       <!-- end of section box main -->
    </div>
    <!-- end of col-md-12 -->
 </div>

@endsection
