<?php

if ($tb_variety->getIdCrop() != '') {
    $TbCrop = Doctrine::getTable('TbCrop')->findOneByIdCrop($tb_variety->getIdCrop());
    echo $TbCrop->getCrpname();
}
?>