@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header mb-4">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Edit User') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('users.index') }}">{{ __('Usres') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ __('Edit User') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('Edit user') }}: {{ $user->name }}</h3>
                <div class="card-tools">
                    <a href="{{ route('users.index') }}" class="btn btn-block btn-primary">
                        <i class="fas fa-long-arrow-alt-left"></i> {{ __('Go Back') }}
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <form class="form-horizontal" action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="name" class="col-form-label">{{ __('User Name') }}<span class="required-field">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="{{ __('User Name') }}" value="{{ $user->name }}" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="email" class="col-form-label">{{ __('Email Address') }}<span class="required-field">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="{{ __('Email Address') }}" value="{{ $user->email }}" readonly>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="password" class="col-form-label">{{ __('Password') }}<span class="required-field">*</span></label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="{{ __('Password') }}"   autocomplete="new-password">
                                <small id="passwordHelp" class="form-text text-muted">{{ __('Leave the box empty if you don\'t want to change the password.') }}</small>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="password-confirm" class="col-form-label">{{ __('Password Confirm') }}<span class="required-field">*</span></label>
                                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="{{ __('Password Confirm') }}"   autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="profilePic" class="col-form-label">{{ __('Profile Picture') }}</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('profilePic') is-invalid @enderror" id="attached-image" name="profilePic">
                                    <label class="custom-file-label" for="customFile">{{ __('Choose file') }}</label>
                                    <small id="profilePicHelp" class="form-text text-muted">{{ __('Leave the box empty if you don\'t want to change the picture.') }}</small>
                                    @error('profilePic')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="image-preview">
                                    <img src="" id="attached-preview-img" class="mt-3"/>
                                </div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="accountType" class="col-form-label">{{ __('Account Type') }}</label>
                                <select class="form-control" id="accountType" name="accountType">
                                    <option value="0" {{ $user->isAdmin() ? '' : 'selected' }}>{{ __('General User') }}</option>
                                    <option value="1" {{ $user->isAdmin() ? 'selected' : '' }}>{{ __('Admin') }}</option>
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="status" class="col-form-label">{{ __('Status') }}</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="1" {{ $user->isActive() ? 'selected' : '' }}>{{ __('Active') }}</option>
                                    <option value="0" {{ $user->isActive() ? '' : 'selected' }}>{{ __('Inactive') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
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

