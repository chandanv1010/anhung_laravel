@php
    $name = $product->name;
    $canonical = write_url($product->canonical);
    $image = image($product->image);
    $price = getPrice($product);
    $catName = $productCatalogue->name;
    $review = getReview($product);
    
    $description = $product->description;
    $content = $product->content;
    $attributeCatalogue = $product->attributeCatalogue;
    $gallery = json_decode($product->album);
@endphp

@extends('frontend.homepage.layout')
@section('content')


<div class="product-container">
    @include('frontend.component.breadcrumb', ['model' => $product, 'breadcrumb' => $breadcrumb])
    <div class="uk-container uk-container-center">
        <div class="panel-head">
            <h1 class="product-detail-name ">{{ $name }}</h1>
            <div class="product-detail-container">
                <div class="product-detail-gallery">
                    
                    @include('frontend.product.product.component.gallery')
                </div> <div class="product-detail-info">
                    @include('frontend.product.product.component.info',['voucher_product' => $voucher_product])
                </div>
            </div>
        </div>
        <div class="panel-body">
            @include('frontend.product.product.component.general')
        </div>
    </div>
    @include('frontend.component.news')
</div>
@include('frontend.product.product.component.modal')
@include('frontend.product.product.component.hidden')

@endsection
