@extends('admin.layouts.master')

@section('title', 'Contact')

@section('adminContent')
	<div class="content">
     	<div class="container-fluid">
       <div class="row">
         <div class="col-md-8">
           <div class="card">
             <div class="card-header card-header-primary">
               <h4 class="card-title">All Contact</h4>
               <p class="card-category">Here is {{ $contact->name }}'s contact information.</p>
             </div>
             <div class="card-body">
             	<h5><strong>Name: {{ $contact->name }}</strong></h5>
             	<p>Email: <strong>{{ $contact->email }}</strong></p>
             	<p>Subject: <strong>{{ $contact->subject }}</strong></p>
             	<p>Created Date: <strong>{{ $contact->created_at }}</strong></p>
             	<p>Message: {{ $contact->message }}</p>
             	<hr>
             	<a href="{{ route('contact.index') }}" class="btn btn-sm btn-info">Back</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
@endsection