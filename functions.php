<?php
function SubscribeMailChimp($email, $firstname, $lastname, $usertype, $id_list){

    $logger = Logger::getLogger('main');
    require_once 'mailchimp-api-php/src/Mailchimp.php';

    $merge_vars = array(
        'FNAME' => $firstname,
        'LNAME' => $lastname,
        'USERTYPE' => $usertype
    );

    // set up our mailchimp object, and list object
    $mailchimp = new Mailchimp( MAILCHIMP_API_KEY );
    $mailchimpLists = new Mailchimp_Lists( $mailchimp );

    try {
        $mailchimpLists->subscribe( $id_list, array( 'email' => $email), $merge_vars, "html",false); //pass the list id and email to mailchimp
        $logger->info("L'utilisateur $firstname $lastname $usertype ($email) s'est bien inscrit");
    } catch (Exception $e) {
        $message = $e->getMessage();
        $logger->fatal($message, $e);
    }

}