@extends('layout.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Assigned</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Dropdown for Due Date -->
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-sm-12 text-center">
                <select class="form-control">
                    <option value="">No Due Date</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Additional "No Due Date" options as dropdowns -->
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-sm-12 text-center">
                <!-- Dropdown for second "No Due Date" -->
                <select class="form-control">
                    <option value="">This Week</option>
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-12 text-center">
                <!-- Dropdown for third "No Due Date" -->
                <select class="form-control">
                    <option value="">Next Week</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Rest of your content goes here -->
</div>
@endsection