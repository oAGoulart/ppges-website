  <!-- jQuery, Popper.js, and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

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
