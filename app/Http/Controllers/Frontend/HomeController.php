<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\FrontendController;
use App\Repositories\Interfaces\SlideRepositoryInterface  as SlideRepository;
use App\Repositories\Interfaces\SystemRepositoryInterface  as SystemRepository;
use App\Services\Interfaces\WidgetServiceInterface  as WidgetService;
use App\Services\Interfaces\SlideServiceInterface  as SlideService;
use App\Enums\SlideEnum;
use Jenssegers\Agent\Facades\Agent;

class HomeController extends FrontendController
{
    protected $language;
    protected $slideRepository;
    protected $systemRepository;
    protected $widgetService;
    protected $slideService;
    protected $system;

    public function __construct(
        SlideRepository $slideRepository,
        WidgetService $widgetService,
        SlideService $slideService,
        SystemRepository $systemRepository,
    ){
        $this->slideRepository = $slideRepository;
        $this->widgetService = $widgetService;
        $this->slideService = $slideService;
        $this->systemRepository = $systemRepository;

        parent::__construct(
           $systemRepository,
        ); 
    }


    public function index(){


        $config = $this->config();
        $widgets = $this->widgetService->getWidget([
            ['keyword' => 'intro'],
            ['keyword' => 'commit-fix'],
            ['keyword' => 'categories','children' => true],
            ['keyword' => 'categories-readmore','children' => true],
            ['keyword' => 'services','children' => true],
            ['keyword' => 'category-1','children' => true],
            ['keyword' => 'products','children' => true, 'object' => true],
            ['keyword' => 'services-1','children' => true, 'post' => true],
            ['keyword' => 'video','object' => true],
            ['keyword' => 'news','object' => true],
        ], $this->language);



        $slides = $this->slideService->getSlide(
            [SlideEnum::BANNER, SlideEnum::MAIN, SlideEnum::MOBILE , 'banner-1', 'brand-baochi'],
            $this->language
        );
        $system = $this->system;
        $seo = [
            'meta_title' => $this->system['seo_meta_title'],
            'meta_keyword' => $this->system['seo_meta_keyword'],
            'meta_description' => $this->system['seo_meta_description'],
            'meta_image' => $this->system['seo_meta_images'],
            'canonical' => config('app.url'),
        ];
        $language = $this->language;
        $ishome = true;
        if(Agent::isMobile()){
            $template = 'mobile.homepage.home.index';
        }else{
            $template = 'frontend.homepage.home.index';
        }

        return view($template, compact(
            'config',
            'slides',
            'widgets',
            'seo',
            'system',
            'language',
            'ishome'
        ));
    }

    public function ckfinder(){
        return view('frontend.homepage.home.ckfinder');
    }

  

    private function config(){
        return [
            'language' => $this->language,
            'css' => [
                'frontend/resources/plugins/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css',
                'frontend/resources/plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css'
            ],
            'js' => [
                'frontend/resources/plugins/OwlCarousel2-2.3.4/dist/owl.carousel.min.js',
                'https://getuikit.com/v2/src/js/components/sticky.js'
            ]
        ];
    }

}
