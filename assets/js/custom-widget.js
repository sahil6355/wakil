// custom-widget.js
jQuery(document).ready(function($){
    function handle_media_upload(button) {
        var $button = $(button);
        var $input = $button.siblings('.image-url');
        var $imagePreview = $button.siblings('img');

        var frame = wp.media({
            title: 'Select or Upload Media',
            button: {
                text: 'Use this media'
            },
            multiple: false
        });

        frame.on('select', function() {
            var attachment = frame.state().get('selection').first().toJSON();
            $input.val(attachment.url);
            $imagePreview.attr('src', attachment.url);
        });

        frame.open();
    }

    $('.upload_image_button').on('click', function(e) {
        e.preventDefault();
        handle_media_upload(this);
    });
});

jQuery(document).ready(function($){
    function openMediaUploader(button) {
        var $button = $(button);
        var $input = $button.siblings('.image-url');
        var $imagePreview = $button.siblings('img');

        var frame = wp.media({
            title: 'Select or Upload Media',
            button: {
                text: 'Use this media'
            },
            multiple: false
        });
        frame.on('select', function() {
            var attachment = frame.state().get('selection').first().toJSON();
            $input.val(attachment.url);
            $imagePreview.attr('src', attachment.url);
        });
        frame.open();
    }
    $(document).on('click', '.upload-image', function(e) {
        e.preventDefault();
        var input = $(this).siblings('.image-url');
        openMediaUploader(this);
    });
});