@extends('layouts.admin')
@section('title') Account | Property Bali @endsection
@section('content')
            <div class="dashboard-heading">
                <h2 class="dashboard-title">My Account</h2>
                <p class="dashboard-subtitle">Update your current profile</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('account.update', $account->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                            <div class="card">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Your Name</label>
                                                <input type="text" id="name" class="form-control" name="name" value="{{ $account->name }}">
                                            </div>
                                        </div> <!--  end col-md-6 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Your Email</label>
                                                <input type="email" id="email" class="form-control" name="email" value="{{ $account->email }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="mobile">Mobile</label>
                                                <input type="text" id="mobile" class="form-control" name="phone_number" value="{{ $account->phone }}">
                                            </div>
                                        </div> <!--  end col-md-6 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="role">Role</label>
                                                <input type="text" id="role" class="form-control" name="role" value="{{ $account->role }}">
                                            </div>
                                        </div> <!--  end col-md-6 -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="password">Your Password (optional)</label>
                                                <input type="password" id="password" class="form-control" name="password" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-success">
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