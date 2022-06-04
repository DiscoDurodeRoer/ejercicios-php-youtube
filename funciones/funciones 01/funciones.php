<?php

    function generarNumeroAleatorio($inicio, $fin){

        if(!is_numeric($inicio) || !is_numeric($fin)){
            echo 'Los parametros deben ser numéricos<br/>';
            return 0;
        }else{
            return rand($inicio, $fin);
        }


    }


    function factorial($num){

        if (!is_numeric($num)) {
            echo 'Los parametros deben ser numéricos<br/>';
            return 0;
        }else{
            $resultado = $num;
            for ($i=$num-1; $i > 1 ; $i--) { 
                $resultado*=$i;
            }

           return $resultado;
        }

    }


    function generarLetraAleatoria(){

        $eleccion = generarNumeroAleatorio(1,2);

        if($eleccion === 1){

            // Minuscula
            return chr(generarNumeroAleatorio(97,122));
        }else{

            //Mayuscula
            return chr(generarNumeroAleatorio(65,90));
        }

    }


