@extends('layouts.admin.master')

@section('title', 'TAG SECTION :: LARA 5.7 BLOG')

@push('css')
<style>
    .tag-h2 {
        display: inline-block;
    }
    .tag-add-btn {
        float: right;
        cursor: pointer;
        margin-right: 30px;
        margin-top: -3px;
    }
</style>

@endpush

@section('main-content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                BLOG ALL TAGS - DATATABLE
            </h2>
        </div>
        @includeIf('alert-message.show-message')
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="tag-h2">
                            ALL TAGS MANAGES
                        </h2>
                        <a href="{{ route('admin.tag.create') }}" class="btn btn-primary waves-effect btn-sm tag-add-btn">
                            <i class="material-icons">add</i>
                            <span>Add New Tag</span>
                        </a>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="{{ route('admin.tag.create') }}">Add Tag</a></li>
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
                                    <th class="text-center">Tag Name</th>
                                    <th class="text-center">Tag Slug</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th class="text-center">Sl No.</th>
                                    <th class="text-center">Tag Name</th>
                                    <th class="text-center">Tag Slug</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($all_tag_data as $data)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $data->name }}</td>
                                    <td class="text-center">{{ $data->slug }}</td>
                                    <td class="text-center">
                                        @if($data->status === 'active')
                                            <a href="{{ route('admin.tag.inactive', [base64_encode($data->id)]) }}" class="btn btn-success btn-circle waves-effect waves-circle waves-float"><i class="material-icons">arrow_upward</i></a>
                                        @else
                                            <a href="{{ route('admin.tag.active', [base64_encode($data->id)]) }}" class="btn btn-warning btn-circle waves-effect waves-circle waves-float"><i class="material-icons">arrow_downward</i></a>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.tag.edit', [base64_encode($data->id)]) }}" class="btn btn-primary waves-effect"><i class="material-icons">edit</i></a>
                                        <button type="submit" class="btn btn-danger waves-effect" onclick="deleteTag({{ $data->id }})">
                                            <i class="material-icons">delete_forever</i>
                                        </button>
                                        <form action="{{ route('admin.tag.destroy', [base64_encode($data->id)]) }}" method="POST" id="delete_tag_id_{{ $data->id }}" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                            
                                        </form>

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
        function deleteTag(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You Won't Be Able To Delete This!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete Tt!',
                cancelButtonText: 'No, Cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete_tag_id_' + id).submit();
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your Tag Data Is Safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
