<div class="product-general-info">
    <div class="content-info">
        <!-- This is the container of the toggling elements -->
        <ul data-uk-switcher="{connect:'#my-id'}" class="switcher mb20">
            <li><a href="">Mô tả</a></li>
            <li><a href="">Thông tin bổ sung</a></li>
            <li><a href="">Gợi ý kết hợp</a></li>
        </ul>

        <!-- This is the container of the content items -->
        <ul id="my-id" class="uk-switcher">
            <li>
                <div class="content-container">
                    {!! $content !!}
                </div>
                <button class="view-more-btn">Xem thêm</button>
            </li>
        </ul>
        @include('frontend.product.product.component.review', ['model' => $product, 'reviewable' => 'product'])
    </div>
    <div class="content-aside"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Lấy tất cả các nút "Xem thêm"
        const viewMoreButtons = document.querySelectorAll('.view-more-btn');
        
        viewMoreButtons.forEach(function(button) {
            // Tìm content container liên quan (element anh em liền trước)
            const container = button.previousElementSibling;
            
            if (container && container.classList.contains('content-container')) {
                // Thêm sự kiện click cho nút
                button.addEventListener('click', function() {
                    if (container.classList.contains('expanded')) {
                        container.classList.remove('expanded');
                        button.textContent = 'Xem thêm';
                        // Scroll lên đầu của container nếu cần
                        container.scrollIntoView({behavior: 'smooth'});
                    } else {
                        container.classList.add('expanded');
                        button.textContent = 'Thu gọn';
                    }
                });
            }
        });
    });
</script>