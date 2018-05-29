<?php
            try {
    $bdd = new PDO('mysql:dbname=ppe;host=localhost', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
        catch (PDOException $e) {
        die($e->getMessage());
    }
?>
        <!-- le formulaire d'inscription -->
        <form action="?page=creat" method="POST">
            <h2>Inscription</h2>
            <fieldset>
                <p>
                    <label for="designation">Votre Désignation : </label>
                    <input id="designation" type="text" name="designation" placeholder="" required />
                </p>
                <p>
                    <label for="date_event">date de l'évènement : </label>
                    <input id="date_event" type="date" name="date_event" placeholder="" required />
                </p>
                <p>
                    <label for="nbinvites">Nombres d'invités : </label>
                    <input id="nbinvites" type="number" name="nbinvites" placeholder="" required />
                </p>
                <p>
                    <label for="heure_debut">Heure de début de l'évènement : </label>
                    <input id="heure_debut" type="time" name="heure_debut" placeholder="" required />
                </p>
                <p>
                    <label for="heure_fin">Heure de fin de l'évènement : </label>
                    <input id="heure_fin" type="time" name="heure_fin" placeholder="" required />
                </p>
                <p>
                    <label for="contenu">Description : </label>
                    <input id="contenu" type="text" name="contenu" placeholder="" required />
                </p>
            </fieldset>

<section id="actu">
<?php

    $bdd = new PDO('mysql:dbname=ppe;host=localhost', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
$i = -1;
    foreach ($r as $row) 
    {
        if($j%2 == 1){
            $nbl++;
            $fintr=0;
            
?>      <tr>
<?php       }

?>      <td style="border-bottom:1px solid rgba(100,100,100,0.4);">
<?php   
$i++;
        echo '<li>'.$row['libelle'].'</li>';

        echo '<li>'.$row['adresse'].'</li>';

        echo '<li>'.$row['prix_location'].'</li>';

        echo '<li>'.$row['capacite'].'</li>';

        echo  '<input type="radio" name="id_lieu" value='.$r[$i]['id_lieu'].' id="id_lieu"/>';

?>      </td>
<?php if($j%1==0){
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
</section>

<section id="actu">
<?php

    $bdd = new PDO('mysql:dbname=ppe;host=localhost', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //préparation de la requete
    $res=$bdd->prepare('SELECT * FROM type_event');                                           
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
                    <li>designation</li>
                </td>
            </tr>
        </thead>
        <tbody>
<?php
$i = -1;
    foreach ($r as $row) 
    {
        if($j%2 == 1){
            $nbl++;
            $fintr=0;
            
?>      <tr>
<?php       }

?>      <td style="border-bottom:1px solid rgba(100,100,100,0.4);">
<?php   
$i++;
        echo '<li>'.$row['libelle'].'</li>';

        echo  '<input type="radio" name="id_event" value='.$r[$i]['id_event'].' id="id_event"/>';

?>      </td>
<?php if($j%1==0){
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
</section>

<input type="submit" name="valider" value="Choisir" id="valider"/>
</form>