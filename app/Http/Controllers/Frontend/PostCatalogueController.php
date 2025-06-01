<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\FrontendController;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\PostCatalogueRepositoryInterface as PostCatalogueRepository;
use App\Services\Interfaces\PostCatalogueServiceInterface as PostCatalogueService;
use App\Services\Interfaces\PostServiceInterface as PostService;
use App\Services\Interfaces\WidgetServiceInterface as WidgetService;
use App\Models\System;
use Jenssegers\Agent\Facades\Agent;

class PostCatalogueController extends FrontendController
{
    protected $language;
    protected $system;
    protected $postCatalogueRepository;
    protected $postCatalogueService;
    protected $postService;
    protected $widgetService;

    public function __construct(
        PostCatalogueRepository $postCatalogueRepository,
        PostCatalogueService $postCatalogueService,
        PostService $postService,
        WidgetService $widgetService,
    ){
        $this->postCatalogueRepository = $postCatalogueRepository;
        $this->postCatalogueService = $postCatalogueService;
        $this->postService = $postService;
        $this->widgetService = $widgetService;
        parent::__construct(); 
    }


    public function index($id, $request, $page = 1){
        $postCatalogue = $this->postCatalogueRepository->getPostCatalogueById($id, $this->language);
        $breadcrumb = $this->postCatalogueRepository->breadcrumb($postCatalogue, $this->language);
        $posts = $this->postService->paginate(
            $request, 
            $this->language, 
            $postCatalogue, 
            $page,
            ['path' => $postCatalogue->canonical],
        );

        $widgets = $this->widgetService->getWidget([
            ['keyword' => 'news','object' => true],
            ['keyword' => 'news-outstanding','object' => true],
            ['keyword' => 'mobile-video','object' => true],
            ['keyword' => 'projects-feature', 'object' => true],
            ['keyword' => 'design_construction_interior', 'object' => true],
        ], $this->language);

        $template = '';

        if($postCatalogue->canonical == 'video'){
            $template = 'frontend.post.catalogue.video';
        }else if(Agent::isMobile() && $postCatalogue->canonical == 'video'){
            $template = 'mobile.post.catalogue.video';
        }else if(Agent::isMobile() && $postCatalogue->canonical == 'thiet-ke-noi-that' || Agent::isMobile() && $postCatalogue->canonical == 'thi-cong-noi-that'){
            $template = 'mobile.post.catalogue.design';
        }else if($postCatalogue->canonical == 've-chung-toi' 
            || $postCatalogue->canonical == 'doi-tac' || $postCatalogue->canonical == 'san-xuat-theo-yeu-cau'
            || $postCatalogue->canonical == 'bao-hanh-doi-tra' || $postCatalogue->canonical == 'van-chuyen-giao-hang'
            || $postCatalogue->canonical == 'quy-trinh-lam-viec' || $postCatalogue->canonical == 'hinh-thuc-thanh-toan'
            || $postCatalogue->canonical == 'bao-gia' || $postCatalogue->canonical == 'lien-he'
        ){
            $template = 'frontend.post.catalogue.about-us';
        }else if(Agent::isMobile()){
            $template = 'mobile.post.catalogue.index';
        }else{
            $template = 'frontend.post.catalogue.index';
        }

        $config = $this->config();
        $system = $this->system;
        $seo = seo($postCatalogue, $page);
        return view($template, compact(
            'config',
            'seo',
            'system',
            'breadcrumb',
            'postCatalogue',
            'posts',
            'widgets',
        ));
    }


   

    private function config(){
        return [
            'language' => $this->language,
        ];
    }

}
