@php
use App\Helpers\AppHelper;
$helper = AppHelper::instance();
@endphp

@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header mb-4">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('View Purchase Return') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('purchaseReturn.index') }}">{{ __('Return Purchases') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ __('View Purchase Return') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="card col-md-12">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('View return products for purchase') }}:
                            {{ $helper->pruchaseCode($purchaseReturn->purchase->purchase_code) }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 table-responsive view-table">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <strong>{{ __('Purchased Code') }}:</strong>
                                                {{ $helper->pruchaseCode($purchaseReturn->purchase->purchase_code) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>{{ __('Return Reason') }}:</strong>
                                                {{ $purchaseReturn->return_reason }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>{{ __('Return Date') }}:</strong>
                                                {{ \Carbon\Carbon::parse($purchaseReturn->return_date)->format('d-M-Y') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>{{ __('Supplier') }}:</strong>
                                                {{ $purchaseReturn->purchase->supplier->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>{{ __('Purchase Products') }}:</strong>
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        @foreach ($purchaseReturn->purchase->purchaseProducts as $key => $product)
                                                            @if ($key == 0)
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>{{ __('Product') }}</th>
                                                                        <th>{{ __('Purchased Qty') }}</th>
                                                                        @if ($product->used_quantity > 0)
                                                                            <th>{{ __('Used') }}</th>
                                                                        @endif
                                                                        @if ($product->return_quantity > 0)
                                                                            <th>{{ __('Return') }}</th>
                                                                        @endif
                                                                        @if ($product->damage_quantity > 0)
                                                                            <th>{{ __('Damage ') }}</th>
                                                                        @endif
                                                                        <th>{{ __('Available') }}</th>
                                                                        <th>{{ __('Unit Price') }}</th>
                                                                        <th class="text-right">{{ __('Total') }}</th>
                                                                    </tr>
                                                                </thead>
                                                            @endif
                                                            <tr>
                                                                <td>{{ ++$key }}</td>
                                                                <td>{{ $product->product_name }}</td>
                                                                <td>{{ $product->quantity }} {{ $product->unit }}</td>
                                                                @if ($product->used_quantity > 0)
                                                                    <td>{{ $product->used_quantity }}
                                                                        {{ $product->unit }}</td>
                                                                @endif
                                                                @if ($product->return_quantity > 0)
                                                                    <td>{{ $product->return_quantity }}
                                                                        {{ $product->unit }}</td>
                                                                @endif
                                                                @if ($product->damage_quantity > 0)
                                                                    <td>{{ $product->damage_quantity }}
                                                                        {{ $product->unit }}</td>
                                                                @endif
                                                                <td>{{ $product->availableQuantity() }}
                                                                    {{ $product->unit }}</td>
                                                                <td>{{ $helper->formattedCurrency($product->unit_price) }}
                                                                </td>
                                                                <td class="text-right">
                                                                    {{ $helper->formattedCurrency($product->total) }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>{{ __('Subtotal') }}:</strong>
                                                {{ $helper->formattedCurrency($purchaseReturn->purchase->sub_total) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>{{ __('Discount') }}:</strong>
                                                -{{ $helper->formattedCurrency($purchaseReturn->purchase->discount) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>{{ __('Trasnport') }}:</strong>
                                                +{{ $helper->formattedCurrency($purchaseReturn->purchase->trasnport) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>{{ __('Grand Total') }}:</strong>
                                                {{ $helper->formattedCurrency($purchaseReturn->purchase->total) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>{{ __('Total Paid') }}:</strong>
                                                {{ $helper->formattedCurrency($purchaseReturn->purchase->total_paid) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>{{ __('Total Due') }}:</strong>
                                                {{ $helper->formattedCurrency($purchaseReturn->purchase->total_due) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>{{ __('Refund Amount') }}:</strong>
                                                {{ $helper->formattedCurrency($purchaseReturn->refund_amount) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>{{ __('Payment Method') }}:</strong>
                                                {{ $purchaseReturn->purchase->payment_type }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>{{ __('Note') }}:</strong>
                                                {{ $purchaseReturn->note }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>{{ __('Status') }}:</strong>
                                                @if ($purchaseReturn->isActive())
                                                    <span class="badge badge-success">{{ __('Active') }}</span>
                                                @else
                                                    <span class="badge badge-warning">{{ __('Inactive') }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 col-lg-12 text-center justify-content-center align-self-center">
                                @if ($purchaseReturn->return_image)
                                    <img src="{{ $purchaseReturn->imagepath() }}"
                                        alt="{{ __('Purchase Return Image') }}" class="img-fluid" class="mt-3" />
                                @else
                                    <img src="{{ asset('img/placeholder.png') }}"
                                        alt="{{ __('Purchase Return Image') }}" class="img-fluid" class="mt-3" />
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer no-print">
                        <a href="{{ route('purchaseReturn.index') }}" class="btn btn-primary">
                            <i class="fas fa-long-arrow-alt-left"></i> {{ __('Go Back') }}
                        </a>
                        <a href="#" class="btn btn-secondary float-right print-btn"><i class="fas fa-print"></i>
                            {{ __('Print') }}</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /.content -->
@endsection
