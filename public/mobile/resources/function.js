(function($) {
    "use strict";
    var HT = {}; // Khai báo là 1 đối tượng
    var timer;
    var $carousel = $(".owl-slide");
    var _token = $('meta[name="csrf-token"]').attr('content');

    HT.swiperOption = (setting) => {
        let option = {}
        if(setting.animation.length){
            option.effect = setting.animation;
        }	
        if(setting.arrow === 'accept'){
            option.navigation = {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            }
        }
        if(setting.autoplay === 'accept'){
            option.autoplay = {
                delay: 50000,
                disableOnInteraction: false,
            }
        }
        if(setting.navigate === 'dots'){
            option.pagination = {
                el: '.swiper-pagination',
            }
        }
        return option
    }
    
    /* MAIN VARIABLE */
    HT.swiper = () => {
        if($('.panel-slide').length){
            let setting = JSON.parse($('.panel-slide').attr('data-setting'))
            let option = HT.swiperOption(setting)
            var swiper = new Swiper(".panel-slide .swiper-container", option);
        }
        
    }

    HT.carousel = () => {
        $carousel.each(function(){
            let _this = $(this);
            let option = _this.find('.owl-carousel').attr('data-owl');
            let owlInit = atob(option);
            owlInit = JSON.parse(owlInit);
            _this.find('.owl-carousel').owlCarousel(owlInit);
        });
        
    } 

    HT.wow = () => {
        var wow = new WOW(
            {
              boxClass:     'wow',      // animated element css class (default is wow)
              animateClass: 'animated', // animation css class (default is animated)
              offset:       0,          // distance to the element when triggering the animation (default is 0)
              mobile:       true,       // trigger animations on mobile devices (default is true)
              live:         true,       // act on asynchronously loaded content (default is true)
              callback:     function(box) {
                // the callback is fired every time an animation is started
                // the argument that is passed in is the DOM node being animated
              },
              scrollContainer: null,    // optional scroll container selector, otherwise use window,
              resetAnimation: true,     // reset animation on end (default is true)
            }
          );
          wow.init();


    }// arrow function

    HT.niceSelect = () => {
        if($('.nice-select').length){
            $('.nice-select').niceSelect();
        }
        
    }

    HT.select2 = () => {
        if($('.setupSelect2').length){
            $('.setupSelect2').select2();
        }
        
    }


    HT.removePagination = () => {
        $('.filter-content').on('slide', function() {
            $('.uk-flex .pagination').hide();
        });
    };


    HT.wrapTable = () => {
        var width = $(window).width()
        if(width < 600){
            $('table').wrap('<div class="uk-overflow-container"></div>')
        }
    }
   
    HT.addVoucher = () => {
        $(document).on('click','.info-voucher', function(e){
            e.preventDefault()
            let _this = $(this)
            _this.toggleClass('active');
        })
    }

    HT.category = () => {
		var swiper = new Swiper(".panel-category .swiper-container", {
			loop: false,
			pagination: {
				el: '.swiper-pagination',
			},
			spaceBetween: 15,
			slidesPerView: 1.5,
			breakpoints: {
				415: {
					slidesPerView: 2,
				},
				500: {
				  slidesPerView: 2,
				},
				768: {
				  slidesPerView: 3,
				},
				1280: {
					slidesPerView: 6,
				}
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			
		});
		
	}

    HT.service = () => {
		const swiper = new Swiper('.panel-service-1 .swiper-container', {
            // centeredSlides: true,
            loop: true,
            speed: 500,
            slidesPerView: 1,
            spaceBetween: 0,
            // autoplay: {
            //     delay: 3000,
            // },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                600: {
                    slidesPerView: 1,
                },
            },
        });
		
	}

    HT.video = () => {
		const swiper = new Swiper('.panel-video .swiper-container', {
            centeredSlides: false,
            loop: false,
            speed: 500,
            spaceBetween: 30,
            // autoplay: {
            //     delay: 3000,
            // },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                300: {
                    slidesPerView: 1.5,
                },
                1280: {
					slidesPerView: 5,
				}
            },
        });
		
	}




    $(document).ready(function(){
        HT.video()
        HT.service()
        HT.category()
        HT.removePagination()
        HT.wow()
        
        /* CORE JS */
        HT.swiper()
        HT.niceSelect()		
        HT.carousel()
        HT.select2()
        HT.wrapTable()
    });

})(jQuery);



addCommas = (nStr) => { 
    nStr = String(nStr);
    nStr = nStr.replace(/\./gi, "");
    let str ='';
    for (let i = nStr.length; i > 0; i -= 3){
        let a = ( (i-3) < 0 ) ? 0 : (i-3);
        str= nStr.slice(a,i) + '.' + str;
    }
    str= str.slice(0,str.length-1);
    return str;
}