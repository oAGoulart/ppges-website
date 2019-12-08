'use strict';

var firebaseConfig = {
  apiKey: 'AIzaSyB20j2RfFE2idpVrlJITh7JFkYP5KE_DAQ',
  authDomain: 'ppges-website.firebaseapp.com',
  databaseURL: 'https://ppges-website.firebaseio.com',
  projectId: 'ppges-website',
  storageBucket: 'ppges-website.appspot.com',
  messagingSenderId: '128937426654',
  appId: '1:128937426654:web:bf4bbdc11880a08af50c4f'
};

firebase.initializeApp(firebaseConfig);

var handleLogIn = function() {
  let email = $('#inputEmail')[0];
  let password = $('#inputPassword')[0];

  $('#submitLoad')[0].classList.remove('d-none');
  $('#submitLogin:eq(0)').attr('disabled', true);

  if (email && password) {
    firebase.auth()
      .signInWithEmailAndPassword(email.value, password.value)
      .catch(function(error) {
        console.log(error.code, error.message);

        var msg = $('#emailHelp')[0];
        msg.classList.remove('text-muted');
        msg.classList.add('text-danger');
        msg.innerHTML = error.message;
    });
  }
};

var handleLogOut = function() {
  firebase.auth().signOut().then(function() {
    $('#logoutCard')[0].classList.add('d-none');
    $('#loginCard')[0].classList.remove('d-none');
    $('#console').html('');

    Swal.fire(
      'Desconectado!',
      'Você saiu do painel de administrador.',
      'success'
    );
  }).catch(function(error) {
    console.log(error.code, error.message);

    Swal.fire({
      icon: 'error',
      title: 'Eita...',
      text: 'Algo deu errado!',
      footer: error.message
    });
  });
};

// Look for changes in user status
function initAuth() {
  firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
      firebase.auth().currentUser.getIdToken().then(function(token) {
        let req = new XMLHttpRequest();

        req.onload = function() {
          if (req.status == 200) {
            $('#logoutCard')[0].classList.remove('d-none');
            $('#loginCard')[0].classList.add('d-none');
            $('#submitLoad')[0].classList.add('d-none');
            $('#submitLogin:eq(0)').attr('disabled', false);
          }

          $('#console').html(req.responseText);
          Swal.close();
        };

        req.onerror = function() {
          Swal.fire({
            icon: 'error',
            title: 'Oh...',
            text: req.responseText,
            footer: 'Tente novamente!'
          });
        };

        req.open(
          'GET', 
          'https://us-central1-' + firebaseConfig.projectId + '.cloudfunctions.net/app/console', 
          true
        );

        req.setRequestHeader('authorization', 'Bearer ' + token);

        Swal.fire({
          title: 'Carregando',
          showConfirmButton: false,
          allowOutsideClick: function() {
            return !Swal.isLoading();
          },
          onBeforeOpen: function() {
            Swal.showLoading();

            req.send();
          }
        });
      }).catch(function(error) {
        console.log(error.code, error.message);

        Swal.fire(
          'Erro!',
          'Algo estranho aconteceu.',
          'error'
        );
      });
    }
  });

  $('#submitLogin')[0].addEventListener('click', handleLogIn, false);
  $('#adminLogout')[0].addEventListener('click', handleLogOut, false);
}

window.onload = function() {
  initAuth();
};
