<section>
    <form class="centeredform" id="connectform" method="post">
        <?php displayFlash($_GET); ?>
        <label for="connectform-username">Nom d'utilisateur</label>
        <input id="connectform-username" name="username" type="text">
        <label for="connectform-password">Mot de passe</label>
        <input id="connectform-password" name="password" type="password">
        <button type="submit">Connexion</button>
    </form>
</section>