<?php
class ClientDB extends Client {
    private $_db;
    private $_array = array();
    public function __construct($db) {
        $this->_db = $db;
    }
    public function getAllClient() {
        try {
            $query = "select * from client order by nom";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            while ($data = $resultset->fetch()) {
                $_array[] = $data;
            }
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        if (!empty($_array)) {
            return $_array;
        } else {
            return null;
        }
        
    }
}