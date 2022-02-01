<?php

    session_start();


    if(isset($_POST["bevestigen"])){
        $_SESSION["tijd"] = $_POST["radios"];
        echo "<script>location.href='index.php?page=bevestig-afspraak';</script>";
    }
    
    if(isset($_POST["goback"])){
        echo "<script>location.href='index.php?page=selecteer-datum';</script>";
    }
?>


<div class="content text-is-dark">
    <div class="container is-white glow">
        <p class="is-bold"> Stap 4/5 </p>
        <p>Hoe laat?</p>

        <form  method="POST" action="">
            <div class="radio-toolbar">

            <?php 
                $timeArray = array("830","900","930","1000","1030", "1100" ,"1130" ,"1230" ,"1300", "1330" ,"1400", "1430" ,"1500", "1530" ,"1600","1630" );
                $i = 0;
               

                for($i = 0; $i < count($timeArray);$i++) {
                    $time = $timeArray[$i];
                    $status = "unchecked";
                    if($_SESSION["tijd"] == $time){
                        $status = 'checked';
                    }
                    echo "<input type=\"radio\" id=\"t$i\" name=\"radios\" $status value=\"$time\">
                        <label for=\"t$i\">$time</label>";
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