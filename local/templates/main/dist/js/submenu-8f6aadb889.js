"use strict";!function(e){e(function(){var a=e(".js-menu").find(".nav__link[data-submenu]"),s=e(".js-submenu"),i=s.find(".seacher");a.on("click",function(s){s.preventDefault(),a.removeClass("active"),e(this).addClass("active").trigger("active")}),a.on("active",function(){var a=e(this),n=a.data("submenu"),t=s.find(n);t.hasClass("active")?(s.slideUp(300,function(){t.removeClass("active")}),a.removeClass("active")):s.slideUp(300,function(){i.removeClass("active"),t.addClass("active"),s.slideDown(300)})})})}(jQuery);