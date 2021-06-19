@extends('layouts.admin')
@section('title')
    Category | Property Bali
@endsection
@section('content')
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Create New Category</h2>
            <p class="dashboard-subtitle">Create your own Category</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
            <div class="col-12">
                <form action="{{ route('categori.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group" >
                            <label>Category Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                        <button type="submit" class="btn btn-success w-100">
                            Save Now
                        </button>
                        </div>

                    </div>
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>
@endsection