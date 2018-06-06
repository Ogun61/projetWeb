<?php
class CommandeDB extends Commande {
    private $_db;
    private $_commande = array();
    public function __construct($cnx) {
        $this->_db = $cnx;
    }
    public function ajoutCommande(array $data) {
        try {
            $query = "insert into commande (id_client,id_prod,adresse,cp) values (:id_client,:id_prod,:adresse,:cp)";
            //var_dump($query);
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_client', $data['id_client'], PDO::PARAM_STR);
            $resultset->bindValue(':id_prod', $data['id_prod'], PDO::PARAM_STR);
            $resultset->bindValue(':adresse', $data['adresse'], PDO::PARAM_STR);
            $resultset->bindValue(':cp', $data['cp'], PDO::PARAM_STR);
            $resultset->execute();
            //$retour = $resultset->fetchColumn(0);
            //return $retour;
        } catch (PDOException $e) {
            print "<br/>Echec de l'insertion";
            print $e->getMessage();
        }
    }
    function getCommandeClient($id) {
        try {
            $query = "SELECT p.nom,p.image,c.id_com,c.id_client,c.id_prod,p.prix FROM COMMANDE c join produit p on(p.id_prod=c.id_prod) where c.ID_CLIENT=:id_client";
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
    public function suppCommande($id) {
             try {
            $query = "delete from commande where id_com=:id_com";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_com', $id);
            $resultset->execute();
            $data = $resultset->fetchAll();
            //$retour = $resultset->fetchColumn(0);
            //return $retour;
        } catch (PDOException $e) {
            print "<br/>Echec de l'insertion";
            print $e->getMessage();
        }
    }

}