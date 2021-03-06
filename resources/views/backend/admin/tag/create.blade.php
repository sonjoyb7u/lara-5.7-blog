@extends('layouts.admin.master')

@section('title', 'CREATE TAG :: LARA 5.7 BLOG')

@push('css')
    <style>
        .tag-h2 {
            display: inline-block;
        }
        .tag-manage-btn {
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
            <h2>BLOG TAG</h2>
        </div>

        @includeIf('alert-message.show-message')

        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="tag-h2">
                            ADD TAG
                        </h2>
                        <a href="{{ route('admin.tag.index') }}" class="btn btn-primary waves-effect btn-sm tag-manage-btn">
                            <i class="material-icons">edit</i>
                            <span>Manage Tag</span>
                        </a>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="{{ route('admin.tag.index') }}">Manage Tag</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.tag.store') }}" method="POST">
                            @csrf

                            <label for="name">Tag Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Enter Tag Name">
                                </div>
                            </div>
                            <br>
                            <button type="submit" id="add-tag" class="btn btn-primary m-t-15 waves-effect">Add Tag</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Vertical Layout -->
    </div>
@endsection


