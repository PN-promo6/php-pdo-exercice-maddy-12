<?php
$db_user = "madina";
$db_passwd = "root";
$db_host = "localhost";
$db_port = "3306";
$db_name = "exoPdo";
$db_dataSourceName = "mysql:host=$db_host;port=$db_port;dbname=$db_name";

$PDO = new PDO($db_dataSourceName, $db_user, $db_passwd);
$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $numeroDePage = isset($_GET["numeropage"]) ? $_GET["numeropage"] : 0;
// $nombreParPage = 5;

// $limit = $numeroDePage * $nombreParPage;
//$response est un objet "sqlstatment" qui permet de recup' les donnees
// $response =  $PDO->query("SELECT nom, console FROM jeux_video WHERE possesseur LIKE '%e%' ORDER BY nom, prix ASC LIMIT $limit, $nombreParPage"); //En ca d'égalité on order by prix
// VERSION BOUCLE
//1
// while ($donnee = $response->fetch()) {
//     var_dump($donnee);
// }
//2
// for ($i = 0; $i < count($donnee); $i++) {
//     $ligneCourante = $donnee[$i];
//     var_dump($ligneCourante);
// }

//3
//$donnee est une variable qui contient l'objet et permetd e recup le contenu de la requete à la quelle on applique la methode "fetch()" ou "fetchAll()".
// $donnee = $response->fetchAll();
// // affiche ma page
// foreach ($donnee as $ligneCourante) {
//     echo $ligneCourante['nom'] . " - Console: " . $ligneCourante['console'] . "<br/>";
//}

// $pageSuivante = $numeroDePage + 1;
// $pagePrecedente = $numeroDePage - 1;
//Pour arreter la requête actuelle et commenccer l'execution d'une nouvelle requête: Dans tout les cas il faut le mettre c'est plus propre.
// $response->closeCursor();

//Si on veut tout afficher d'un coup sans faire une boucle on fait:

// affiche ma pagination
?>

<!-- <a href="?numeropage=<?php //echo $pagePrecedente 
                            ?>">Précédent</a> - <a href="?numeropage=<?php //echo $pageSuivante 
                                                                        ?>">Suivant<a> -->

<?php
////////////////////////////REQUËTE PRÉPAREE///////////////////////////////////////////////////////////////

// $nom = isset($_GET['nom']) ? $_GET['nom'] : 'patrick';
// $console = $_GET['console'] ?? 'SuperNes'; //ça c'est pareille que la ligne du dessus
// //requête préparée
// // $requetepreparee = $PDO->prepare("SELECT nom, console FROM jeux_video WHERE possesseur = ? ORDER BY nom, console ASC"); //ver1
// // $requetepreparee->execute(array($nom));
// $requetepreparee = $PDO->prepare("SELECT nom, console FROM jeux_video WHERE possesseur = :user and console = :console ORDER BY nom, console ASC"); //ver 2 avec plus de params
// $requetepreparee->execute(array('console' => $console, 'user' => $nom));

// $donnee = $requetepreparee->fetchAll();
// // affiche ma page
// foreach ($donnee as $ligneCourante) {
//     echo $ligneCourante['nom'] . " - Console: " . $ligneCourante['console'] . "<br/>";
// }

// //Pour arreter la requête actuelle et commenccer l'execution d'une nouvelle requête: Dans tout les cas il faut le mettre c'est plus propre.
// $requetepreparee->closeCursor();

// $PDO->exec("INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES('Battlefield 1942', 'mady', 'PC',45, 50, '2nde guerre mondiale')");
$console = $_GET['console'] ?? 'NES'; //Si on précise pas le parametre en url, ça nous met 'NES' par default dans le champs 'console'
// $PDO->exec("UPDATE jeux_video SET console = '$console' WHERE ID = 52"); //ça marche mais c'est pas securisé
// $prepReq = $PDO->prepare("UPDATE jeux_video SET console = :plateform WHERE ID = 52");
$id = $_GET['ID'] ?? -1;
$prepReq = $PDO->prepare("DELETE FROM jeux_video WHERE ID = :id");
$prepReq->execute(
    array(
        'id' => $id

    )
);
