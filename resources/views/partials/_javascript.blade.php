
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/lightbox.min.js"></script>
<script type="text/javascript" src="/js/wow.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script> 
<script type="text/javascript" src="/js/page-loader-min.js"></script> 
<!-- javascript plugin for responsive grid layout -->
    <script src="/js/masonry.pkgd.min.js"></script>
    <script src="/js/imagesloaded.pkgd.min.js"></script>

<script type="text/javascript" src="/js/jquery.jscroll.js"></script>

<script type="text/javascript">

// responsive grid script

var $grid = $('.grid').masonry({
  itemSelector : '.grid-item',
  columnWidth  : 30
});

$grid.imagesLoaded().progress( function() {
  $grid.masonry('layout');
});


// infinite scroll script
$(function() {
    $('.scroll').jscroll({
        autoTrigger: true,
        nextSelector: '.pagination li.active + li a', 
        contentSelector: 'div.scroll',
        callback: function() {
            $('ul.pagination:visible:first').hide();
        }
    });
});


// script for login page
$(".email-signup").hide();
$("#signup-box-link").click(function(){
  $(".email-login").fadeOut(100);
  $(".email-signup").delay(100).fadeIn(100);
  $("#login-box-link").removeClass("active");
  $("#signup-box-link").addClass("active");
});
$("#login-box-link").click(function(){
  $(".email-login").delay(100).fadeIn(100);;
  $(".email-signup").fadeOut(100);
  $("#login-box-link").addClass("active");
  $("#signup-box-link").removeClass("active");
});


</script>
