<?php

$CountryName = "";
if ($tb_contactperson->getIdInstitution() != '') {
    $TbInstitution = Doctrine::getTable('TbInstitution')->findOneByIdInstitution($tb_contactperson->getIdInstitution());
    if ($TbInstitution->getIdCountry() != '') {
        $TbAdministrativedivision = Doctrine::getTable('TbAdministrativedivision')->findOneByIdAdministrativedivision($TbInstitution->getIdCountry());
        $CountryName = $TbAdministrativedivision->getDmdvname();
    }
    echo $TbInstitution->getInsname() . " - " . $CountryName;
}
?>