@extends('mobile.homepage.layout')
@section('content')
    <div id="mobile-container">
        @include('frontend.component.breadcrumb', ['model' => $productCatalogue, 'breadcrumb' => $breadcrumb])
        <div class="product-catalogue-wrapper panel-product">
            <div class="uk-container uk-container-center">
                <h1 class="page-heading">{{ $productCatalogue->languages->first()->pivot->name }}</h1>
                <div class="panel-body">
                    <div class="wrapper ">
                        <div class="gray-box mb20">
                            <h1 class="heading-2"><span></span></h1>
                        </div>
                        @if(!is_null($products))
                            <div class="product-list">
                                <div class="uk-grid uk-grid-medium">
                                    @foreach($products as $product)
                                        <div class="uk-width-1-1 mb20">
                                            @include('frontend.component.product-item', ['product'  => $product])
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="uk-flex uk-flex-center">
                                @include('frontend.component.pagination', ['model' => $products])
                            </div>
                        @endif
                    </div>
                </div>
                <div class="description mb30">
                    {!! $productCatalogue->languages->first()->pivot->description !!}
                </div>
               
            </div>
        </div>
        @include('mobile.component.news-outstanding')
    </div>
@endsection