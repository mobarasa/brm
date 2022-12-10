@extends('layouts.master', ['title' => 'Permissions'])

@section('content')
<section class="permission-table">
    <div class="border-table">
        <div class="table-head clearfix">
            <p class="pull-left">Permission Management</p>
        </div>
        <!-- end of table-head -->
        <div class="table-responsive">
            <table class="table sm-custom-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Guard</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = ($permissions->currentPage()-1)*$permissions->perPage();
                    @endphp
                    @forelse ($permissions as $permission)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ ucwords(str_replace('_', ' ', $permission->name)) }}</td>
                        <td>{{ $permission->guard_name }}</td>
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
    {!! $permissions->links('layouts.partials.backpagination') !!}
    <!-- end of pagination -->
</section>
@endsection
