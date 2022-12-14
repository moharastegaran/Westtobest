jQuery(document).ready(function ($) {

    "use strict";

//------- Notifications Dropdowns
    $('.top-area > .setting-area > li > a').on("click", function () {
        var $parent = $(this).parent('li');
        $parent.siblings().children('div').removeClass('active');
        $(this).siblings('div').addClass('active');
        return false;
    });


//------- remove class active on body
    $("body *").not('.top-area > .setting-area > li > a').on("click", function () {
        $(".top-area > .setting-area > li > div").not('.searched').removeClass('active');

    });


//--- user setting dropdown on topbar	
    $('.user-img').on('click', function () {
        $('.user-setting').toggleClass("active");
    });

//--- side message box	
    $('.friendz-list > li, .chat-users > li').on('click', function () {
        $('.chat-box').addClass("show");
        return false;
    });
    $('.close-mesage').on('click', function () {
        $('.chat-box').removeClass("show");
        return false;
    });

//------ scrollbar plugin
    if ($.isFunction($.fn.perfectScrollbar)) {
        $('.dropdowns, .twiter-feed, .invition, .followers, .chatting-area, .peoples, #people-list, .chat-list > ul, .message-list, .chat-users, .left-menu, #people').perfectScrollbar();
    }

    /*--- socials menu scritp ---*/
    $('.trigger').on("click", function () {
        $(this).parent(".menu").toggleClass("active");
    });

    /*--- emojies show on text area ---*/
    $('.add-smiles > span').on("click", function () {
        $(this).parent().siblings(".smiles-bunch").toggleClass("active");
    });

// delete notifications
    $('.notification-box > ul li > i.del').on("click", function () {
        $(this).parent().slideUp();
        return false;
    });

    /*--- socials menu scritp ---*/
    $('.f-page > figure i').on("click", function () {
        $(".drop").toggleClass("active");
    });

//===== Search Filter =====//
    (function ($) {
        // custom css expression for a case-insensitive contains()
        jQuery.expr[':'].Contains = function (a, i, m) {
            return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
        };

        function listFilter(searchDir, list) {
            var form = $("<form>").attr({"class": "filterform", "action": "#"}),
                input = $("<input>").attr({
                    "class": "filterinput",
                    "type": "text",
                    "placeholder": "..."
                });
            $(form).append(input).appendTo(searchDir);

            $(input)
                .change(function () {
                    var filter = $(this).val();
                    if (filter) {
                        $(list).find("li:not(:Contains(" + filter + "))").slideUp();
                        $(list).find("li:Contains(" + filter + ")").slideDown();
                    } else {
                        $(list).find("li").slideDown();
                    }
                    return false;
                })
                .keyup(function () {
                    $(this).change();
                });
        }

//search friends widget
        $(function () {
            listFilter($("#searchDir"), $("#people-list"));
        });
    }(jQuery));

//progress line for page loader
    $('body').show();
    NProgress.start();
    setTimeout(function () {
        NProgress.done();
        $('.fade').removeClass('out');
    }, 2000);

//--- bootstrap tooltip	
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

// Sticky Sidebar & header
    if ($(window).width() < 769) {
        jQuery(".sidebar").children().removeClass("stick-widget");
    }

    if ($.isFunction($.fn.stick_in_parent)) {
        $('.stick-widget').stick_in_parent({
            parent: '#page-contents',
            offset_top: 60,
        });


        $('.stick').stick_in_parent({
            parent: 'body',
            offset_top: 0,
        });

    }

    /*--- topbar setting dropdown ---*/
    $(".we-page-setting").on("click", function () {
        $(".wesetting-dropdown").toggleClass("active");
    });

    /*--- topbar toogle setting dropdown ---*/
    $('#nightmode').on('change', function () {
        if ($(this).is(':checked')) {
            // Show popup window
            $(".theme-layout").addClass('black');
        } else {
            $(".theme-layout").removeClass("black");
        }
    });

//chosen select plugin
    if ($.isFunction($.fn.chosen)) {
        $("select").chosen();
    }

//----- add item plus minus button
    if ($.isFunction($.fn.userincr)) {
        $(".manual-adjust").userincr({
            buttonlabels: {'dec': '-', 'inc': '+'},
        }).data({'min': 0, 'max': 20, 'step': 1});
    }

    if ($.isFunction($.fn.loadMoreResults)) {
        $('.loadMore').loadMoreResults({
            displayedItems: 3,
            showItems: 1,
            button: {
                'class': 'btn-load-more',
                'text': 'Load More'
            }
        });
    }
    //===== owl carousel  =====//
    if ($.isFunction($.fn.owlCarousel)) {
        $('.sponsor-logo').owlCarousel({
            items: 6,
            loop: true,
            margin: 30,
            autoplay: true,
            autoplayTimeout: 1500,
            smartSpeed: 1000,
            autoplayHoverPause: true,
            nav: false,
            dots: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 3,
                },
                600: {
                    items: 3,

                },
                1000: {
                    items: 6,
                }
            }

        });
    }

