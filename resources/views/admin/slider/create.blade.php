@extends('admin.layouts.master')

@section('title', 'Slider Create')


@section('adminContent')
	<div class="content">
     <div class="container-fluid">
       <div class="row">
         <div class="col-md-8">
           <div class="card">
             <div class="card-header card-header-primary">
               <h4 class="card-title">Add New Slider</h4>
               <p class="card-category">You can add here slider</p>
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
               <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
               	@csrf
                 <div class="row">
                   <div class="col-md-12">
                     <div class="form-group bmd-form-group">
                       <label for="title" class="bmd-label-floating">Title</label>
                       <input type="text" name="title" id="title" class="form-control">
                     </div>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-12">
                     <div class="form-group bmd-form-group">
                       <label for="subtitle" class="bmd-label-floating">Subtitle</label>
                       <input type="text" name="subtitle" id="subtitle" class="form-control">
                     </div>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-12">
                     <div class="form-group bmd-form-group">
                       <label for="button_text" class="bmd-label-floating">Button Text</label>
                       <input type="text" name="button_text" id="button_text" class="form-control">
                     </div>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-12">
                     <div class="form-group bmd-form-group">
                       <label for="button_link" class="bmd-label-floating">Button Link</label>
                       <input type="text" name="button_link" id="button_link" class="form-control">
                     </div>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-12">
                   	<label style="display:block">Add Slider Image :</label>
                     <input type="file" name="image">
                   </div>
                 </div>
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