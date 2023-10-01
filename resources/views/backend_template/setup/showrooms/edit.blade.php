@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header mb-4">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Edit Showroom') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.setup') }}">{{ __('Setup') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('showrooms.index') }}">{{ __('Showrooms') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ __('Edit Showroom') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('Edit showroom') }}: {{ $showroom->name }}</h3>
                <div class="card-tools">
                    <a href="{{ route('showrooms.index') }}" class="btn btn-block btn-primary">
                        <i class="fas fa-long-arrow-alt-left"></i> {{ __('Go Back') }}
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <form class="form-horizontal" action="{{ route('showrooms.update', $showroom->slug) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="name">{{ __('Showroom Name') }}<span class="required-field">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="{{ __('Showroom Name') }}" value="{{ $showroom->name }}" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="showroomCode">{{ __('Showroom Code') }}<span class="required-field">*</span></label>
                                <input type="text" class="form-control @error('showroomCode') is-invalid @enderror" id="showroomCode" name="showroomCode" placeholder="{{ __('Showroom Code') }}" value="{{ $showroom->code }}" required>
                                @error('showroomCode')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="showroomManager" class="col-form-label">{{ __('Showroom Manager') }}<span class="required-field">*</span></label>
                                <input type="text" class="form-control @error('showroomManager') is-invalid @enderror" id="showroomManager" name="showroomManager" placeholder="{{ __('Showroom Manager Name') }}" value="{{ $showroom->manager }}" required>
                                @error('showroomManager')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="emailAddress" class="col-form-label">{{ __('Email Address') }}</label>
                                <input type="email" class="form-control @error('emailAddress') is-invalid @enderror" id="emailAddress" name="emailAddress" placeholder="{{ __('Email Address') }}" value="{{ $showroom->email }}" >
                                @error('emailAddress')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="phoneNumber" class="col-form-label">{{ __('Phone Number') }}</label>
                                <input type="number" class="form-control @error('phoneNumber') is-invalid @enderror" id="phoneNumber" name="phoneNumber" placeholder="{{ __('Phone Number') }}" value="{{ $showroom->phone_number }}">
                                @error('phoneNumber')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="address" class="col-form-label">{{ __('Showroom Address') }}</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="{{ __('Showroom Address') }}">{{ $showroom->address }}</textarea>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="note" class="col-form-label">{{ __('Showroom Note') }}</label>
                                <textarea class="form-control @error('note') is-invalid @enderror" id="note" name="note" placeholder="{{ __('Showroom Note') }}">{{ $showroom->note }}</textarea>
                                @error('note')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="status" class="col-form-label">{{ __('Status') }}</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="1" {{ $showroom->isActive() ? 'selected' : '' }}>{{ __('Active') }}</option>
                                    <option value="0" {{ $showroom->isActive() ? '' : 'selected' }}>{{ __('Inactive') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> {{ __('Save Changes') }}</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.content -->
@endsection


