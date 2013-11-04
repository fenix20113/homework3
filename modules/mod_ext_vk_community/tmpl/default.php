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
?>
<div class="mod_ext_vk_community <?php echo $moduleclass_sfx ?>">	
	<script type="text/javascript" src="//vk.com/js/api/openapi.js"></script>
	<!-- VK Widget -->
	<div id="vk_groups"></div>
	<script type="text/javascript">
	VK.Widgets.Group("vk_groups", {mode: <?php echo $ext_mode;?>, wide: <?php echo $ext_wide;?>, width: "<?php echo $ext_width;?>", height: "<?php echo $ext_height;?>", color1: '<?php echo substr($ext_background_color, 1); ?>', color2: '<?php echo substr($ext_text_color, 1); ?>', color3: '<?php echo substr($ext_buttons_color, 1); ?>'}, <?php echo $ext_group_id;?>);
	</script>	
	<div style="clear:both;"></div>
</div>