'use strict';

function setCookie(name, value, days) {
  var d = new Date();
  d.setTime(d.getTime() + (days*24*60*60*1000));

  var expires = 'expires='+ d.toUTCString();
  document.cookie = name + '=' + value + '; ' + expires + '; path=/';
}

function initLang() {
  $('#langPt')[0].addEventListener('click', function(){setCookie('lang', 'pt-BR', 30);}, false);
  $('#langEn')[0].addEventListener('click', function(){setCookie('lang', 'en-US', 30);}, false);
}

window.onload = function() {
  initLang();
};
