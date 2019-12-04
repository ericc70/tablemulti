<?php

require 'function.php';

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
        <li><a href="sass.html">table du 3</a></li>
        <li><a href="badges.html">select table</a></li>
        <li><a href="collapsible.html">jeu </a></li>
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
  <div class="container">
    <div class="card-panel teal lighten-2">Table 3</div>
    <div class="row">
      <div class="col s4 offset-s4">
        <?php
        afficheTable(3);
?>
      </div>

    </div>

  </div>
  <div class="container">
    <div class="card-panel teal lighten-2">Selection ta/tes tables</div>

    <div class="row">

      <div class="col s4">
        <p>selection une table</p>
        <form action="index.php" method='get'>
          

            <div class="input-field">
              <select class="browser-default" name="table">

                <?php
         
             for ($i=1; $i<=10; $i++){

              echo "<option value=".$i."> table du ".$i ."</option>";
                 }

              ?>
              </select>
            </div>
            <input type="submit" value="calcul" />
        </form>
      </div>

      <div class="col s4">
        <p>Selection plusieurs table</p>
        <form action="index.php" method='get'>
        
          <?php
    for ($i=1; $i<=10; $i++){

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
  afficheTable($_GET['table']);

}
if (isset($_GET['chk'])){


  foreach($_GET['chk'] as $val){
    echo"Table du ".$val."<br />" ;
      afficheTable($val);

  }
}

?>
      </div>
    </div>
  </div>

  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });
  </script>
</body>

</html>