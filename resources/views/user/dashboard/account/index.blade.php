@extends('user.dashboard.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">My Account</h2>
            <p class="dashboard-subtitle">Update your current profile</p>
            <div class="container-fluid">
                @if (session()->has('dashboardFailed'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('dahsboardFailed') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </p>
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('updateAccount') }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Your Name</label>
                                            <input class="form-control" type="text" name="name" id="name"
                                                value="{{ Auth::user()->name ?? old('name') }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Your Email</label>
                                            <input class="form-control" type="text" name="email" id="email"
                                                value="{{ Auth::user()->email ?? old('email') }}" placeholder="jhonDoe@mail.com" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Province</label>
                                            <input class="form-control" type="text" name="province"
                                                value="{{ Auth::user()->province }}" placeholder="Central Java" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="City">City</label>
                                            <input class="form-control" type="text" name="city"
                                                value="{{ Auth::user()->city }}" placeholder="Semarang" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Postal Code</label>
                                            <input class="form-control" type="text" placeholder="59584" name="zip_code"
                                                value="{{ Auth::user()->zip_code ?? old('zip_code') }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <input type="text" class="form-control" name="country" id="country"
                                                value="{{ Auth::user()->country ?? old('country') }}"
                                                placeholder="Indonesia" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mobile">Mobile</label>
                                            <input type="text" class="form-control" name="phone" id="mobile"
                                                value="{{ Auth::user()->phone ?? old('phone') }}"
                                                placeholder="+62123455689" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Gender</label>
                                            <div class="custom-control custom-radio">
                                                <input class="form-check-input" type="radio" name="gender" value="Female"
                                                    @if (Auth::user()->gender == 'Female')
                                                checked
                                                @endif />
                                                <label class="form-check-label" for="inlineRadio1">Female</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input class="form-check-input" type="radio" name="gender" value="Male"
                                                    @if (Auth::user()->gender == 'Male')
                                                checked
                                                @endif />
                                                <label class="form-check-label" for="inlineRadio1">Male</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <textarea name="address" id="" cols="30" rows="10" class="form-control"
                                                placeholder="Jl. Imam Bonjol, Semarang">{{ Auth::user()->address }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right mt-3">
                                        <button type="submit" class="btn btn-success px-5">
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
    </div>
@endsection
