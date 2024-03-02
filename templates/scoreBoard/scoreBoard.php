<!DOCTYPE html>
<html>
<head>
<meta name="description" content="Phaser.js game demo" />
  <meta charset="utf-8">
  <title>Phaser.js game demo</title>
  <link rel="stylesheet" href="../assets/css/htmlGaming.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <h1 class="titreIndex">HTML5 GAMING - By Enes et Mickael</h1>
    <nav><a class="nav-link buttonPerso" href="../index.html">Retour au menu principal</a></nav>
    <audio id="audio" class="audio" autoplay loop controls src="../assets/music/scoreBoard.mp3"></audio>
    <br/>
    <br/>
    <br/>
    <p>Vous jouez actuellement en tant que :  
      <span id="showPseudo" class="showPseudoScoreBoard">
        Invité
      </span>
    </p>
    <br/>
    <br/>

    <form method="POST" id="gameForm">
      <label for="game">Sélectionner le jeu à consulter: </label>
      <select id="game" name="game" form="gameForm">
        <option value="Seigneur des Anneaux">Seigneur des Anneaux</option>
        <option value="Star Wars">Star Wars</option>
        <option value="Epitech">Epitech</option>
        <option value="Adulte">Adulte</option>
      </select>  
      <br>
      <br>
      <input type="submit" value="Lancer la recherche">
    </form>
    <br/>
    <br/>
    <nav>
      <table id="menuPrincipal" class="tablePerso table table-dark">
        <?php
          if(empty($_POST)){
            echo '<tr class="text-center">Veuillez sélectionner un tableau de scores</tr>';
          } else if ($_POST['game']=="Adulte"){
            echo "<tr class='text-center'>Personne n'a autant l'esprit déplacé que toi, personne ne joue à ce jeu.</tr>";
          } else {
            $game = $_POST['game'];
            echo '
              <tr>
                <th scope="col">Joueur</th>
                <th scope="col">Arme/Personnage</th>
                <th scope="col">Commandes</th>
                <th scope="col">Score</th>
              </tr>    
            ';

            $conn = mysqli_connect('localhost', 'root', '', 'project_gaming');
            if($game=="Seigneur des Anneaux"){
              $req = "SELECT * FROM score WHERE game='Seigneur des Anneaux' ORDER BY score DESC";
            } else if ($game=="Star Wars"){
              $req = "SELECT * FROM score WHERE game='Star Wars' ORDER BY score DESC";
            } else if ($game=="Epitech"){
              $req = "SELECT * FROM score WHERE game='Epitech' ORDER BY score DESC";
            }
            $res = $conn->query($req);
            while ($data = mysqli_fetch_array($res)) {
              // on affiche les résultats
              echo "<tr>
                <td>".$data['user']."</td>
                <td>".$data['weapon']."</td>
                <td>".$data['controls']."</td>
                <td>".$data['score']."</td>
              </tr>";
            }
          }
        ?>
      </table>
    </nav>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="scoreBoard.js" type="text/javascript"></script>
</body>
</html>

<!-- // $reason = $_POST['reason'];

// if($reason=="saveScore"){

//     $game = $_POST['game'];
//     $weapon = $_POST['weapon'];
//     $controls = $_POST['controls'];
//     $score = $_POST['score'];

//     $servername = "localhost";
//     $username = "root";
//     $password = "";
//     $dbname = "project_gaming";
    
//     // Create connection
//     $conn = new mysqli($servername, $username, $password, $dbname);
//     // Check connection
//     if ($conn->connect_error) {
//       die("Connection failed: " . $conn->connect_error);
//     }
    
//     $sql = "INSERT INTO score (user, game, weapon, controls, score)
//     VALUES ('test', '$game', '$weapon', '$controls', 0)";
    
//     if ($conn->query($sql) === TRUE) {
//       echo "New record created successfully";
//     } else {
//       echo "Error: " . $sql . "<br>" . $conn->error;
//     }
    
//     $conn->close();    
// } -->




