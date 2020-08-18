@extends ('backend.template.layout')

@section('main-content')
<div class="row mg-b-20">
    <div class="col-md">
      <div class="card card-body">
        <!-- Create New Category Form Start -->
        <form action="{{ route('update.Category',$category->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf                	
            <div class="form-group">
                <label>Category Name</label>
                <input type="text" name="cat_name" class="form-control" value="{{ $category->name }}">
            </div>
            <div class="form-group">
                <input type="submit" name="addCategory" value="Update Category" class="btn btn-primary">
            </div>
            

        </form>
        <!-- Create New Category Form End -->
      </div><!-- card -->
    </div><!-- col -->            
  </div><!-- row -->

@endsection