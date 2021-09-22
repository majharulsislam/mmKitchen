@extends('admin.layouts.master')

@section('title', 'Dashboard')

@section('adminContent')
	{{-- Start Content --}}
	  <div class="content">
	    <div class="container-fluid">
	      <div class="row">
	        <div class="col-lg-3 col-md-6 col-sm-6">
	          <div class="card card-stats">
	            <div class="card-header card-header-warning card-header-icon">
	              <div class="card-icon">
	                <i class="material-icons">content_copy</i>
	              </div>
	              <p class="card-category">Category/Item</p>
	              <h3 class="card-title">{{ $category }}/{{ $item }}</h3>
	            </div>
	            <div class="card-footer">
	              <div class="stats">
	                <i class="material-icons text-danger">trending_up</i>
	                <a href="#">All Category & Item here</a>
	              </div>
	            </div>
	          </div>
	        </div>
	        <div class="col-lg-3 col-md-6 col-sm-6">
	          <div class="card card-stats">
	            <div class="card-header card-header-success card-header-icon">
	              <div class="card-icon">
	                <i class="material-icons">library_books</i>
	              </div>
	              <p class="card-category">Slider</p>
	              <h3 class="card-title">{{ $slider }}</h3>
	            </div>
	            <div class="card-footer">
	              <div class="stats">
	                <i class="material-icons">date_range</i> Last 24 Hours
	              </div>
	            </div>
	          </div>
	        </div>
	        <div class="col-lg-3 col-md-6 col-sm-6">
	          <div class="card card-stats">
	            <div class="card-header card-header-secondary card-header-icon">
	              <div class="card-icon">
	                <i class="material-icons">inventory</i>
	              </div>
	              <p class="card-category">Reservation</p>
	              <h3 class="card-title">{{ $reservations->count() }}</h3>
	            </div>
	            <div class="card-footer">
	              <div class="stats">
	                <i class="material-icons">local_offer</i> Tracked From Resturent
	              </div>
	            </div>
	          </div>
	        </div>
	        <div class="col-lg-3 col-md-6 col-sm-6">
	          <div class="card card-stats">
	            <div class="card-header card-header-info card-header-icon">
	              <div class="card-icon">
	                <i class="material-icons">contact_phone</i>
	              </div>
	              <p class="card-category">Contact Message</p>
	              <h3 class="card-title">{{ $contact }}</h3>
	            </div>
	            <div class="card-footer">
	              <div class="stats">
	                <i class="material-icons">update</i> Just Updated
	              </div>
	            </div>
	          </div>
	        </div>
	      </div>

	      <!-- Start reservation table -->
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
	<!-- End content -->
@endsection