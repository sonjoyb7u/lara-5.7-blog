@extends('layouts.admin.master')

@section('title', 'EDIT CATEGORY :: LARA 5.7 BLOG')

@push('css')
    <style>

    </style>
@endpush

@section('main-content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>EDIT BLOG CATEGORY</h2>
        </div>

        @includeIf('alert-message.show-message')

        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="cat-h2">
                            EDIT CATEGORY
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
                        <form action="{{ route('admin.category.update', [base64_encode($cat_data->id)]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <label for="name">Category Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $cat_data->name }}">
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
                                                <img width="100" height="80" src="{{ asset('storage/uploads/category/slider/'.$cat_data->image) }}" id="show_images" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button type="submit" id="add-tag" class="btn btn-primary m-t-15 waves-effect">Update Category</button>
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
        // // File input button customize & clickable choose image file browser using js...
        // $('body').on('click', '.file-click', function() {
        //     let id = $(this).attr('data-id');
        //     $('#' + id).click();
        // });
        // function previewCatImage(input) {
        //     var id = $(input).attr('id');
        //     // console.log(id);
        //     if(input.files && input.files[0]) {
        //         var reader = new FileReader();
        //
        //         $('#show_'+id).slideUp();
        //         reader.onload = function(e) {
        //             $('#show_'+id).attr('src', e.target.result);
        //             $('#show_'+id).parent().attr('href', e.target.result);
        //             $('#show_'+id).slideDown();
        //         };
        //         reader.readAsDataURL(input.files[0]);
        //     }
        //
        // }
    </script>
@endpush


