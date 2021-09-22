@extends('admin.layouts.master')

@section('title', 'Item edit')


@section('adminContent')
  <div class="content">
     <div class="container-fluid">
       <div class="row">
         <div class="col-md-8">
           <div class="card">
             <div class="card-header card-header-primary">
               <h4 class="card-title">Edit Item</h4>
               <p class="card-category">You can edit your item here</p>
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
               <form action="{{ route('item.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                 <div class="row">
                   <div class="col-md-12">
                     <div class="form-group bmd-form-group">
                       <label for="name" class="bmd-label-floating">Item Name</label>
                       <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}">
                     </div>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-12">
                     <div class="form-group bmd-form-group">
                       <select name="category_id" class="form-control">
                         <option value="">— Select Category —</option>
                         @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                          @endforeach
                       </select>
                     </div>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-12">
                     <div class="form-group bmd-form-group">
                       <label for="price" class="bmd-label-floating">Price</label>
                       <input type="number" name="price" id="price" class="form-control" value="{{ $item->price }}">
                     </div>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-12">
                     <div class="form-group bmd-form-group">
                       <label for="description" class="bmd-label-floating">Description</label>
                       <input type="text" name="description" id="description" class="form-control" value="{{ $item->description }}">
                     </div>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-12">
                      <label>Old Image:</label>
                      <img src="{{ asset('uploads/item/'.$item->image) }}" alt="Item-image" style="width:50px">
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-12">
                      <label for="image">Choose Item Image:</label>
                      <input type="file" name="image" id="image">
                   </div>
                 </div>

                 <a href="{{ route('item.index') }}" class="btn btn-info pull-right">Back</a>
                 <button type="submit" class="btn btn-primary pull-right">Updated</button>
                 <div class="clearfix"></div>
               </form>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
@endsection