<?php

    //cria pasta
    $pasta = "minha_pasta";
    //mkdir($pasta);

    //se pasta não for diretorio ele cria uma pasta
    // if(!is_dir($pasta)){
    //     echo "pasta criada";
    //     mkdir($pasta);
    // } else {
    //     echo "Pasta Ja existe";
    // }

    //criação de pasta com permissão
    if(!is_dir($pasta)){
        echo "pasta criada";
        mkdir($pasta, 755, true);

    } else { //se a pasta ja existir ele modifica o nome
        rename($pasta, "cavalo");
    }

    //para deletar pasta usar o rmdir

    
?>