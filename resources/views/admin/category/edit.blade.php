@extends('admin.layouts.master')

@section('title', 'Category Edit')


@section('adminContent')
	<div class="content">
     <div class="container-fluid">
       <div class="row">
         <div class="col-md-8">
           <div class="card">
             <div class="card-header card-header-primary">
               <h4 class="card-title">Edit Your Category</h4>
               <p class="card-category">You can edit here your category</p>
             </div>
             <div class="card-body">
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
               <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
               	@csrf
                @method('PUT')
                 <div class="row">
                   <div class="col-md-12">
                     <div class="form-group bmd-form-group">
                       <label for="name" class="bmd-label-floating">Title</label>
                       <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}">
                     </div>
                   </div>
                 </div>

                 <button type="submit" class="btn btn-primary pull-right">UPDATE</button>
                 <div class="clearfix"></div>
               </form>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
@endsection