<?php

if ($tb_variablesmeasured->getIdCrop() != '') {
    $TbCrop = Doctrine::getTable('TbCrop')->findOneByIdCrop($tb_variablesmeasured->getIdCrop());
    echo $TbCrop->getCrpname();
}
?>