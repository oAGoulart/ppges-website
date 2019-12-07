function randNum(min, max) {
  return Math.floor((Math.random() * max) + min);
}

$(document).ready(function () {
  $('.gradient').each(function() {
    let colors = [
      'rgb(113, 3, 133)',
      'rgb(133, 3, 101)',
      'rgb(133, 3, 33)',
      'rgb(55, 3, 133)',
      'rgb(3, 92, 133)',
      'rgb(3, 133, 118)',
      'rgb(3, 133, 31)',
      'rgb(120, 133, 3)',
      'rgb(133, 94, 3)'
    ];
    let percentage = randNum(10, 90);

    $(this).css(
      'background-image',
      'linear-gradient(141deg, '
      + colors[randNum(0, 8)] + ' '
      + percentage + '%, '
      + colors[randNum(0, 8)] + ')'
    );
  });
});
