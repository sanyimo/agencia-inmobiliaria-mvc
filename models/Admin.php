<?php
namespace Model;

class Admin extends ActiveRecord {

    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'email', 'password'];

    public $id;
    public $email;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validar() {
        if(!$this->email) {
           self::$alertas['error'][] = "El correo electrónico no es válido";
        }

        if(!$this->password) {
            self::$alertas['error'][] = "La contraseña es necesaria";
        }
        return self::$alertas;
    }
    public function existeUsuario() {
        // Escapar el email para evitar inyección SQL
        $email = self::$db->real_escape_string($this->email);

        // Revisar si el usuario existe o no
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";
        $resultado = self::$db->query($query);

        if (!$resultado || $resultado->num_rows === 0) {
            self::$alertas['error'][] = "Este usuario no existe";
            return null; // Retornar null para indicar que no se encontró usuario
        }
        return $resultado;
    }
    public function comprobarPassword($resultado)
    {
        if (!$resultado) {
            return false; // Si no hay resultado, retornar false directamente
        }

        // Obtener el usuario de la consulta
        $usuario = $resultado->fetch_object();

        if (!$usuario) {
            self::$alertas['error'][] = "Usuario no encontrado";
            return false;
        }

        // Verificar si el password es correcto
        if (!password_verify($this->password, $usuario->password)) {
            self::$alertas['error'][] = 'Contraseña incorrecta';
            return false;
        }

        return true; // La contraseña es correcta
    }

    public function autenticar() {
        // El usuario esta autenticado
        session_start();

        // Llenar el arreglo de la sesión
        //ROLES????
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;

        header('Location: /admin');
        exit;
    }
}