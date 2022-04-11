(function($) {
jQuery(document).ready(function($){
	
//    
//    $('a[href^="#"]').on('click',function (e) {
//	    e.preventDefault();
//	    var target = this.hash;
//	    var $target = $(target);
//	    $('html, body').stop().animate({
//	        'scrollTop': $target.offset().top
//	    }, 900, 'swing', function () {
//	        // window.location.hash = target;
//	    });
//	});
//	
	
//     var top = $('#sidebar').offset().top - parseFloat($('#sidebar').css('marginTop').replace(/auto/, 0));
//     var footTop = $('#footer').offset().top - parseFloat($('#footer').css('marginTop').replace(/auto/, 0));
//
//     var maxY = footTop - $('#sidebar').outerHeight();
//
//     $(window).scroll(function(evt) {
//         var y = $(this).scrollTop();
//         if (y >= top - $('#menu-top-menu').height()) {
//             if (y < maxY) {
//                 $('#sidebar').addClass('fixed').removeAttr('style');
//             } else {
//                 $('#sidebar').removeClass('fixed').css({
//                     position: 'absolute',
//                     top: (maxY - top) + 'px'
//                 });
//             }
//         } else {
//             $('#sidebar').removeClass('fixed');
//         }
//     });
	
	
        
    //  Default js start
    $('.navbar-toggle').click(function() {
        
        if($(this).hasClass('click-effect')) {   
            
            $(this).removeClass('click-effect');
            
        }
        
        else{
            $(this).addClass('click-effect');
        }
    });
    
    //  Default js end
    
    //Slider
    $(".slider-area").owlCarousel({
        items: 1,
        loop:true,
        nav:true,
        navText:['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
    });
        
    $('.accordion__head').on('click', function(){
        var el = $(this);
        var elNext = $(this).next();
        $('.accordion__head').not(el).removeClass('open')
        $('.accordion__body').not(elNext).slideUp(200)
        el.next('.accordion__body').slideToggle(200);
        el.toggleClass('open');
        return false;
    }); 



    jQuery('#glasscase').glassCase({ 'thumbsPosition': 'bottom', 'widthDisplay' : 560});
    $('.close_pop').on('click', function(){
        $('.top_strip').hide();
        $(this).parent().parent().removeClass('strip_show');
    });
	
	$('.close_pop').on('click', function(){
		$('.top_strip').hide();
		$(this).parent().parent().removeClass('strip_show');
	});
	var owl = $('.review_carousel');
	owl.owlCarousel({ 
		margin: 15,
		nav: false, 
		dots: false, 
		loop: true,
		autoplay: true,
		responsive: {
			0: {
				items: 1
			},
			480: {
				items: 2
			},
			600: {
				items: 3
			},
			1000: {
				items: 3
			}
		}
	});
                 
    var moretext = "Read more <i class='fa fa-angle-down' aria-hidden='true'></i>";
    var lesstext = "View less <i class='fa fa-angle-up' aria-hidden='true'></i>";
    
    $(".morelink").click(function(){                    
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });

    // Array compare function
    Array.prototype.compare = function(testArr) {
        if (this.length != testArr.length) return false;
        for (var i = 0; i < testArr.length; i++) {
            if (this[i].compare) { //To test values in nested arrays
                if (!this[i].compare(testArr[i])) return false;
            }
            else if (this[i] !== testArr[i]) return false;
        }
        return true;
    }


    // Product Variation add-to-cart function
    let prodVarObj = product_var_obj.product_variation;

    let sizeVar = jQuery('#sizeVar');
    let colorVar = jQuery('#colorVar');
    let fabricVar = jQuery('#fabricVar');

    jQuery('#product-var-tab .variation_item').on('click', function(){

        let selectedVariationObj = {
            price: null,
            variationArr: []
        };

        let sizeVarValue = sizeVar.val();
        let colorVarValue = colorVar.val();
        let fabricVarValue = fabricVar.val();

        let variationType = jQuery(this).data('variation-type');
        let currentVariation = jQuery(this).closest('.field_choice').data('current-variation');
        let avColorVariations = jQuery(this).closest('.field_choice').data('color-variations');
        let avSizeVariations = jQuery(this).closest('.field_choice').data('size-variations');
        let avFabricVariations = jQuery(this).closest('.field_choice').data('fabric-variations');
        let colorItems = jQuery('.color_attr');
        let fabricItems = jQuery('.fabric_attr');

        if(variationType == 'size') {

            colorItems.removeClass('variation-enabled variation-disabled');
            fabricItems.removeClass('variation-enabled variation-disabled');

            colorItems.map(function(){
                let colorVars = jQuery(this).data('size-variations');
                let colorVarArray = colorVars.split(", ");
                
                if( jQuery.inArray(currentVariation, colorVarArray) != -1 ) {
                    jQuery(this).addClass('variation-enabled');
                } else {
                    jQuery(this).addClass('variation-disabled');
                }
            });

            fabricItems.map(function(){
                let fabricVars = jQuery(this).data('size-variations');
                let fabricVarArray = fabricVars.split(", ");
                
                if( jQuery.inArray(currentVariation, fabricVarArray) != -1 ) {
                    jQuery(this).addClass('variation-enabled');
                } else {
                    jQuery(this).addClass('variation-disabled');
                }
            });

            sizeVar.val(1);
            jQuery('#product-var-tab .field_choice.size_attr').removeClass('active');
            jQuery('#selectedProdVarSize').val(currentVariation);
            sofaBedLabel = jQuery(this).closest('.field_choice').find('.span_title').text();
            jQuery('.prod_size span').text(sofaBedLabel);
            jQuery(this).closest('.field_choice').addClass('active');
        }

        if( (variationType == 'material-color') || (variationType == 'fabric') ) {

            if(sizeVarValue) {

                if(variationType == 'material-color') {

                    fabricItems.removeClass('variation-2nd-tier-enabled variation-2nd-tier-disabled');

                    fabricItems.map(function(){
                        if(jQuery(this).hasClass('variation-enabled')) {

                            let fabricVars = jQuery(this).data('color-variations');
                            let fabricVarArray = fabricVars.split(", ");
                            
                            if( jQuery.inArray(currentVariation, fabricVarArray) != -1 ) {
                                jQuery(this).addClass('variation-2nd-tier-enabled');
                            } else {
                                jQuery(this).addClass('variation-2nd-tier-disabled');
                            }

                        }
                    });

                    colorVar.val(1);
                    jQuery('#selectedProdVarColor').val(currentVariation);
                    jQuery(this).closest('.field_choice').addClass('active');

                    jQuery('#product-var-tab .field_choice.color_attr').removeClass('active');
                    colorLabel = jQuery(this).closest('.field_choice').find('.span_title').text();
                    jQuery('.prod_color span').text(colorLabel);

                }

                if(variationType == 'fabric') {

                    jQuery('.field_choice.fabric_attr').not(jQuery(this).closest('.field_choice')).removeClass('active');
                    fabricVar.val(1);
                    jQuery('#selectedProdVarFabric').val(currentVariation);
                    fabricLabel = jQuery(this).closest('.field_choice').find('.span_title').text();
                    jQuery('.prod_fabric span').text(fabricLabel);

                }

                jQuery(this).closest('.field_choice').addClass('active');

            } else {
                alert('Please, select Sofa Size option to continue');
            }

        }

        jQuery('.variation-disabled, .variation-2nd-tier-disabled').removeClass('active');

        sizeVarValue = sizeVar.val();
        colorVarValue = colorVar.val();
        fabricVarValue = fabricVar.val();

        if(sizeVarValue && colorVarValue && fabricVarValue) {
            let selectedSize = jQuery('#selectedProdVarSize').val();
            let selectedColor = jQuery('#selectedProdVarColor').val();
            let selectedFabric = jQuery('#selectedProdVarFabric').val();
            let initVarItemVarArr = [];
            selectedVariationObj.variationArr.push(selectedSize);
            selectedVariationObj.variationArr.push(selectedColor);
            selectedVariationObj.variationArr.push(selectedFabric);

            prodVarObj.map(function(item){
                let initVarItemObj = item.attributes;
                let initVarSalePrice = parseFloat(item.display_price);
                let initVarRegularPrice = parseFloat(item.display_regular_price);
                let variationID = item.variation_id;
                let varImageURL = item.image.url;
                let product_id = jQuery('#product_id').val();
                let quantity = 1;
                initVarItemVar = Object.values(initVarItemObj);
                if( selectedVariationObj.variationArr.sort().compare(initVarItemVar.sort()) ) {
                    jQuery('#product_id').val(product_id);
                    jQuery('#productQuantity').val(quantity);
                    jQuery('#addToCart_variationID').val(variationID);
					
					if(initVarSalePrice == initVarRegularPrice) {
						jQuery('.prod_price .reg_price span').text('$'+initVarRegularPrice);
						jQuery('.prod_price .sale_price span').text('');
						jQuery('.prod_price .reg_price').addClass('no-sale-price');
					} else if(initVarSalePrice < initVarRegularPrice) {
						jQuery('.prod_price .sale_price span').text('$'+initVarSalePrice);
						jQuery('.prod_price .reg_price span').text('$'+initVarRegularPrice);
						jQuery('.prod_price .reg_price').removeClass('no-sale-price');
					}

                    jQuery('.gc-display-display, .gc-zoom-container img').attr('src', varImageURL);

                }
            });

        }

    });

    // Add to cart function
    jQuery('.addtocart_btn').click(function(){

        let product_id = jQuery('#product_id').val();
        let product_quantity = jQuery('#productQuantity').val();
        let variation_id = jQuery('#addToCart_variationID').val();
		
		let sofasizeVarActive = false;
		let colorVarActive = false;
		let fabricVarActive = false;
		
		if(jQuery('.field_choice.size_attr').hasClass('active')) {
			sofasizeVarActive = true;
		}
		
		if(jQuery('.field_choice.color_attr').hasClass('active')) {
			colorVarActive = true;
		}
		
		if(jQuery('.field_choice.fabric_attr').hasClass('active')) {
			fabricVarActive = true;
		}

        if(product_id && product_quantity && variation_id && sofasizeVarActive && colorVarActive) {
			
			if(fabricVarActive) {

				$.ajax({
					url: ajaxurl,
					type: 'post',
					dataType: 'json',
					data: {
						action  : 'product_addtocart',
						product_id : product_id,
						product_quantity : product_quantity,
						variation_id : variation_id
					},
					beforeSend: function () {
						jQuery('.addtocart_btn').text('Adding to cart..');
					},
					success: function (data) {
						jQuery('#addToCartModal .modal-body').html(data.res);
						jQuery('.add_to_cart_btn').trigger('click');
						jQuery('.addtocart_btn').text('Add to Cart');
					},
					error: function (errorThrown) {
						console.log(errorThrown);
					}
				});

			} else {
				alert('Please, select the fabric variation.');
			}

        } else {
            alert('Please, select variations from the tabs below.');
        }

    });

        
});
    
jQuery(window).load(function(){
    
});

})(jQuery);