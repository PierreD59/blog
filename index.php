<?php
include('topic.php');
include('message.php');

try
{
  $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '4zgtxmlm59');
}


catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}
$reponse = $bdd->query('SELECT id, title, contents, DATE_FORMAT(date_create, "%d/%m/%Y %Hh%imin%ss") AS date_create FROM ticket ORDER BY id DESC LIMIT 5');
$donnees = $reponse->fetchAll();
foreach ($donnees as $donnee => $value) {
  ?>
<div class="topic">
<h2 class="title"><?= $value['title'] ?> </h2> <br />
<p class="content"><?= $value['contents'] ?> </p><br />
<div class="hours"><?= $value['date_create'] ?></div> <br />
</div> <br />
<?php
$reponse->closeCursor();
$reponse = $bdd->query('SELECT author, message, DATE_FORMAT(date_message, "%d/%m/%Y %Hh%imin%ss") AS date_message FROM message WHERE ticket_id=' . $value["id"] . ' ORDER BY id DESC LIMIT 5');
$donnees = $reponse->fetchAll();
foreach ($donnees as $donnee => $value) { ?>
<div class="message">
<p class="pseudo"><?= $value['author'] ?></p> <br />
<p class="message"><?= $value['message'] ?></p> <br />
<div class="hours"><?= $value['date_message'] ?></div>
</div> <br />
<?php }
} ?>
