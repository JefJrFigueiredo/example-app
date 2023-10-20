@extends('products.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Product Information
                </div>
                <div class="float-end">
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $product->name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="barcode" class="col-md-4 col-form-label text-md-end text-start"><strong>Barcode:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $product->barcode }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="unit_price" class="col-md-4 col-form-label text-md-end text-start"><strong>Unit Price:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $product->unit_price }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="quantity" class="col-md-4 col-form-label text-md-end text-start"><strong>Quantity:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $product->quantity }}
                        </div>
                    </div>
        
            </div>
        </div>
    </div>    
</div>
    
@endsection