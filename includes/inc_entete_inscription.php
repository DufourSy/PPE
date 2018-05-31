        <!-- L'entête avec logo, titre, et formulaire de connexion -->
        <header id="page_head">
            <figure id="logo"><a href="index.php"><img src="images/logo.png" alt="logo" /><br>
            Evenement gratuit !</a>
            </figure>

            <div id="titre">
        <!-- Les liens des réseaux sociaux -->
                <h1>Suivez-nous !</h1>
                <ul>
                <li><a href="#"><img src="images/facebook.png" style="width: 35px; height: 35px;">
            </a> </li>
                <li><a href="#"><img src="images/twitter.png" style="width: 35px; height: 35px;">
            </a> </li>
                <li><a href="#"><img src="images/instagram.png" style="width: 35px; height: 35px;">
            </a> </li>
                </ul>
                
            </div>

            <div id="login">
                <!-- A implémenter -->
                <form action="?page=login" method="POST">
                        <input type="text" name="username" placeholder="Username" />
                        <input type="password" name="password" placeholder="Password" />
                        <input type="submit" value="Connexion" class="myButton" />
                </form>

                <!-- Pas génial. A modifier. 
                <form action="?page=signin" method="POST">
                    <input type="submit" value="Inscription" class="myButton" />
                </form>-->
            </div>
        </header>

        <!-- Le menu principal -->
        <nav id="page_menu">
            <ul>
                <li><a href="?page=home">Home</a></li>
                <li><a href="?page=signin">Devenir Membre</a></li>
                <li><a href="?page=all">Nos évènement en cours</a></li>
            </ul>
        </nav>

