@extends('frontend.homepage.layout')
@section('content')
    <div class="product-catalogue page-wrapper">
        {{-- @include('frontend.component.breadcrumb', ['model' => $productCatalogue, 'breadcrumb' => $breadcrumb]) --}}
        <div class="banner">
            <span class="image img-cover"><img src="{{ asset('frontend/resources/img/breadcrumb.jpg') }}" alt=""></span>
        </div>
        <div class="uk-container uk-container-center mt20">
            <div class="panel-body">
                <div class="wrapper ">
                    <div class="gray-box mb20">
                        <h1 class="heading-2"><span>{{ $productCatalogue->languages->first()->pivot->name }}</span></h1>
                    </div>
                    @if(!is_null($products))
                        <div class="product-list">
                            <div class="uk-grid uk-grid-medium">
                                @foreach($products as $product)
                                    <div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-3 uk-width-large-1-4 mb20">
                                        @include('frontend.component.product-item', ['product'  => $product])
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="uk-flex uk-flex-center">
                            @include('frontend.component.pagination', ['model' => $products])
                        </div>
                    @endif
                    @if(!empty($productCatalogue->languages->first()->pivot->description))
                        <div class="product-catalogue-description">
                            {!! $productCatalogue->languages->first()->pivot->description !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

