<?php

namespace Model;

class Usuario extends ActiveRecord{
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'email', 'password', 'token', 'confirmado'];

    public $id;
    public $nombre;
    public $email; 
    public $password;
    public $password2;
    public $token;
    public $confirmado;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->password_actual = $args['password_actual'] ?? '';
        $this->password_nuevo = $args['password_nuevo'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->confirmado = $args['confirmado'] ?? 0;
    }

    //Validación para login
    public function validarLogin(){
        if(!$this->email){
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            self::$alertas['error'][] = 'Email no Válido';
        }
        if(!$this->password){
            self::$alertas['error'][] = 'El Password no Puede ir Vacío';
        }
        return self::$alertas;
    }

    //Validación para cuentas nuevas
    public function validarNuevaCuenta(){
        if(!$this->nombre){
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->email){
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'][] = 'El Password no Puede ir Vacío';
        }
        if(strlen($this->password) < 6){
            self::$alertas['error'][] = 'El Password debe tener al menos 6 caracteres';
        }
        if($this->password !== $this->password2){
            self::$alertas['error'][] = 'Los Passwords son Diferentes';
        }
        return self::$alertas;
    }   

    //Validar el email
    public function validarEmail(){
        if(!$this->email){
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }

        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            self::$alertas['error'][] = 'Email no Válido';
        }

        return self::$alertas;
    }

    //Validar el password
    public function validarPassword(){
        if(!$this->password){
            self::$alertas['error'][] = 'El Password no Puede ir Vacío';
        }
        if(strlen($this->password) < 6){
            self::$alertas['error'][] = 'El Password debe tener al menos 6 caracteres';
        }
        return self::$alertas;
    }

    public function validar_perfil(){
        if(!$this->nombre){
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->email){
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }
        
        return self::$alertas;
    }

    public function nuevo_password() : array{
        if(!$this->password_actual){
            self::$alertas['error'][] = 'El Password Actual no Puede ir Vacío';
        }
        if(!$this->password_nuevo){
            self::$alertas['error'][] = 'El Nuevo Password no Puede ir Vacío';
        }
        if(strlen($this->password_nuevo) < 6){
            self::$alertas['error'][] = 'El Nuevo Password debe tener al menos 6 caracteres';
        }
        return self::$alertas;
    }

    //Comprobar el password
    public function comprobar_password() : bool{
        return password_verify($this->password_actual, $this->password);
    }

    //Hashea el password
    public function hashPassword() : void{
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    //Generar un token único
    public function crearToken() : void{
        $this->token = uniqid();
    }   
}