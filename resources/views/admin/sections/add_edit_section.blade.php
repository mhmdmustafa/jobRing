@extends('layouts.admin_layout.admin_layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Catalogues</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Sections</a></li>
                            <li class="breadcrumb-item active">Sections</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->

        <section  class="content" >
            <div class="container-fluid">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(\Illuminate\Support\Facades\Session::has('success_message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{\Illuminate\Support\Facades\Session::get('success_message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form name="categoryForm" id="categoryForm" @if(empty( $categoryData['id']))
                action="{{url('admin/add-edit-section2')}}"
                      @else
                      action="{{url('admin/add-edit-section/'.$categoryData['id'])}}" @endif method="post" enctype="multipart/form-data" >
                    @csrf

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">{{$title}}</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category_name">Category Name</label>
                                        <input name="category_name"  type="text" class="form-control" id="category_name" placeholder="Enter Category"
                                               @if(!empty($categoryData['category_name'])) value="{{$categoryData['category_name']}}"  @else value="{{old('category_name')}}" @endif>
                                    </div>

                                    <!-- /.form-group -->
                                    <div id="appendCategoriesLevel">
                                        @include('admin.categories.append_categories_level')
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Section</label>
                                        <select name="section_id" id="section_id" class="form-control select2" style="width: 100%;">
                                            <option value="">Select</option>
                                            @foreach($getSections as $section)
                                                <option  value="{{$section->id}}" @if(!empty($categoryData['section_id'])&& $categoryData['section_id']==$section->id) selected @endif >{{$section->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="exampleInputFile">Category Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="category_image" name="category_image" >
                                                <label class="custom-file-label" for="category_image">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div>
                                        </div>
                                        @if(!empty($categoryData['category_image']))
                                            <div ><img style="height:100px;" style="width: 50px;" src="{{url('/images/category_images/'.$categoryData['category_image'])}}" >
                                                &nbsp;
                                                <a class="confirmDelete" href="javascript:void(0)" record="category_image" recordid="{{$categoryData['id']}}" <?php /* href="{{url('admin/delete-category-image/'.$categoryData['id'])}}" */?> >Delete Image</a>
                                            </div>
                                        @endif

                                    </div>

                                    <!-- /.form-group -->
                                </div>

                                <!-- /.col -->
                            </div>
                            <!-- /.row -->


                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="category_name">Category Discount</label>
                                        <input type="text" class="form-control" id="category_discount" name="category_discount" placeholder="Enter Category"
                                               @if(!empty($categoryData['category_discount'])) value="{{$categoryData['category_discount']}}"  @else value="{{old('category_discount')}}" @endif>
                                    </div>
                                    <div class="form-group">
                                        <label for="category_name">Category Description</label>
                                        <textarea  rows="3" type="text" class="form-control" id="description" name="description" placeholder="Enter Category Description"
                                        >@if(!empty($categoryData['description'])) {{$categoryData['description']}}  @else value="{{old('description')}}" @endif</textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="category_name">Category Url</label>
                                        <input name="url" type="text" class="form-control" id="url" placeholder="Enter Category"
                                               @if(!empty($categoryData['url'])) value="{{$categoryData['url']}}"  @else value="{{old('url')}}" @endif>
                                    </div>
                                    <div class="form-group">
                                        <label for="category_name">Meta Title</label>
                                        <textarea name="meta_title" id="meta_title" rows="3" type="text" class="form-control" placeholder="Enter Category Description"
                                        >@if(!empty($categoryData['meta_title'])){{$categoryData['meta_title'] }}@else {{old('meta_title')}}@endif</textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="meta_description">Meta Description</label>
                                        <textarea  name="meta_description" rows="3" class="form-control" id="meta_description" placeholder="Enter Category Description"
                                        >@if(!empty($categoryData['meta_description'])) {{$categoryData['meta_description']}}  @else{{old('meta_description')}}" @endif</textarea>
                                    </div>

                                </div>

                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="meta_keywords">Meta Keywords</label>
                                        <textarea name="meta_keywords" id="meta_keywords" rows="3" class="form-control"  placeholder="Enter Category Description"
                                        >@if(!empty($categoryData['meta_keywords'])) {{$categoryData['meta_keywords']}}  @else value="{{old('meta_keywords')}}" @endif</textarea>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <!-- /.card-body -->
                        </div>
                    </div>


                    <!-- /.row -->

                </form>
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection
