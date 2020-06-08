@extends('layouts.admin.master')

@section('title', 'CREATE CATEGORY :: LARA 5.7 BLOG')

@push('css')
    <style>

    </style>
@endpush

@section('main-content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>BLOG CATEGORY</h2>
        </div>

        @includeIf('alert-message.show-message')

        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="cat-h2">
                            ADD CATEGORY
                        </h2>
                        <a href="{{ route('admin.category.index') }}" class="btn btn-primary waves-effect btn-sm cat-add-btn">
                            <i class="material-icons">edit</i>
                            <span>Manage Category</span>
                        </a>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="{{ route('admin.category.index') }}">Manage Category</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <label for="name">Category Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Enter Category Name">
                                </div>
                            </div>
                            <label for="images">Choose Category Image</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="file" name="image" id="images" onchange="previewCatImage(this);" style="">
                                    <input type="button" class="btn btn-primary btn-sm waves-effect file-click" data-id="images" value="Choose Image">
                                    <div class="images">
                                        <div class="mfp-fade">
                                            <a href="" class="image-link">
                                                <img src="" id="show_images" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="add-cat" class="btn btn-primary m-t-15 waves-effect">Add Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Vertical Layout -->
    </div>
@endsection

@push('js')
<script>

</script>
@endpush


