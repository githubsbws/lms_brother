(function t(a,i,r){function c(n,d){if(!i[n]){if(!a[n]){var b=typeof require=="function"&&require;if(!d&&b)return b(n,!0);if(l)return l(n,!0);var y=new Error("Cannot find module '"+n+"'");throw y.code="MODULE_NOT_FOUND",y}var k=i[n]={exports:{}};a[n][0].call(k.exports,function(j){var g=a[n][1][j];return c(g||j)},k,k.exports,t,a,i,r)}return i[n].exports}for(var l=typeof require=="function"&&require,s=0;s<r.length;s++)c(r[s]);return c})({"./lib/layout/js/main.js":[function(t){t("./_breakpoints.js"),t("./_gridalicious.js"),t("./_scrollable.js"),t("./_skins"),t("./_isotope"),t("./_parallax"),t("./_sidebar-pc")},{"./_breakpoints.js":"/Code/html/themekit-learning/lib/layout/js/_breakpoints.js","./_gridalicious.js":"/Code/html/themekit-learning/lib/layout/js/_gridalicious.js","./_isotope":"/Code/html/themekit-learning/lib/layout/js/_isotope.js","./_parallax":"/Code/html/themekit-learning/lib/layout/js/_parallax.js","./_scrollable.js":"/Code/html/themekit-learning/lib/layout/js/_scrollable.js","./_sidebar-pc":"/Code/html/themekit-learning/lib/layout/js/_sidebar-pc.js","./_skins":"/Code/html/themekit-learning/lib/layout/js/_skins.js"}],"/Code/html/themekit-learning/lib/layout/js/_async.js":[function(t,a){function i(r,c){var l=!1,s=!0,n=r.document,d=n.documentElement,b=n.addEventListener,y=b?"addEventListener":"attachEvent",k=b?"removeEventListener":"detachEvent",j=b?"":"on",g=function(e){(e.type!="readystatechange"||n.readyState=="complete")&&((e.type=="load"?r:n)[k](j+e.type,g,!1),!l&&(l=!0)&&c.call(r,e.type||e))},V=function(){try{d.doScroll("left")}catch{return void setTimeout(V,50)}g("poll")};if(n.readyState=="complete")c.call(r,"lazy");else{if(!b&&d.doScroll){try{s=!r.frameElement}catch{}s&&V()}n[y](j+"DOMContentLoaded",g,!1),n[y](j+"readystatechange",g,!1),r[y](j+"load",g,!1)}}a.exports=function(r,c){var l=function(n,d){n.foreach(function(b,y){s(y)}),typeof d=="function"&&i(window,d)},s=function(n){var d=document.createElement("link");d.type="text/css",d.rel="stylesheet",d.href=n,document.getElementsByTagName("head")[0].appendChild(d)};Array.prototype.foreach=function(n){for(var d=0;d<this.length;d++)n(d,this[d])},l(r,c)}},{}],"/Code/html/themekit-learning/lib/layout/js/_breakpoints.js":[function(){(function(t){t(window).setBreakpoints({distinct:!0,breakpoints:[320,480,768,1024]})})(jQuery)},{}],"/Code/html/themekit-learning/lib/layout/js/_gridalicious.js":[function(){(function(t){t.fn.tkGridalicious=function(){this.length&&this.gridalicious({gutter:this.data("gutter")||15,width:this.data("width")||370,selector:"> div",animationOptions:{complete:function(){t(window).trigger("resize")}}})},t('[data-toggle*="gridalicious"]').each(function(){t(this).tkGridalicious()})})(jQuery)},{}],"/Code/html/themekit-learning/lib/layout/js/_isotope.js":[function(){(function(t){t.fn.tkIsotope=function(){this.length&&this.isotope({layoutMode:this.data("layoutMode")||"packery",itemSelector:".item"})},t(function(){setTimeout(function(){t('[data-toggle="isotope"]').each(function(){t(this).tkIsotope()})},300),t(document).on("domChanged",function(){t('[data-toggle="isotope"]').each(function(){t(this).isotope()})})})})(jQuery)},{}],"/Code/html/themekit-learning/lib/layout/js/_parallax.js":[function(){(function(){for(var t=0,a=["ms","moz","webkit","o"],i=0;i<a.length&&!window.requestAnimationFrame;++i)window.requestAnimationFrame=window[a[i]+"RequestAnimationFrame"],window.cancelAnimationFrame=window[a[i]+"CancelAnimationFrame"]||window[a[i]+"CancelRequestAnimationFrame"];window.requestAnimationFrame||(window.requestAnimationFrame=function(r){var c=new Date().getTime(),l=Math.max(0,16-(c-t)),s=window.setTimeout(function(){r(c+l)},l);return t=c+l,s}),window.cancelAnimationFrame||(window.cancelAnimationFrame=function(r){clearTimeout(r)})})(),function(t,a){t.fn.tkParallax=function(){if(!Modernizr.touch){var i=function(e){return{speed:e.data("speed")||4,translate:e.data("speed")||!0,translateWhen:e.data("translateWhen")||"inViewportTop",autoOffset:e.data("autoOffset"),offset:e.data("offset")||0,opacity:e.data("opacity")}},r=t(a),c=t(".st-content-inner"),l=this,s=!1,n=null,d=0,b=/Safari/.test(navigator.userAgent)&&/Apple Computer/.test(navigator.vendor),y=function(e){s||(n=t(e.currentTarget),b?V():(a.requestAnimationFrame(V),s=!0))},k=function(e,_){var u="translate3d(0px,"+_+"px, 0px)";e.style["-webkit-transform"]=u,e.style["-moz-transform"]=u,e.style["-ms-transform"]=u,e.style["-o-transform"]=u,e.style.transform=u},j=l.find(".parallax-layer"),g=function(){j.each(function(){var e=t(this),_=i(e),u=l.outerHeight(!0);_.translate&&e.is("img")&&_.autoOffset&&t.loadImage(e.attr("src")).done(function(){e.removeAttr("style");var v=e.height(),p=.33*v;p+u>v&&(p=v-u),p=-1*p,e.attr("data-offset",p),k(e.get(0),p)})})};g(),t(a).on("debouncedresize",g);var V=function(){var e=parseInt(n.scrollTop()),_=n.is(r)?0:n.offset().top,u=l.outerHeight(!0),v={top:parseInt(t(document.body).css("padding-top")),bottom:parseInt(t(document.body).css("padding-bottom"))},p=n.innerHeight(),z=e+p-(v.bottom+v.top),m=l.offset().top-_-v.top,h=m+u,q=Math.abs(m),A=m/p*100,C=.5*u,o={};o.inViewport=h>0&&p>m,o.inViewportTop=h>0&&0>m,o.inViewportBottom=h>0&&p>m&&h>p,n.is(r)&&(o.inWindowViewportFull=m>=e&&z>=h,o.inWindowViewport2=m>=e&&z>=m,o.inWindowViewport3=h>=e&&z>=h,o.inWindowViewport4=h>=e&&h>=p&&u>p,o.inWindowViewportTop=!o.inWindowViewport2&&(o.inWindowViewport3||o.inWindowViewport4),o.inWindowViewportBottom=o.inWindowViewport2&&!o.inWindowViewport3,o.inWindowViewport=o.inWindowViewportTop||o.inWindowViewportBottom||o.inWindowViewportFull,o.inViewport=o.inWindowViewport,o.inViewportTop=o.inWindowViewportTop,o.inViewportBottom=o.inWindowViewportBottom,A=(m-e)/p*100),o.inViewportTop&&o.inViewportBottom&&(o.inViewportBottom=!1),isNaN(e)||(j.each(function(){var f=t(this),W=i(f),S=p+u-h;if(n.is(r)&&(S=z-m),W.translate){var w=-1*A*W.speed+W.offset,x=f.height();!o.inViewport||o.inViewportTop||o.inViewportBottom||(f.is("img")&&x>u&&Math.abs(w)+u>x&&(w=-1*(x-u)),f.is("img")||(w=0)),o.inViewportTop&&(f.is("img")&&x==u||!f.is("img"))&&(w=Math.abs(w)),o.inViewportBottom&&!f.is("img")&&(w=u-S,d>e&&(w=-1*w)),o.inViewport&&(w=w.toFixed(5),x>r.height()&&0>=e&&(w=0),k(f.get(0),w))}if(W.opacity){if(o.inViewportBottom){var T,F;n.is(r)?(T=S,F=(T/u).toFixed(5),f.css(T>C?{opacity:F}:{opacity:0})):p+C>h?(T=p+C-h,F=(T/C).toFixed(5),f.css({opacity:F})):f.css({opacity:0})}else if(o.inViewportTop){var B=n.is(r)?e-m:q;f.css(B>C?{opacity:(1-B/u).toFixed(5)}:{opacity:1})}else f.css({opacity:1});o.inViewportBottom&&0>=e&&f.css({opacity:1})}}),d=e),s=!1};c.length?c.scroll(y):r.scroll(y)}},t(".parallax").each(function(){t(this).tkParallax()})}(jQuery,window)},{}],"/Code/html/themekit-learning/lib/layout/js/_scrollable.js":[function(t){(function(a){var i=t("./_skin")();a.fn.tkScrollable=function(c){if(this.length){var l=a.extend({horizontal:!1},c),s=this.niceScroll({cursorborder:0,cursorcolor:config.skins[i]["primary-color"],horizrailenabled:l.horizontal});if(l.horizontal){var n=s.getContentSize;s.getContentSize=function(){var d=n.call(s);return d.h=s.win.height(),d}}}},a("[data-scrollable]").tkScrollable(),a("[data-scrollable-h]").each(function(){a(this).tkScrollable({horizontal:!0})});var r;a(window).on("debouncedresize",function(){clearTimeout(r),r=setTimeout(function(){a("[data-scrollable], [data-scrollable-h]").getNiceScroll().resize()},100)})})(jQuery)},{"./_skin":"/Code/html/themekit-learning/lib/layout/js/_skin.js"}],"/Code/html/themekit-learning/lib/layout/js/_sidebar-pc.js":[function(){(function(t){t.fn.tkSidebarSizePcDemo=function(){var a,i=this;i.length&&(t(document).on("sidebar.show",function(){t("#pc-open").prop("disabled",!0)}).on("sidebar.hidden",function(){t("#pc-open").prop("disabled",!1)}),i.on("submit",function(r){r.preventDefault();var c=t(".sidebar"),l=t("#pc-value"),s=l.val();l.blur(),(!s.length||25>s)&&(s=25,l.val(s)),c[0].className=c[0].className.replace(/sidebar-size-([\d]+)pc/gi,"sidebar-size-"+s+"pc"),sidebar.open("sidebar-menu"),clearTimeout(a),a=setTimeout(function(){sidebar.close("sidebar-menu")},5e3)}))},t('[data-toggle="sidebar-size-pc-demo"]').tkSidebarSizePcDemo()})(jQuery)},{}],"/Code/html/themekit-learning/lib/layout/js/_skin.js":[function(t,a){a.exports=function(){var i=$.cookie("skin");return typeof i>"u"&&(i="default"),i}},{}],"/Code/html/themekit-learning/lib/layout/js/_skins.js":[function(t){var a=t("./_async");(function(i){var r=function(){var l=i.cookie("skin"),s=i.cookie("skin-file");typeof l<"u"&&a(["css/"+s+".min.css"],function(){i("[data-skin]").removeProp("disabled").parent().removeClass("loading")})};i("[data-skin]").on("click",function(){i(this).prop("disabled")||(i("[data-skin]").prop("disabled",!0),i(this).parent().addClass("loading"),i.cookie("skin",i(this).data("skin")),i.cookie("skin-file",i(this).data("file")),r())});var c=i.cookie("skin");typeof c<"u"&&c!="default"&&r()})(jQuery)},{"./_async":"/Code/html/themekit-learning/lib/layout/js/_async.js"}]},{},["./lib/layout/js/main.js"]);