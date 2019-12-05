<?php
session_start();
require 'function.php';
$minTable =1;
$maxTable = 10;
?>
<!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <nav class="deep-orange accent-4">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">>Table de multi
      </a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="#one">table du 3</a></li>
        <li><a href="#two">select table</a></li>
        <li><a href="#tree">jeu </a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col s12">

        <p>Pour les refractaires à la calculatrice <p>
      </div>
    </div>
  </div>
  <div class="container" id="one">
    <div class="card-panel teal lighten-2">Table 3</div>
    <div class="row">
      <div class="col s4 offset-s4">
        <?php
        afficheTable(3);
?>
      </div>

    </div>

  </div>
  <div class="container" id="two">
    <div class="card-panel teal lighten-2">Selection ta/tes tables</div>

    <div class="row">

      <div class="col s12 m3">
        <p>selection une table</p>
        <form action="index.php" method='get'>


          <div class="input-field">
            <select class="browser-default" name="table">

              <?php
         
             for ($i=$minTable; $i<=$maxTable; $i++){

              echo "<option value=".$i."> table du ".$i ."</option>";
                 }

              ?>
            </select>
          </div>
          <input type="submit" value="calcul" />
        </form>

        <p>Selection plusieurs table</p>
        <form action="index.php" method='get'>

          <?php
    for ($i=$minTable; $i<=$maxTable; $i++){

      echo "  <p>
       <input type='checkbox' id='myCheckbox$i' name='chk[]' value=".$i.">
       <label for='myCheckbox$i'> table du ".$i ."</label>
    </p>";

      
    }

?>

          <input type="submit" value="calcul" />


        </form>
      </div>
      <div class="col s8">
        <p>Apercu</p>
        <?php

            if (isset($_GET['table'])){


              $val=secur($_GET['table'],  $minTable,$maxTable, 1);
              if($val !=0){
              echo"<div class='col s12 m3'>";
              echo"<p><b>Table du ".$val."</b></p>" ;
                afficheTable($val);
                echo"</div>";
              }
              else{echo "404 mon ami";}
              }

              if (isset($_GET['chk']) && is_array($_GET['chk'])){
              if (count($_GET['chk']) <= $maxTable){
                 foreach($_GET['chk'] as $val){
                  $val1=secur($val, $minTable,$maxTable,1);
                  if($val1 !=0 ){
                  echo"<div class='col s12 m3'>";
                  echo"<p><b>Table du ".$val1."</b></p>" ;
                  afficheTable($val1);
                  echo"</div>";
                  }else {echo "404 mon ami";}
                
                }
              }else {echo "404 mon ami";}
              
                }

?>
      </div>
    </div>
  </div>

  <div class="container" id="tree">
    <div class="card-panel teal lighten-2">Jeux</div>

    <div class="row">

      <div class="col s12">
        <p>Méli calcul</p>
        <form action="index.php" method='get'>
        <div class="input-field">
          <select class="browser-default" name="revis">
            <?php
                for ($i=$minTable; $i<=$maxTable; $i++){

                    echo "<option value=".$i."> table du ".$i ."</option>";
                }

            ?>
          </select>
              </div>
          <!-- <input type="hidden" value="uniq" name="typ" /> -->
          <input type="submit" value="calcul" />
        </form>
        <?php

     


          if(isset($_GET['revis'])){
            $tab = secur($_GET['revis'], $minTable,$maxTable,1);
            if ($tab != 0){
              revisTable($tab);}
              else { echo"404 mon ami";}
          }
          if(isset($_GET['revist1'])){
              
          if($_POST['revist1'] == $_SESSION['result1']){
              echo"tu as trouvé la bonne réponse";
          }else{echo "tu as échoué";}
        
          }


          ?>
      </div>

    </div>
    <div class="row">
      <div class="col s12">
        <p>Méli calcul *5</p>
        <form action="index.php" method='get'>
        <div class="input-field">
          <select class="browser-default" name="revis2">
            <?php
            for ($i=$minTable; $i<=$maxTable; $i++){
                        echo "<option value=".$i."> table du ".$i ."</option>";
            }
        
        ?>
          </select>
          </div>
          <!-- <input type="hidden" value="multi" name="typ"> -->
          <input type="submit" value="calcul" />
        </form>


        <?php
        if (isset($_GET['revis2'])){
          $tab = secur($_GET['revis2'], $minTable,$maxTable,1);
          if($tab !=0){
        revisTable($tab, 5);
          }else{echo "404 mon ami";}
      }
        
        
   
        if(isset($_POST['revist1'])&&isset($_POST['revist2'])){
          // if($_POST['typ'] == 'multi'){
            for($i=1; $i<=5; $i++){
            //echo $_SESSION['result'] ;
         if($_POST["revist$i"] == $_SESSION["result$i"]){
             echo"tu as trouvé la bonne réponse à la question $i <br />";
         }else{ echo "mauvaise réponse à la question $i <br />";}
            }
        // }
      }
    else if(isset($_POST['revist1']) && !isset($_POST['revist2'])){
        //echo $_SESSION['result'] ;
       if($_POST['revist1'] == $_SESSION['result1']){
         echo"tu as trouvé la bonne réponse";
     }else{ echo "mauvaise réponse à la question";}
    
    }
?>
      </div>
    </div>
  </div>






  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
  <script>
    // document.addEventListener('DOMContentLoaded', function () {
    //   var elems = document.querySelectorAll('select');
    //   var instances = M.FormSelect.init(elems, options);
    // });
  </script>
</body>

</html>