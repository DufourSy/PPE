<?php
    if(empty($COOKIE['pseudo'])){


    try {
        $bdd = new PDO('mysql:dbname=ppe;host=localhost', 'admin', 'Btssio');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $bdd->prepare('SELECT * FROM evenement,user,lieu WHERE evenement.id_lieu = lieu.id_lieu and evenement.id_user = user.id_user');
    $req->execute();
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