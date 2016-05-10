<?php

if ($tb_institution->getIdCountry() != '') {
    $TbAdministrativedivision = Doctrine::getTable('TbAdministrativedivision')->findOneByIdAdministrativedivision($tb_institution->getIdCountry());
    echo $TbAdministrativedivision->getDmdvname();
}
?>