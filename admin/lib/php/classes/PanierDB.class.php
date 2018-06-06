<?php
class PanierDB extends Panier {
    private $_db;
    private $_commande = array();
    public function __construct($cnx) {
        $this->_db = $cnx;
    }
    public function ajoutPanier(array $data) {
        try {
            $query = "insert into panier (id_client,id_prod) values (:id_client,:id_prod)";
            //var_dump($query);
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_client', $data['id_client'], PDO::PARAM_STR);
            $resultset->bindValue(':id_prod', $data['id_prod'], PDO::PARAM_STR);
            $resultset->execute();
            //$retour = $resultset->fetchColumn(0);
            //return $retour;
        } catch (PDOException $e) {
            print "<br/>Echec de l'insertion";
            print $e->getMessage();
        }
    }
    function getPanierClient($id) {
        try {
            $query = "SELECT p.nom,p.image,pan.id_pan,pan.id_client,pan.id_prod,p.prix FROM panier pan join produit p on(p.id_prod=pan.id_prod) where pan.ID_CLIENT=:id_client";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_client', $id);
            $resultset->execute();
            $data = $resultset->fetchAll();
//var_dump($data);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        while ($data = $resultset->fetch()) {
            try {
                $_infoArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        if (!empty($_infoArray)) {
            return $_infoArray;
        }
        
    }

    function getPClient($id) {
        try {
            $query = "SELECT c.adresse,c.code_postal FROM client c join panier pan on(pan.id_client=c.id) where pan.ID_CLIENT=:id_client";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_client', $id);
            $resultset->execute();
            $data = $resultset->fetchAll();
//var_dump($data);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        while ($data = $resultset->fetch()) {
            try {
                $_infoArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        if (!empty($_infoArray)) {
            return $_infoArray;
        }
        
    }
    public function suppPanier($id) {
             try {
            $query = "delete from panier where id_pan=:id_pan";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_pan', $id);
            $resultset->execute();
            $data = $resultset->fetchAll();
            //$retour = $resultset->fetchColumn(0);
            //return $retour;
        } catch (PDOException $e) {
            print "<br/>Echec de la suppression";
            print $e->getMessage();
        }
    }

    public function viderPanier() {
             try {
            $query = "TRUNCATE TABLE panier";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $data = $resultset->fetchAll();
            //$retour = $resultset->fetchColumn(0);
            //return $retour;
        } catch (PDOException $e) {
            print "<br/>Echec de la suppression";
            print $e->getMessage();
        }
    }

}