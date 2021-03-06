﻿<?php
    if(empty($COOKIE['pseudo'])){


    try {
    //$bdd = new PDO('mysql:dbname=ppe;host=localhost', 'root', '');
    $bdd = new PDO('mysql:dbname=ppe;host=localhost', 'admin', 'Btssio');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $bdd->prepare('SELECT * FROM evenement,user,lieu WHERE evenement.id_lieu = lieu.id_lieu and evenement.id_user = user.id_user and evenement.id_user = :id_user');
    $req->execute(array(
        'id_user' => $_COOKIE['id_user']));
    $resultat = $req->fetchAll();

    }
    catch (PDOException $e) {
        die($e->getMessage());
    }
   }else{
        header('Location: ?page=home');
        exit();
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
    $nbd=$req->rowCount();                                                                                   

    $nbl=0;
    if($nbd != 0){
        $j=1;
?>
    <table>
        <thead>
            <tr>
                <td style="border-bottom:1px solid #575757;">
                    <li>Date</li>
                    <li>Début</li>
                    <li>Fin</li>
                    <li>Description</li>
                    <li>Lieu</li>
                    <li>Adresse</li>
                    <li>Nom</li>
                    <li>Repas x Quantite</li>
                </td>
            </tr>
        </thead>
        <tbody>
<?php
    foreach ($resultat as $row) 
    {
        if($j%2 == 1){
            $nbl++;
            $fintr=0;
?>      <tr>
<?php       }

?>      <td style="border-bottom:1px solid rgba(100,100,100,0.4);">
<?php   

        echo '<li>'.$row['date_event'].'</li>';

        echo '<li>'.$row['heure_debut'].'</li>';

        echo '<li>'.$row['heure_fin'].'</li>';

        echo '<li>'.$row['contenu'].'</li>';

        echo '<li>'.$row['libelle'].'</li>';

        echo '<li>'.$row['adresse'].'</li>';

        echo '<li>'.$row['nom'].'</li>';

    //préparation de la requete
    $res=$bdd->prepare('SELECT * FROM commander,nourriture WHERE nourriture.id_nour=commander.id_nour and id_event='.$row['id_event']);                                           
    $res->execute();                                                            
    $nbd=$res->rowCount();                                                                                   
    $r=$res->fetch();    
if(empty($r)){
        echo '<form action="?page=add" method="POST">
        <input type="hidden" name="id_event" value="'.$row['id_event'].'" id="id_event">
        <input type="submit" name="valider" value="Add nourriture" id="valider"/>
        </form>';
}else{
    echo '<li>'.$r['designation'].' x '.$r['quantite'];
}

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