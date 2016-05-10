<?php

if ($tb_variablesmeasured->getIdTraitclass() != '') {
    $TbTraitclass = Doctrine::getTable('TbTraitclass')->findOneByIdTraitclass($tb_variablesmeasured->getIdTraitclass());
    echo $TbTraitclass->getTrclname();
}
?>