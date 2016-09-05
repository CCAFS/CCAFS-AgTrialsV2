<?php

class sfGuardUserApilogTable extends Doctrine_Table {

    public static function getInstance() {
        return Doctrine_Core::getTable('sfGuardUserApilog');
    }

    public static function addGuardUserApilog($user_id, $api, $apiurl) {
        if (($user_id != "") && ($api != "") && ($apiurl != "")) {
            $NowDate = date("Y-m-d") . " " . date("H:i:s");
            $sfGuardUserApilog = new sfGuardUserApilog();
            $sfGuardUserApilog->setApi($api);
            $sfGuardUserApilog->setApiurl($apiurl);
            $sfGuardUserApilog->setUserId($user_id);
            $sfGuardUserApilog->setCreatedAt($NowDate);
            $sfGuardUserApilog->save();
        }
    }

}
