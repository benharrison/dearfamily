window.URL = 'https://dl.dropbox.com/u/1854875/iheart.stephy.backgrounds/';
window.BG = {};

BG.List = [];
BG.CurrentImage = 0;
BG.SlideshowPaused = true;

BG.Init = function(array)
{
    BG.List = array;
    BG.CurrentImage = Math.floor(Math.random() * array.length);
    
    var initialDisplay = true; // always show the image at least once
    (function(){ // recursive function for slideshow
        var secondsToDisplay = 5;
        if (initialDisplay)
        {
            BG.Display();
        }
        else if ( !BG.SlideshowPaused )
        {
            BG.ShowNext();
        }
        initialDisplay = false;
        setTimeout(arguments.callee, secondsToDisplay * 1000);
    })();
}

BG.Display = function()
{
    $('#current_image_filename').html(BG.List[BG.CurrentImage].Filename + ' - ');
    $('#current_image_index').html(BG.CurrentImage + 1);
    $('#total_images').html(BG.List.length);
    $.backstretch(URL + BG.List[BG.CurrentImage].Filename);
}

BG.ShowPrev = function()
{
    BG.CurrentImage--;
    if (BG.CurrentImage < 0) { BG.CurrentImage = BG.List.length - 1; }
    BG.Display();
}

BG.ShowNext = function()
{
    BG.CurrentImage++;
    if (BG.CurrentImage >= BG.List.length) { BG.CurrentImage = 0; }
    BG.Display();
}

$(document).ready(function(){
    $.ajax({
        url: URL + 'images.json',
        dataType: 'jsonp'
    });
    
    $('body').bind('keyup', function(e){
        if (BG.List.length === 0)
            return;
            
        if (e.which === 37) // left arrow
        { BG.ShowPrev(); }
        else if (e.which === 39) // right arrow
        { BG.ShowNext(); }
    });
    
    $('#image_data').mouseenter(function(){
        $('#current_image_filename').show();
    }).mouseleave(function(){
        $('#current_image_filename').hide();
    });
    
    $('#slideshow_toggle').bind('click', function(){
        BG.SlideshowPaused = !BG.SlideshowPaused; // invert the bool value
        
        if (BG.SlideshowPaused)
        { $(this).removeClass('paused'); }
        else
        { $(this).addClass('paused'); }
        
        return false;
    });
});
