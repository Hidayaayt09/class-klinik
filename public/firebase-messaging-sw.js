// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.
importScripts('https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.9.1/firebase-messaging.js');

// Initialize the Firebase app in the service worker by passing in
// your app's Firebase config object.
// https://firebase.google.com/docs/web/setup#config-object
var firebaseConfig = {
    apiKey: "AIzaSyDcqYKSWgl5W78lkmRKfZE9bPgFJBkHsH4",
    authDomain: "laatachzan-259c8.firebaseapp.com",
    projectId: "laatachzan-259c8",
    storageBucket: "laatachzan-259c8.appspot.com",
    messagingSenderId: "272133582529",
    appId: "1:272133582529:web:6d89f7ea248245883c6e40"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();

messaging.onBackgroundMessage((payload) => {
    console.log('[firebase-messaging-sw.js] Received background message ', payload);
    // Customize notification here
    const { title, body } = payload.notification;
    const notificationOptions = {
      body,
    };

    self.registration.showNotification(notificationTitle,
      notificationOptions);
});
