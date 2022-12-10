@extends('layouts.master', ['title' => 'Address Setting'])
@section('icon', 'circle-dollar-to-slot')
@section('content')
<section class="white-smooth-wrapper no-margin">
    <div class="row">
        <div class="col-md-12">
            <div class="wrapper-head semi-head-border with-btn-head clearfix"">
                <h4>Website Contact Details</h4>
                <div class="btn-head-wrap">
                    <a href="{{ route('settings') }}">Back</a>
                    @if (count($address))
                    @foreach ($address as $item)
                    @can('address_edit')
                    <a href="{{ route('address.edit', $item->id) }}">Edit</a>
                    @endcan
                    @endforeach
                    @else
                    @can('address_create')
                    <a href="{{ route('address.create') }}">Create</a>
                    @endcan
                    @endif
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless">
                    <tbody>
                        @forelse ($address as $item)
                        <tr>
                            <th scope="row">Website:</th>
                            <td>{{ $item->website }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Email:</th>
                            <td>{{ $item->email }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Phone Number:</th>
                            <td>{{ $item->phone }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Address:</th>
                            <td>{{ $item->address }}</td>
                        </tr>
                        <tr>
                            <th scope="row">facebook:</th>
                            <td>{{ $item->facebook }}</td>
                        </tr>
                        <tr>
                            <th scope="row">whatsapp:</th>
                            <td>{{ $item->whatsapp }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Instagram:</th>
                            <td>{{ $item->instagram }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Youtube:</th>
                            <td>{{ $item->youtube }}</td>
                        </tr>
                        @empty
                        <tr>
                            <th scope="row">Website:</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Email:</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Phone Number:</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Address:</th>
                            <td></td>
                        </tr>

                        <tr>
                            <th scope="row">facebook:</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">whatsapp:</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Instagram:</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Youtube:</th>
                            <td></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end of col-md-12 -->
    </div>
    <!-- end of row -->
</section>
@endsection

