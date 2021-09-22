@extends('admin.layouts.master')

@section('title', 'Category')

@section('adminContent')
	<div class="content">
     	<div class="container-fluid">
       <div class="row">
         <div class="col-md-12">
           <div class="card">
             <div class="card-header card-header-primary">
               <h4 class="card-title">All Category</h4>
               <p class="card-category">Here is your all category you can use anywhere.</p>
               <a href="{{ route('category.create') }}" class="btn btn-sm btn-danger pull-right">Add new category</a>
             </div>
             <div class="card-body">
               <div class="table-responsive">
                 <table class="table table-bordered" id="dataTables">
                   <thead class=" text-primary">
                     <th>#SL</th>
                     <th>Category name</th>
                     <th>Slug</th>
                     <th>Action</th>
                   </thead>
                   <tbody>

                   	@foreach($categories as $key => $category)
	                     <tr>
	                       <td>{{ $key+1 }}</td>
	                       <td>{{ $category->name }}</td>
	                       <td>{{ $category->slug }}</td>
                         <td>
                           <a class="btn btn-sm btn-info" href="{{ route('category.edit', $category->id) }}"><i class="material-icons">edit</i></a>

                           <form id="delete-{{ $category->id }}" action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline">
                             @csrf
                             @method('DELETE')
                           </form>
                           <button class="btn btn-sm btn-danger" onclick="if(confirm('Are you sure? You want to delete this category?')){
                            event.preventDefault();
                            document.getElementById('delete-{{ $category->id }}').submit();
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