@extends('admin.layouts.master')

@section('title', 'Category Create')


@section('adminContent')
	<div class="content">
     <div class="container-fluid">
       <div class="row">
         <div class="col-md-8">
           <div class="card">
             <div class="card-header card-header-primary">
               <h4 class="card-title">Add New Category</h4>
               <p class="card-category">You can add here category</p>
             </div>
             <div class="card-body">
              <!-- Error -->
             	@if ($errors->any())
  					    <div class="alert alert-danger">
  					    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  						    	<i class="material-icons">close</i>
  						  </button>
  					        <ul>
  					            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
  					            @endforeach
  					        </ul>
  					    </div>
					     @endif
               <form action="{{ route('category.store') }}" method="POST">
               	@csrf
                 <div class="row">
                   <div class="col-md-12">
                     <div class="form-group bmd-form-group">
                       <label for="name" class="bmd-label-floating">Category Name</label>
                       <input type="text" name="name" id="name" class="form-control">
                     </div>
                   </div>
                 </div>
                 <a href="{{ route('category.index') }}" class="btn btn-info pull-right">Back</a>
                 <button type="submit" class="btn btn-primary pull-right">Save</button>
                 <div class="clearfix"></div>
               </form>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
@endsection