<?php
include_once '../models/CompanyModel.inc.php';

class CompanyController {

    public function insertCompany($conn, $nombre){
   
     CompanyModel::insertCompany($conn, $nombre);
    
        
    }

    public function getCompanyByName($conn, $nombre){
        CompanyModel::getCompanyByName($conn, $nombre);
    }

}
?>

