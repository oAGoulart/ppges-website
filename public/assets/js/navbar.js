// Main loop
function main() {
  var nav = document.getElementById('nav');
  var offset = nav.offsetTop + nav.offsetHeight;

  // Shrink Header after scrolling by Navbar
  if (document.body.scrollTop > offset || document.documentElement.scrollTop > offset) {
    document.getElementById('logo').style.height = '1rem';
  } else {
    document.getElementById('logo').style.height = '2.5rem';
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
