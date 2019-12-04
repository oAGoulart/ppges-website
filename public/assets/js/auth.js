var firebaseConfig = {
  apiKey: "AIzaSyB20j2RfFE2idpVrlJITh7JFkYP5KE_DAQ",
  authDomain: "ppges-website.firebaseapp.com",
  databaseURL: "https://ppges-website.firebaseio.com",
  projectId: "ppges-website",
  storageBucket: "ppges-website.appspot.com",
  messagingSenderId: "128937426654",
  appId: "1:128937426654:web:bf4bbdc11880a08af50c4f"
};

firebase.initializeApp(firebaseConfig);

var handleLogIn = function() {
  var email = document.getElementById("inputEmail");
  var password = document.getElementById("inputPassword");

  if (email && password) {
    firebase.auth().signInWithEmailAndPassword(email.value, password.value).catch(function(error) {
      var errorCode = error.code;
      var errorMessage = error.message;

      console.log(errorCode, errorMessage);
      var msg = document.getElementById("emailHelp");
      msg.classList.remove("text-muted");
      msg.classList.add("text-danger");
      msg.innerHTML = errorMessage;
    });
  }
};

var handleLogOut = function() {
  firebase.auth().signOut().then(function() {
    alert("You logged out!");
  }).catch(function(error) {
    var errorCode = error.code;
    var errorMessage = error.message;

    console.log(errorCode, errorMessage);
    alert(errorMessage);
  });
}

// Look for changes in user status
function initAuth() {
  firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
      var displayName = user.displayName;
      var email = user.email;
      var emailVerified = user.emailVerified;
      var photoURL = user.photoURL;
      var isAnonymous = user.isAnonymous;
      var uid = user.uid;
      var providerData = user.providerData;

      firebase.auth().currentUser.getIdToken().then(function(token) {
        var req = new XMLHttpRequest();

        req.onload = function() {
          $('#console').html(req.responseText);
        };
        req.onerror = function() {
          $('#console').html('There was an error');
        };

        req.open(
          'GET', 
          'https://us-central1-' + firebaseConfig.projectId + '.cloudfunctions.net/app/console', 
          true
          );
        req.setRequestHeader('Authorization', 'Bearer ' + token);
        req.send();
      }).catch(function(error) {
        var errorCode = error.code;
        var errorMessage = error.message;

        console.log(errorCode, errorMessage);
        alert(errorMessage);
      });
    } else {
      if (window.location.pathname != "/admin") {
        alert("You're not logged!");
      }
    }
  });

  var login = document.getElementById("submitLogin");
  var logout = document.getElementById("adminLogout");

  if (login) {
    login.addEventListener("click", handleLogIn, false);
  } else if (logout) {
    logout.addEventListener("click", handleLogOut, false);
  }
}

window.onload = function() {
  initAuth();
};
