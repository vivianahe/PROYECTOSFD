<?php
class Usuario {
    
    private $idUsuario;
    private $usuario;
    private $password;
    private $rol;
    private $persona;

    
    function __construct($usuario=null, $password=null, $rol=null, Persona $persona=null) {

        $this->usuario= $usuario;
        $this->password = $password;
        $this->rol = $rol;
        $this->persona = $persona;
    }
    
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    public function getPersona()
    {
        return $this->persona;
    }


    public function setPersona($persona)
    {
        $this->persona = $persona;

        return $this;
    }
}