// slick carousel for detail page
    if ($.isFunction($.fn.slick)) {
        $('.slider-for-gold').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            slide: 'li',
            fade: false,
            asNavFor: '.slider-nav-gold'
        });

        $('.slider-nav-gold').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for-gold',
            dots: false,
            arrows: true,
            slide: 'li',
            vertical: true,
            centerMode: true,
            centerPadding: '0',
            focusOnSelect: true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        vertical: false,
                        centerMode: true,
                        dots: false,
                        arrows: false
                    }
                },
                {
                    breakpoint: 641,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        vertical: true,
                        centerMode: true,
                        dots: false,
                        arrows: false
                    }
                },
                {
                    breakpoint: 420,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        vertical: false,
                        centerMode: true,
                        dots: false,
                        arrows: false
                    }
                }
            ]
        });
    }

//---- responsive header

    $(function () {

        //	create the menus
        $('body:not(.rtl) #menu').mmenu({
            navbar: {
                title: 'Shortcuts'
            },
            offCanvas: {
                position: 'right'
            }
        });
        $('body.rtl #menu').mmenu({
            navbar: {
                title: '??????'
            },
            offCanvas: {
                position: 'left'
            }
        });
        $('#shoppingbag').mmenu({
            navbar: {
                title: 'General Setting'
            },
            offCanvas: {
                position: 'left'
            }
        });

        //	fire the plugin
        $('.mh-head.first').mhead({
            scroll: {
                hide: 200
            }

        });
        $('.mh-head.second').mhead({
            scroll: false
        });


    });

//**** Slide Panel Toggle ***//
    $("span.main-menu").on("click", function () {
        $(".side-panel").toggleClass('active');
        $(".theme-layout").toggleClass('active');
        return false;
    });

    $('.theme-layout').on("click", function () {
        $(this).removeClass('active');
        $(".side-panel").removeClass('active');
    });


// login & register form
    $('button.signup').on("click", function () {
        $('.login-reg-bg').addClass('show');
        return false;
    });

    $('.already-have').on("click", function () {
        $('.login-reg-bg').removeClass('show');
        return false;
    });

//----- count down timer		
    if ($.isFunction($.fn.downCount)) {
        $('.countdown').downCount({
            date: '11/12/2018 12:00:00',
            offset: +10
        });
    }

    /** Post a Comment **/
    jQuery(".post-comt-box textarea").on("keydown", function (event) {

        if (event.keyCode == 13) {
            var comment = jQuery(this).val();
            var parent = jQuery(".showmore").parent("li");
            var comment_HTML = '	<li><div class="comet-avatar"><img src="images/resources/comet-1.jpg" alt=""></div><div class="we-comment"><div class="coment-head"><h5><a href="time-line.html" title="">Jason borne</a></h5><span>1 year ago</span><a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a></div><p>' + comment + '</p></div></li>';
            $(comment_HTML).insertBefore(parent);
            jQuery(this).val('');
        }
    });

//inbox page 	
//***** Message Star *****//  
    $('.message-list > li > span.star-this').on("click", function () {
        $(this).toggleClass('starred');
    });


//***** Message Important *****//
    $('.message-list > li > span.make-important').on("click", function () {
        $(this).toggleClass('important-done');
    });


// Listen for click on toggle checkbox
    $('#select_all').on("click", function (event) {
        if (this.checked) {
            // Iterate each checkbox
            $('input:checkbox.select-message').each(function () {
                this.checked = true;
            });
        } else {
            $('input:checkbox.select-message').each(function () {
                this.checked = false;
            });
        }
    });


    $(".delete-email").on("click", function () {
        $(".message-list .select-message").each(function () {
            if (this.checked) {
                $(this).parent().slideUp();
            }
        });
    });

// change background color on hover
    $('.category-box').hover(function () {
        $(this).addClass('selected');
        $(this).parent().siblings().children('.category-box').removeClass('selected');
    });


//------- offcanvas menu 

    const menu = document.querySelector('#toggle');
    const menuItems = document.querySelector('#overlay');
    const menuContainer = document.querySelector('.menu-container');
    const menuIcon = document.querySelector('.canvas-menu i');

    function toggleMenu(e) {
        menuItems.classList.toggle('open');
        menuContainer.classList.toggle('full-menu');
        menuIcon.classList.toggle('fa-bars');
        menuIcon.classList.add('fa-times');
        e.preventDefault();
    }

    if (menu) {
        menu.addEventListener('click', toggleMenu, false);
    }

