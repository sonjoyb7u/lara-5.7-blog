@extends('layouts.admin.master')

@section('title', 'AUTHOR DASHBOARD :: ')

@section('header')
    @includeIf('layouts.admin.components.header')
@endsection

@section('left-sidebar')
    @includeIf('layouts.admin.components.left-sidebar')
@endsection


@section('main-content')

        <div class="card">
            <div class="card-header">Dashboard</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @if(session('errorMsg'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('errorMsg') }}
                    </div>
                @endif

                You are logged in! as <strong>{{ Auth::user()->name }}</strong>
            </div>
        </div>

@endsection

