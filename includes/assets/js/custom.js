jQuery(document).ready(function($) {
    $('#my-button').on('click', function() {
        $.ajax({
            url: ajaxurl,
            type: 'post',
            data: {
                action: 'my_custom_api_request',
                security: my_custom_object.nonce
            },
            success: function(response) {
                if (response.success) {
                    console.log(response.data);
                } else {
                    console.log('API request failed');
                }
            }
        });
    });
});

