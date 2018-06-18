//$("input[name='s']").hide();
$(document).ready(function() {
	//$("input[name='s']").hide();
	
	$("#owl-related").owlCarousel({
		autoPlay: false, //Set AutoPlay to 3 seconds
      	items : 4,
      	dots: false,
      	pagination: false,
      	itemsDesktop : [1199,3],
      	itemsDesktopSmall : [979,3],
      	responsiveClass:true,
      	responsive:{
	        480:{
	            items:1,
	            nav:false
	        },
	        600:{
	            items:2,
	            nav:false
	        },
	        768:{
	            items:3,
	            nav:true,
	            loop:false
	        }
	    }
	});
	$(".owl-related-post").owlCarousel({
		autoPlay: 4500, //Set AutoPlay to 3 seconds
      	items : 3,
      	dots: false,
      	pagination: false,
      	itemsDesktop : [1199,3],
      	itemsDesktopSmall : [979,3],
      	responsiveClass:true,
      	responsive:{
	        480:{
	            items:3,
	            nav:true
	        },
	        600:{
	            items:2,
	            nav:false
	        },
	        768:{
	            items:1,
	            nav:true,
	            loop:false
	        }
	    }
	});
	$(".owl-collection").owlCarousel({
		autoPlay: 4500, //Set AutoPlay to 3 seconds
      	items : 1,
      	dots: true,
      	pagination: true,
      	itemsDesktop : [1199,1],
      	itemsDesktopSmall : [979,1],
      	responsiveClass:true,
      	responsive:{
	        480:{
	            items:3,
	            nav:true
	        },
	        600:{
	            items:2,
	            nav:false
	        },
	        768:{
	            items:1,
	            nav:true
	        }
	    }
	});
	$(".owl-collection-products").owlCarousel({
		autoPlay: false, //Set AutoPlay to 3 seconds
      	items : 1,
      	dots: true,
      	pagination: true,
      	itemsDesktop : [1199,1],
      	itemsDesktopSmall : [979,1],
      	responsiveClass:true,
      	responsive:{
	        480:{
	            items:3,
	            nav:true
	        },
	        600:{
	            items:2,
	            nav:false
	        },
	        768:{
	            items:1,
	            nav:true,
	            loop:false
	        }
	    }
	});
	$(".owl-products").owlCarousel({
		autoPlay: 3000, //Set AutoPlay to 3 seconds
      	autoplayTimeout:1000,
		autoplayHoverPause:true,
		dots: true,
		pagination: true,
     	// "singleItem:true" is a shortcut for:
		items : 1,
		itemsDesktop : false,
		responsiveClass:true,
		navigation : false,
		itemsTablet: [768,1]
	});

	$(".owl-sub-images").owlCarousel({
		autoPlay: 2800, //Set AutoPlay to 3 seconds
    	items : 1,
    	dots: true,
      	pagination: false,
      	itemsDesktop : [1199,1],
      	itemsDesktopSmall : [979,1],
      	responsiveClass:true,
      	responsive:{
	        480:{
	            items:3,
	            nav:true
	        },
	        600:{
	            items:2,
	            nav:false
	        },
	        768:{
	            items:1,
	            nav:true,
	            loop:false
	        }
	    }
	});
	$('[data-toggle="popover"]').popover({
	    container: 'body'
	});

	$('.home-video').on('click', function(event) {
        event.preventDefault();
        $('.home-video').webkitRequestFullScreen();
    });
    var main_img 	= $(".detail-img-product").attr("src");
    //var temp_img 	= $(".detail-img-product").attr("src");
    var re_image 	= null;
    
    
    
    $("#orderRange").on("change", function() {
	    var price = $(this).val();
	    var lang 	 = $("#gb_lang").val();
	    //alert(price);
        $(".showPrice").text(price.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + " vnđ");
        setTimeout(function() {
	        if(lang === 'en') { 
        		window.location = '/' + lang + '/shop?filter_price='+price;
        	} else {
	        	window.location = '/' + lang + '/san-pham?filter_price='+price;
        	}
        }, 1000);
	   
    });
	
    $("#wrapper").on("click", ".img-thumbnails", function() {
    	// click anh dau tien: 
    	var image_url 	= $(this).attr("img-url");
    	var temp_img 	= $(".detail-img-product").attr("src");
    	
    	$(".detail-img-product").attr('src', image_url);//srcset
    	$(".detail-img-product").attr('srcset', image_url);

    	$('img', this).attr('src', temp_img);
    	$('img', this).attr('srcset', temp_img);

    	re_image = $('img', this).attr('src');
    	$(this).attr('img-url', temp_img);
    });
    
    $("#wrapper").on("click", ".detail-color", function() {
		var pro   = $("#idForAttr").val();
        var color = $(this).attr('color-attribute-id');
		var text2 = $(".chooseAttr2").text();
        //load image
        $.ajax({
            type: 'post',
            url: '/home/shop/attribute_gallery',
            data: { product: pro, attr_id : color },
            success: function(res) {
                $(".detail-image").html(res);
            }
        });
        $.ajax({
            type: 'post',
            url: '/home/shop/attribute_msg',
            data: { attr_id : color },
            success: function(res) {
				if(text2 === "") {
					$(".chosenAttr").html(res);
				} else {
					$(".chosenAttr").html(res + "&nbsp;");
				}
                //$(".chosenAttr").text(res);
                $(".chosenAttr").removeClass('hidden');
            }
        });
        //$(this).toggleClass('chosen-color');
    });
    $("#wrapper").on("click", ".detail-size", function() {
		var pro   = $("#idForAttr").val();
        var size  = $(this).attr('size-attribute-id');
		var text1 = $(".chosenAttr").text();
		//alert(text1);
		$.ajax({
		    type: 'post',
		    url: '/home/shop/attribute_size_msg',
		    data: { attr_id2 : size },
		    success: function(res) {
				if(text1 === "") {
					$(".chooseAttr2").html(res);
				} else { 
					$(".chooseAttr2").html(", " + res);
				}
		        $(".chooseAttr2").removeClass('hidden');
		    }
		});
    });
    
    $.ajax({
    	type: 'post',
    	url: '/home/cart/mini_cart',
    	data: {},
    	success: function(res) {
    		$(".miniCart").html(res);
    		$(".mobileMiniCart").html(res);
    	}
    });
    $.ajax({
    	type: 'post',
    	url: '/home/cart/mini_detail',
    	data: {},
    	success: function(res) {
    		$(".detail-mini").html(res);
    	}
    });

    $("#wrapper").on("click", ".single_add_to_cart_button", function() {
    	var id = $(this).attr("data-id");
    	var colorCheck = $("input[name=color]").val();
    	var colorCheck = $("input[name=size]").val();
    	if(colorCheck != null && colorCheck != null) {
	    	$.ajax({
	    		type: 'post',
	    		url: '/home/cart/add_to_cart',
	    		data: {
	    			pro_id: id,
	    			quantity: $("#quantity").val(),
					color: $("input[name=color]").val(),
					size: $("input[name=size]").val()
	    		},
	    		success: function(res) {
	    			$.ajax({
				    	type: 'post',
				    	url: '/home/cart/mini_cart',
				    	data: {},
				    	success: function(res1) {
				    		$(".miniCart").html(res1);
				    		$(".mobileMiniCart").html(res1);
				    	}
				    });
				    $.ajax({
				    	type: 'post',
				    	url: '/home/cart/mini_detail',
				    	data: {},
				    	success: function(res2) {
				    		$(".detail-mini").html(res2);
				    	}
				    });
	    		}
	    	});
	    	$(".after-add-cart").removeClass('hidden');
	    	
    	} else {
	    	alert("You need choose attribute of product.");
    	}
    	
    });
    

    $("#formEmail").validate({
    	rules: {
    		new_email: { 
    			required: true, 
    			email: true,
    			remote: {
					url: '/home/account/check_email',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        member_email: function () {
                            return $('#formEmail :input[name="new_email"]').val();
                        }
                    }
				}
    		},
    		confirm_new_email: { 
    			required: true, 
    			email: true,
    			equalTo: $("input[name='new_email']")
    		}
    	},
    	messages: {
    		new_email: { remote: "An email has been used for another account" }
    	}
    });

    $("#formPassword").validate({
    	rules: {
    		new_pass: { required: true },
    		confirm_new_pass: { 
    			required: true,
    			equalTo: $("input[name='new_pass']")
    		}
    	},
    	messages: { }
    });

});