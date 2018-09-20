<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
</head>

  <body>

    <form method="post" action="blog.php">
      <p>
        <label for="title">Titre : </label><br>
        <input type="text" name="title" id="title" required/>
      </p>
      <p>
        <label for="contents">Contenu : </label><br>
        <input type="text" name="contents" id="contents" required/>

      </p>
      <input type="submit" value="Envoyer" />
    </form>
