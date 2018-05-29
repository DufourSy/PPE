 <?php
 var_dump($_POST['quantite_nour']);
    if (isset($_POST['quantite_nour'])) {
        try {
    $bdd = new PDO('mysql:dbname=ppe;host=localhost', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $bdd->prepare('INSERT INTO `commander`(`quantite`, `id_event`, `id_nour`) VALUES (:quantite_nour, :id_event, :id_nour)');
            $stmt->execute(
                array(':quantite_nour' => $_POST['quantite_nour'],
                    ':id_event' => $_POST['id_event'],
                    ':id_nour' => $_POST['id_nour']
                )
            );
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
        header('Location: ?page=historique');
    }