[?php

/**
* <?php echo $this->getModuleName() ?> module configuration.
*
* @package    ##PROJECT_NAME##
* @subpackage <?php echo $this->getModuleName() . "\n" ?>
* @author     ##AUTHOR_NAME##
* @version    SVN: $Id: helper.php 12482 2008-10-31 11:13:22Z fabien $
*/
//ICONOS DE LAS ACCIONES - HESPINOSA
class Base<?php echo ucfirst($this->getModuleName()) ?>GeneratorHelper extends sfModelGeneratorHelper
{
static protected $icons = null;

public function linkToShow($object, $params)
{
return '<li class="sf_admin_action_show">&ensp;'.link_to('<button type="button" title=" Show " class="Button-Action-Down">&ensp;Show&ensp;</button>', $this->getUrlForAction('show'), $object).'</li>';
}

public function linkToNew($params)
{
return '<li class="sf_admin_action_new">&ensp;'.link_to('<button type="button" title=" New " class="Button-Action-Down">&ensp;New&ensp;</button>', $this->getUrlForAction('new')).'</li>';
}

public function linkToEdit($object, $params)
{
return '<li class="sf_admin_action_edit">&ensp;'.link_to('<button type="button" title=" Edit " class="Button-Action-Down">&ensp;Edit&ensp;</button>', $this->getUrlForAction('edit'), $object).'</li>';
}

public function linkToDelete($object, $params)
{
$params['params'] = UIHelper::arrayToString(array('class' => UIHelper::getClasses($params['params']).' ui-priority-secondary'));

if ($object->isNew())
{
return '';
}

return '<li class="sf_admin_action_delete">&ensp;'.link_to('<button type="button" title=" Delete " class="Button-Action-Down">&ensp;Delete&ensp;</button>', $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])).'</li>';
}

public function linkToList($params)
{
return '<li class="sf_admin_action_list">&ensp;'.link_to('<button type="button" title=" List " class="Button-Action-Down">&ensp;List&ensp;</button>', '@'.$this->getUrlForAction('list')).'</li>';
}

public function linkToSave($object, $params)
{
$params['ui-icon'] = $this->getIcon('save', $params);
$params['ui-icon'] = '';
return '<li class="sf_admin_action_save">&ensp;<button type="submit" title=" Save " class="Button-Action-Down">&ensp;'. __($params['label'], array(), 'sf_admin').'&ensp;</button></li>';
}

public function linkToSaveAndAdd($object, $params){ }

public function getUrlForAction($action)
{
return 'list' == $action ? '<?php echo $this->params['route_prefix'] ?>' : '<?php echo $this->params['route_prefix'] ?>_'.$action;
}

protected function getIcon($type, $params)
{
return empty($params['ui-icon']) ? UIHelper::getIcon($type) : $params['ui-icon'];
}
}
