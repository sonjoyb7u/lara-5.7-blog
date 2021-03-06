@extends('layouts.admin.master')

@if(request()->is('author/dashboard'))
    @section('title', 'AUTHOR DASHBOARD :: ')
@endif

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

