function randNum(min, max) {
  return Math.floor((Math.random() * max) + min);
}

$(document).ready(function () {
  $('.gradient').each(function() {
    let colors = ['#ffd0d2', '#fffdd0', '#d0fffd', '#d0d2ff'];
    let firstGradient = randNum(10, 90);

    $(this).css(
      'background-image',
      'linear-gradient(141deg, '
      + colors[randNum(0, 4)] + ' '
      + firstGradient + '%, '
      + colors[randNum(0, 4)] + ')'
    );
  });
});
