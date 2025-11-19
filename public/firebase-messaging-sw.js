importScripts("https://www.gstatic.com/firebasejs/12.6.0/firebase-app-compat.js");
importScripts("https://www.gstatic.com/firebasejs/12.6.0/firebase-messaging-compat.js");

firebase.initializeApp({
    apiKey: "AIzaSyD4tanKuBcd9l-QbgXEStJmwpz0HMOYnsc",
    authDomain: "naqaab-studio.firebaseapp.com",
    projectId: "naqaab-studio",
    messagingSenderId: "67943032032",
    appId: "1:67943032032:web:d9d9dd84bda52dfae41c85",
});

const messaging = firebase.messaging();

messaging.onBackgroundMessage(function(payload) {
    console.log("Background Message:", payload);

    const notification = payload.notification;

    self.registration.showNotification(notification.title, {
        body: notification.body,
        icon: notification.icon || "/logo.png"
    });
});
