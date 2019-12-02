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

function setCookie(name, value, days) {
  var d = new Date();
  d.setTime(d.getTime() + (days*24*60*60*1000));

  var expires = "expires="+ d.toUTCString();
  document.cookie = name + "=" + value + "; " + expires + "; path=/";
}

function handleLogIn() {
  var form = document.getElementById("adminLogin");
  var obj = {};

  // Get each element on form
  for (var i = 0; i < form.elements.length; i++) {
    var item = form.elements.item(i);
    obj[item.name] = item.value;
  }

  // Verify email and password are present, then call firebase authetication
  if (obj["email"] && obj["password"]) {
    firebase.auth().signInWithEmailAndPassword(obj["email"], obj["password"]).catch(function(error) {
      var errorCode = error.code;
      var errorMessage = error.message;

      console.log(errorCode, errorMessage);
      alert(errorMessage);
    });
  }
};

function handleLogOut() {
  firebase.auth().signOut().then(function() {
    setCookie("uid", "", 0);

    window.location.replace(
      window.location.protocol
      + "//"
      + window.location.hostname
      + "/admin"
    );
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

      setCookie("uid", uid, 30);
    } else {
      if (window.location.pathname != "/admin") {
        setCookie("uid", "", 0);

        window.location.replace(
          window.location.protocol
          + "//"
          + window.location.hostname
          + "/admin"
        );
      }
    }
  });

  document.getElementById("adminLogin").addEventListener("onsubmit", handleLogIn, false);
  //document.getElementById("adminLogout").addEventListener("onsubmit", handleLogOut, false);
}

window.onload = function() {
  initAuth();
};
