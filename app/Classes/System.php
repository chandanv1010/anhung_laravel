<?php
namespace App\Classes;

class System{

    public function config(){
        $data['homepage'] = [
            'label' => 'Thông tin chung',
            'description' => 'Cài đặt đầy đủ thông tin chung của website. Tên thương hiệu hiệu website, Logo, Favicon, vv...',
            'value' => [
                'company' => ['type' => 'text', 'label' => 'Tên công ty'],
                'brand' => ['type' => 'text', 'label' => 'Tên thương hiệu'],
                'slogan' => ['type' => 'text', 'label' => 'Slogan'],
                'logo' => ['type' => 'images', 'label' => 'Logo Website', 'title' => 'Click vào ô phía dưới để tải logo'],
                'logo_mobile' => ['type' => 'images', 'label' => 'Logo Mobile', 'title' => 'Click vào ô phía dưới để tải logo'],
                'favicon' => ['type' => 'images', 'label' => 'Favicon', 'title' => 'Click vào ô phía dưới để tải logo'],
                'copyright' => ['type' => 'text', 'label' => 'Copyright'],
                'flashSale' => ['type' => 'text', 'label' => 'Khuyến mãi'],
                'website' => [
                    'type' => 'select', 
                    'label' => 'Tình trạng website',
                    'option' => [
                        'open' => 'Mở cửa website',
                        'close' => 'Website đang bảo trì'
                    ]
                ],
                'short_intro' => ['type' => 'editor', 'label' => 'Giới thiệu ngắn'],
                'video_youtube_pc' => [
                    'type' => 'textarea', 
                    'label' => 'Video youtube(pc)', 
                ],
                'video_youtube_mobile' => [
                    'type' => 'textarea', 
                    'label' => 'Video youtube(mobile)', 
                ],
                'đkkd' => ['type' => 'text', 'label' => 'Số ĐKKD'],
            ]
        ];

        $data['contact'] = [
            'label' => 'Thông tin liên hệ',
            'description' => 'Cài đặt thông tin liên hệ của website ví dụ: Địa chỉ công ty, Văn phòng giao dịch, Hotline, Bản đồ, vv...',
            'value' => [
                'office' => ['type' => 'text', 'label' => 'Địa chỉ công ty'],
                'office_map' => [
                    'type' => 'textarea', 
                    'label' => 'Bản đồ công ty',
                    'link' => [
                        'text' => 'Hướng dẫn thiết lập bản đồ',
                        'href' => 'https://manhan.vn/hoc-website-nang-cao/huong-dan-nhung-ban-do-vao-website/',
                        'target' => '_blank'
                    ]
                ],
                'address' => ['type' => 'text', 'label' => 'Văn phòng giao dịch'],
                'xuong' => ['type' => 'text', 'label' => 'Xưởng'],
                'xuong_map' => [
                    'type' => 'textarea', 
                    'label' => 'Bản đồ xưởng',
                    'link' => [
                        'text' => 'Hướng dẫn thiết lập bản đồ',
                        'href' => 'https://manhan.vn/hoc-website-nang-cao/huong-dan-nhung-ban-do-vao-website/',
                        'target' => '_blank'
                    ]
                ],
                'hotline' => ['type' => 'text', 'label' => 'Hotline'],
                'technical_phone' => ['type' => 'text', 'label' => 'Hotline kỹ thuật'],
                'sell_phone' => ['type' => 'text', 'label' => 'Hotline kinh doanh'],
                'phone' => ['type' => 'text', 'label' => 'Số cố định'],
                'fax' => ['type' => 'text', 'label' => 'Fax'],
                'email' => ['type' => 'text', 'label' => 'Email'],
                'website' => ['type' => 'text', 'label' => 'Website'],
                'map' => [
                    'type' => 'textarea', 
                    'label' => 'Bản đồ', 
                    'link' => [
                        'text' => 'Hướng dẫn thiết lập bản đồ',
                        'href' => 'https://manhan.vn/hoc-website-nang-cao/huong-dan-nhung-ban-do-vao-website/',
                        'target' => '_blank'
                    ]
                ],
                'intro' => ['type' => 'textarea', 'label' => 'Giới thiệu'],
            ]
        ];
        $data['hcm'] = [
            'label' => 'Thông tin liên hệ Hồ Chí Minh',
            'description' => 'Cài đặt thông tin liên hệ của website ví dụ: Địa chỉ công ty, Văn phòng giao dịch, Hotline, Bản đồ, vv...',
            'value' => [
                'office' => ['type' => 'text', 'label' => 'Địa chỉ công ty'],
                'office_map' => [
                    'type' => 'textarea', 
                    'label' => 'Bản đồ công ty',
                    'link' => [
                        'text' => 'Hướng dẫn thiết lập bản đồ',
                        'href' => 'https://manhan.vn/hoc-website-nang-cao/huong-dan-nhung-ban-do-vao-website/',
                        'target' => '_blank'
                    ]
                ],
                'address' => ['type' => 'text', 'label' => 'Văn phòng giao dịch'],
                'xuong' => ['type' => 'text', 'label' => 'Xưởng'],
                'xuong_map' => [
                    'type' => 'textarea', 
                    'label' => 'Bản đồ xưởng',
                    'link' => [
                        'text' => 'Hướng dẫn thiết lập bản đồ',
                        'href' => 'https://manhan.vn/hoc-website-nang-cao/huong-dan-nhung-ban-do-vao-website/',
                        'target' => '_blank'
                    ]
                ],
                'hotline' => ['type' => 'text', 'label' => 'Hotline'],
                'email' => ['type' => 'text', 'label' => 'Email'],
                'map' => [
                    'type' => 'textarea', 
                    'label' => 'Bản đồ', 
                    'link' => [
                        'text' => 'Hướng dẫn thiết lập bản đồ',
                        'href' => 'https://manhan.vn/hoc-website-nang-cao/huong-dan-nhung-ban-do-vao-website/',
                        'target' => '_blank'
                    ]
                ],
            ]
        ];

        $data['seo'] = [
            'label' => 'Cấu hình SEO dành cho trang chủ',
            'description' => 'Cài đặt đầy đủ thông tin về SEO của trang chủ website. Bao gồm tiêu đề SEO, Từ Khóa SEO, Mô Tả SEO, Meta images',
            'value' => [
                'meta_title' => ['type' => 'text', 'label' => 'Tiêu đề SEO'],
                'meta_keyword' => ['type' => 'text', 'label' => 'Từ khóa SEO'],
                'meta_description' => ['type' => 'textarea', 'label' => 'Mô tả SEO'],
                'meta_images' => ['type' => 'images', 'label' => 'Ảnh SEO'],
            ]
        ];

        $data['social'] = [
            'label' => 'Cấu hình Mạng xã hội dành cho trang chủ',
            'description' => 'Cài đặt đầy đủ thông tin về Mạng xã hội của trang chủ website. Bao gồm tiêu đề Mạng xã hội, Từ Khóa SEO, Mô Tả SEO, Meta images',
            'value' => [
                'facebook' => ['type' => 'text', 'label' => 'Facebook'],
                'messenger' => ['type' => 'text', 'label' => 'Messenger'],
                'zalo' => ['type' => 'text', 'label' => 'Zalo'],
                'youtube' => ['type' => 'text', 'label' => 'Youtube'],
                'twitter' => ['type' => 'text', 'label' => 'Twitter'],
                'tiktok' => ['type' => 'text', 'label' => 'Tiktok'],
                'instagram' => ['type' => 'text', 'label' => 'Instagram'],
            ]
        ];

        $data['text'] = [
            'label' => 'Cấu hình text',
            'description' => '',
            'value' => [
                '1' => ['type' => 'text', 'label' => 'Text_1'],
                '2' => ['type' => 'text', 'label' => 'Text_2'],
                '3' => ['type' => 'text', 'label' => 'Text_3'],
            ]
        ];

        $data['image'] = [
            'label' => 'Cấu hình ảnh',
            'description' => '',
            'value' => [
                '1' => ['type' => 'images', 'label' => 'Ảnh(chứng chỉ 1)'],
                '2' => ['type' => 'images', 'label' => 'Ảnh(chứng chỉ 2)'],
            ]
        ];

        $data['link'] = [
            'label' => 'Cấu hình đường dẫn',
            'description' => '',
            'value' => [
                '1' => ['type' => 'text', 'label' => 'Gỗ óc chó nhập khẩu 100%'],
            ]
        ];


        return $data;
    }
	
}
