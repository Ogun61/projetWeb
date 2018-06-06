<?php
class ProduitDB extends Produit {
    private $_db;
    private $_array = array();
    public function __construct($db) {
        $this->_db = $db;
    }
    public function getProduit() {
        try {
            $query = "select * from produit order by prix asc";
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
     function getProduitId($id) {
        try {
            $query = "SELECT * FROM produit where id_prod=:id_prod";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_prod', $id);
            $resultset->execute();
            $data = $resultset->fetchAll();
//var_dump($data);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        while ($data = $resultset->fetch()) {
            try {
                $_array[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_array;
    }

    public function getProduitP() {
        try {
            $query = "select * from produit where categorie = 'piece'";
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

        public function getProduitE() {
        try {
            $query = "select * from produit where categorie = 'ent'";
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

