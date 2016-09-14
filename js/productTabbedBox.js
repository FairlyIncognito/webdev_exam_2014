$(document).ready(function(){
    $('#description').click(function(){
        $('#description').css({'color': 'red', 'background': 'white', 'z-index': '1'});
        $('#descriptionBox').css('display', 'block');
        $('#reviewsBox').css('display', 'none');
        $('#reviews').css({'color': 'black', 'z-index': '-2', 'background': '#c3c3c3'});
    });
    $('#reviews').click(function(){
        $('#reviews').css({'color': 'red', 'background': 'white', 'z-index': '1'});
        $('#descriptionBox').css('display', 'none');
        $('#reviewsBox').css('display', 'block');
        $('#description').css({'color': 'black', 'z-index': '-2', 'background': '#c3c3c3'});
    });
});