<?php

if ($tb_project->getIdDonor() != '') {
    $TbDonor = Doctrine::getTable('TbDonor')->findOneByIdDonor($tb_project->getIdDonor());
    echo $TbDonor->getDnrname();
}
?>