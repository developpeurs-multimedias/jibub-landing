<?php
define( 'MAIL_TO', /* >>>>> */'hello@jibub.com'/* <<<<< */ );  //ajouter votre courriel
define( 'MAIL_FROM', 'utilisateur@domaine.tld' ); // valeur par défaut
define( 'MAIL_OBJECT', 'objet du message' ); // valeur par défaut
define( 'MAIL_MESSAGE', 'votre message' ); // valeur par défaut

$mailSent = false; // drapeau qui aiguille l'affichage du formulaire OU du récapitulatif
$errors = array(); // tableau des erreurs de saisie

if( filter_has_var( INPUT_POST, 'send' ) ) // le formulaire a été soumis avec le bouton [Envoyer]
{
    $from = filter_input( INPUT_POST, 'from', FILTER_VALIDATE_EMAIL );
    if( $from === NULL || $from === MAIL_FROM ) // si le courriel fourni est vide OU égale à la valeur par défaut
    {
        $errors[] = 'Vous devez renseigner votre adresse de courrier électronique.';
    }
    elseif( $from === false ) // si le courriel fourni n'est pas valide
    {
        $errors[] = 'L\'adresse de courrier électronique n\'est pas valide.';
        $from = filter_input( INPUT_POST, 'from', FILTER_SANITIZE_EMAIL );
    }

    $object = filter_input( INPUT_POST, 'object', FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_HIGH | FILTER_FLAG_ENCODE_LOW );
    if( $object === NULL OR $object === false OR empty( $object ) OR $object === MAIL_OBJECT ) // si l'objet fourni est vide, invalide ou égale à la valeur par défaut
    {
        $errors[] = 'Vous devez renseigner l\'objet.';
    }

    /* pas besoin de nettoyer le message.
    / [http://www.phpsecure.info/v2/article/MailHeadersInject.php]
    / Logiquement, les parties message, To: et Subject: pourraient servir aussi à injecter quelque chose,  mais la fonction mail()
    / filtre bien les deux dernières, et la première est le message, et à partir du moment où on a sauté une ligne dans l'envoi du mail,
    / c'est considéré comme du texte; le message ne saurait donc rester qu'un message.*/
    $message = filter_input( INPUT_POST, 'message', FILTER_UNSAFE_RAW );
    if( $message === NULL OR $message === false OR empty( $message ) OR $message === MAIL_MESSAGE ) // si le message fourni est vide ou égale à la valeur par défaut
    {
        $errors[] = 'Vous devez écrire un message.';
    }

    if( count( $errors ) === 0 ) // si il n'y a pas d'erreurs
    {
        if( mail( MAIL_TO, $object, $message, "From: $from\nReply-to: $from\n" ) ) // tentative d'envoi du message
        {
            $mailSent = true;
        }
        else // échec de l'envoi
        {
            $errors[] = 'Votre message n\'a pas été envoyé.';
        }
    }
}
else // le formulaire est affiché pour la première fois, avec les valeurs par défaut
{
    $from = MAIL_FROM;
    $object = MAIL_OBJECT;
    $message = MAIL_MESSAGE;
}


if( $mailSent === true ) // si le message a bien été envoyé, on affiche le récapitulatif
{
    ?>
    <p id="success">Votre message a bien été envoyé.</p>

    <?php
}
else // le formulaire est affiché pour la première fois ou le formulaire a été soumis mais contenait des erreurs
{
    if (count($errors) !== 0) {
        echo("\t\t<ul>\n");
        foreach ($errors as $error) {
            echo("\t\t\t<li>$error</li>\n");
        }
        echo("\t\t</ul>\n");

    }
}
?>

<form id='contact-form' method="post" action="<?php echo( $_SERVER['REQUEST_URI'] ); ?>">
    <fieldset>
        <input name="name" value="" type="text" placeholder="Nom Prénom">
        <input name="from" value="" type="email" placeholder="E-mail">
        <input name="object" value="" type="text" placeholder="Société">
    </fieldset>
    <fieldset>
        <textarea name="message" value="" placeholder="Message"></textarea>
        <button name="send" value="Envoyer" type="submit">ENVOI</button>
    </fieldset>
</form>