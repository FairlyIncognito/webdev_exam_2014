$(document).ready(function(){
    // Click functions to change css on buttons
    $('#logo').click(function(){
        $('#logo').css({'color': 'red', 'background': 'white'});
        $('#logoBox').css('display', 'block');

        $('#informationBox').css('display', 'none');
        $('#information').css({'color': 'black', 'background': '#c3c3c3'});

        $('#userDescriptionBox').css('display', 'none');
        $('#userDescription').css({'color': 'black', 'background': '#c3c3c3'});
    });
    $('#information').click(function(){
        $('#information').css({'color': 'red', 'background': 'white'});
        $('#informationBox').css('display', 'block');

        $('#logoBox').css('display', 'none');
        $('#logo').css({'color': 'black', 'background': '#c3c3c3'});

        $('#userDescriptionBox').css('display', 'none');
        $('#userDescription').css({'color': 'black', 'background': '#c3c3c3'});
    });
    $('#userDescription').click(function(){
        $('#userDescription').css({'color': 'red', 'background': 'white'});
        $('#userDescriptionBox').css('display', 'block');

        $('#logo').css({'color': 'black', 'background': '#c3c3c3'});
        $('#logoBox').css('display', 'none');

        $('#information').css({'color': 'black', 'background': '#c3c3c3'});
        $('#informationBox').css('display', 'none');
    });

    // Replace current image with new image on file selection
    $('#file').change( function(event) {
        // Gets the temporary URL when selecting a file and adds it as a source to id='img'
        $("#img").attr('src',URL.createObjectURL(event.target.files[0]));
    });
});