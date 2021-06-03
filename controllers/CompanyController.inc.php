<?php
include_once '../models/CompanyModel.inc.php';

class CompanyController {

    public function insertCompany($conn, $nombre){
   
     CompanyModel::insertCompany($conn, $nombre);
    
        
    }

    public function getCompanyByName($conn, $nombre){
       $empresa = CompanyModel::getCompanyByName($conn, $nombre);
       return $empresa;
    }

    public function checkCompany($conn, $nombre){
        $empresa = CompanyModel::getCompanyByName($conn, $nombre);
        return $empresa;
    }

}
?>

