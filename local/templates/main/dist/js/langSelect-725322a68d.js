"use strict";!function(e){e(function(){var n=e(".js-lang").find("select");n.selectmenu({change:function(e,c){n.selectmenu("disable"),window.location.href=c.item.value},open:function(e,n){console.log(n)}})})}(jQuery);