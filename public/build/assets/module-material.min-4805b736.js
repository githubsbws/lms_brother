(function(t){t.fn.tkFormControlMaterial=function(){this.blur(function(){this.val()?this.addClass("used"):this.removeClass("used")}).after('<span class="ma-form-highlight"></span><span class="ma-form-bar"></span>')},t(".form-control-material .form-control").each(function(){t(this).tkFormControlMaterial()}),t(document).on("show.bs.dropdown",function(o){if(Modernizr.touch&&t(window).width()<768)return!0;var n=t(o.relatedTarget).next(".dropdown-menu"),d=n.outerHeight();n.css({height:0,display:"block",overflow:"hidden"}),n.velocity({opacity:1},{duration:650,queue:!1,easing:"easeOutQuad"}),n.velocity({height:d,top:0},{duration:650,queue:!1,easing:"easeOutCubic",complete:function(){n.css({overflow:"visible"})}})}),t(document).on("hide.bs.dropdown",function(o){if(Modernizr.touch&&t(window).width()<768)return!0;var n=t(o.relatedTarget).next(".dropdown-menu");n.velocity({opacity:0,top:"100%"},{duration:650,queue:!1,easing:"easeOutQuad",complete:function(){n.css({display:"none",height:"auto"})}})})})(jQuery),function(t){var o=function(a){var e,i,s,l,u;e=t(this),e.addClass("ripple"),e.parents(".sidebar-skin-white").length&&e.addClass("ripple-dark-fade"),e.parents(".sidebar-skin-dark").length&&e.addClass("ripple-light-fade"),e.is(".btn-white")&&e.addClass("ripple-dark-fade"),e.attr("href")&&!e.data("toggle")&&(a.preventDefault(),e.closest(".dropdown-menu").length&&a.stopPropagation(),setTimeout(function(){document.location=e.attr("href")},400)),e.find(".ink").length===0&&e.prepend("<span class='ink'></span>"),i=e.find(".ink"),i.removeClass("animate"),i.height()||i.width()||(s=Math.max(e.outerWidth(),e.outerHeight()),i.css({height:s,width:s})),l=a.pageX-e.offset().left-i.width()/2,u=a.pageY-e.offset().top-i.height()/2,i.css({top:u+"px",left:l+"px"}).addClass("animate")},n=t(".list-group-menu > .list-group-item > a"),d=t(".btn"),h=t(".navbar-nav > li > a"),c=t(".dropdown-menu > li > a"),p=t(".sidebar-menu > li > a"),r=t().add(n).add(d).add(h).add(c).add(p);r.length&&r.click(o)}(jQuery);