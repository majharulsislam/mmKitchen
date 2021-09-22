@extends('admin.layouts.master')

@section('title', 'All Item')

@section('adminContent')
	<div class="content">
     	<div class="container-fluid">
       <div class="row">
         <div class="col-md-12">
           <div class="card">
             <div class="card-header card-header-primary">
               <h4 class="card-title">All Item</h4>
               <p class="card-category">Here is your all items.</p>
               <a href="{{ route('item.create') }}" class="btn btn-sm btn-danger pull-right">Add new item</a>
             </div>
             <div class="card-body">
               <div class="table-responsive">
                 <table class="table table-bordered" id="dataTables">
                   <thead class=" text-primary">
                     <th>#SL</th>
                     <th>Item name</th>
                     <th>Description</th>
                     <th>Price</th>
                     <th>Image</th>
                     <th>Category</th>
                     <th>Action</th>
                   </thead>
                   <tbody>

                   	@foreach($items as $key => $item)
	                     <tr>
	                       <td>{{ $key+1 }}</td>
	                       <td>{{ $item->name }}</td>
                         <td>{{ $item->description }}</td>
                         <td>{{ $item->price }}</td>
                         <td>
                            <img src="{{ asset('uploads/item/'.$item->image) }}" alt="Item-image" style="width:40px;height: 40px;">
                          </td>
                          <td>{{ $item->category->name }}</td>
                         <td>
                           <a class="btn btn-sm btn-info" href="{{ route('item.edit', $item->id) }}"><i class="material-icons">edit</i></a>

                           <form id="delete-{{ $item->id }}" action="{{ route('item.destroy', $item->id) }}" method="POST" style="display:inline">
                             @csrf
                             @method('DELETE')
                           </form>
                           <button class="btn btn-sm btn-danger" onclick="if(confirm('Are you sure? You want to delete this item?')){
                            event.preventDefault();
                            document.getElementById('delete-{{ $item->id }}').submit();
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