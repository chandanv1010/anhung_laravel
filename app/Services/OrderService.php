<?php

namespace App\Services;

use App\Services\Interfaces\OrderServiceInterface;
use App\Repositories\Interfaces\OrderRepositoryInterface as OrderRepository;
use App\Repositories\Interfaces\ProductVariantRepositoryInterface  as ProductVariantRepository;
use App\Repositories\Interfaces\ProductRepositoryInterface  as ProductRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;

/**
 * Class CustomerService
 * @package App\Services
 */
class OrderService extends BaseService implements OrderServiceInterface 
{
    protected $orderRepository;
    protected $productVariantRepository;
    protected $productRepository;
    

    public function __construct(
        OrderRepository $orderRepository,
        ProductVariantRepository $productVariantRepository,
        ProductRepository $productRepository,
    ){
        $this->orderRepository = $orderRepository;
        $this->productVariantRepository = $productVariantRepository;
        $this->productRepository = $productRepository;
    }

    

    public function paginate($request, $seller = null){
        $condition['keyword'] = addslashes($request->input('keyword'));
        $condition['publish'] = $request->integer('publish');
        if(!is_null($seller)){
            $condition['where'] = [
                ['customer_id', '=', $seller->id]
            ];
        }

        foreach(__('cart') as $key => $val){
            $condition['dropdown'][$key] = $request->string($key);
        }
        $condition['created_at'] = $request->input('created_at');


        $perPage = $request->integer('perpage');
        $orders = $this->orderRepository->pagination(
            $this->paginateSelect(), 
            $condition, 
            $perPage,
            ['path' => 'order/index'], 
            ['id', 'desc'],
        );

        return $orders;
    }

    public function update($request){
        DB::beginTransaction();
        try{
            $id = $request->input('id');
            $payload = $request->input('payload');
            $this->orderRepository->update($id, $payload);
           
            DB::commit();
            return true;
        }catch(\Exception $e ){
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
    }

    public function updatePaymentOnline($payload, $order){
        DB::beginTransaction();
        try{
            $this->orderRepository->update($order->id, $payload);
           
            DB::commit();
            return true;
        }catch(\Exception $e ){
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
    }


    public function getOrderItemImage($order){
        foreach($order->products as $key => $val){
            $uuid = $val->pivot->uuid;
            if(!is_null($uuid)){
                $variant = $this->productVariantRepository->findByCondition([
                    ['uuid', '=', $uuid]
                ]);
                $variantImage = explode(',' , $variant->album)[0] ?? null;
                $val->image = $variantImage;
            }
        }

        return $order;

    }

    public function statistic(){
        $month = now()->month;
        $year  = now()->year;
        $previousMonth = ($month == 1) ? 12 : $month - 1;
        $previousYear = ($month == 1) ? $year - 1 : $year;

        
        $orderCurrentMonth = $this->orderRepository->getOrderByTime($month, $year);
        $orderPreviousMonth = $this->orderRepository->getOrderByTime( $previousMonth, $previousYear);

        return [
            'orderCurrentMonth' => $orderCurrentMonth,
            'orderPreviousMonth' => $orderPreviousMonth,
            'grow' => growth($orderCurrentMonth, $orderPreviousMonth),
            'totalOrders' => $this->orderRepository->getTotalOrders(),
            'cancleOrders' => $this->orderRepository->getCancleOrders(),
            'revenue' => $this->orderRepository->revenueOrders(),
            'revenueChart' => convertRevenueChartData($this->orderRepository->revenueByYear($year)),
        ];


    }

    public function ajaxOrderChart($request){
        $type = $request->input('chartType');
        switch ($type) {
            case 1:
                $year  = now()->year;
                $response = convertRevenueChartData($this->orderRepository->revenueByYear($year));
                break;
            case 7:
              $response = convertRevenueChartData($this->orderRepository->revenue7Day(), 'daily_revenue', 'date', 'Ngày');
              break;
            case 30:

                $currentMonth = now()->month;
                $currentYear  = now()->year;
                $daysInMonth = Carbon::createFromDate($currentYear, $currentMonth, 1)->daysInMonth;

                $allDays = range(1, $daysInMonth);
                $temp = $this->orderRepository->revenueCurrentMonth($currentMonth, $currentYear);
                $label = [];
                $data = [];
                $temp2 = array_map(function($day) use ($temp, &$label, &$data){
                    $found = collect($temp)->first(function($record) use ($day){
                        return $record['day'] == $day;
                    });
                    $label[] = 'Ngày ' . $day;
                    $data[] = $found ? $found['daily_revenue'] : 0;

                }, $allDays);
                $response = [
                    'label' => $label,
                    'data' => $data,
                ];
              break;
        }
        return $response;

    }


    public function paginateSeller($request, $seller = null){
        $condition['keyword'] = addslashes($request->input('keyword'));
        $condition['publish'] = $request->integer('publish');
        if(!is_null($seller)){
            $condition['where'] = [
                ['customer_id', '=', $seller->id]
            ];
        }

        foreach(__('cart') as $key => $val){
            $condition['dropdown'][$key] = $request->string($key);
        }
        $condition['created_at'] = $request->input('created_at');

        $join = [];
        if (!is_null($seller)) {
            $join = [
                ['order_product', 'orders.id', '=', 'order_product.order_id'],
                ['products', 'order_product.product_id', '=', 'products.id']
            ];
            $condition['where'] = [
                ['products.seller_id', '=', $seller->id]
            ];
            // Thêm group by để tránh trùng lặp đơn hàng
            $extend['groupBy'] = 'orders.id';
        }

        $perPage = $request->integer('perpage');
        $extend['path'] = 'order/index';
        $orderBy = ['orders.id', 'desc'];

       
        $relations = ['products' => function($query) use  ($seller){
                    $query->where('products.seller_id', $seller->id);
         }];

        $orders = $this->orderRepository->pagination(
           $this->paginateSelect(), 
            $condition, 
            $perPage,
            $extend,
            $orderBy,
            $join
        );


        return $orders;
    }


    private function paginateSelect(){
        return [
            'orders.id',
            'orders.code',
            'orders.fullname',
            'orders.phone',
            'orders.email',
            'orders.province_id',
            'orders.district_id',
            'orders.ward_id',
            'orders.address',
            'orders.description',
            'orders.promotion',
            'orders.cart',
            'orders.customer_id',
            'orders.guest_cookie',
            'orders.method',
            'orders.confirm',
            'orders.payment',
            'orders.delivery',
            'orders.shipping',
            'orders.created_at',
        ];
    }


}
