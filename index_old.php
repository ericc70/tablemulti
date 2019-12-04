<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Table de multiplication</h1>
    <p>pour les refractaires de la calculatrice</p>
<?php
    require 'function.php';
    afficheTable(3);
?>
<p>Selectionner votre table dans la liste</p>
<form action="index.php" method='get'>
    <select name="table" >
<?php
    for ($i=1; $i<=10; $i++){

        echo "<option value=".$i."> table du ".$i ."</option>";
    }

?>
</select>
<input type="submit" value="calcul" />
</form>
<?php
if (isset($_GET['table'])){
    afficheTable($_GET['table']);

}

?>
<h2>Selectionnes tes tables dans la liste</h2>
<form action="index.php" method='get'>

<?php
    for ($i=1; $i<=10; $i++){

        echo "<input type='checkbox' name='chk[]' value=".$i."> table du ".$i ;
    }

?>

<input type="submit" value="calcul" />


</form>
<?php

if (isset($_GET['chk'])){


    foreach($_GET['chk'] as $val){
        afficheTable($val);

    }
}

?>

<h2>méli calcul</h2>
<form action="index.php" method='get'>
    <select name="revis" >
<?php
    for ($i=1; $i<=10; $i++){

        echo "<option value=".$i."> table du ".$i ."</option>";
    }

?>
</select>
<input type="submit" value="calcul" />
</form>
<?php
if(isset($_GET['revis'])){
    revisTable($_GET['revis']);
}
if(isset($_POST['revist1'])){
    //echo $_SESSION['result'] ;
 if($_POST['revist1'] == $_SESSION['result1']){
     echo"tu as trouvé la bonne réponse";
 }

}


?>

<h2>oseras tu defier les 5 questions de la mort subite</h2>

<form action="index.php" method='get'>
    <select name="revis2" >
<?php
    for ($i=1; $i<=10; $i++){

        echo "<option value=".$i."> table du ".$i ."</option>";
    }

?>
</select>
<input type="submit" value="calcul" />
</form>


<?php
if (isset($_GET['revis2'])){
revisTable($_GET['revis2'], 5);}


if(isset($_POST['revist1'])){
    for($i=1; $i<=5; $i++){
    //echo $_SESSION['result'] ;
 if($_POST["revist$i"] == $_SESSION["result$i"]){
     echo"tu as trouvé la bonne réponse à la question $i <br />";
 }else{ echo "mauvaise réponse à la question $i <br />";}
    }
}
?>

</body>
</html>