/***************************************************
==================== JS INDEX ======================
****************************************************

00. Initialize Color Picker
01. File Uploader
02. Subheading Show/Hide
03. Countdown Show/Hide
04. Layout Option Show/Hide
05. Layout Preview Image
06. About Page
07. Portfolio Page

***************************************************/
var $ = jQuery;
"use strict";
$(document).ready(function($) {


    /////////////////////////////////////////////////////
    // 00. Initialize Color Picker

    $('.color_pallete').wpColorPicker();



    /////////////////////////////////////////////////////
    // 01. File Uploader

    $('body').on('click', '.wakil-upload', function(e) {

        e.preventDefault();
        var activeFileUploadContext = $(this).parent();

        var customFileFrame = wp.media.frames.customHeader = wp.media({
            title: $(this).data('choose'),
            button: {
                text: $(this).data('update')
            }
        });

        customFileFrame.on('select', function() {
            var attachment = customFileFrame.state().get("selection").first();
            $('input', activeFileUploadContext).val(attachment.attributes.url).trigger('change');
            $('.wakil-upload', activeFileUploadContext).hide();
            $('.wakil-upload-remove', activeFileUploadContext).show();
        });

        customFileFrame.open();
    });

    $('body').on('click', '.wakil-upload-remove', function(e) {

        e.preventDefault();

        var activeFileUploadContext = $(this).parent();
        $('input', activeFileUploadContext).val('');
        $(this).prev().fadeIn('slow');
        $(this).fadeOut('slow');
    });



    /////////////////////////////////////////////////////
    // 02. Subheading Show/Hide

    var subtitle = $('#wp-wakil_heading_subtitle-editor-tools').parents('tr');

    if (!$('#wakil_subtitle_enable-disable').is(':checked')) {
        subtitle.hide();
    }

    $('input:radio[name="wakil_subtitle_enable"]').on('change', function() {
        if ($('#wakil_subtitle_enable-disable').is(':checked')) {
            subtitle.show();
        } else {
            subtitle.hide();
        }
    });


    $(document).ready( function() {
        $(document).on("change", ".forminp-select select", function() {
           let img = $(this).find("option:selected").attr("data-img");
           $("#preview").empty().append("<image src=" + img + ">");
        });
     });
    /////////////////////////////////////////////////////
    // 03. Countdown Show/Hide

    var countdown = $('#wakil_launch_date').parents('tr');
    var wakil_notify_button = $('#wakil_notify_button_text').parents('tr');
    var wakil_notify_content = $('.wakil_notify_content').parents('tr');

    if (!$('#wakil_countdown_enable-unable').is(':checked')) {
        countdown.hide();
        wakil_notify_button.hide();
        wakil_notify_content.hide();
    }

    $('input:radio[name="wakil_countdown_enable"]').on('change', function() {
        if ($('#wakil_countdown_enable-unable').is(':checked')) {
            countdown.show();
            wakil_notify_button.show();
            wakil_notify_content.show();
        } else {
            countdown.hide();
            wakil_notify_button.hide();
            wakil_notify_content.hide();
        }
    });



    /////////////////////////////////////////////////////
    // 04. Layout Option Show/Hide

    var selectVal = $('select[name="wakil_coming_soon_layout"]').val();
    var back_def_type = $('input[name="wakil_background_type"]:checked').val();
    var video_def_type = $('input[name="wakil_background_video_type"]:checked').val();
    var animation_def_type = $('input[name="wakil_background_animation"]:checked').val();
    var sidebar_video_def_type = $('input[name="wakil_sidebar_video_type"]:checked').val();
    var sidebar_overlay_def_type = $('input[name="wakil_background_overlay"]:checked').val();
    var sidebar_more_bg_slide_type = $('input[name="wakil_more_bg_slide_button"]:checked').val();
    var sidebar_layout2_more_slide_type = $('input[name="wakil_layout2_right_slide_button"]:checked').val();

    var layoutColor = $('.wakil-bg-color').parents('tr');
    var backVideo = $('.back_video').parents('tr');
    var backImgOverlaySel = $('.back_overlay_select').parents('tr');
    var backImgOverlay = $('.wakil-bg-color-overlay').parents('tr');
    var backImg = $('.back_img').parents('tr');
    var embedUrl = $('.embed_url').parents('tr');
    var sidebarbackImg = $('.sidebar_back_img').parents('tr');
    var sidebarVideo = $('.sidebar_video').parents('tr');
    var sidebarembedUrl = $('.sidebar_embed_url').parents('tr');
    var backTypeSel = $('.back_type_select').parents('tr');
    var videoTypeSel = $('.video_type_select').parents('tr');
    var backWidthSel = $('.back_size_select').parents('tr');
    var backAnimationSel = $('.back_animation_select').parents('tr');
    var backAnimationType = $('.wakil-animation-type-select').parents('tr');
    var sidebarType = $('.sidebar_select').parents('tr');
    var sidebarVideoTypeSel = $('.sidebar_video_type_select').parents('tr');

    // Background slider more button and image
    var backMoreImgSel = $('.back_more_bg_slide_select').parents('tr');
    var backMoreImg = $('.back_more_img').parents('tr');

    // Background slider more button and image
    var backLayout2MoreImgSel = $('.back_layout2_right_slide_select').parents('tr');
    var backLayout2MoreImg = $('.layout2_right_slider_more_img').parents('tr');


    //Sidebar layout 1
    var rightSliderImg = $('.right_slider_img').parents('tr');
    var rightSliderTitle = $('.right_slider_title').parents('tr');
    var rightSliderText = $('.right_slider_text').parents('tr');


    var layout2RightSliderImg = $('.layout2_right_slider_img').parents('tr');


    if (selectVal === 'layout_1') {

        backTypeSel.hide();
        backImg.hide();
        backImgOverlay.hide();
        backImgOverlaySel.hide();
        videoTypeSel.hide();
        backVideo.hide();
        embedUrl.hide();
        sidebarType.hide();
        sidebarbackImg.hide();
        sidebarVideo.hide();
        sidebarembedUrl.hide();
        sidebarVideoTypeSel.hide();
        layout2RightSliderImg.hide();
        backMoreImgSel.hide();
        backMoreImg.hide();
        backLayout2MoreImgSel.hide();
        backLayout2MoreImg.hide();
        layoutColor.show();
        backAnimationSel.show();
        backWidthSel.show();

        if (animation_def_type === 'Unable') {
            backAnimationType.show();
        } else {
            backAnimationType.hide();
        }

    } else if (selectVal === 'layout_2') {
        layoutColor.hide();
        videoTypeSel.hide();
        backVideo.hide();
        embedUrl.hide();
        backAnimationType.hide();
        sidebarType.hide();
        sidebarbackImg.hide();
        sidebarVideo.hide();
        sidebarembedUrl.hide();
        sidebarVideoTypeSel.hide();
        rightSliderImg.hide();
        rightSliderTitle.hide();
        rightSliderText.hide();
        backImgOverlay.hide();
        layout2RightSliderImg.show();
        backLayout2MoreImgSel.show();

        if (sidebar_layout2_more_slide_type == 'Unable') {
            backLayout2MoreImg.show();
        } else {
            backLayout2MoreImg.hide();
        }

        if (sidebar_overlay_def_type == 'Unable') {
            backImgOverlay.show();
        } else {
            backImgOverlay.hide();
        }
        if (back_def_type === 'Unable') {
            backImg.show();
            backTypeSel.show();
            backMoreImgSel.show();
            if (sidebar_more_bg_slide_type === 'Unable') {
                backMoreImg.show();
            } else {
                backMoreImg.hide();
            }
        } else {
            backImg.hide();
            backMoreImgSel.hide();
            backMoreImg.hide();
            backTypeSel.show();
            videoTypeSel.show();
            if (video_def_type === 'Unable') {
                backVideo.show();
            } else {
                embedUrl.show();
            }
        }
        if (animation_def_type === 'Unable') {
            backAnimationType.show();
        } else {
            backAnimationType.hide();
        }
    } else if (selectVal === 'layout_3') {
        layoutColor.hide();
        backTypeSel.hide();
        backImg.hide();
        videoTypeSel.hide();
        backVideo.hide();
        embedUrl.hide();
        rightSliderImg.hide();
        rightSliderTitle.hide();
        rightSliderText.hide();
        layout2RightSliderImg.hide();
        backImgOverlay.hide();
        backLayout2MoreImgSel.hide();
        backLayout2MoreImg.hide();
        backWidthSel.show();
        sidebarType.show();
        backAnimationSel.show();
        sidebarVideoTypeSel.show();

        if (sidebar_overlay_def_type == 'Unable') {
            backImgOverlay.show();
        } else {
            backImgOverlay.hide();
        }

        if (back_def_type === 'Unable') {
            backTypeSel.show();
            backImg.show();
            backMoreImgSel.show();
            if (sidebar_more_bg_slide_type === 'Unable') {
                backMoreImg.show();
            } else {
                backMoreImg.hide();
            }
        } else {
            backImg.hide();
            backTypeSel.show();
            videoTypeSel.show();
            if (video_def_type === 'Unable') {
                backVideo.show();
            } else {
                embedUrl.show();
            }
        }
        if (animation_def_type === 'Unable') {
            backAnimationType.show();
        } else {
            backAnimationType.hide();
        }
        if (sidebar_video_def_type === 'Unable') {
            sidebarembedUrl.hide();
            sidebarVideo.show();
        } else {
            sidebarVideo.hide();
            sidebarembedUrl.show();
        }
    }

    $('select[name="wakil_coming_soon_layout"]').on('change', function(e) {
        e.preventDefault();
        var layoutType = this.value;
       // $("#wakil_animation_type option[value='smoke']").remove(); // remove smoke animation from dropdown
       // $("#wakil_animation_type option[value='ripple-cell']").remove(); // remove ripple-cell animation from dropdown

        if (layoutType === 'layout_1') {
            backTypeSel.hide();
            backImg.hide();
            backMoreImg.hide();
            backMoreImgSel.hide();
            backMoreImgSel.hide();
            backMoreImg.hide();
            backLayout2MoreImgSel.hide();
            backLayout2MoreImg.hide();
            videoTypeSel.hide();
            backWidthSel.hide();
            backVideo.hide();
            embedUrl.hide();
            backImgOverlay.hide();
            backImgOverlaySel.hide();
            sidebarType.hide();
            sidebarbackImg.hide();
            sidebarVideo.hide();
            sidebarembedUrl.hide();
            sidebarVideoTypeSel.hide();
            layout2RightSliderImg.hide();
            layoutColor.show();
            backAnimationSel.show();
            rightSliderImg.show();
            rightSliderTitle.show();
            rightSliderText.show();
            //$('#wakil_animation_type').append(`<option data-img="" value="smoke">Smoke</option>`); // add smoke animation from dropdown
          //  $('#wakil_animation_type').append(`<option data-img="" value="ripple-cell">Ripple-Cell</option>`); // add ripple-cell animation from dropdown

        } else if (layoutType === 'layout_2') {
            layoutColor.hide();
            sidebarVideoTypeSel.hide();
            rightSliderTitle.hide();
            rightSliderText.hide();
            sidebarVideo.hide();
            rightSliderImg.hide();
            layout2RightSliderImg.show();
            backTypeSel.show();
            backWidthSel.show();
            backAnimationSel.show();
            backLayout2MoreImgSel.show();

            if ($('#wakil_layout2_right_slide_button-unable').is(':checked')) {
                backLayout2MoreImg.show();
            } else {
                backLayout2MoreImg.hide();
            }

            if ($('#wakil_background_type-unable').is(':checked')) {
                videoTypeSel.hide();
                backVideo.hide();
                embedUrl.hide();
                backImg.show();
                backImgOverlay.show();
                backMoreImgSel.show();
            }
            if ($('#wakil_background_overlay-unable').is(':checked')) {
                backImgOverlay.show();
            } else {
                backImgOverlay.hide();
            }
        } else if (layoutType === 'layout_3') {
            layoutColor.hide();
            sidebarbackImg.hide();
            videoTypeSel.hide();
            rightSliderImg.hide();
            rightSliderTitle.hide();
            rightSliderText.hide();
            layout2RightSliderImg.hide();
            backLayout2MoreImgSel.hide();
            backLayout2MoreImg.hide();
            backAnimationSel.show();
            backWidthSel.show();
            sidebarType.show();
            backTypeSel.show();
            backVideo.show();
            sidebarVideoTypeSel.show();
            sidebarVideo.show();

            if ($('#wakil_background_type-unable').is(':checked')) {
                videoTypeSel.hide();
                backVideo.hide();
                embedUrl.hide();
                backImg.show();
                backAnimationSel.show();
            }
            if ($('#wakil_background_overlay-unable').is(':checked')) {
                backImgOverlay.show();
            } else {
                backImgOverlay.hide();
            }
        }
    });


    $('input:radio[name="wakil_layout2_right_slide_button"]').on('change', function() {
        backLayout2MoreImg.hide();
        if ($('#wakil_layout2_right_slide_button-unable').is(':checked')) {
            backLayout2MoreImg.show();
        } else {
            backLayout2MoreImg.hide();
        }
    });

    $('input:radio[name="wakil_more_bg_slide_button"]').on('change', function() {
        backMoreImg.hide();
        if ($('#wakil_more_bg_slide_button-unable').is(':checked')) {
            backMoreImg.show();
        } else {
            backMoreImg.hide();
        }
    });

    $('input:radio[name="wakil_background_overlay"]').on('change', function() {
        backImgOverlay.hide();
        if ($('#wakil_background_overlay-unable').is(':checked')) {
            backImgOverlay.show();
        } else {
            backImgOverlay.hide();
        }
    });

    $('input:radio[name="wakil_sidebar_video_type"]').on('change', function() {
        if ($('#wakil_sidebar_video_type-unable').is(':checked')) {
            sidebarembedUrl.hide();
            sidebarVideo.show();
        } else {
            sidebarVideo.hide();
            sidebarembedUrl.show();
        }
    });

    $('input:radio[name="wakil_background_type"]').on('change', function() {
        if ($('#wakil_background_type-unable').is(':checked')) {
            backImg.show();
            backMoreImgSel.show();
            videoTypeSel.hide();
            backVideo.hide();
            embedUrl.hide();
        } else {
            backImg.hide();
            backMoreImgSel.hide();
            videoTypeSel.show();
            backVideo.show();
            embedUrl.hide();

        }
    });

    $('input:radio[name="wakil_background_animation"]').on('change', function() {
        if ($('#wakil_background_animation-unable').is(':checked')) {
            backAnimationType.show();
        } else {
            backAnimationType.hide();
        }
    });


    $('input:radio[name="wakil_background_video_type"]').on('change', function() {
        if ($('#wakil_background_video_type-unable').is(':checked')) {
            backVideo.show();
            embedUrl.hide();
        } else {
            backVideo.hide();
            embedUrl.show();
        }
    });



    /////////////////////////////////////////////////////
    // 05. Layout Preview Image

    $('select').on('change', function() {
        var id = $(this).attr('id') + "_preview";
        var img_url = $('option:selected', this).data('img');
        $("#" + id + ' .preview_image').attr("src", img_url);
    });



    /////////////////////////////////////////////////////
    // 06. About Page

    var sidebar_layout2_more_slide_type = $('input[name="wakil_more_team_mem_button"]:checked').val();
    var moreTeamImg = $('.team_more').parents('tr');

    if (sidebar_layout2_more_slide_type == 'Unable') {
        moreTeamImg.show();
    } else {
        moreTeamImg.hide();
    }

    $('input:radio[name="wakil_more_team_mem_button"]').on('change', function() {
        moreTeamImg.hide();
        if ($('#wakil_more_team_mem_button-unable').is(':checked')) {
            moreTeamImg.show();
        } else {
            moreTeamImg.hide();
        }
    });



    /////////////////////////////////////////////////////
    // 07. Portfolio Page

    var portfolio_more_slide_type = $('input[name="wakil_more_portfolio_button"]:checked').val();
    var morePortfolio = $('.portfolio_more').parents('tr');

    if (portfolio_more_slide_type == 'Unable') {
        morePortfolio.show();
    } else {
        morePortfolio.hide();
    }

    $('input:radio[name="wakil_more_portfolio_button"]').on('change', function() {
        morePortfolio.hide();
        if ($('#wakil_more_portfolio_button-unable').is(':checked')) {
            morePortfolio.show();
        } else {
            morePortfolio.hide();
        }
    });

});