@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Setup') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('Setup') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row set-up-page">
                <div class="col-md-4 col-sm-6 col-12">
                    <a href="{{ route('superadmin.setup.general') }}">
                        <div class="info-box">
                        <span class="info-box-icon bg-success">
                            <i class="fas fa-tools"></i>
                        </span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('General Settings') }}</span>
                                <span class="info-box-number">{{ \App\Models\GeneralSetting::count() }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </a>
                </div>
                <!-- /.col -->
                <div class="col-md-4 col-sm-6 col-12">
                    <a href="">
                        <div class="info-box">
                        <span class="info-box-icon bg-success">
                            <i class="fas fa-wallet"></i>
                        </span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('Payment Methods') }}</span>
                                <span class="info-box-number text-bold">{{ App\Models\PaymentMethod::count() }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </a>
                </div>
                <!-- /.col -->
                <div class="col-md-4 col-sm-6 col-12">
                    <a href="">
                        <div class="info-box">
                        <span class="info-box-icon bg-success">
                            <i class="fas fa-stream"></i>
                        </span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('Processing Steps') }}</span>
                                <span class="info-box-number text-bold">{{ App\Models\ProcessingStep::count() }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </a>
                </div>
                <!-- /.col -->
                <div class="col-md-4 col-sm-6 col-12">
                    <a href="">
                        <div class="info-box">
                        <span class="info-box-icon bg-success">
                            <i class="fas fa-ruler"></i>
                        </span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('Sizes Setting') }}</span>
                                <span class="info-box-number">{{ App\Models\Size::count() }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </a>
                </div>
                <!-- /.col -->
                <div class="col-md-4 col-sm-6 col-12">
                    <a href="">
                        <div class="info-box">
                        <span class="info-box-icon bg-success">
                            <i class="fas fa-store"></i>
                        </span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('Showrooms') }}</span>
                                <span class="info-box-number text-bold">{{ App\Models\Showroom::count() }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </a>
                </div>
                <!-- /.col -->
                <div class="col-md-4 col-sm-6 col-12">
                    <a href="">
                        <div class="info-box">
                        <span class="info-box-icon bg-success">
                            <i class="fas fa-balance-scale"></i>
                        </span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('Units Setting') }}</span>
                                <span class="info-box-number">{{ App\Models\Unit::count() }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </a>
                </div>
                <!-- /.col -->
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection



