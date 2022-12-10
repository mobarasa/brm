@extends('layouts.master', ['title' => 'Sermons'])

@section('content')
<section class="sermon-table">
    <div class="border-table">
        <div class="table-head clearfix">
            <p class="pull-left">Sermon Management</p>
            @can('sermon_create')
            <a href="{{ route('sermons.create') }}" class="btn sm-custom-btn pull-right">Add new</a>
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
                        <th>Written By</th>
                        <th>Preacher</th>
                        <th>Sermon Title</th>
                        <th>Date Preached</th>
                        <th>Status</th>
                        <th class="action-td">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = ($sermons->currentPage()-1)*$sermons->perPage();
                    @endphp
                    @forelse ($sermons as $sermon)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $sermon->user->name }}</td>
                        <td>{{ $sermon->preacher }}</td>
                        <td><a href="{{ route('sermons.show', $sermon->id) }}">{{ $sermon->title }}</a></td>
                        <td>{{ $sermon->date_preached }}</td>
                        <td>
                            @if ($sermon->published != 'no')
                            <div class="active">Active</div>
                            @else
                            <div class="inactive">Inactive</div>
                            @endif
                        </td>
                        <td class="action-center action-td">
                            @can('sermon_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('sermons.edit', $sermon->id) }}">
                                Edit
                            </a>
                            @endcan
                            @can('sermon_delete')
                            <form action="{{ route('sermons.destroy', $sermon->id) }}" method="POST"
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
    {!! $sermons->links('layouts.partials.backpagination') !!}
    <!-- end of pagination -->
</section>
@endsection
