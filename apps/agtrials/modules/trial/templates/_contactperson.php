<?php

if ($tb_trial->getIdContactperson() != '') {
    $TbContactperson = Doctrine::getTable('TbContactperson')->findOneByIdContactperson($tb_trial->getIdContactperson());
    echo "{$TbContactperson->getCnprfirstname()} {$TbContactperson->getCnprlastname()}";
}
?>