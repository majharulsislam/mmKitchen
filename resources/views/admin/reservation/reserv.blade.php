@extends('admin.layouts.master')

@section('title', 'Reservation')

@section('adminContent')
	<div class="content">
     	<div class="container-fluid">
       <div class="row">
         <div class="col-md-12">
           <div class="card">
             <div class="card-header card-header-primary">
               <h4 class="card-title">All Reservation</h4>
               <p class="card-category">If you want you can confirm your reservation here.</p>
             </div>
             <div class="card-body">
               <div class="table-responsive">
                 <table class="table table-bordered" id="dataTables">
                   <thead class=" text-primary">
                     <th>#SL</th>
                     <th>Name</th>
                     <th>Phone</th>
                     <th>Email</th>
                     <th>Date & Time</th>
                     <th>Message</th>
                     <th>Status</th>
                     <th>Action</th>
                   </thead>
                   <tbody>

                   	@foreach($reservations as $key => $reservation)
	                     <tr>
	                       <td>{{ $key+1 }}</td>
	                       <td>{{ $reservation->name }}</td>
	                       <td>{{ $reservation->phone }}</td>
	                       <td>{{ $reservation->email }}</td>
	                       <td>{{ $reservation->datetime }}</td>
	                       <td>{{ $reservation->description }}</td>
	                       <td>
	                       		@if($reservation->status == false)
	                       			<span class="badge bg-danger text-white">Not confirm yet</span>
	                       		@else
	                       			<span class="badge bg-primary text-white">Confirm</span>
	                       		@endif
	                       </td>
                         <td>
                            @if($reservation->status == false)
                              <form id="reserv-{{ $reservation->id }}" action="{{ route('reserv.status', $reservation->id) }}" method="POST" style="display:inline">
                               @csrf
                             </form>
                             <button type="button" class="btn btn-sm btn-warning" onclick="if(confirm('Are you verify this request by phone?')){
                                event.preventDefault();
                                document.getElementById('reserv-{{ $reservation->id }}').submit(); 
                              }
                              else{
                                event.preventDefault();
                              }">
                              <i class="material-icons">done</i>
                             </button>

                            @else
                              <form id="reserv-{{ $reservation->id }}" action="{{ route('reserv.destroy', $reservation->id) }}" method="POST" style="display:inline">
                               @csrf
                             </form>
                             <button type="button" class="btn btn-sm btn-danger" onclick="if(confirm('Are you verify this request by phone?')){
                                event.preventDefault();
                                document.getElementById('reserv-{{ $reservation->id }}').submit(); 
                              }
                              else{
                                event.preventDefault();
                              }">
                              <i class="material-icons">delete</i>
                             </button>
                            @endif
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