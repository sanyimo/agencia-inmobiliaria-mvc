<?php

namespace Model;

class Vendedor extends ActiveRecord {
    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'imagen', 'telefono', 'email'];

    public $id;
    public $nombre;
    public $apellido;
    public $imagen;
    public $telefono;
    public $email;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->email = $args['email'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error'][] = "El nombre es necesario";
        }
        if(!$this->apellido) {
            self::$alertas['error'][] = "El apellido es necesario";
        }
        if(!$this->imagen) {
            self::$alertas['error'][] = "La imagen es necesaria";
        }
        if(!$this->telefono) {
            self::$alertas['error'][] = "El teléfono es necesario";
        }
        if(!$this->email) {
            self::$alertas['error'][] = "El E-mail es necesario";
        }
        return self::$alertas;
    }
}