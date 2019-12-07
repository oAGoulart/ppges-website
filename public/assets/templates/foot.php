  <!-- jQuery, Popper.js, and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- Sweet Alert 2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  <!-- Default Scripts -->
  <?php
    echo '<script src="', $base_url, '/assets/js/gradient.js"></script>';
    echo '<script src="', $base_url, '/assets/js/lang.js"></script>';

    if (preg_match('~^/admin.*~', $_SERVER['REQUEST_URI']) == TRUE) {
      echo '<script src="https://www.gstatic.com/firebasejs/7.5.0/firebase-app.js"></script>';
      echo '<script src="https://www.gstatic.com/firebasejs/7.5.0/firebase-auth.js"></script>';

      echo '<script src="', $base_url, '/assets/js/auth.js"></script>';
    } else {
      echo '<script src="', $base_url, '/assets/js/navbar.js"></script>';
    }
  ?>
</body>
</html>
