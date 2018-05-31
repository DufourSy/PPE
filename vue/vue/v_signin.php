        <!-- le formulaire d'inscription -->
        <form action="?page=signin" method="POST">
            <h2>Inscription</h2>
            <fieldset>
                <p>
                    <label for="nom">Votre Nom : </label>
                    <input id="nom" type="text" name="nom" placeholder="" required />
                </p>
                <p>
                    <label for="mail">Votre e-mail : </label>
                    <input id="mail" type="mail" name="mail" placeholder="" required />
                </p>
                <p>
                    <label for="adresse">Votre adresse : </label>
                    <input id="adresse" type="adresse" name="adresse" placeholder="" required />
                </p>
                <p>
                    <label for="tel">Votre numéro de téléphone : </label>
                    <input id="tel" type="text" name="tel" placeholder="" required />
                </p>
                <p>
                    <label for="login">Votre login : </label>
                    <input id="login" type="text" name="login" placeholder="" required />
                </p>
                <p>
                    <label for="mdp">Votre mot de passe : </label>
                    <input id="mdp" type="password" name="mdp" placeholder="" required />
                </p>
            </fieldset>

            <input type="submit" value="s'inscrire" />
        </form>