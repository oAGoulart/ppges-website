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
  var email = $('#inputEmail')[0];
  var password = $('#inputPassword')[0];

  if (email && password) {
    firebase.auth().signInWithEmailAndPassword(email.value, password.value).catch(function(error) {
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
    alert('You logged out!');
  }).catch(function(error) {
    console.log(error.code, error.message);
    alert(error.message);
  });
}

// Look for changes in user status
function initAuth() {
  firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
      firebase.auth().currentUser.getIdToken().then(function(token) {
        var req = new XMLHttpRequest();

        req.onload = function() {
          if (req.status == 200) {
            $('#logoutCard')[0].classList.remove('d-none');
            $('#loginCard')[0].classList.add('d-none');
          }

          $('#console').html(req.responseText);
        };
        req.onerror = function() {
          alert(req.responseText);
        };

        req.open(
          'GET', 
          'https://us-central1-' + firebaseConfig.projectId + '.cloudfunctions.net/app/console', 
          true
        );

        req.setRequestHeader('authorization', 'Bearer ' + token);
        req.send();
      }).catch(function(error) {
        console.log(error.code, error.message);
        alert(error.message);
      });
    }
  });

  $('#submitLogin')[0].addEventListener('click', handleLogIn, false);
  $('#adminLogout')[0].addEventListener('click', handleLogIn, false);
}

window.onload = function() {
  initAuth();
};
