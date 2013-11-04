<?php 
/*
# ------------------------------------------------------------------------
# Extensions for Joomla 2.5.x - Joomla 3.x
# ------------------------------------------------------------------------
# Copyright (C) 2011-2013 Ext-Joom.com. All Rights Reserved.
# @license - PHP files are GNU/GPL V2.
# Author: Ext-Joom.com
# Websites:  http://www.ext-joom.com 
# Date modified: 04/08/2013 - 13:00
# ------------------------------------------------------------------------
*/

// no direct access
defined('_JEXEC') or die;

$moduleclass_sfx		= $params->get('moduleclass_sfx');
$ext_group_id 			= $params->get('ext_group_id');
$ext_mode				= (int)$params->get('ext_mode', 0);
$ext_wide				= (int)$params->get('ext_wide', 0);
$ext_width				= (int)$params->get('ext_width', 220);
$ext_height				= (int)$params->get('ext_height', 400);
$ext_background_color	= $params->get('ext_background_color', '#FFFFFF');
$ext_text_color			= $params->get('ext_text_color', '#224662');
$ext_buttons_color		= $params->get('ext_buttons_color', '#5B7FA6');

require JModuleHelper::getLayoutPath('mod_ext_vk_community', $params->get('layout', 'default'));
echo JText::_(COP_JOOMLA);
?>