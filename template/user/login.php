<h1>Connexion</h1>

<form method="post">
    <div class="form-group">
        <label for="userEmail">E-mail :</label>
        <input type="email" name="user[email]" id="userEmail" value="<?php echo $data['formData']['email'] ?? ''; ?>">
    </div>
    
    <div class="form-group">
        <label for="userPassword">Mot de passe :</label>
        <input type="password" name="user[password]" id="userPassword">
    </div>

    <div class="form-action">
        <button class="button">Confirmer</button>
    </div>
</form>
