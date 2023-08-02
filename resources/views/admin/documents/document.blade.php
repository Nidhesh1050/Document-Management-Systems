@extends('layouts.admin-app')

@section('content')

<div class="content">
    <div class="card">
        <div class="card-title p-3">Document Form</div>
    
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <form action="{{url('admin/add_document')}}" method="post" id="files"
                    enctype="multipart/form-data">
                    @csrf
                
                    <div class="form-group">
                        <label>Project Id</label>
                        <select name="project_id" class="form-control">
                        <option value=""> Please Select</option>
                        @foreach($project_documents as $project_documents)
                            <option value="{{$project_documents->id}}"> <?php echo $project_documents->project_name;?></option>
                            @endforeach
                        </select>
                        <span class="text-danger error ">
                                @error('project_id')
                                {{$message}}
                                @enderror
                            </span>
                    </div>
                   
                    <div class="form-group">
                        <label>Category Id</label>
                        <select name="category_id" class="form-control">
                        <option value=""> Please Select</option>
                        @foreach($category_documents as $category_documents)
                            <option value="{{$category_documents->id}}"><?php echo $category_documents->name;?></option>
                            @endforeach
                        </select>
                        <span class="text-danger error ">
                                @error('category_id')
                                {{$message}}
                                @enderror
                            </span>
                        </div>

                    <div class="form-group">
                        <label>Document Type Id</label>
                        <select name="document_ty" class="form-control">

                        <option value=""> Please Select</option>
                        @foreach($document_type as $document_type)
                    
                            <option value="{{$document_type->id}}"><?php echo $document_type->name?></option>
                          @endforeach
                        </select>
                        <span class="text-danger error ">
                                @error('document_type_id')
                                {{$message}}
                                @enderror
                            </span>
                    </div>

                    <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" class="form-control" name="title" id="" placeholder="title">
                            <span class="text-danger error ">
                                @error('title')
                                {{$message}}
                                @enderror
                            </span>
                        </div>


                    <div class="form-group">
                            <label for="exampleFormControlFile1"> Upload document</label>
                            <input type="file" class="form-control-file" name="document"
                                id="exampleFormControlFile1">
                                <span class="text-danger error ">
                                @error('documents')
                                {{$message}}
                                @enderror
                            </span>
                     </div>

                    <div class="form-group">
                            <label for="status">Status</label>
                            <input type="" class="form-control" name="status" id="status"
                                placeholder="Status">
                                <span class="text-danger error ">
                                @error('status')
                                {{$message}}
                                @enderror
                            </span>
                     </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>



<script>
$(document).ready(function() {



    $("#files").validate({
        rules: {
            project_id :"required",
            category_id:"required",
            document_ty: "required",
            title: "required",
            document: "required",
            status: "required",
        },
        messages: {
            project_id: "Please select project Name",
            category_id: "Please select category Name",
            document_ty: "Please select document type",
            title:  "Please Enter title",
            document: "Choose any documemnts",
            status: "Please Enter Status",
        }
    });
});
</script>

@endsection