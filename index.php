<?php
include('topic.php');
include('message.php');

try
{
  $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
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
<h2 class="title"><?= nl2br(htmlspecialchars($value['title'])); ?> </h2>
<p class="content"><?= nl2br(htmlspecialchars($value['contents'])); ?> </p>
<div class="hours"><?= nl2br(htmlspecialchars($value['date_create'])) ?></div>
</div>
<?php
$reponse->closeCursor();
$reponse = $bdd->query('SELECT author, message, DATE_FORMAT(date_message, "%d/%m/%Y %Hh%imin%ss") AS date_message FROM message WHERE ticket_id=' . $value["id"] . ' ORDER BY id DESC LIMIT 5');
$donnees = $reponse->fetchAll();
foreach ($donnees as $donnee => $value) { ?>
<div class="message">
<p class="pseudo"><?= nl2br(htmlspecialchars($value['author'])) ?></p>
<p class="message"><?= nl2br(htmlspecialchars($value['message'])) ?></p>
<div class="hours"><?= nl2br(htmlspecialchars($value['date_message'])) ?></div>
</div>
<?php }
} ?>
