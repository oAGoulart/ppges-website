// Main loop
function main() {
  var nav = $('#nav')[0];
  var offset = nav.offsetTop + nav.offsetHeight;

  // Shrink Header after scrolling by Navbar
  if (document.body.scrollTop > offset || document.documentElement.scrollTop > offset) {
    $('#logo')[0].style.height = '1rem';
  } else {
    $('#logo')[0].style.height = '2.5rem';
  }

  // Repeat again after 500ms
  setTimeout(
    function() {
      main();
    },
    500
  );
}

// Call main function on load
window.onload = function() {
  main();
};
