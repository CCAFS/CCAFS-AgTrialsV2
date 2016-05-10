<?php

class sfGuardUserTable extends PluginsfGuardUserTable {

    public static function getInstance() {
        return Doctrine_Core::getTable('sfGuardUser');
    }

    public static function getRowsUsers() {
        return Doctrine_Query::create()->select("username, first_name, last_name, created_at,last_login, is_active")->from('sfGuardUser r');
    }

}