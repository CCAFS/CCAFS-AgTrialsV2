<?php

class TbVariablesmeasuredTable extends Doctrine_Table {

    public static function getInstance() {
        return Doctrine_Core::getTable('TbVariablesmeasured');
    }

    public static function retrieveForSelect($dato, $limit) {
        $dato = ucfirst(strtolower($dato));
        $consulta = Doctrine_Query::create()
                ->from('TbVariablesmeasured')
                ->andWhere('vrmsname like ?', '%' . $dato . '%')
                ->addOrderBy('vrmsname')
                ->limit($limit);
        $valores = array();
        foreach ($consulta->execute() as $valor) {
            $valores[$valor->getIdVariablesmeasured()] = (string) $valor;
        }
        return $valores;
    }

    public static function addVariablesmeasured($id_crop, $id_traitclass, $vrmsname, $vrmsshortname, $vrmsdefinition, $vrmnmethod, $vrmsunit, $id_user) {
        $id_variablesmeasured = "";
        $QUERY00 = Doctrine_Query::create()
                ->from("TbVariablesmeasured T")
                ->where("UPPER(T.vrmsname) = UPPER('$vrmsname')");
        $Resultado00 = $QUERY00->execute();
        if (count($Resultado00) < 1) {
            $Variablesmeasured = new TbVariablesmeasured();
            $Variablesmeasured->setIdCrop($id_crop);
            $Variablesmeasured->setIdTraitclass($id_traitclass);
            $Variablesmeasured->setVrmsname($vrmsname);
            $Variablesmeasured->setVrmsshortname($vrmsshortname);
            $Variablesmeasured->setVrmsdefinition($vrmsdefinition);
            $Variablesmeasured->setVrmnmethod($vrmnmethod);
            $Variablesmeasured->setVrmsunit($vrmsunit);
            $Variablesmeasured->setIdUser($id_user);
            $Variablesmeasured->save();
            $id_variablesmeasured = $Variablesmeasured->getIdVariablesmeasured();
        }
        return $id_variablesmeasured;
    }

}
