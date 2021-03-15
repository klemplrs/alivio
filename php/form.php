<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['message'])) {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        function filter_email_header($form_field) {  
            return preg_replace('/[nr|!/<>^$%*&]+/','',$form_field);
        }

        $email  = filter_email_header($email);

        $headers = "From: $email";
        $sent = mail('clement.semrohd@gmail.com', 'Experience Form Contact', $firstname, $lastname, $message, $headers);

        if ($sent) {

            ?><html>
            <head>
            <title>Thank You</title>
            </head>
            <body>
            <h1>Congratulations</h1>
            <p>Thank you for sharing your experience with us. You're gonna be contacted soon !</p>
            </body>
            </html>
            
            <?php
            
        } else {
            ?><html>
            <head>
            <title>Something went wrong</title>
            </head>
            <body>
            <h1>Sorry, but something went wrong</h1>
            <p>We couldn't send your message. Please varify your information and try again.</p>
            </body>
            </html>
            <?php
        }
        
        /*

        $position_arobase = strpos($email, '@');

        if ($position_arobase === false) {
            echo '<p>Your email must contain an @</p>';
        } else {
            $retour = mail('clement.semrohd@gmail.com', 'Experience Form Contact', $firstname, $lastname, 'From: ' . $email, $message);
            if ($retour) {
                echo '<p>Your message has been sent.</p>';
            } else {
                echo '<p>Error, please try again.</p>';
            }
        }
        
        */

    }
}