"use strict";!function(c){c(function(){c(".slider").slick(),c("#to-top").click(function(t){t.preventDefault(),c("html, body").animate({scrollTop:0},"fast")}),c(".js-search").on("change",function(){c(this).prop("checked")&&c(".js-search-input").focus()})})}(jQuery);