<?php
function afficheTable($table){
    for($i=0; $i<=10; $i++){
        $result=(int)$table*$i;
        echo $i .' * '. (int)$table .' = ' . $result .'<br />';}

}

function revisTable($choix, $n=1){
    
    echo "<form action='index.php' method='post' >";
    for ($i=1; $i<=$n; $i++){
        $rand = random_int(1,10); 

    echo $choix ." * ". $rand . " = " ;
         echo "<input type='text' name='revist$i' >";
         $_SESSION["result$i"] = $choix * $rand;

    };
    echo"<input type='submit' value='calcul' />";
    echo "</form>";
    //session_start();
  

}

function secur($dataEnt ,$dataMin, $dataMax, $dataType){

        if ($dataType == 1) //is int
        {
            $dataEnt=(int)$dataEnt;
            if($dataEnt >= $dataMin && $dataEnt <= $dataMax)
            {
                return $dataEnt;
            }
            else
            {
                return 0;
            }
        }
}