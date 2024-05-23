

<!-- https://www.php.net/manual/en/function.date -->


<?php

    //$date = date('Y-m-d');
    //echo "Data atual: ",$date;

    //$hora = date('H:i:s a');
    //echo "<br>A hora atual é: ",$hora;

    $date1 = "2024-06-23";
    $vencimento = "2024-06-23";

    //$diferenca = strtotime($vencimento) - strtotime($date1);//transforma a data em tipo tempo

    //$vencimento = floor($diferenca / (60*60*24)); //arredonda e trasforma a data em dia

    // if($vencimento > 0){
    //     echo "Você ainda tem $vencimento antes do vencimento";
    // } elseif($vencimento < 0){

    //     $vencimento2 = $vencimento * (-1);

    //     echo "O seu prazo venceu a $vencimento2 dia";
    // } else {
    //     echo "O seu prazo é hoje!";
    // }

    $dateForm = explode("-", $date1);

    $datafinal = $dateForm[2]."/".$dateForm[1]."/".$dateForm[0];

    echo $datafinal;

    //include e required

?>