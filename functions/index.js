'use strict';

const functions = require('firebase-functions');
const admin = require('firebase-admin');
admin.initializeApp();
const cors = require('cors')({origin: true});
const express = require('express');
const app = express();

const validateToken = async (req, res, next) => {
  if (!req.header('authorization') || !req.header('authorization').startsWith('Bearer ')) {
    console.error('Token is invalid.');
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
    console.error('Error while verifying token:', error);
    res.status(403).send('Unauthorized');

    return;
  }
};

app.use(cors);
app.use(validateToken);
app.get('/console', (req, res) => {
  if (req.user.uid) {
    res.send(`
      <div class="row my-5">
        <div class="col-md-3">
          <div class="card bg-light border">
            Manage Posts
          </div>
          <div class="card bg-light border">
            Update the Agenda
          </div>
          <div class="card bg-light border">
            Change Entries
          </div>
        </div>
        <div class="col-md-9">
          <div class="card bg-light border">
            A analytics tool...
          </div>
        </div>
      </div>
    `);
  }
});

exports.app = functions.https.onRequest(app);
