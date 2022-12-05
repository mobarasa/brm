@extends('layouts.master', ['title' => 'Posts'])

@section('content')
    <section class="post-table">
        <div class="border-table">
            <div class="table-head clearfix">
                <p class="pull-left">Post Management</p>
                <a href="{{ route('posts.create') }}" class="btn sm-custom-btn pull-right">Add new</a>
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
                            <th>Post Title</th>
                            <th>Created Date</th>
                            <th>Published</th>
                            <th class="action-td">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = ($posts->currentPage()-1)*$posts->perPage();
                        @endphp
                        @forelse ($posts as $post)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                            <td>{{ $post->created_at->format('d F Y') }}</td>
                            <td>
                                @if ($post->published != 'no')
                                <div class="active">Active</div>
                                @else
                                <div class="inactive">Inactive</div>
                                @endif
                            </td>
                            <td class="action-center action-td">
                                <a class="btn btn-xs btn-info" href="{{ route('posts.edit', $post->id) }}">
                                    Edit
                                </a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
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
        {!! $posts->links() !!}
        <!-- end of pagination -->
    </section>
@endsection
