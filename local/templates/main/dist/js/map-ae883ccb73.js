'use strict'
!function (c) {
  c(function () {
    console.log('ok')
    var n = c('body'), o = c('.js-popup').find('input[type=checkbox]')
    o.on('change', function (e) {
      e.preventDefault(), console.log('ok'), o.each(function () {
        var o = c(this)
        n.on('click', function () {o.prop('checked', !1)}), o.prop('checked', !1)
      }), c(this).prop('checked', !0)
    })
  })
}(jQuery)