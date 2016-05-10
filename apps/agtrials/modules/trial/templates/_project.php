<?php

if ($tb_trial->getIdProject() != '') {
    $TbProject = Doctrine::getTable('TbProject')->findOneByIdProject($tb_trial->getIdProject());
    echo $TbProject->getPrjname();
}
?>