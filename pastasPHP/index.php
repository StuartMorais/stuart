<?php

    //link da documentação do php https://www.php.net/manual/en/function.chmod.php // https://www.php.net/manual/en/function.fopen



    //cria pasta
    $pasta = "minha_pasta/";
    //mkdir($pasta);

    //se pasta não for diretorio ele cria uma pasta
    // if(!is_dir($pasta)){
    //     echo "pasta criada";
    //     mkdir($pasta);
    // } else {
    //     echo "Pasta Ja existe";
    // }

    //criação de pasta com permissão/ 0777 liberado para geral 
    if(!is_dir($pasta)){
        echo "pasta criada";
        mkdir($pasta, 0755, true);

    } else { //se a pasta ja existir ele modifica o nome
        //rename($pasta, "pastaRe");
        
        //para deletar pasta usar o rmdir
    }


    //$nomeArquivo = date('y-m-d-H-i-s').".txt"; //criar um arquivo txt com o nome sendo a data e hora
    $nomeArquivo = "meuArquivo.txt";
    $arquivo = fopen($pasta.$nomeArquivo, 'a+');//abre um arquivo em uma determinada pasta
                                                // o a+ Open for reading and writing; place the file pointer at the end of the file. If the file does not exist, attempt to create it. In this mode, fseek() only affects the reading position, writes are always appended.
    fwrite($arquivo, "Escrito".PHP_EOL);        // escreve no arquivo
    fwrite($arquivo, "Escrito2".PHP_EOL);       //pula linha
    fclose($arquivo);                           //fecha o arquivo

    $caminhoArquivo = $pasta.$nomeArquivo;

    if(file_exists($caminhoArquivo) && is_file($caminhoArquivo)){//se arquivo existe e se arquivo é um arquivo
                                                                //file_exists funciona tanto para pasta quanto para arquivo
                                                                //is_file pergunta se é um arquivo

        $abrirArquivo = fopen($caminhoArquivo, 'r');            // abre o arquivo no modo r

        while(!feof($abrirArquivo)){                             //avisa quando chega no fim do arquivo
            echo fgets($abrirArquivo)."<br>";                           //imprime a linha
        }
    }

    if(is_dir($pasta)){
        foreach(scandir($pasta) as $lixo){//vai atribuir todos os arquivos dentro da pasta apra a variavel arquivo
            $caminho = $pasta.$lixo; //caminho recebe o caminho do arquivo dentro da pasta

            if(is_file($caminho)){
                unlink($caminho); //deleta os arquivos armazendos na variavel
            }
        }
        rmdir($pasta); // so pode deletar pastas casa a pasta esteja vazia
    }

?>