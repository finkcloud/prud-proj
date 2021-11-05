(function ($) {
   'use strict';
   
//    aos scroll-animation Init
   function aosAnim() {
       AOS.init({
           duration: 800
       });
   }
   setTimeout(function(){
       aosAnim();
   },250);

   $(document).ready(function () {

       // smoothScroll init
       function smoothScroll() {
           $('.nav-link').click(function(event) {
               if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
               var target = $(this.hash);
               target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
               if (target.length) {
                   event.preventDefault();
                   $('html, body').animate({
                   scrollTop: target.offset().top
                   }, 300, function() {
                   var $target = $(target);
                   $target.focus();
                   if ($target.is(':focus')) {
                       return false;
                   } else {
                       $target.attr('tabindex','-1');
                       $target.focus();
                   }
                   });
               }
               }
           });
       }
       smoothScroll();
       
   });

})(jQuery);