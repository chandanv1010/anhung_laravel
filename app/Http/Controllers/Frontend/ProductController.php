<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\FrontendController;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\ProductCatalogueRepositoryInterface as ProductCatalogueRepository;
use App\Services\Interfaces\ProductCatalogueServiceInterface as ProductCatalogueService;
use App\Services\Interfaces\ProductServiceInterface as ProductService;
use App\Services\Interfaces\VoucherServiceInterface as VoucherService;
use App\Services\Interfaces\PromotionServiceInterface as PromotionService;
use App\Repositories\Interfaces\ProductRepositoryInterface as ProductRepository;
use App\Repositories\Interfaces\CustomerRepositoryInterface as CustomerRepository;
use App\Repositories\Interfaces\ReviewRepositoryInterface as ReviewRepository;
use App\Repositories\Interfaces\VoucherRepositoryInterface as VoucherRepository;
use App\Services\Interfaces\WidgetServiceInterface  as WidgetService;
use App\Models\System;
use Illuminate\Support\Facades\Auth;
use Cart;
use Jenssegers\Agent\Facades\Agent;

class ProductController extends FrontendController
{
    protected $language;
    protected $system;
    protected $productCatalogueRepository;
    protected $productCatalogueService;
    protected $productService;
    protected $voucherService;
    protected $promotionService;
    protected $productRepository;
    protected $reviewRepository;
    protected $voucherRepository;
    protected $widgetService;
    protected $customerRepository;

    public function __construct(
        ProductCatalogueRepository $productCatalogueRepository,
        ProductCatalogueService $productCatalogueService,
        ProductService $productService,
        ProductRepository $productRepository,
        ReviewRepository $reviewRepository,
        VoucherRepository $voucherRepository,
        WidgetService $widgetService,
        VoucherService $voucherService,
        PromotionService $promotionService,
        CustomerRepository $customerRepository,
    ){
        $this->productCatalogueRepository = $productCatalogueRepository;
        $this->productCatalogueService = $productCatalogueService;
        $this->productService = $productService;
        $this->productRepository = $productRepository;
        $this->reviewRepository = $reviewRepository;
        $this->voucherRepository = $voucherRepository;
        $this->widgetService = $widgetService;
        $this->voucherService = $voucherService;
        $this->promotionService = $promotionService;
        $this->customerRepository = $customerRepository;
        parent::__construct(); 
    }


    public function index($id, $request){
        $language = $this->language;
        $product = $this->productRepository->getProductById($id, $this->language, config('apps.general.defaultPublish'));
        if(is_null($product)){
            abort(404);
        }
        $product = $this->productService->combineProductAndPromotion([$id], $product, true);
        $promotion_gifts = null;
        $promotion_gifts = $this->promotionService->getProTakeGiftBuyProduct($id);
        $product['promotion_gifts'] = $promotion_gifts;
        $seller = null;
        if(!is_null($product->seller_id)){
            $seller = $this->customerRepository->findById($product->seller_id);
        }
        $productCatalogue = $this->productCatalogueRepository->getProductCatalogueById($product->product_catalogue_id, $this->language);
        $breadcrumb = $this->productCatalogueRepository->breadcrumb($productCatalogue, $this->language);
        /* ------------------- */
        $product = $this->productService->getAttribute($product, $this->language);
        $category = recursive(
            $this->productCatalogueRepository->all([
                'languages' => function($query) use ($language){
                    $query->where('language_id', $language);
                }
            ], categorySelectRaw('product'))
        );

        $wishlist = Cart::instance('wishlist')->content();

        $widgets = $this->widgetService->getWidget([
            ['keyword' => 'news-feature'],
            ['keyword' => 'projects-feature'],
            ['keyword' => 'news','object' => true],
        ], $this->language);


        $productSeen = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'qty' => 1,
            'options' => [
                'canonical' => $product->languages->first()->pivot->canonical,
                'image' => $product->image,
            ]
        ];
        
        Cart::instance('seen')->add($productSeen);

        $cartSeen = Cart::instance('seen')->content();
        // dd($cartSeen);

        $carts = Cart::instance('shopping')->content() ?? null;

        $config = $this->config();

        $customer = Auth::guard('customer')->user();

        $voucher_product = (!is_null($customer)) ?  $this->voucherService->getVoucherForProduct($id, $carts , $customer->id) : null;

        $system = $this->system;

        $seo = seo($product);

        if(Agent::isMobile()){
            $template = 'mobile.product.product.index';
        }else{
            $template = 'frontend.product.product.index';
        }


        return view($template, compact(
            'config',
            'seo',
            'system',
            'breadcrumb',
            'productCatalogue',
            'customer',
            'voucher_product',
            'product',
            'category',
            'widgets',
            'wishlist',
            'cartSeen',
            'seller',
            'carts'
        ));
    }

    private function config(){
        return [
            'language' => $this->language,
            'js' => [
                'frontend/core/library/cart.js',
                'frontend/core/library/product.js',
                'frontend/core/library/review.js'
            ],
            'css' => [
                'frontend/core/css/product.css',
            ]
        ];
    }

}
