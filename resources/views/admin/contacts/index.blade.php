@extends('layouts.master', ['title' => 'Contact Messages'])

@section('content')
<div class="row">
    <div class="col-md-12 si-box-padding">
       <div class="border-table widget-wrapper-sm scroll-table-sm">
          <div class="table-head clearfix">
             <p class="pull-left">Message Management</p>
          </div>
          <div class="table-resposive">
             <table class="table sm-custom-table">
                <tbody>
                   @forelse ($contacts as $contact)
                   <tr>
                        <td>
                        <div class="name-td">
                            <p><a href="{{ route('contact.show', $contact->id) }}">{!! Str::limit($contact->content, $limit = 155, $end = '...') !!}</a><span>Date Created: {{ $contact->created_at->format('d F Y') }}</span></p>
                        </div>
                        </td>
                        <td class="action-td">
                        <div class="active">finished</div>
                        </td>
                    </tr>
                   @empty
                    <tr>
                        <div class="alert alert-warning">
                            <strong>Take note!</strong> In this area, there are no messages to list.
                        </div>
                    </tr>
                   @endforelse
                </tbody>
             </table>
          </div>
          <!-- end of table-resposive -->
       </div>
       <!-- end of border-table -->
       {!! $contacts->links() !!}
    </div>
    <!-- end of si-box-padding -->
 </div>
@endsection
