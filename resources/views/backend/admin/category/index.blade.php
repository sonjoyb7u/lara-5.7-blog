@extends('layouts.admin.master')

@section('title', 'CATEGORY SECTION :: LARA 5.7 BLOG')

@push('css')
<style>

</style>

@endpush

@section('main-content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                BLOG ALL CATEGORIES - DATATABLE
            </h2>
        </div>

        @includeIf('alert-message.show-message')

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="cat-h2">
                            ALL CATEGORIES MANAGES
                        </h2>
                        <a href="{{ route('admin.category.create') }}" class="btn btn-primary waves-effect btn-sm cat-add-btn">
                            <i class="material-icons">add</i>
                            <span>Add New Category</span>
                        </a>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="{{ route('admin.category.create') }}">Add Category</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th class="text-center">Sl No.</th>
                                    <th class="text-center">Category Name</th>
                                    <th class="text-center">Category Slug</th>
                                    <th class="text-center">Category Image</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th class="text-center">Sl No.</th>
                                    <th class="text-center">Category Name</th>
                                    <th class="text-center">Category Slug</th>
                                    <th class="text-center">Category Image</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($all_category_data as $data)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $data->name }}</td>
                                    <td class="text-center">{{ $data->slug }}</td>
                                    <td class="text-center">
                                        <div class="row mfp-fade">
                                            <a href="{{ asset('storage/uploads/category/slider/'.$data->image) }}" class="image-link">
                                                <img width="100" height="80" src="{{ asset('storage/uploads/category/slider/'.$data->image) }}" alt="{{ $data->image }}">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        @if($data->status === 'active')
                                            <a href="{{ route('admin.category.inactive', [base64_encode($data->id)]) }}" class="btn btn-success btn-circle waves-effect waves-circle waves-float"><i class="material-icons">arrow_upward</i></a>
                                        @else
                                            <a href="{{ route('admin.category.active', [base64_encode($data->id)]) }}" class="btn btn-warning btn-circle waves-effect waves-circle waves-float"><i class="material-icons">arrow_downward</i></a>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.category.edit', [$data->slug]) }}" class="btn btn-primary waves-effect"><i class="material-icons">edit</i></a>
                                        <form action="{{ route('admin.category.destroy', [base64_encode($data->id)]) }}" method="POST" id="delete_category_id_{{ $data->id }}" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                            
                                        </form>
                                        <button type="submit" class="btn btn-danger waves-effect" onclick="deleteCategory({{ $data->id }})">
                                            <i class="material-icons">delete_forever</i>
                                        </button>

{{--                                        <a href="{{ route('admin.tag.destroy', [base64_encode($data->id)]) }}" class="btn btn-danger waves-effect"><i class="material-icons">delete_forever</i></a>--}}

                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
@endsection

@push('js')
    <script type="text/javascript">

    </script>
@endpush
