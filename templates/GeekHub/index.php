<?php
/**
 * @package                Joomla.Site
 * @subpackage	Templates.beez_20
 * @copyright        Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license                GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.filesystem.file');

// check modules
$showRightColumn	= ($this->countModules('position-3') or $this->countModules('position-6') or $this->countModules('position-8'));
$showbottom			= ($this->countModules('position-9') or $this->countModules('position-10') or $this->countModules('position-11'));
$showleft			= ($this->countModules('position-4') or $this->countModules('position-7') or $this->countModules('position-5'));

if ($showRightColumn==0 and $showleft==0) {
	$showno = 0;
}

JHtml::_('behavior.framework', true);

// get params
$color				= $this->params->get('templatecolor');
$logo				= $this->params->get('logo');
$navposition		= $this->params->get('navposition');
$app				= JFactory::getApplication();
$doc				= JFactory::getDocument();
$templateparams		= $app->getTemplate(true)->params;

$doc->addStyleSheet($this->baseurl.'/templates/system/css/system.css');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/position.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/layout.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/blog.css', $type = 'text/css', $media = 'blog');

$files = JHtml::_('stylesheet', 'templates/'.$this->template.'/css/general.css', null, false, true);
if ($files):
	if (!is_array($files)):
		$files = array($files);
	endif;
	foreach($files as $file):
		$doc->addStyleSheet($file);
	endforeach;
endif;

$doc->addStyleSheet('templates/'.$this->template.'/css/'.htmlspecialchars($color).'.css');
if ($this->direction == 'rtl') {
	$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/template_rtl.css');
	if (file_exists(JPATH_SITE . '/templates/' . $this->template . '/css/' . $color . '_rtl.css')) {
		$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/'.htmlspecialchars($color).'_rtl.css');
	}
}

$doc->addScript($this->baseurl.'/templates/'.$this->template.'/javascript/md_stylechanger.js', 'text/javascript');
$doc->addScript($this->baseurl.'/templates/'.$this->template.'/javascript/hide.js', 'text/javascript');



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<jdoc:include type="head" />

<!--javascript  -->
<script type="text/javaScript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/javascript/flipclock.min.js"></script>
<script type="text/javaScript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/javascript/jquery-1.6.4.min.js"></script>
<script type="text/javaScript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/javascript/prefixfree.min.js"></script>

<!--[if lte IE 6]>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ieonly.css" rel="stylesheet" type="text/css" />
<?php if ($color=="personal") : ?>

<?php endif; ?>
<![endif]-->

<!--[if IE 7]>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ie7only.css" rel="stylesheet" type="text/css" />
<![endif]-->

<script type="text/javascript">
	var big ='<?php echo (int)$this->params->get('wrapperLarge');?>%';
	var small='<?php echo (int)$this->params->get('wrapperSmall'); ?>%';
	var altopen='<?php echo JText::_('TPL_BEEZ2_ALTOPEN', true); ?>';
	var altclose='<?php echo JText::_('TPL_BEEZ2_ALTCLOSE', true); ?>';
	var bildauf='<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/plus.png';
	var bildzu='<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/minus.png';
	var rightopen='<?php echo JText::_('TPL_BEEZ2_TEXTRIGHTOPEN', true); ?>';
	var rightclose='<?php echo JText::_('TPL_BEEZ2_TEXTRIGHTCLOSE', true); ?>';
	var fontSizeTitle='<?php echo JText::_('TPL_BEEZ2_FONTSIZE', true); ?>';
	var bigger='<?php echo JText::_('TPL_BEEZ2_BIGGER', true); ?>';
	var reset='<?php echo JText::_('TPL_BEEZ2_RESET', true); ?>';
	var smaller='<?php echo JText::_('TPL_BEEZ2_SMALLER', true); ?>';
	var biggerTitle='<?php echo JText::_('TPL_BEEZ2_INCREASE_SIZE', true); ?>';
	var resetTitle='<?php echo JText::_('TPL_BEEZ2_REVERT_STYLES_TO_DEFAULT', true); ?>';
	var smallerTitle='<?php echo JText::_('TPL_BEEZ2_DECREASE_SIZE', true); ?>';
</script>
 <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
          <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
           <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template.css" type="text/css" />


    <?php
    $menu = & JSite::getMenu();
    //Получили главное меню
    //
    //Если мы находимся в главном пунтке,
    if ($menu->getActive() == $menu->getDefault()) {
        //то переменная fpage будет хранить единицу.
     $fpage="1";
   } ?>
    <?php
   if ($fpage=="1") $bodyclass=""; else $bodyclass="inner";
    //?>


    <?php

    $currentMenuId = JSite::getMenu()->getActive()-> id;
    if ($currentMenuId == "103") $divclass=""; else $divclass="details" ;

    ?>



</head>


        <body  class="<?php echo $bodyclass; ?>"  >
                <div id="wrap">
     <div id="header">
       <div class="nav"><jdoc:include type="modules" name="position-1"/> </div>
             <ul class="links">
                <li class="fb">  <a href="http://www.facebook.com/pages/GeekHub/158983477520070">facebook</a> </li>
                <li class="vk"> <a href="http://vkontakte.ru/geekhub">Вконтакте</a> </li>
                <li class="tw"> <a href="http://twitter.com/#!/geek_hub">twitter</a> </li>
                <li class="yb"> <a href="http://www.youtube.com/user/GeekHubchannel">youtube</a> </li>
            </ul>
                            <h1><a href="/">GeekHub</a></h1>
                            <span class="line"></span>
                            <img alt="splash" src="/templates/GeekHub/images/splash.png"></img>
        <p class="registration">На жаль, реєстрацію на сезон 2013-2014 зачинено. Чекаємо на Вас у наступному році.</p>

        </div>

                <div id="content">
                <div class="contacts"> <jdoc:include type="modules" name="position-7" /> </div>
                <div class="home">
                <div class="sidebar"> <jdoc:include type="modules" name="position-6" /> </div>
                <div class="<?php echo $divclass ?>">  <jdoc:include type="component" />
                <div id="social_share">
                <jdoc:include type="modules" name="position-2" />
                <jdoc:include type="modules" name="position-4" />
                <jdoc:include type="modules" name="position-5" />
        </div>
            </div>
                 </div>
            <ul id="footer">
                        <li> <jdoc:include type="modules" name="position-3" /> </li>
                        <li>© Copyright 2011</li>
            </ul>
                 </div>
        </div>
</body>


</html>
