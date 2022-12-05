@extends('layouts.master', ['title' => 'Roles'])

@section('content')
<section class="role-table">
    <div class="border-table">
        <div class="table-head clearfix">
            <p class="pull-left">Role Management</p>
            <a href="{{ route('roles.create') }}" class="btn sm-custom-btn pull-right">Add new</a>
        </div>
        @if ($errors->any())
            <div class="error-message" id='hideMe'>
                @foreach ($errors->all() as $error)
                <span class="error-text">{{ $error }}</span>
                @endforeach
            </div>
        @endif
        <!-- end of table-head -->
        <div class="table-responsive">
            <table class="table sm-custom-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Guard</th>
                        <th class="action-td">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = ($roles->currentPage()-1)*$roles->perPage();
                    @endphp
                    @forelse ($roles as $role)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ ucwords(str_replace('_', ' ', $role->name)) }}</td>
                        <td>{{ $role->guard_name }}</td>
                        <td class="action-center action-td">
                            <a class="btn btn-xs btn-info" href="{{ route('roles.edit', $role->id) }}">
                                Edit
                            </a>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
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
    {!! $roles->links() !!}
    <!-- end of pagination -->
</section>
@endsection

@push('style')
<style>
    .error-message {
        background-color: #fce4e4;
        border: 1px solid #fcc2c3;
        display: block;
        text-align: center;
        padding: 5px 20px;
    }

    .error-text {
        color: #cc0033;
        font-family: Helvetica, Arial, sans-serif;
        font-size: 10px;
        font-weight: bold;
        line-height: 20px;
        text-shadow: 1px 1px rgba(250,250,250,.3);
    }
</style>
@endpush

@push('script')
<script>
    $(function() {
        setTimeout(function() { $("#hideMe").fadeOut(1500); }, 5000)
    })
</script>
@endpush
