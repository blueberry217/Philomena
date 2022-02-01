<?php
    session_start();

    if(isset($_POST["bevestigen"])){

        $sql = "SELECT `naam` FROM `behandeling` WHERE `id` = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array("id"=>$_POST["behandeling"]));
        $result = $stmt->fetch();
        
        $_SESSION["behandelingID"] = $_POST["behandeling"];
        $_SESSION["behandeling"] = $result["naam"]; 

        echo "<script>location.href='index.php?page=selecteer-datum';</script>";
    }

    if(isset($_POST["goback"])){
        echo "<script>location.href='index.php?page=afspraken';</script>";
    }

    $sql = "SELECT * FROM `behandeling` where `type` = :type";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array("type"=>$_SESSION["type"]));
    $behandeling = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>


<div class="content text-is-dark">
    <div class="container is-white glow">
        <p class="is-bold"> Stap 2/5 </p>
        <p>Welke behandeling?</p>
        <form class="" method="POST" action="">
        <div class="radio-toolbar">

            <?php
            $cat = "";
            for($i = 0; $i < count($behandeling);$i++) {
                $value = $behandeling[$i];
                $behandelingID = $value["id"];
                $status = 'unchecked';
                
                if($_SESSION["behandeling"] == $behandelingID){
                    $status = 'checked';
                }  
                
                //categorie divider
                if($cat != $value["categorie"]){
                    $cat = $value["categorie"];
                    echo "<div class=\"is-bold\">". ucfirst($cat). "</div>";
                }
                echo "<input class=\"\" type=\"radio\" id=\"radio-$i\" name=\"behandeling\" value=\"$behandelingID\" $status/>";
                echo "<label class=\"radio-behandeling\" for=\"radio-$i\">". $value["naam"] . "   €". $value["prijs"]."</label>";
            }
            ?>
        </div>
            <div class="flexbox">
                      <input type="submit" class="submit m-10" name="goback" value="Terug" />
                      <input type="submit" class="submit m-10 next" name="bevestigen" value="volgende">
            </div>
                
        </form>
    </div>
</div>