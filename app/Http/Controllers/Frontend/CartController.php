<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\FrontendController;
use Illuminate\Http\Request;
use App\Services\CartService;
use App\Repositories\Interfaces\ProvinceRepositoryInterface  as ProvinceRepository;
use App\Repositories\Interfaces\PromotionRepositoryInterface  as PromotionRepository;
use App\Repositories\Interfaces\OrderRepositoryInterface  as OrderRepository;
use App\Repositories\Interfaces\VoucherRepositoryInterface  as VoucherRepository;
use App\Services\Interfaces\VoucherServiceInterface as VoucherService;
use App\Http\Requests\StoreCartRequest;
use Cart;
use App\Classes\Vnpay;
use App\Classes\Momo;
use App\Classes\Paypal;
use App\Classes\Zalo;
use App\Classes\ViettelPost;
use App\Enums\VoucherEnum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;

class CartController extends FrontendController
{
  
    protected $provinceRepository;
    protected $promotionRepository;
    protected $orderRepository;
    protected $voucherRepository;
    protected $cartService;
    protected $voucherService;
    protected $vnpay;
    protected $momo;
    protected $paypal;
    protected $zalo;
    protected $token;

    public function __construct(
        ProvinceRepository $provinceRepository,
        PromotionRepository $promotionRepository,
        OrderRepository $orderRepository,
        VoucherRepository $voucherRepository,
        VoucherService $voucherService,
        CartService $cartService,
        Vnpay $vnpay,
        Momo $momo,
        Paypal $paypal,
        Zalo $zalo,
    ){
       
        $this->provinceRepository = $provinceRepository;
        $this->promotionRepository = $promotionRepository;
        $this->orderRepository = $orderRepository;
        $this->voucherRepository = $voucherRepository;
        $this->cartService = $cartService;
        $this->voucherService = $voucherService;
        $this->vnpay = $vnpay;
        $this->momo = $momo;
        $this->paypal = $paypal;
        $this->zalo = $zalo;
        $this->token = getGiaoHangNhanhToken();
        parent::__construct();
    }


    private function getBuyer(){
        return Auth::guard('customer')->user();
    }

   
    public function checkout(){

        // $viettelPost = new ViettelPost(
        //     $this->system['homepage_viettelpost_email'], 
        //     $this->system['homepage_viettelpost_password']
        // );

        // $accessToken = $viettelPost->getToken();

        // $provinces = $viettelPost->getProvinces($accessToken);

        $provinces = $this->provinceRepository->all();

        $carts = Cart::instance('shopping')->content();

        $carts = $this->cartService->remakeCart($carts);

        $cartCaculate = $this->cartService->reCaculateCart();

        $cartPromotion = $this->cartService->cartPromotion($cartCaculate['cartTotal']);

        $buyer = $this->getBuyer();

        // if(is_null($buyer->province_id) || is_null($buyer->district_id) || is_null($buyer->ward_id)){
        //     return redirect()->route('buyer.profile')->with('success','Bạn phải nhập đầy đủ thông tin thành phố , quận / huyện , phường / xã để thực hiện chức năng này');
        // }

        $shipping = $this->cartService->totalShipping($buyer);

        $totalVoucherProduct = $this->cartService->totalDiscountVoucher($carts);

        $voucher= Session::get('voucher') ?? null;

        $allVoucherTotal = null;

        if(!is_null($shipping) && !is_null($buyer)){
            $allVoucherTotal = $this->voucherService->listVoucher(($cartCaculate['cartTotal'] - $totalVoucherProduct - $cartPromotion['discount']), $shipping['totalShippingCost'], $carts);
        }

        $seo = [
            'meta_title' => 'Trang thanh toán đơn hàng',
            'meta_keyword' => '',
            'meta_description' => '',
            'meta_image' => '',
            'canonical' => write_url('thanh-toan', TRUE, TRUE),
        ];

        $system = $this->system;

        $config = $this->config();

        return view('frontend.cart.index', compact(
            'config',
            'seo',
            'system',
            'provinces',
            'carts',
            'cartPromotion',
            'cartCaculate',
            'allVoucherTotal',
            'totalVoucherProduct',
            'voucher',
            'shipping',
        ));
        
    }

    public function store(StoreCartRequest $request){
        $buyer = $this->getBuyer();
        $system = $this->system;
        $orders = $this->cartService->order($request, $system, $buyer);
        if($orders['flag']){
            // if(!empty($orders['orders']) && $request->method !== 'cod'){
            //     $response = $this->paymentMethod($order);
            //     if($response['errorCode'] == 0){
            //         return redirect()->away($response['url']);
            //     }
            // }
            return redirect()->route('cart.success')->with('success','Đặt hàng thành công');
        }
        return redirect()->route('cart.checkout')->with('error','Đặt hàng không thành công. Hãy thử lại');
    }

    public function success(){
        
        $orderSummary = session('orderSummary');
        if(!$orderSummary){
            return redirect()->route('home.index')->with('error', 'Có vấn đề xảy ra trong quá trình đặt hàng. Hãy thử lại sau');
        }
        
        $seo = [
            'meta_title' => 'Đặt đơn hàng thành công',
            'meta_keyword' => '',
            'meta_description' => '',
            'meta_image' => '',
            'canonical' => write_url('cart/success', TRUE, TRUE),
        ];
        $system = $this->system;
        $config = $this->config();
        return view('frontend.cart.success', compact(
            'config',
            'seo',
            'system',
            'orderSummary'
        ));
    }

    public function paymentMethod($order = null){
        $class = $order['order']->method;
        $response = $this->{$class}->payment($order['order']);
        return $response;
    }

    
    private function config(){
        return [
            'language' => $this->language,
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ],
            'js' => [
                // 'backend/library/location.js',
                'frontend/core/library/cart.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'buyer/resources/buyer.js'
            ]
        ];
    }
  

}
