@extends('admin.layouts.master')

@section('title', 'Contact')

@section('adminContent')
	<div class="content">
     	<div class="container-fluid">
       <div class="row">
         <div class="col-md-12">
           <div class="card">
             <div class="card-header card-header-primary">
               <h4 class="card-title">All Contact</h4>
               <p class="card-category">Here is all contact information who was send to you.</p>
             </div>
             <div class="card-body">
               <div class="table-responsive">
                 <table class="table table-bordered" id="dataTables">
                   <thead class=" text-primary">
                     <th>#SL</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Subject</th>
                     <th>Send at</th>
                     <th>Action</th>
                   </thead>
                   <tbody>

                   	@foreach($contacts as $key => $contact)
	                     <tr>
	                       <td>{{ $key+1 }}</td>
	                       <td>{{ $contact->name }}</td>
	                       <td>{{ $contact->email }}</td>
	                       <td>{{ $contact->subject }}</td>
                         <td>{{ $contact->created_at }}</td>
                         <td>
                            <a class="btn btn-sm btn-info" href="{{ route('contact.show', $contact->id) }}">
                              <i class="material-icons">visibility</i>
                            </a>

                           <form id="delete-{{ $contact->id }}" action="{{ route('contact.destroy', $contact->id) }}" method="POST" style="display:inline">
                             @csrf
                           </form>
                           <button class="btn btn-sm btn-danger" onclick="if(confirm('Are you sure? You want to delete this contact info?')){
                            event.preventDefault();
                            document.getElementById('delete-{{ $contact->id }}').submit();
                           }
                           else{
                            event.preventDefault();
                           }">
                             <i class="material-icons">delete</i>
                           </button>
                         </td>
	                     </tr>
                     @endforeach

                   </tbody>
                 </table>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
@endsection