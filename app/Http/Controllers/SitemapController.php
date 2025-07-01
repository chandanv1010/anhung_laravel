<?php

// app/Http/Controllers/SitemapController.php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SitemapController extends Controller
{
    public function index()
    {
        // Tạo XML sitemap
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . "\n";

        // Thêm trang chủ đầu tiên
        $xml .= '  <url>' . "\n";
        $xml .= '    <loc>' . config('app.url'). '</loc>' . "\n";
        $xml .= '    <lastmod>' . now()->format('Y-m-d\TH:i:s\Z') . '</lastmod>' . "\n";
        $xml .= '    <priority>1.00</priority>' . "\n";
        $xml .= '  </url>' . "\n";

        // Lấy tất cả các route từ bảng router
        $routes = DB::table('routers')
            ->select('canonical', 'updated_at')
            ->orderBy('updated_at', 'desc')
            ->get();

        foreach ($routes as $route) {
            $xml .= '  <url>' . "\n";
            
            // Xử lý URL cho trang chủ và các trang khác
            if (empty($route->canonical) || $route->canonical === '/') {
                continue; // Bỏ qua vì đã thêm trang chủ ở trên
            } else {
                $xml .= '    <loc>' . config('app.url') . ltrim($route->canonical, '/') . '.html</loc>' . "\n";
            }
            
            // Lastmod - ngày sửa đổi cuối
            if ($route->updated_at) {
                $lastmod = Carbon::parse($route->updated_at)->format('Y-m-d\TH:i:s\Z');
                $xml .= '    <lastmod>' . $lastmod . '</lastmod>' . "\n";
            }
            
            // Priority mặc định 0.80
            $xml .= '    <priority>0.80</priority>' . "\n";
            
            $xml .= '  </url>' . "\n";
        }

        $xml .= '</urlset>';

        // Trả về response với header XML
        return response($xml, 200, [
            'Content-Type' => 'application/xml; charset=UTF-8',
        ]);
    }
}