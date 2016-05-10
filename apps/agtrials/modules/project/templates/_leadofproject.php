<?php

if ($tb_project->getIdLeadofproject() != '') {
    $TbContactperson = Doctrine::getTable('TbContactperson')->findOneByIdContactperson($tb_project->getIdLeadofproject());
    echo "{$TbContactperson->getCnprfirstname()} {$TbContactperson->getCnprmiddlename()} {$TbContactperson->getCnprlastname()}";
}
?>