<form method="post" action="process.php">
    <input id="nom" name="name" type="text" placeholder="Nom">
    <input id="prenom" name="firstname" value="" type="text" placeholder="Prénom">
    <input value="" name="email" type="email" placeholder="E-mail">
    <fieldset>
        <legend>Rejoindre la communauté :</legend>
        <label for="loueur_profile" title="type de profile du client">Loueur</label>
        <input type="radio" name="user-type" value="Loueur" checked id="loueur_profile">

        <label for="locataire_profile" title="information du client">Locataire</label>
        <input type="radio" name="user-type" value="Locataire" id="locataire_profile">

        <label for="both_profile" title="information du client">Les deux</label>
        <input type="radio" name="user-type" value="Both" id="both_profile">
    </fieldset>
    <button id="newsletter-submit" name="news_send" value="1" type="submit">S'INSCRIRE</button>
</form>

