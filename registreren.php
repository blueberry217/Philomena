<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description" content="Webpage description goes here" />
  <meta charset="utf-8">
  <title>Philomena</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="">
  <link rel="stylesheet" href="styles/reset.css">
  <link rel="stylesheet" href="styles/style.css">
  
</head>

<body>
    <?php
        include_once("DBconfig.php");
     
        if(isset($_POST["submit"])){

            $voornaam = $_POST["voornaam"];
            $achternaam = $_POST["achternaam"];
            $straat = $_POST["straat"];
            $postcode = $_POST["postcode"];
            $woonplaats = $_POST["woonplaats"];
            $email = $_POST["email"];
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    

            $sql = "INSERT INTO `klant` (`ID`, `voornaam`, `achternaam`, `straat`, `postcode`, `woonplaats`, `email`, `wachtwoord`) 
                        VALUES (NULL, :voornaam, :achternaam, :straat, :postcode, :woonplaats, :email, :password)";
            $stmt = $pdo->prepare($sql);
            $userArray = array( "voornaam"=>$voornaam, 
                                "achternaam"=>$achternaam,
                                "straat"=>$straat,
                                "postcode"=>$postcode,
                                "woonplaats"=>$woonplaats,
                                "email"=>$email, 
                                "password"=>$password,
                                );                            
            $stmt->execute($userArray);
            // als het gelukt is ga verder

            echo "<script>location.href='index.php?page=inloggen';</script>";

    }
    
    ?>
   <div class="content text-is-dark">
    <div class="container is-white glow">
        <form name="inloggen" method="POST" enctype="multipart/form-data" action="">
            <h1>Registreren</h1>
            <input required type="text" class="is-input" name="voornaam" placeholder="voornaam">
            <input required type="text"  class="is-input" name="achternaam" placeholder="achternaam">
            <input required type="text"  class="is-input" name="straat" placeholder="straat">
            <input required type="text"  class="is-input" name="postcode" placeholder="postcode">
            <input required type="text"  class="is-input" name="woonplaats" placeholder="woonplaats">
            <input required type="email"  class="is-input"  name="email" placeholder="myname@mail.com">
            <input required type="password"  class="is-input" name="password" placeholder="wachtwoord">
            <input type="submit" class="submit" name="submit" value="registreer">
            <div class="flexbox">

            <a href="index.php">inloggen</a>
            <a class="m-10" href="wachtwoord_vergeten.php">wachtwoord vergeten</a>
            </div>
        </form>
      
    </div>
    </div>
    
</body>
</html>