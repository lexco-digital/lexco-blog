function slideDiv(object) {
    $(object).slideToggle(250);
}

var fadeInModal = function(modal){
    $(document).ready(function(){
        $(modal).show(250);
    });
}

var closeModal = function(modal){
    $(document).ready(function(){
        $(modal).hide(250);
    });
}


// Navigation Color Change
$(document).ready(function($) {
    
    // Add classes to wordpress elements
    var window_width = $(window).width();
    if ( window_width > 960) {
        //$(".uk-navbar-dropdown-nav").wrap('<div class="uk-navbar-dropdown"></div>');
    }
    
    $('#navbarNav > li.menu-item-has-children > a').attr('uk-icon','icon: chevron-down');
    $('.blog-comments .comment-respond').addClass('uk-card uk-card-default uk-width-2-3@s uk-margin-auto uk-margin-xlarge-top uk-padding');
    $('textarea#comment').addClass('uk-textarea');
    $('.comment-respond input#author, .comment-respond input#email, .comment-respond input#url' ).addClass('uk-input');
    $('#comments a.url').addClass('uk-text-muted uk-text-small');
    $('#comments time').addClass('uk-text-muted uk-text-small');
    $('ul.page-numbers').addClass('uk-pagination uk-flex-center');
    $('#footer-sidebar ul').addClass('uk-nav');
    $('input[type="text"], input[class*="input-text"]').addClass('uk-input');
    $('select').addClass('uk-select');
    $('textarea').addClass('uk-textarea');
    
});
