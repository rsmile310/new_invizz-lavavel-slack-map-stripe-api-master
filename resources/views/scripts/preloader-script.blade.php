<script>
    !(function($) {
    "use strict";

    // Preloader
    $(window).on('load', function() {
        if ($('#pageloader').length) {
        $('#pageloader').delay(100).fadeOut('slow', function() {
            $(this).remove();
        });
        }
    });
    })(jQuery);
</script>


