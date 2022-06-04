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

    function crearSelectOpciones($opciones){

        if(!is_array($opciones)){
            echo 'El parámetro no es un array';
        }else{
            echo '<select>';
            for ($i=0; $i < count($opciones); $i++) {
                if(isset($opciones[$i][0]) && isset($opciones[$i][1])){
                    echo '<option value="'.$opciones[$i][0].'">'.$opciones[$i][1].'</option>';
                }
            }
            echo '</select>';
        }


    }

    function crearSelectAnios($anioInicio, $anioFin){

        if(!is_numeric($anioInicio) || !is_numeric($anioFin)){
            echo 'Los parámetros no son correctos';
        }else{

            if($anioInicio > $anioFin){
                $aux = $anioInicio;
                $anioInicio = $anioFin;
                $anioFin = $aux;
            }

            echo '<select>';
            for ($i=$anioInicio; $i <= $anioFin; $i++) {
                echo '<option value="'.$i.'">'.$i.'</option>';
            }
            echo '</select>';
        }


    }










































?>