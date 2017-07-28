(function ($, ScrollMagic, TweenMax) {
  'use strict'

  $(function () {
    const controller = new ScrollMagic.Controller()

    // -------------------------------------------------------------
    const intro = TweenMax.staggerTo(
      ['#intro-title', '#intro-text-left', '#intro-text-right'],
      0.6,
      { className: '-=animate' },
      0.25
    )

    new ScrollMagic.Scene()
      .setTween(intro)
      .addIndicators()
      .addTo(controller)
    // -------------------------------------------------------------
    const statFade = TweenMax.staggerTo('.stat-fade', 0.35, {
      className: '-=fade-from-left'
    }, 0.15)

    new ScrollMagic.Scene({
      triggerElement: '#animation-anchor-1',
      triggerHook: 0.8
    })
      .setTween(statFade)
      .addIndicators()
      .addTo(controller)
    // -------------------------------------------------------------
    const statShape = TweenMax.staggerTo('.stat__shape', 0.35, {
      className: '-=stat__shape_hidden'
    }, 0.15)

    new ScrollMagic.Scene({
      triggerElement: '#animation-anchor-2',
      triggerHook: 0.8
    })
      .setTween(statShape)
      .addIndicators()
      .addTo(controller)
    // -------------------------------------------------------------
    const statWhiteFade = TweenMax.staggerTo('.stat-white-fade', 0.35, {
      className: '-=fade-from-left'
    }, 0.15)

    new ScrollMagic.Scene({
      triggerElement: '#animation-anchor-3',
      triggerHook: 0.8
    })
      .setTween(statWhiteFade)
      .addIndicators()
      .addTo(controller)
  })
}(jQuery, ScrollMagic, TweenMax))
