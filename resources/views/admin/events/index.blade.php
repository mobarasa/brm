@extends('layouts.master', ['title' => 'Events'])

@section('content')
<section class="event-table">
    <div class="border-table">
        <div class="table-head clearfix">
            <p class="pull-left">Event Management</p>
            <a href="{{ route('events.create') }}" class="btn sm-custom-btn pull-right">Add new</a>
        </div>
        <!-- end of table-head -->
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        <div class="table-responsive">
            <table class="table sm-custom-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Written By</th>
                        <th>Event Title</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Published</th>
                        <th class="action-td">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = ($events->currentPage()-1)*$events->perPage();
                    @endphp
                    @forelse ($events as $event)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $event->user->name }}</td>
                        <td><a href="{{ route('events.show', $event->id) }}">{{ $event->title }}</a></td>
                        <td>{{ $event->start_date }}</td>
                        <td>{{ $event->end_date }}</td>
                        <td>
                            @if ($event->published != 'no')
                            <div class="active">Active</div>
                            @else
                            <div class="inactive">Inactive</div>
                            @endif
                        </td>
                        <td class="action-center action-td">
                            <a class="btn btn-xs btn-info" href="{{ route('events.edit', $event->id) }}">
                                Edit
                            </a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                              <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                          </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">There's are no data.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- end of sm-custom-table -->
        </div>
        <!-- end of table-responsive -->
    </div>
    <!-- end of border-table -->
    {!! $events->links() !!}
    <!-- end of pagination -->
</section>
@endsection
