<?php

namespace App\Services;
use App\Services\Interfaces\ContactServiceInterface;
use App\Repositories\Interfaces\ContactRepositoryInterface as ContactRepository;
use Illuminate\Support\Facades\DB;

class ContactService extends BaseService implements ContactServiceInterface 
{
    protected $contactRepository;

    public function __construct(
        ContactRepository $contactRepository
    ){
        $this->contactRepository = $contactRepository;
    }

    public function paginate($request){
        $condition['keyword'] = addslashes($request->input('keyword'));
        // $condition['publish'] = $request->integer('publish');
        $perPage = $request->integer('perpage');
        $contacts = $this->contactRepository->pagination(
            $this->paginateSelect(), 
            $condition, 
            $perPage,
            ['path' => 'contact/index'], 
        );
        return $contacts;
    }

    public function create($request){
        DB::beginTransaction();
        try{
            $payload = $request->except('_token');
            $payload['name'] = $request->input('fullname');
            $contact = $this->contactRepository->create($payload);
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
            'created_at'
        ];
    }
}
