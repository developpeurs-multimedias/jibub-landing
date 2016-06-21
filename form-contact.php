<form id='contact-form' method="post" action="process-contact.php">
    <fieldset>
        <input name="name" value="" type="text" placeholder="Nom Prénom" required>
        <input name="from" value="" type="email" placeholder="E-mail" required>
        <input name="societe" value="" type="text" placeholder="Société">
    </fieldset>
    <fieldset>
        <textarea name="message" value="" placeholder="Message"></textarea required>
        <button name="send" value="Envoyer" type="submit">ENVOI</button>
    </fieldset>
</form>