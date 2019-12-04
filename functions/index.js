'use strict';

const functions = require('firebase-functions');
const admin = require('firebase-admin');
admin.initializeApp();
const cors = require('cors')({origin: true});
const express = require('express');
const app = express();

const validateFirebaseIdToken = async (req, res, next) => {
  if (!req.header('authorization') || !req.header('authorization').startsWith('Bearer ')) {
    console.error('No Firebase ID token was passed as a Bearer token in the Authorization header.');
    res.status(403).send('Unauthorized');
    return;
  }

  let idToken;
  if (req.header('authorization') && req.header('authorization').startsWith('Bearer ')) {
    idToken = req.header('authorization').split('Bearer ')[1];
  } else {
    res.status(403).send('Unauthorized');
    return;
  }

  try {
    const decodedIdToken = await admin.auth().verifyIdToken(idToken);
    req.user = decodedIdToken;
    next();
    return;
  } catch (error) {
    console.error('Error while verifying Firebase ID token:', error);
    res.status(403).send('Unauthorized');
    return;
  }

  next();
};

app.use(cors);
app.use(validateFirebaseIdToken);
app.get('/console', (req, res) => {
  res.send(req.user);
});

exports.app = functions.https.onRequest(app);
