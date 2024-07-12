jQuery(document).ready(function($) {
    function showHideMetaBoxes(elem) {
        var currentFormat = $('input[name="post_format"]:checked').val();
        $('#gallery-meta-box').hide();
        $('#video-meta-box').hide();
        $('#quote-meta-box').hide();
        $('#link-meta-box').hide();
        $('#audio-meta-box').hide();
        $('#standard-meta-box').hide();
        switch (currentFormat) {
        case 'gallery':
            $('#gallery-meta-box').show();
            break;
        case 'video':
            $('#video-meta-box').show();
            break;
        case 'quote':
            $('#quote-meta-box').show();
            break;
        case 'link':
            $('#link-meta-box').show();
            break;
        case 'audio':
            $('#audio-meta-box').show();
            break;
        default:
            $('#standard-meta-box').show();
        }
    }

    showHideMetaBoxes();

    $('input[name="post_format"]').change(function() {
        showHideMetaBoxes(this);
    });
});





