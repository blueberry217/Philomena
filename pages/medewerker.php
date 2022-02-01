
<?php 
    session_start();
    
    if(!isset($_SESSION["ID"]) &&  $_SESSION["STATUS"] != "ACTIEF"){
      echo "<br><p> U heeft geen toegang tot deze pagina</p>";
    }else{
          //dan heb je toegang

         //verander naar de gekozen medewerker en de status naar 1
         if(isset($_POST["wijzig"])){
            $sql = "UPDATE `afspraak` SET `medID` = :medID , `status` = 1 
                    WHERE `afspraak`.`id` = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array("id"=>$_POST["afspraakID"],"medID"=>$_POST["medewerker"]));
          
        }
        

        $sql = "SELECT `afspraak`.`id`, `medID`,`behandeling`.`naam` AS `behandeling`, `tijd` ,`datum` , `status`, `voornaam` ,`achternaam` 
                FROM `afspraak` INNER JOIN `klant` 
                ON `afspraak`.`klantID` = `klant`.`ID` 
                INNER JOIN `behandeling` 
                ON `afspraak`.`behandelingID` = `behandeling`.`id`
                ORDER BY `afspraak`.`datum` ASC , `afspraak`.`tijd` ASC";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $afspraken = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // haal lijst aan medewerkers op
        $medewerkers = getMedewerkers();

   
?>


<div class=" m-10 text-is-white">
    <h1>Medewerker</h1>
      <p id="user">Welkom
      <?php echo ucfirst($_SESSION["USER_NAME"]); ?></p>
</div>


  <div class="flexbox is-column">

    <div class="">
      <h1> Afspraken</h1>
    </div>
    
    <div class="wrapper flexbox align-left flex-wrap text-is-dark">
  
    <?php foreach($afspraken as $value): ?>
        <div class="container is-white glow m-10">
    
        <p class="is-bold"> </p>
        <h2>
          <form action="" method="post">
            
             <input type="hidden" name="afspraakID" value="<?php echo $value["id"]?> ">

            <?php echo $value["voornaam"] ." ". $value["achternaam"];?>
             </h2>
            <p class="is-date">
            <?php echo $value["datum"] ." • ". $value["tijd"]; ?>
             </p>
             <p>
            <?php echo $value["behandeling"] ; ?>
             </p>
             <br>
             <div class="<?php echo checkStatus($value["status"]); ?> ">
              
              <p><span class="is-uppercase is-bold"> <?php echo checkStatus($value["status"]); ?> </span></p>
              
             </div>
             <br>
             <p>Kies medewerker</p>
             <div class="flexbox">
             
             <div class="selectdiv ">
               <select class="select" name="medewerker" id="">
                <?php foreach($medewerkers as $medewerker): ?>
                  <option value="<?php echo $medewerker["id"] ?>"  <?php echo $value["medID"] == $medewerker["id"] ? "selected" : "boe"?> >
                    <?php echo $medewerker["voornaam"] ?>
                  </option>
                  <?php endforeach ?>
                </select>
            </div>
             <input type="submit" class="submit" name="wijzig" value="bevestig">
             </div>
             </form>


        </div>
        <?php endforeach ?>
</div>
  </div>


<?php } 


  // return medewerkers tabel
  function getMedewerkers(){
    global $pdo;
    $sql = "SELECT `id`,`voornaam` FROM `medewerker`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
  }


  

  // geef status terug in tekst
  function checkStatus($status){

    if($status == 0){
      return "open";
    }

    if($status == 1){
      return "geboekt";
    }

    if($status == 1){
      return "afgehandeld";
    }
  }


?>