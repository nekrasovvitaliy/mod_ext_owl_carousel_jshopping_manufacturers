<?php 
	// 
	defined('_JEXEC') or die;
	
	
	// 
	// 
	error_reporting(error_reporting() & ~E_NOTICE);
	// 
	// 
	if (!file_exists(JPATH_SITE.'/components/com_jshopping/bootstrap.php'))
	{
		// 
		// 
		throw new Exception('Please install component \"joomshopping\"', 500);
    }
	// 
	// 
	require_once(JPATH_SITE.'/components/com_jshopping/bootstrap.php');
	// 
	// 
	$app = JFactory::getApplication();
	// 
	// 
	JSFactory::loadCssFiles();
	// 
	// 
	JSFactory::loadLanguageFile();
	// 
	// 
	$jshopConfig = JSFactory::getConfig(); 
	// 
	// 
	$document = JFactory::getDocument();
	// 
	// 
	$document->addStyleSheet(JURI::base().'modules/mod_ext_owl_carousel_jshopping_manufacturers/assets/css/owl.carousel.css');
	// 
	// 
	$document->addStyleSheet(JURI::base().'modules/mod_ext_owl_carousel_jshopping_manufacturers/assets/css/owl.theme.css');
	// 
	// 
	$moduleclass_sfx = $params->get('moduleclass_sfx');
	// 
	// 
	$ext_generate_id =(int)$params->get('ext_generate_id', 1);
	// 
	// 
	$ext_id = $params->get('ext_id', '1');
	// 
	// 
	if ($ext_generate_id == 1)
	{
		// 
		// 
		$rand1 = rand(1, 100);
		// 
		// 
		$rand2 = rand(1, 100);
		// 
		// 
		$ext_id = $rand1.$rand2;
	}
	// Load jQuery
	//------------------------------------------------------------------------
	$ext_jquery_ver				= $params->get('ext_jquery_ver', '1.9.1');
	$ext_load_jquery			= (int)$params->get('ext_load_jquery', 1);
	$ext_load_base				= (int)$params->get('ext_load_base', 1);
	
	// 
	// 
	if ($ext_load_jquery > 0)
	{
		$document->addCustomTag('<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/'.$ext_jquery_ver.'/jquery.min.js"></script>');
	
		$document->addCustomTag('<script type="text/javascript">
		// 
		// 
		var jQ = true;
		
		 
	 
		if (jQuery)
		{
			jQuery.noConflict();
		}
	</script>');		
	}
	if ($ext_load_base  > 0)
	{
		$document->addCustomTag('<script type="text/javascript" src="'.JURI::root().'modules/mod_ext_owl_carousel_jshopping_manufacturers/assets/js/owl.carousel.min.js"></script>');
	}
	
	// Options Owl Carousel - http://owlgraphic.com/owlcarousel/#customizing
	//------------------------------------------------------------------------

	//basic:
	$ext_items 					= (int)$params->get('ext_items', 1);
	$ext_navigation				= $params->get('ext_navigation', 'false');
	$ext_pagination				= $params->get('ext_pagination', 'true');
	$ext_paginationnumbers		= $params->get('ext_paginationnumbers', 'false');

	//pro:
	$ext_itemsdesktop			= $params->get('ext_itemsdesktop', 'false');
	$ext_itemsdesktopsmall		= $params->get('ext_itemsdesktopsmall', 'false');
	$ext_itemstablet			= $params->get('ext_itemstablet', 'false');
	$ext_itemstabletsmall		= $params->get('ext_itemstabletsmall', 'false');
	$ext_itemsmobile			= $params->get('ext_itemsmobile', 'false');
	$ext_itemscustom			= $params->get('ext_itemscustom', 'false');
	$ext_autoplay				= $params->get('ext_autoplay', 'false');
	$ext_stoponhover			= $params->get('ext_stoponhover', 'false');
	$ext_slidespeed				= (int)$params->get('ext_slidespeed', 200);
	$ext_paginationspeed		= (int)$params->get('ext_paginationspeed', 800);
	$ext_rewindspeed			= (int)$params->get('ext_rewindspeed', 1000);
	$ext_navigationtext_prev	= trim( $params->get('ext_navigationtext_prev', 'prev') );
	$ext_navigationtext_next	= trim( $params->get('ext_navigationtext_next', 'next') );
	$ext_rewindnav				= $params->get('ext_rewindnav', 'true');
	$ext_scrollperpage			= $params->get('ext_scrollperpage', 'false');
	$ext_responsive				= $params->get('ext_responsive', 'true');
	$ext_responsiverefreshrate	= (int)$params->get('ext_responsiverefreshrate', 200);
	$ext_responsivebasewidth	= $params->get('ext_responsivebasewidth', 'window');
	$ext_baseclass				= $params->get('ext_baseclass', 'owl-carousel');
	$ext_theme					= $params->get('ext_theme', 'owl-theme');
	$ext_lazyload				= $params->get('ext_lazyload', 'false');
	$ext_lazyfollow				= $params->get('ext_lazyfollow', 'false');
	$ext_lazyeffect				= $params->get('ext_lazyeffect', 'fade');
	$ext_autoheight				= $params->get('ext_autoheight', 'false');
	$ext_dragbeforeanimfinish	= $params->get('ext_dragbeforeanimfinish', 'true');
	$ext_mousedrag				= $params->get('ext_mousedrag', 'true');
	$ext_touchdrag				= $params->get('ext_touchdrag', 'true');
	$ext_addclassactive			= $params->get('ext_addclassactive', 'false');
	$ext_transitionstyle		= $params->get('ext_transitionstyle', 'false');
	// Callbacks
	$ext_beforeupdate			= $params->get('ext_beforeupdate', 'false');
	$ext_afterupdate			= $params->get('ext_afterupdate', 'false');
	$ext_beforeinit				= $params->get('ext_beforeinit', 'false');
	$ext_afterinit				= $params->get('ext_afterinit', 'false');
	$ext_beforemove				= $params->get('ext_beforemove', 'false');
	$ext_aftermove				= $params->get('ext_aftermove', 'false');
	$ext_afteraction			= $params->get('ext_afteraction', 'false');
	$ext_startdragging			= $params->get('ext_startdragging', 'false');
	$ext_afterlazyload			= $params->get('ext_afterlazyload', 'false');
	// JS
	//------------------------------------------------------------------------
	$ext_prod_name				= (int)$params->get('ext_prod_name', 1);
	$order						= $params->get('sort', 'id');
	$direction 					= $params->get('ordering', 'asc');
	// 
	// 
	$manufacturer_id = $app->input->getInt('manufacturer_id');
	// 
	// 
	$manufacturer = \JSFactory::getTable('manufacturer');
	// 
	// 
	$list = $manufacturer->getAllManufacturers(1, $order, $direction);
	// 
	// 
	foreach ($list as $key => $value)
	{
		// 
		// 
		$list[$key]->link = \JSHelper::SEFLink('index.php?option=com_jshopping&controller=manufacturer&task=view&manufacturer_id='.$list[$key]->manufacturer_id, 2);
	}
	// 
	// 
	require JModuleHelper::getLayoutPath('mod_ext_owl_carousel_jshopping_manufacturers', $params->get('layout', 'default'));