<?php

    try {
    //$bdd = new PDO('mysql:dbname=ppe;host=localhost', 'root', '');
    $bdd = new PDO('mysql:dbname=ppe;host=localhost', 'admin', 'Btssio');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $bdd->prepare('SELECT * FROM lieu');
    $req->execute();
    $resultat = $req->fetchAll();

    }
    catch (PDOException $e) {
        die($e->getMessage());
    }

?>
<section id="page_main">
<aside id="left_panel">
    <div id="live">
    <h2>Tableau de bord</h2>
       <ul>
            <li><a href="?page=compte">Mes informations personnelles</a></li>
            <li><a href="?page=historique">Historique de mes évènements</a></li>
        </ul>
    </div>
</aside>
</section>
<section id="actu">
        <h2>Historique de mes évènements</h2>
        <article>

<?php
    //préparation de la requete
    $res=$bdd->prepare('SELECT * FROM lieu');                                           
    $res->execute();                                                            
    $nbd=$res->rowCount();                                                                                   
    $r=$res->fetchAll();    

    $nbl=0;
    if($nbd != 0){
        $j=1;
?>
    <table>
        <thead>
            <tr>
                <td style="border-bottom:1px solid #575757;">
                    <li>Libelle</li>
                    <li>Adresse</li>
                    <li>Prix location</li>
                    <li>capacité</li>
                </td>
            </tr>
        </thead>
        <tbody>
<?php
    foreach ($r as $row) 
    {
        if($j%2 == 1){
            $nbl++;
            $fintr=0;
?>      <tr>
<?php       }

?>      <td style="border-bottom:1px solid rgba(100,100,100,0.4);">
<?php   

        echo '<li>'.$row['libelle'].'</li>';

        echo '<li>'.$row['adresse'].'</li>';

        echo '<li>'.$row['prix_location'].'</li>';

        echo '<li>'.$row['capacite'].'</li>';

        echo        '<form action="?page=lieu" method="POST"><input type="hidden" name="id_lieu" value='.$row['id_lieu'].'">
                <input type="submit" name="valider" value="Choisir" id="valider"/></form>'


?>      </td>
<?php   if($j%1==0){
    $fintr=1;
?>      </tr>
<?php       }       
        $j++;
        }
        if($fintr!=1){ 
?>      </tr>
<?php } ?>
        </tbody>
    </table>
<?php 
}
?>  
</div>
</article>
</section>