// Responsive nav dropdowns
    $('.offcanvas-menu li.menu-item-has-children > a').on('click', function () {
        $(this).parent().siblings().children('ul').slideUp();
        $(this).parent().siblings().removeClass('active');
        $(this).parent().children('ul').slideToggle();
        $(this).parent().toggleClass('active');
        return false;
    });
// new post box	
    $(".new-postbox").click(function () {
        $(".postoverlay").fadeIn(500);
    });
    $(".postoverlay").not(".new-postbox").click(function () {
        $(".postoverlay").fadeOut(500);
    });
    $("[type = submit]").click(function () {
        var post = $("textarea").val();
        $("<p class='post'>" + post + "</p>").appendTo("section");
    });

});//document ready end


/* nightmoed form */
$("#night_mode").on("change", function () {
    $(this).val($(this).is(":checked") ? 0 : 1);
    $("#nightmode-form").submit();
});

/* grow spinner on btn click */
$(".btn-loader").on("click", function () {
    if ($(this).find(".spinner-grow").length === 0) {
        $(this).prepend("<div class=\"spinner-grow text-white mx-1 align-self-center loader-sm\">Loading...</div>")
    }
});

window.emojiPicker = new EmojiPicker({
    emojiable_selector: '[data-emojiable=true]',
    assetsPath: 'http://onesignal.github.io/emoji-picker/lib/img/',
    popupButtonClasses: 'fa fa-smile-o'
});
window.emojiPicker.discover();

/* image cropper */
let canvasX = 400, canvasY = 400, aspect_ratio = 1, is_post = false;
$(".edit-phto [name='cover'], .edit-phto [name='avatar'], .newpst-input [name='file']").on('change', function (event) {

    if ($(this).is($(".edit-phto [name='cover']"))) {
        canvasY = 350;
        canvasX = 1366;
        aspect_ratio = 3;

        const _URL = window.URL || window.webkitURL;
        $(this).change(function (e) {
            let file, coverimg, has_quality = true;
            if (this.files.length>0) {
                coverimg = new Image();
                coverimg.onload = function () {
                    if (this.width < 1366) {
                        has_quality = false;
                    }
                };
                coverimg.onerror = function () {
                    has_quality = false;
                };

                if (!has_quality) {
                    return;
                }
            }
        });
    }

    console.log("cont");

    if ($(this).is(".newpst-input [name='file']")) {
        is_post = true;
    }

    const files = event.target.files;
    const done = function (url) {
        $('#image-tobe-cropped').attr('src', url);
        $('#cropmodal').modal('show');
    };

    if (files && files.length > 0) {
        const reader = new FileReader();
        reader.onload = function (event) {
            done(reader.result);
        };
        reader.readAsDataURL(files[0]);
    }
});

let cropper = null;
$('#cropmodal').on('shown.bs.modal', function () {
    const image = document.getElementById("image-tobe-cropped");
    cropper = new Cropper(image, {
        aspectRatio: aspect_ratio,
        viewMode: 3,
    });
}).on('hidden.bs.modal', function () {
    cropper.destroy();
    cropper = null;
});

$('#cropmodal #btn-crop').on('click', function () {
    const canvas = cropper.getCroppedCanvas({
        width: canvasX,
        height: canvasY
    });

    canvas.toBlob(function (blob) {
        let _url = "";
        // const formData = new FormData();
        const reader = new FileReader();
        reader.readAsDataURL(blob);
        reader.onloadend = function () {
            const base64data = reader.result;
            if (!is_post) {
                if(aspect_ratio>1){
                    _url = 'ajax/file_upload/cover.php';
                    // formData.append('avatar',base64data);
                }else{
                    _url = 'ajax/file_upload/avatar.php';
                    // formData.append('cover',base64data);
                }
                $.ajax({
                    method: 'POST',
                    url: _url,
                    data: {image: base64data},
                    success: function (response) {
                        $('#cropmodal').modal('hide');
                        $(location).attr('href', $(location).attr('href'));
                    },
                    error: function (error) {
                        console.log("error : " + JSON.stringify(error));
                    }
                });
            } else {
                $(".newpst-input #post-image-preview").attr("src", base64data);
                $("#cropmodal").modal("hide");
            }
        };
    });
});

$('#newpst-form').on('submit', function (e) {
    const base64data = $(this).find('#post-image-preview').attr('src');
    const description = $(this).find('#newpst-description').val();
    e.preventDefault();
    $.ajax(({
        url: 'ajax/file_upload/post.php',
        method: 'POST',
        data: {
            cover: base64data,
            description: description
        },
        success: function (response) {
            $(location).attr('href', $(location).attr('href'));
        }, error: function (error) {
        }
    }))
});
