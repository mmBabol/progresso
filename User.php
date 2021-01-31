<?php
class User {
    private $data = array();
    private $db;
    public static $REMOTE_USER = '';
    private $unchangable_vars = array ('seq', 'username', 'creation_date' , 'added_by');

    public function __construction ($db, $user, $fields = array()) {
        $this->db = &$db;
        global $REMOTE_USER;
        if ($REMOTE_USER == '') {
            $REMOTE_USER = 'Admin';
        }
        $this->REMOTE_USER = $REMOTE_USER;
        if (is_object($user)) {
            ;
        } elseif (is_array($user)) {
            $user = (object)$user;
        } elseif ($user == '') {
            $user = $REMOTE_USER;
        }

    }

    public __destruct() {
        unset($this->data);
    }

    public function __get($var) {
// cant allow function to get every variable, need to limit this. Create an array of values that cannot be grabbed
//        if (array_key_exists($var, $this->data)) {
//            $this->data[]
//        }
        if (!array_key_exists($var, $this->data)) {
            $desc = "DESC user_db.users ?";
            if ($stmt = $db->prepare($desc)) {
                $stmt->bind_param("s", $var);
                $stmt->execute();
                $stmt->bind_result();
            }
        }
        return $this->data[$var];
    }

    public function __set($var, $value) {
        if (in_array($var, $this->unchangable_vars)) {
            return false;
        }
        if (!array_key_exists($var, this->data)) {
            ;
        }
    }

    public function create($var, $value) {

    }

}
?>
