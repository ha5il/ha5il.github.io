<!DOCTYPE html>
<?php include "../allassets/colour.php";?>
<html lang="en-NP">
<head>
 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<meta name="author" content="Hasil Paudyal, hasilpaudyal@gmail.com">
 
<meta name="description" content="Hasil's Personal Site. Check out to know more and contact him. ">
 
<meta name="keywords" content="Hasil, Paudyal, Google Games Hack, Personal Site, Hášíl, Páůďýál">
 

<link href="../allassets/icon.png" rel="shortcut icon">
 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
 
<style rel="stylesheet" media="screen,projection" type="text/css">nav{font-family:'Kaushan Script',serif;<?php echo 'background:#'."$design"; ?>}@font-face{font-family:'Kaushan Script';font-style:normal;font-weight:400;src:local('Kaushan Script'),local('KaushanScript-Regular'),url(https://fonts.gstatic.com/s/kaushanscript/v5/qx1LSqts-NtiKcLw4N03IO87R-l0-Xx_7cYc0ZX1ifE.woff2) format('woff2');unicode-range:U+0100-024F,U+1E00-1EFF,U+20A0-20AB,U+20AD-20CF,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:'Kaushan Script';font-style:normal;font-weight:400;src:local('Kaushan Script'),local('KaushanScript-Regular'),url(https://fonts.gstatic.com/s/kaushanscript/v5/qx1LSqts-NtiKcLw4N03IEd0sm1ffa_JvZxsF_BEwQk.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2212,U+2215,U+E0FF,U+EFFD,U+F000}.myloader{background:url(/allassets/preloader.gif) center center no-repeat <?php echo "#"."$design"; ?>;bottom:0;height:100%;left:0;overflow:hidden;position:fixed;right:0;top:0;width:100%;z-index:99999}footer{font-family:'Kaushan Script',serif;<?php echo 'background:#'."$design"; ?>;position:relative;left:0px;bottom:0px;height:50px;width:100%;z-index:99998}</style>
<title>Hasil's Project Login</title>
<script src="https://www.gstatic.com/firebasejs/3.3.0/firebase.js"></script>
<script>
         // Initialize Firebase
         var config = {
           apiKey: "AIzaSyAaUlZseMqo8WSNev4EYK2D8Iz5_JBabqU",
           authDomain: "x8-red-freedom-c.firebaseapp.com",
           databaseURL: "https://x8-red-freedom-c.firebaseio.com",
           storageBucket: "x8-red-freedom-c.appspot.com",
         };
         firebase.initializeApp(config);
      </script>
<script type="text/javascript">
         /**
          * Handles the sign in button press.
          */
         function toggleSignIn() {
           if (firebase.auth().currentUser) {
             // [START signout]
             firebase.auth().signOut();
             // [END signout]
           } else {
             var email = document.getElementById('email').value;
             var password = document.getElementById('password').value;
             if (email.length < 4) {
               alert('Please enter an email address.');
               return;
             }
             if (password.length < 4) {
               alert('Please enter a password.');
               return;
             }
             // Sign in with email and pass.
             // [START authwithemail]
             firebase.auth().signInWithEmailAndPassword(email, password).catch(function(error) {
               // Handle Errors here.
               var errorCode = error.code;
               var errorMessage = error.message;
               // [START_EXCLUDE]
               if (errorCode === 'auth/wrong-password') {
                 alert('Wrong password.');
               } else {
                 alert(errorMessage);
               }
               console.log(error);
               document.getElementById('quickstart-sign-in').disabled = false;
               // [END_EXCLUDE]
             });
             // [END authwithemail]
           }
           document.getElementById('quickstart-sign-in').disabled = true;
         }
         
         /**
          * Handles the sign up button press.
          */
         function handleSignUp() {
           var email = document.getElementById('email').value;
           var password = document.getElementById('password').value;
           if (email.length < 4) {
             alert('Please enter an email address.');
             return;
           }
           if (password.length < 4) {
             alert('Please enter a password.');
             return;
           }
           // Sign in with email and pass.
           // [START createwithemail]
           firebase.auth().createUserWithEmailAndPassword(email, password).catch(function(error) {
             // Handle Errors here.
             var errorCode = error.code;
             var errorMessage = error.message;
             // [START_EXCLUDE]
             if (errorCode == 'auth/weak-password') {
               alert('The password is too weak.');
             } else {
               alert(errorMessage);
             }
             console.log(error);
             // [END_EXCLUDE]
           });
           // [END createwithemail]
         }
         
         /**
          * Sends an email verification to the user.
          */
         function sendEmailVerification() {
           // [START sendemailverification]
           firebase.auth().currentUser.sendEmailVerification().then(function() {
             // Email Verification sent!
             // [START_EXCLUDE]
             alert('Email Verification Sent!');
             // [END_EXCLUDE]
           });
           // [END sendemailverification]
         }
         
         function sendPasswordReset() {
           var email = document.getElementById('email').value;
           // [START sendpasswordemail]
           firebase.auth().sendPasswordResetEmail(email).then(function() {
             // Password Reset Email Sent!
             // [START_EXCLUDE]
             alert('Password Reset Email Sent!');
             // [END_EXCLUDE]
           }).catch(function(error) {
             // Handle Errors here.
             var errorCode = error.code;
             var errorMessage = error.message;
             // [START_EXCLUDE]
             if (errorCode == 'auth/invalid-email') {
               alert(errorMessage);
             } else if (errorCode == 'auth/user-not-found') {
               alert(errorMessage);
             }
             console.log(error);
             // [END_EXCLUDE]
           });
           // [END sendpasswordemail];
         }
         
         /**
          * initApp handles setting up UI event listeners and registering Firebase auth listeners:
          *  - firebase.auth().onAuthStateChanged: This listener is called when the user is signed in or
          *    out, and that is where we update the UI.
          */
         function initApp() {
           // Listening for auth state changes.
           // [START authstatelistener]
           firebase.auth().onAuthStateChanged(function(user) {
             // [START_EXCLUDE silent]
             document.getElementById('quickstart-verify-email').disabled = true;
             // [END_EXCLUDE]
             if (user) {
               // User is signed in.
               var displayName = user.displayName;
               var email = user.email;
               var emailVerified = user.emailVerified;
               var photoURL = user.photoURL;
               var isAnonymous = user.isAnonymous;
               var uid = user.uid;
               var providerData = user.providerData;
               // [START_EXCLUDE silent]
               document.getElementById('quickstart-sign-in-status').textContent = 'Signed in';
               document.getElementById('quickstart-sign-in').textContent = 'Sign out';
               document.getElementById('quickstart-account-details').textContent = JSON.stringify(user, null, '  ');
               if (!emailVerified) {
                 document.getElementById('quickstart-verify-email').disabled = false;
               }
               // [END_EXCLUDE]
             } else {
               // User is signed out.
               // [START_EXCLUDE silent]
               document.getElementById('quickstart-sign-in-status').textContent = 'Signed out';
               document.getElementById('quickstart-sign-in').textContent = 'Sign in';
               document.getElementById('quickstart-account-details').textContent = 'null';
               // [END_EXCLUDE]
             }
             // [START_EXCLUDE silent]
             document.getElementById('quickstart-sign-in').disabled = false;
             // [END_EXCLUDE]
           });
           // [END authstatelistener]
         
           document.getElementById('quickstart-sign-in').addEventListener('click', toggleSignIn, false);
           document.getElementById('quickstart-sign-up').addEventListener('click', handleSignUp, false);
           document.getElementById('quickstart-verify-email').addEventListener('click', sendEmailVerification, false);
           document.getElementById('quickstart-password-reset').addEventListener('click', sendPasswordReset, false);
         }
         
         window.onload = function() {
           initApp();
         };
      </script>
</head>
<body>
<div class="myloader"> </div>
        <?php
         include "../allassets/nav.html";
         ?>
      <div class="container">
         <div class="card-panel">
            <br>
            <h4 class="blue-text" style="text-align:center"> O_o Authentication Required o_O</h4>
            <div class="card-panel hoverable">
               <div class="input-field col s12 m6">
                  <input id="email" type="email" class="validate" name="email" > &nbsp;&nbsp;&nbsp;
                  <label for="email">Email</label>
               </div>
               <div class="input-field col s12 m6">
                  <input id="password" type="password" class="validate">
                  <label for="password" name="password" >Password</label>
               </div>
<div style="text-align:center">
               <button disabled class="waves-effect waves-yellow blue btn" id="quickstart-sign-in" name="signin">Sign In</button>
               &nbsp;&nbsp;&nbsp;
               <button class="waves-effect waves-green blue btn" id="quickstart-sign-up" name="signup">Sign Up</button>
               &nbsp;&nbsp;&nbsp;
               <button class="waves-effect waves-pink blue btn" disabled id="quickstart-verify-email" name="verify-email">Send Email Verification</button>
               &nbsp;&nbsp;&nbsp;
               <button class="waves-effect waves-light blue btn" id="quickstart-password-reset" name="verify-email">Send Password Reset Email</button>
            </div>
            </div>
            <br>
            <div class="blue-text strong" style="text-align:center"><strong>Feel free to sign up and verify the account, but authorizing you to access the projects or not depends upon my team :(</strong></div>
            <br>
            
            <!-- Container where we'll display the user details -->
            <div class="quickstart-user-details-container green-text">
               <br>
               <br>
               Current sign-in status: <span id="quickstart-sign-in-status">Unknown</span>
               <div>Hasil's Site auth <code> currentUser </code> object value:</div>
               <pre><code id="quickstart-account-details">null</code></pre>
            </div>
         </div>
      </div>
      </div>
      <footer>
<?php include "../allassets/footer.php" ?>
      </footer>
      <script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
      <script>
         $(window).load(function() {
         $(".myloader").delay(100).fadeOut(1400)
         }), $(".button-collapse").sideNav({
         menuWidth: 190,
         edge: "left",
         closeOnClick: !0
         }), $(document).ready(function() {
         $(".tooltipped").tooltip({
         delay: 50
         })
         }); 
         $(document).ready(function(){
         $('.materialboxed').materialbox();
         }); 
      </script>
   </body>
</html>