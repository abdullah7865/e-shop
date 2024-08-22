@extends('layouts.admin.partials.base')
@section('content')
    @php
        $totalProducts = DB::table('products')->count();
        $totalCategories = DB::table('categories')->count();
    @endphp
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card card-custom">
                    <div class="card-header card-header-custom">
                        <i class="card-icon fas fa-box"></i> Total Products
                    </div>
                    <div class="card-body card-body-custom">
                        <p class="card-value" id="total-products">{{ $totalProducts }}</p>
                    </div>
                    <div class="card-footer card-footer-custom">
                        <a href="{{ route('product.list') }}">View Products</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card card-custom">
                    <div class="card-header card-header-custom">
                        <i class="card-icon fas fa-th"></i> Total Categories
                    </div>
                    <div class="card-body card-body-custom">
                        <p class="card-value" id="total-categories">{{ $totalCategories }}</p>
                    </div>
                    <div class="card-footer card-footer-custom">
                        <a href="{{ route('category.list') }}">View Categories</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
