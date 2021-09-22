@extends('admin.layouts.master')

@section('title', 'Slider')

@section('adminContent')
	<div class="content">
     	<div class="container-fluid">
       <div class="row">
         <div class="col-md-12">
           <div class="card">
             <div class="card-header card-header-primary">
               <h4 class="card-title">All Slider</h4>
               <p class="card-category">Here is your all slider you can use anywhere.</p>
               <a href="{{ route('slider.create') }}" class="btn btn-sm btn-danger pull-right">Add new slider</a>
             </div>
             <div class="card-body">
               <div class="table-responsive">
                 <table class="table table-bordered" id="dataTables">
                   <thead class=" text-primary">
                     <th>#SL</th>
                     <th>Title</th>
                     <th>Subtitle</th>
                     <th>Image</th>
                     <th>Action</th>
                   </thead>
                   <tbody>

                   	@foreach($sliders as $key => $slider)
	                     <tr>
	                       <td>{{ $key+1 }}</td>
	                       <td>{{ $slider->title }}</td>
	                       <td>{{ $slider->subtitle }}</td>
	                       <td>{{ $slider->image }}</td>
                         <td>
                           <a class="btn btn-sm btn-info" href="{{ route('slider.edit', $slider->id) }}"><i class="material-icons">edit</i></a>

                           <form id="delete-{{ $slider->id }}" action="{{ route('slider.destroy', $slider->id) }}" method="POST" style="display:inline">
                             @csrf
                             @method('DELETE')
                           </form>
                           <button class="btn btn-sm btn-danger" onclick="if(confirm('Are you sure? You want to delete this slider?')){
                            event.preventDefault();
                            document.getElementById('delete-{{ $slider->id }}').submit();
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