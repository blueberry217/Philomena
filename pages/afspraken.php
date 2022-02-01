
<?php 
    session_start();

    if(isset($_POST["submit"])){
      $_SESSION["type"] = $_POST["submit"];
      echo "<script>location.href='index.php?page=behandeling';</script>";
    }

   

?>


<div class="page m-10 text-is-white">
    <h1>Afspraken planner</h1>
</div>


    <div class="content text-is-dark">

        <div class="container is-white glow">
    
        <p class="is-bold"> Stap 1/5 </p>
        <p>Waar kunnen we je mee van dienst zijn?</p>
        <form class="flexbox" method="POST" action="">
            <input type="submit" class="submit" name="submit" value="nagels">
            <input type="submit" class="submit" name="submit" value="haar">
        </form>

        </div>
</div>

