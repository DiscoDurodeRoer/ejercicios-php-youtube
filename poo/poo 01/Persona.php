<?php

class Persona {

    private $nombre;
    private $apellidos;
    private $edad;

    function __construct($nombre, $apellidos, $edad)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
    }

    function __get($propiedad)
    {
        if(property_exists($this, $propiedad)){
            return $this->$propiedad;
        }
    }

    function __set($propiedad, $valor){
        if(property_exists($this, $propiedad)){
            $this->$propiedad = $valor;
        }
    }

    function mayorEdad(){
        return $this->edad >= 18;
    }

    function nombreCompleto(){
        return $this->nombre . " " . $this->apellidos;
    }

}

$persona = new Persona("Fernando", "Ureña Gomez", 29);

if($persona->mayorEdad()){
    echo $persona->nombreCompleto(). " es mayor de edad";
}else{
    echo $persona->nombreCompleto(). " no es mayor de edad";
}

echo $persona->nombr2;
?>