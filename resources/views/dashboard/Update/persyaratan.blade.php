@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="showimages"></div>
        </div>
        <div class="col">
            <div class="card" style="margin-top: 1cm">
                <div class="card-header bg-info">
                    <h6 class="text-white">Update Persyartan Permohonan</h6>
                </div>
                <div class="card-body">
                    <form class="image-upload" method="post" action="#" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control"/>
                        </div>  
                        </div>
                        <div class="mb-3">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea id="mytextarea" name="description" rows="8" class="form-control tinymce-editor" style="font-size: 18px; height: 300px;"></textarea>

                        </div>  
                    </div>
                        <div class="form-group">
                            <label>Author Name</label>
                            <input type="text" name="auther_name" class="form-control"/>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success btn-sm" style="margin-top: 10px">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdn.tiny.cloud/1/ctxqmaxymwjp6e9amr851vaczby04wpx1hxnra6wjd5shgcb/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: '#mytextarea'
    });
  </script>
   

    <!-- Sale & Revenue End -->

    <!-- Recent Sales Start -->
 
    <!-- Recent Sales End -->
@endsection