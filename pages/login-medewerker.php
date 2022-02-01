

<div class="content text-is-dark">
    <div class="container is-white glow">

        <form name="inloggen" action="" method="POST" enctype="multipart/form-data" action="">
            <h1>Inloggen</h1>
            <input class="is-input m-10" required type="email" name="email" placeholder="myname@mail.com">
            <input class="is-input m-10" required type="password" name="password" placeholder="wachtwoord">
            <input type="submit" class="submit" name="submit" value="inloggen">
           
        </form>
        <div class="flexbox">
            <a class="m-10" href="index.php?page=inloggen">Inloggen Klanten</a>
            <a class="m-10" href="wachtwoord_vergeten.php">wachtwoord vergeten</a>
        </div>
            

    </div>
</div>
    
    
    <?php 
        
        if(isset($_POST["submit"])){
            $melding = "";
            $email = htmlspecialchars($_POST["email"]);
            $password = htmlspecialchars($_POST["password"]);
 
            try{
               
                $sql = "SELECT * FROM `medewerker` WHERE `email` = :email ";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array("email"=>$email));
                $result = $stmt->fetch(PDO::FETCH_ASSOC);


                if($result){
                    $passwordDB = $result["wachtwoord"];
                    if(password_verify($password,  $passwordDB)){
                        
                        $_SESSION["ID"] = session_id();
                        $_SESSION["USER_ID"] = $result["ID"];
                        $_SESSION["USER_NAME"] = $result["voornaam"];
                        $_SESSION["EMAIL"] = $result["email"];
                        $_SESSION["STATUS"] = "ACTIEF";
                        $_SESSION["ROL"] = 1;
                        echo "<script>location.href='index.php?page=medewerker';</script>";
                        

                    }else{
                        echo "<br>not the magic word";
                    }
                }
                
            }catch(PDOException $e){
                echo $e-getMessage();
            }
        }
    
    ?>