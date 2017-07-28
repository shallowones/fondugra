$(function () {
  $('.news')
    .find('.news-more')
    .find('button')
    .on('click', function () {
      document.location.href = '/news/';
    })
})