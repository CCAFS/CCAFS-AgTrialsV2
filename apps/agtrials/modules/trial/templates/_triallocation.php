<?php

if ($tb_trial->getIdTriallocation() != '') {
    $TbTriallocation = Doctrine::getTable('TbTriallocation')->findOneByIdTriallocation($tb_trial->getIdTriallocation());
    echo $TbTriallocation->getTrlcname();
}
?>