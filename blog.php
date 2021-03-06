<?php

try
{
  $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}

$title = $_POST['title'];
$contents = $_POST['contents'];

if(isset($title) AND !empty($title) AND isset($contents) AND !empty($contents))
{
$req = $bdd->prepare('INSERT INTO ticket(title, contents, date_create) VALUES(:title, :contents, NOW())');
$req->execute(array(

    'title' => $title,
    'contents' => $contents
    ));
    $req->closeCursor();
}
else
{
header('Location: index.php');
}


$author = $_POST['author'];
$message = $_POST['message'];
$ticket_id = $_POST['ticket_id'];

if(isset($author) AND !empty($author) AND isset($message) AND !empty($message))
{
  $req = $bdd->prepare('INSERT INTO message(author, message, ticket_id, date_message) VALUES(:author, :message, :ticket_id, NOW())');
  $req->execute(array(

    'author' => $author,
    'message' => $message,
    'ticket_id' => $ticket_id
  ));
  $req->closeCursor();
}
else
{
header('Location: index.php');
}

?>
