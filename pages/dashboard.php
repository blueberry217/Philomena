
<?php 
    session_start();
  
    if(isset($_POST["nagels"])){
      $_SESSION["type"] = "nagels";
      echo "<script>location.href='index.php?page=nagels';</script>";
    }

    if(isset($_POST["knippen"])){
      echo "<script>location.href='index.php?page=knippen';</script>";
    }

    // haal informatie uit verschillende tabellen door ze te joinen/binden op ID
    $sql = "SELECT `afspraak`.`id`, `behandeling`.`naam` AS `behandeling`, `tijd` ,`datum` , `voornaam` ,`achternaam` 
            FROM `afspraak` INNER JOIN `klant` 
            ON `afspraak`.`klantID` = `klant`.`ID` 
            INNER JOIN `behandeling` 
            ON `afspraak`.`behandelingID` = `behandeling`.`id`
            WHERE `afspraak`.`klantID` = :klantid";

    $stmt = $pdo->prepare($sql);
    //filter op gebruiker ID
    $stmt->execute(array("klantid"=> $_SESSION["USER_ID"]));
    $klanten = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>


<div class="page m-10 text-is-white">
    <h1>Afspraken planner</h1>
      <p id="user">Welkom
      <?php echo ucfirst($_SESSION["USER_NAME"]); ?> </p>
  </br>
      <div>
      <a href="index.php?page=afspraken" class="afspraak-button"> nieuwe afspraak</a>
      </div>
</div>


<div class="flexbox is-column">

<div class="">
  <h1> Afspraken</h1>
</div>

<div class="wrapper flexbox align-left flex-wrap text-is-dark">
 
    <?php foreach($klanten as $value): ?>
        <div class="container  m-10  is-white glow">
    
        <p class="is-bold"> </p>
        <h2>
        <?php echo $value["datum"] ." • ". $value["tijd"]; ?>
             </h2>
            
             <p>
            <?php echo $value["behandeling"] ; ?>
             </p>
          
        

        </div>
        <?php endforeach ?>
        
      

        </div>
</div>

