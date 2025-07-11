<?php

namespace App\Services;
use App\Services\Interfaces\ContactServiceInterface;
use App\Repositories\Interfaces\ContactRepositoryInterface as ContactRepository;
use Illuminate\Support\Facades\DB;
use App\Mail\ContactMail;
use App\Repositories\Interfaces\ProductRepositoryInterface as ProductRepository;
use App\Repositories\Interfaces\PostRepositoryInterface as PostRepository;
use App\Repositories\Interfaces\SystemRepositoryInterface  as SystemRepository;

class ContactService extends BaseService implements ContactServiceInterface 
{
    protected $contactRepository;
    protected $productRepository;
    protected $postRepository;
    protected $system;

    public function __construct(
        ContactRepository $contactRepository,
        ProductRepository $productRepository,
        PostRepository $postRepository,
        WidgetService $widgetService,
        SystemRepository $systemRepository,
    ){
        $this->contactRepository = $contactRepository;
        $this->productRepository = $productRepository;
        $this->postRepository = $postRepository;
        $this->widgetService = $widgetService;
        $this->systemRepository = $systemRepository;
    }

    public function paginate($request){
        $condition['keyword'] = addslashes($request->input('keyword'));
        $perPage = $request->integer('perpage');
        $contacts = $this->contactRepository->pagination(
            $this->paginateSelect(), 
            $condition, 
            $perPage,
            ['path' => 'contact/index'], 
        );
        return $contacts;
    }

    public function create($request, $give = null){
        DB::beginTransaction();
        try{
            $payload = $request->except('_token');
            $payload['name'] = $request->input('name') ?? $request->input('fullname');
            $contact = $this->contactRepository->create($payload);
            $product_name = ($contact->product_id != null) ? $this->productRepository->getProductById($contact->product_id, 1)->name : null;
            $post_name = ($contact->post_id != null) ?  $this->postRepository->getPostById($contact->post_id, 1)->name : null;
            $to = 'noithatanhung.vn@gmail.com';
            $cc = 'tuannc.dev@gmail.com';
            $data = [
                'name' => $contact->name ?? null, 
                'created_at' => $contact->created_at,
                'phone' => $contact->phone,
                'address' => $contact->address,
                'type' => $contact->type ?? null,
                'product_id' => $request->product_id ?? null,
                'product_name' => $product_name ?? $post_name,
                'post_id' => $post_name ?? null, 
                'give' => $give,
            ];
            \Mail::to($to)->cc($cc)->send(new ContactMail($data));
            DB::commit();
            return [
                'code' => 10,
                'message' => 'Gửi liên hệ thành công , Chúng tôi sẽ sớm phản hồi lại bạn'
            ];
        }catch(\Exception $e ){
            DB::rollBack();
            echo $e->getMessage();die();
            return [
                'code' => 11,
                'message' => 'Có vấn đề xảy ra! Hãy thử lại'
            ];
        }
    }

    public function update($id, $request){
        DB::beginTransaction();
        try{
            $payload = $request->except(['_token','send']);
            $contact = $this->contactRepository->update($id, $payload);
            DB::commit();
            return true;
        }catch(\Exception $e ){
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
    }

    public function destroy($id){
        DB::beginTransaction();
        try{
            $contact = $this->contactRepository->delete($id);
            DB::commit();
            return true;
        }catch(\Exception $e ){
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
    }

    private function paginateSelect(){
        return [
            'id',
            'name',
            'address',
            'phone',
            'product_id',
            'post_id',
            'gender',
            'publish',
            'created_at',
            'type'
        ];
    }
}
