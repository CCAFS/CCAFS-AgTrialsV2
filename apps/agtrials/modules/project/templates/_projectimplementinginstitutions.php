<?php

$CountryName = "";
if ($tb_project->getIdProjectimplementinginstitutions() != '') {
    $TbInstitution = Doctrine::getTable('TbInstitution')->findOneByIdInstitution($tb_project->getIdProjectimplementinginstitutions());
    if ($TbInstitution->getIdCountry() != '') {
        $TbAdministrativedivision = Doctrine::getTable('TbAdministrativedivision')->findOneByIdAdministrativedivision($TbInstitution->getIdCountry());
        $CountryName = $TbAdministrativedivision->getDmdvname();
    }
    echo $TbInstitution->getInsname() . " - " . $CountryName;
}
?>