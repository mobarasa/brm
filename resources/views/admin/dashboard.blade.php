@extends('layouts.master', ['title' => 'Dashboard'])

@section('content')
    <div class="row">
        <div class="col-sm-3 si-box-padding">
            <div class="dash-box">
                <h2>{{ $postcount }}</h2>
                <p>{{ __('Posts') }}</p>
            </div>
            <!-- end of dash-box -->
        </div>
        <!-- end of si-box-padding -->
        <div class="col-sm-3 si-box-padding">
            <div class="dash-box">
                <h2>{{ $sermoncount }}</h2>
                <p>{{ __('Sermons') }}</p>
            </div>
            <!-- end of dash-box -->
        </div>
        <!-- end of si-box-padding -->
        <div class="col-sm-3 si-box-padding">
            <div class="dash-box">
                <h2>{{ $eventcount }}</h2>
                <p>{{ __('Events') }}</p>
            </div>
            <!-- end of dash-box -->
        </div>
        <!-- end of si-box-padding -->
        <div class="col-sm-3 si-box-padding">
            <div class="dash-box">
                <h2>{{ $subscribecount }}</h2>
                <p>{{ __('Subscribers') }}</p>
            </div>
            <!-- end of dash-box -->
        </div>
        <!-- end of si-box-padding -->
    </div>
    <!-- end of row -->

    <div class="row" style="margin-top: 10px;">
        <div class="col-md-6 si-box-padding">
            <div class="border-table">
                <div class="table-head clearfix">
                    <p class="pull-left">{{ __('Current Users') }}</p>
                </div>
                <!-- end of table-head -->
                <div class="table-responsive">
                    <table class="table sm-custom-table">
                       <thead>
                          <tr>
                             <th>Name</th>
                             <th>Phone</th>
                             <th>Position</th>
                             <th>Team</th>
                          </tr>
                       </thead>
                       <tbody>
                          @forelse ($users as $user)
                          <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->published != 'yes')
                                <div class="inactive">No</div>
                                @else
                                <div class="active">Yes</div>
                                @endif
                                </td>
                         </tr>
                          @empty
                            <tr>
                                <td colspan="4">No Data</td>
                            </tr>
                          @endforelse
                       </tbody>
                    </table>
                    <!-- end of sm-custom-table -->
                 </div>
                <!-- end of table-resposive -->
            </div>
            <!-- end of border-table -->
        </div>
        <!-- end of col-md-6 -->
        <div class="col-md-6 si-box-padding">
            <div class="border-table">
                <div class="table-head clearfix">
                    <p class="pull-left">{{ __('Newsletter Subscribers') }}</p>
                </div>
                <!-- end of table-head -->
                <div class="table-responsive">
                    <table class="table sm-custom-table">
                       <thead>
                          <tr>
                             <th>Email</th>
                             <th>Date Subscribed</th>
                          </tr>
                       </thead>
                       <tbody>
                          @forelse ($subscribers as $subscriber)
                          <tr>
                            <td>{{ $subscriber->email }}</td>
                            <td>{{ date("F jS, Y", strtotime($subscriber->created_at)) }}</td>
                         </tr>
                          @empty
                            <tr>
                                <td colspan="2">No Data</td>
                            </tr>
                          @endforelse
                       </tbody>
                    </table>
                    <!-- end of sm-custom-table -->
                 </div>
                <!-- end of table-resposive -->
            </div>
            <!-- end of border-table -->
        </div>
        <!-- end of si-box-padding -->
    </div>

    <div class="row" style="margin-top: 10px;">
        <div class="col-md-12 si-box-padding">
            <div class="border-table">
                <div class="table-head clearfix">
                    <p class="pull-left">{{ __('Latest Post') }}</p>
                </div>
                <!-- end of table-head -->
                <div class="table-responsive">
                    <table class="table sm-custom-table">
                       <thead>
                          <tr>
                             <th>Title</th>
                             <th>Writer</th>
                             <th>Published</th>
                             <th>Date Created</th>
                          </tr>
                       </thead>
                       <tbody>
                          @forelse ($posts as $post)
                          <tr>
                            <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                            <td>{{ $post->user->name }}</td>
                            <td>
                                @if ($post->published != 'yes')
                                <div class="inactive">Inactive</div>
                                @else
                                <div class="active">Active</div>
                                @endif
                                </td>
                                <td>{{ date("F jS, Y", strtotime($post->created_at)) }}</td>
                         </tr>
                          @empty
                            <tr>
                                <td colspan="4">No Data</td>
                            </tr>
                          @endforelse
                       </tbody>
                    </table>
                    <!-- end of sm-custom-table -->
                 </div>
                <!-- end of table-resposive -->
            </div>
            <!-- end of border-table -->
        </div>
        <!-- end of si-box-padding -->
    </div>

    <div class="row" style="margin-top: 10px;">
        <div class="col-md-12 si-box-padding">
            <div class="border-table">
                <div class="table-head clearfix">
                    <p class="pull-left">{{ __('Latest Sermons') }}</p>
                </div>
                <!-- end of table-head -->
                <div class="table-responsive">
                    <table class="table sm-custom-table">
                       <thead>
                          <tr>
                             <th>Title</th>
                             <th>Writer</th>
                             <th>Published</th>
                             <th>Date Created</th>
                             <th>Preach Date</th>
                          </tr>
                       </thead>
                       <tbody>
                          @forelse ($sermons as $sermon)
                          <tr>
                            <td><a href="{{ route('sermons.show', $sermon->id) }}">{{ $sermon->title }}</a></td>
                            <td>{{ $sermon->user->name }}</td>
                            <td>
                                @if ($sermon->published != 'yes')
                                <div class="inactive">Inactive</div>
                                @else
                                <div class="active">Active</div>
                                @endif
                                </td>
                            <td>{{ date("F jS, Y", strtotime($sermon->created_at)) }}</td>
                            <td>{{ date("F jS, Y", strtotime($sermon->date_preached)) }}</td>
                         </tr>
                          @empty
                            <tr>
                                <td colspan="4">No Data</td>
                            </tr>
                          @endforelse
                       </tbody>
                    </table>
                    <!-- end of sm-custom-table -->
                 </div>
                <!-- end of table-resposive -->
            </div>
            <!-- end of border-table -->
        </div>
        <!-- end of si-box-padding -->
    </div>

    <div class="row" style="margin-top: 10px;">
        <div class="col-md-12 si-box-padding">
            <div class="border-table">
                <div class="table-head clearfix">
                    <p class="pull-left">{{ __('Latest Events') }}</p>
                </div>
                <!-- end of table-head -->
                <div class="table-responsive">
                    <table class="table sm-custom-table">
                       <thead>
                          <tr>
                             <th>Title</th>
                             <th>Writer</th>
                             <th>Published</th>
                             <th>Start Date</th>
                             <th>End Date</th>
                          </tr>
                       </thead>
                       <tbody>
                          @forelse ($events as $event)
                          <tr>
                            <td><a href="{{ route('events.show', $event->id) }}">{{ $event->title }}</a></td>
                            <td>{{ $event->user->name }}</td>
                            <td>
                                @if ($event->published != 'yes')
                                <div class="inactive">Inactive</div>
                                @else
                                <div class="active">Active</div>
                                @endif
                                </td>
                            <td>{{ date("F jS, Y", strtotime($event->start_date)) }}</td>
                            <td>{{ date("F jS, Y", strtotime($event->end_date)) }}</td>
                         </tr>
                          @empty
                            <tr>
                                <td colspan="4">No Data</td>
                            </tr>
                          @endforelse
                       </tbody>
                    </table>
                    <!-- end of sm-custom-table -->
                 </div>
                <!-- end of table-resposive -->
            </div>
            <!-- end of border-table -->
        </div>
        <!-- end of si-box-padding -->
    </div>

@endsection
