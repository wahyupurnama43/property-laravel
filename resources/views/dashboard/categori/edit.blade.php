@extends('layouts.admin')
@section('title')
    Category | Property Bali
@endsection
@section('content')
            
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Category</h2>
            <p class="dashboard-subtitle">Create New Category</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
            <div class="col-12">
                @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                    @endforeach
                </ul>
                @endif
                <form action="{{ route('categori.update', $categori->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $categori->name }}">
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