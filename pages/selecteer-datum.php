<?php
    session_start();
    
    if(isset($_POST["bevestigen"])){
        $_SESSION["datum"] = $_POST["seldate"];
        echo "<script>location.href='index.php?page=selecteer-tijd';</script>";
    }


    if(isset($_POST["goback"])){
        echo "<script>location.href='index.php?page=behandeling';</script>";
    }

?>


<div class="content text-is-dark">
    <div class="container is-white glow">
        <p class="is-bold"> Stap 3/5 </p>
        <p>Welke dag kun je?</p>

        <form class="" method="POST" action="">
            <!-- <div id='calendar'></div> -->
            <div id="datepicker" name="seldate"></div>
            <input type="hidden" id="seldate" name="seldate">

            <div class="flexbox">
            <input type="submit" class="submit m-10" name="goback" value="Terug" />
                <input type="submit" class="submit m-10 next" name="bevestigen" value="volgende">
            </div>
        </form>
    </div>
</div>