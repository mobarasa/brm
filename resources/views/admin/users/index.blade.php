@extends('layouts.master', ['title' => 'Users'])

@section('content')
<section class="user-table">
    <div class="border-table">
        <div class="table-head clearfix">
            <p class="pull-left">User Management</p>
            @can('user_create')
            <a href="{{ route('users.create') }}" class="btn sm-custom-btn pull-right">Add new</a>
            @endcan
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
                        <th>Name</th>
                        <th>Position</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th class="action-td">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = ($users->currentPage()-1)*$users->perPage();
                    @endphp
                    @forelse ($users as $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->position }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td class="action-center action-td">
                            @can('user_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('users.edit', $user->id) }}">
                                Edit
                            </a>
                            @endcan
                            @can('user_delete')
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                              <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                          </form>
                            @endcan
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
    {!! $users->links() !!}
    <!-- end of pagination -->
</section>
@endsection
