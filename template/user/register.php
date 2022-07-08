<h1>Inscription</h1>

<form method="post">
    <div class="form-group">
        <label for="userUsername">Nom d'utilisateur :</label>
        <input type="text" name="user[username]" id="userUsername">
    </div>
    <div class="form-group">
        <label for="userEmail">E-mail :</label>
        <input type="email" name="user[email]" id="userEmail">
    </div>
    <div class="form-group">
        <label for="userPassword">Mot de passe :</label>
        <input type="password" name="user[password]" id="userPassword">
    </div>
    <div class="form-group">
        <input type="checkbox" name="user[age]" id="userAge">
        <label for="userAge">Je suis majeur</label>
    </div>
    <div class="form-group">
        <input type="checkbox" name="user[cgu]" id="userCgu">
        <label for="userCgu">J'accepte les conditions du service</label>
    </div>

    <div class="form-action">
        <button class="button">Confirmer</button>
    </div>
</form>
