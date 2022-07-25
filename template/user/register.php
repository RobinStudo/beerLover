<h1>Inscription</h1>

<form method="post">
    <div class="form-group">
        <label for="userUsername">Nom d'utilisateur :</label>
        <input type="text" name="user[username]" id="userUsername" value="<?php echo $data['formData']['username'] ?? ''; ?>">

        <?php if(array_key_exists('username', $data['formErrors'])) { ?>
            <ul class="form-errors">
                <?php foreach ($data['formErrors']['username'] as $error) { ?>
                    <li><?php echo $error; ?></li>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>
    <div class="form-group">
        <label for="userEmail">E-mail :</label>
        <input type="email" name="user[email]" id="userEmail" value="<?php echo $data['formData']['email'] ?? ''; ?>">

        <?php if(array_key_exists('email', $data['formErrors'])) { ?>
            <ul class="form-errors">
                <?php foreach ($data['formErrors']['email'] as $error) { ?>
                    <li><?php echo $error; ?></li>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>
    <div class="form-group">
        <label for="userPassword">Mot de passe :</label>
        <input type="password" name="user[password]" id="userPassword">

        <?php if(array_key_exists('password', $data['formErrors'])) { ?>
            <ul class="form-errors">
                <?php foreach ($data['formErrors']['password'] as $error) { ?>
                    <li><?php echo $error; ?></li>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>
    <div class="form-group">
        <input type="checkbox" name="user[age]" id="userAge" <?php echo isset($data['formData']['age']) ? 'checked' : '' ?>>
        <label for="userAge">Je suis majeur</label>

        <?php if(array_key_exists('age', $data['formErrors'])) { ?>
            <ul class="form-errors">
                <?php foreach ($data['formErrors']['age'] as $error) { ?>
                    <li><?php echo $error; ?></li>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>
    <div class="form-group">
        <input type="checkbox" name="user[cgu]" id="userCgu" <?php echo isset($data['formData']['cgu']) ? 'checked' : '' ?>>
        <label for="userCgu">J'accepte les conditions du service</label>

        <?php if(array_key_exists('cgu', $data['formErrors'])) { ?>
            <ul class="form-errors">
                <?php foreach ($data['formErrors']['cgu'] as $error) { ?>
                    <li><?php echo $error; ?></li>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>

    <div class="form-action">
        <button class="button">Confirmer</button>
    </div>
</form>
