$(document).ready( function() {
        $.ajax({
            type: 'POST',
            url: 'display_data.php',
            dataType: 'json',
            cache: false,

            success: function(result) {
				var data=JSON.stringify(result);
                $('#content').html(data);
            },
        });
    });