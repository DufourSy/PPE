        <form action="?page=add" method="POST">
            <h2>Ajouter la nourriture</h2>
            <fieldset>

<section id="actu">
<?php

        $bdd = new PDO('mysql:dbname=ppe;host=localhost', 'admin', 'Btssio');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //préparation de la requete
    $res=$bdd->prepare('SELECT * FROM nourriture');                                           
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
                    <li>specialite</li>
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
        echo '<li>'.$row['designation'].'</li>';

        echo '<li>'.$row['specialite'].'</li>';

        echo  '<input type="radio" name="id_nour" value='.$r[$i]['id_nour'].' id="id_nour"/>';

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

                <p>
                    <label for="quantite_nour">Quantite de nourriture en assiette : </label>
                    <input id="quantite_nour" type="number" name="quantite_nour" placeholder="" />
                </p>
<?php
echo '<input type="hidden" name="id_event" value="'.$_POST['id_event'].'" id="id_event">';
?>
<input type="submit" name="valider" value="Choisir" id="valider"/>
</form>