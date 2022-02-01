<?php 


    if(isset($_POST["submit"])){

        $sql = "UPDATE `klant` SET  `voornaam` = :voornaam , 
                                    `achternaam` = :achternaam,
                                    `straat` = :straat, 
                                    `postcode` = :postcode, 
                                    `email` = :email, 
                                    `woonplaats` = :woonplaats 
                                WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $updateArray = array( "voornaam"=>$_POST["voornaam"],
                             "achternaam"=>$_POST["achternaam"],      
                             "straat"=>$_POST["straat"],     
                             "postcode"=>$_POST["postcode"],     
                             "woonplaats"=>$_POST["woonplaats"],
                             "email"=>$_POST["email"],
                             "id"=>$_SESSION["USER_ID"]
                            
                            );      
                        
        $stmt->execute($updateArray);
        //update session data
        if($_SESSION["EMAIL"] != $_POST["email"] ){
            $_SESSION["EMAIL"] = $_POST["email"];
        }
        
        echo "<p> Update succesvol </p>";
    }

    $id = $_SESSION["USER_ID"];
    $sql = "SELECT * FROM `klant` WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array("id"=>$id));
    $userArray = $stmt->fetch(PDO::FETCH_ASSOC);

?>


<div class="content text-is-dark">
    <div class="container is-white glow">
<form name="inloggen" method="POST" enctype="multipart/form-data" action="">
    <h1>Profiel</h1>
    
    <input class="is-input m-10" type="text" name="voornaam" value="<?php echo $userArray["voornaam"]?>">
    <input class="is-input m-10" type="text" name="achternaam" value="<?php echo $userArray["achternaam"]?>">
    <input class="is-input m-10" type="text" name="straat" value="<?php echo $userArray["straat"]?>">
    <input class="is-input m-10" type="text" name="postcode" value="<?php echo $userArray["postcode"]?>">
    <input class="is-input m-10" type="text" name="woonplaats" value="<?php echo $userArray["woonplaats"]?>">
    <input class="is-input m-10" type="email" name="email" value="<?php echo $userArray["email"]?>">
    
    <input class="submit" type="submit" name="submit" value="updaten">

    <div class="flexbox">
            <a class="m-10" href="registreren.php">registreren</a>
            <a class="m-10" href="wachtwoord_vergeten.php">wachtwoord vergeten</a>
    </div>
</form>

</div>
</div>

<?php 
 
?>