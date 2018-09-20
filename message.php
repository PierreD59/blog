<form method="post" action="blog.php">
  <p>
    <label for="author">Pseudo : </label><br>
    <input type="text" name="author" id="author" required/>
  </p>
  <p>
    <label for="message">Commentaire : </label> <br>
    <input type="text" name="message" id="message" required/>
  </p>
  <select name="ticket_id">
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

    $req = $bdd->query('SELECT id FROM ticket');
    $rep = $req->fetchAll();
    foreach($rep as $val) {
      echo '<option value="' . $val['id'] . '">' . $val['id'] . "</option>";
    }
    ?>
  </select>
  <input type="submit" value="Envoyer" />
</form>

<script src="js/vendor/modernizr-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
  window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
  ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>
