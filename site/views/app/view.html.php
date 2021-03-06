<?php
/**
* 
* 	@version 	1.0.9  June 24, 2016
* 	@package 	Get Bible API
* 	@author  	Llewellyn van der Merwe <llewellyn@vdm.io>
* 	@copyright	Copyright (C) 2013 Vast Development Method <http://www.vdm.io>
* 	@license	GNU General Public License <http://www.gnu.org/copyleft/gpl.html>
*
**/

defined( '_JEXEC' ) or die( 'Restricted access' );

class GetbibleViewApp extends JViewLegacy
{
	/**
	 * @var bool import success
	 */
	protected $params;
	protected $cpanel;
	protected $AppDefaults;
	protected $highlights;
	protected $signupUrl;
	protected $loginUrl;
	protected $user;
	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		// Initialise variables.
		$this->cpanel	= $this->get('Cpanel');
		// get the Book Defaults
		$this->AppDefaults = $this->get('AppDefaults');
		// get the last date a book name was changed
		$this->booksDate = $this->get('BooksDate');
		// Get app Params
		$this->params 		= JFactory::getApplication()->getParams();
		$this->signupUrl 	= $this->getRouteUrl('index.php?Itemid='.$this->params->get('account_menu'));
		$this->loginUrl 	= $this->getRouteUrl('index.php?Itemid='.$this->params->get('login_menu'));
		// set the user details
		$this->user = JFactory::getUser();
		
		$this->_prepareDocument();
		
		parent::display($tpl);
	} 
		
	/**
	 * Prepares the document
	 */
	protected function _prepareDocument()
	{
		// set query options
		$setApp = '';
		
		// set query url
		if ($this->params->get('jsonQueryOptions') == 1){
			
			// Load Jquery check
			if($this->params->get('jsonAPIaccess')){
				
				$key		= JSession::getFormToken();
				$setApp 	.= 	"var appKey = '".$key."';"; 
			}
			
			$jsonUrl 	=  "'index.php?option=com_getbible&view=json'";
			
		} elseif ($this->params->get('jsonQueryOptions') == 2) {
			$setApp 	.= 	"var cPanelUrl = 'https://getbible.net/';";
			$jsonUrl 	=  "'https://getbible.net/json'";
			
		} else {
			$setApp 	.= 	"var cPanelUrl = 'http://getbible.net/';";
			$jsonUrl 	=  "'http://getbible.net/json'";
			
		}
		
		// The css
		$this->document->addStyleSheet(JURI::root() .'media/com_getbible/css/app.css');
		if (!$this->css_loaded('uikit.min')) {
			$this->document->addStyleSheet(JURI::root() .'media/com_getbible/uikit/css/uikit.min.css');
		}
		$this->document->addStyleSheet(JURI::root() .'media/com_getbible/css/components/sticky.min.css');
		$this->document->addStyleSheet(JURI::root() .'media/com_getbible/css/components/notify.min.css');
		$this->document->addStyleSheet(JURI::root() .'media/com_getbible/css/offline.css');
		$this->document->addStyleSheet(JURI::root() .'media/com_getbible/css/tagit.css');
		
		if($this->params->get('highlight_padding')){
			$padding = 'padding: 0 3px 0 3px;';
		} else {
			$padding = '';
		}
		// verses style
		$versStyles = '	#scripture .verse { cursor: pointer; }
	#scripture .verse_nr { cursor: pointer; }
	/* verse sizes */ 
	#scripture .verse_small { font-size: '.$this->params->get('font_small').'px; line-height: 1.5;} 
	#scripture .verse_medium { font-size: '.$this->params->get('font_medium').'px; line-height: 1.5;}
	#scripture .verse_large { font-size: '.$this->params->get('font_large').'px; line-height: 1.5;}
	/* verse nr sizes */ 
	#scripture .nr_small { font-size: '. ($this->params->get('font_small') - 3).'px; line-height: 1.5;} 
	#scripture .nr_medium { font-size: '. ($this->params->get('font_medium') - 4).'px; line-height: 1.5;}
	#scripture .nr_large { font-size: '. ($this->params->get('font_large') - 5).'px; line-height: 1.5;}
	/* chapter nr sizes */ 
	#scripture .chapter_nr { font-size: 200%; }';
		$this->document->addStyleDeclaration( $versStyles );
		// search highlight style
		$searchStyles = '	.highlight { color: '.$this->params->get('highlight_textcolor').'; border-bottom: 1px '.$this->params->get('highlight_linetype').' '.$this->params->get('highlight_linecolor').'; background-color: '.$this->params->get('highlight_background').'; '. $padding .' }';
		$this->document->addStyleDeclaration( $searchStyles );
		// hover styles
		$hoverStyle = '	.hoverStyle { color: '.$this->params->get('hover_textcolor').'; border-bottom: 1px '.$this->params->get('hover_linetype').' '.$this->params->get('hover_linecolor').'; background-color: '.$this->params->get('hover_background').'; }';
		$this->document->addStyleDeclaration( $hoverStyle );
		// highlight styles
		$marks = range('a','z');
		$printHighliters = '';
		foreach($marks as $mark){
			$this->highlights[$mark] =  array(
											'name' => $this->params->get('mark_'.$mark.'_name'), 
											'text' => $this->params->get('mark_'.$mark.'_textcolor'), 
											'background' => $this->params->get('mark_'.$mark.'_background')
											);
			$markStyle = '	.highlight_'.$mark.' { color: '.$this->params->get('mark_'.$mark.'_textcolor').'; border-bottom: 1px '.$this->params->get('mark_'.$mark.'_linetype').' '.$this->params->get('mark_'.$mark.'_linecolor').'; background-color: '.$this->params->get('mark_'.$mark.'_background').'; }';
			$printHighliters .= '	.highlight_'.$mark.' { color: '.$this->params->get('mark_'.$mark.'_textcolor').' !important; border-bottom: 1px '.$this->params->get('mark_'.$mark.'_linetype').' '.$this->params->get('mark_'.$mark.'_linecolor').' !important; background-color: '.$this->params->get('mark_'.$mark.'_background').' !important; -webkit-print-color-adjust: exact; print-color-adjust: exact;}
	';
			$this->document->addStyleDeclaration( $markStyle );
		}
		$printStyle = '	@media print {
		body * {
			visibility: hidden;
		}
		#printTagArea, #printTagArea * {
			visibility: visible;
		}
		.tags {
			display: none !important;
		}
		.uk-text-muted {
			font-color: #999999 !important;
		}
		#printTagArea {
			position: absolute;
			left: 0;
			top: 0;
		}
		.no-print, .no-print *
		{
			display: none !important;
		}
	'.$printHighliters.'
	}';
		$this->document->addStyleDeclaration( $printStyle );
		
		// The JS
		// Load jQuery check
		if (!$this->js_loaded('jquery')) {
			JHtml::_('jquery.ui');
		}
		// load highlight javascript plugin
		$this->document->addScript(JURI::root() .'media/com_getbible/js/jquery-ui-custom.js');
		// set defaults
		if($this->params->get('account') && $this->user->id > 0){
			$setApp .=	'var openNow			= "'.base64_encode($this->user->id).'";';
			$setApp .=  'var user_id 			= '.$this->user->id.';';
			$setApp .=  'var jsonKey 			= "'.JSession::getFormToken().'";';
			$setApp .=  'var allowAccount 		= '.$this->params->get('account').';';
		} else {
			$setApp .=	'var openNow			= 0;';
			$setApp .=  'var user_id 			= 0;';
			$setApp .=  'var jsonKey 			= 0;';
			$setApp .=  'var allowAccount 		= '.$this->params->get('account').';';
		}
		$setApp .=  'var defaultKey 		= "'.$this->AppDefaults['defaultKey'].'";';
		$setApp .=  'var searchApp 			= 0;';
		if($this->AppDefaults['request']){
			$setApp .=  'var defaultRequest		= "'.$this->AppDefaults['request'].'";';
			$setApp .=  'var searchFor 			= 0;';
			$setApp .=  'var searchCrit 		= 0;';
			$setApp .=  'var searchType 		= 0;';
			$setApp .=  'var loadApp 			= 0;';
		} else {
			$setApp .=  'var defaultRequest		= 0;';
		}
		if(strlen($this->params->get('placeholder_text')) > 0){
			$placeholder_text = json_encode($this->params->get('placeholder_text'));
		} else {
			$placeholder_text = 'null';
		}
		if(strlen($this->params->get('tags_defaults')) > 0){
			$tags_string = $this->params->get('tags_defaults');
			if (strpos($tags_string,',') !== false) {
					$tags_array = explode(',', $tags_string);
					$tags_defaults = '[';
					$tags_counter = 0;
					foreach($tags_array as $tag){
						if($tags_counter == 0){
							$tags_defaults .= json_encode($tag);
						} else {
							$tags_defaults .= ', '.json_encode($tag);
						}
						$tags_counter++;
					}
					$tags_defaults .= ']';
			} else {
				$tags_defaults = json_encode($this->params->get('tags_defaults'));
			}
		} else {
			$tags_defaults = 'false';
		}
				
		$setApp .=	'var placeholder_text			= '.$placeholder_text.';';
		$setApp .=	'var tags_defaults				= '.$tags_defaults.';';
		$setApp .=	'var allow_spaces 				= '.$this->params->get('allow_spaces', 'true').';';
		$setApp .=	'var autocomplete_show 			= '.$this->params->get('autocomplete_show', 'true').';';
		$setApp .=	'var case_sensitive				= '.$this->params->get('case_sensitive', 'true').';';
		$setApp .=	'var autocomplete_min_length 	= '.$this->params->get('autocomplete_min_length', 1).';';
		$setApp .=	'var autocomplete_delay 		= '.$this->params->get('autocomplete_delay', 0).';';
		// load a tag
		$setApp .=	'var tagQuery					= false;';
		
		$setApp .=	'var right_click 				= '.$this->params->get('right_click', 0).';';
		$setApp .= 	'var autoLoadChapter 			= '.$this->params->get('auto_loading_chapter').';';
		$setApp .= 	'var appMode 					= '.$this->params->get('app_mode').';';
		$setApp .= 	'var jsonUrl 					= '.$jsonUrl.';';
		$setApp .= 	'var booksDate 					= "'.$this->booksDate.'";';
		$setApp .= 	'var highlightOption 			= '. $this->params->get('highlight_option').';';// set the search styles
		$setApp .= 	'var verselineMode 				= '. $this->params->get('line_mode').';';
		
		// Load Uikit check
		if (!$this->js_loaded('uikit.min')) {
			$this->document->addScript(JURI::root() .'media/com_getbible/uikit/js/uikit.min.js');
		}
		if (!$this->js_loaded('sticky.min')) {
			$this->document->addScript(JURI::root() .'media/com_getbible/js/components/sticky.min.js');
		}
		if (!$this->js_loaded('notify.min')) {
			$this->document->addScript(JURI::root() .'media/com_getbible/js/components/notify.min.js');
		}
		// load base64 javascript plugin
		$this->document->addScript(JURI::root() .'media/com_getbible/js/base64.js');
		// load highlight javascript plugin
		$this->document->addScript(JURI::root() .'media/com_getbible/js/highlight.js');
						
		// Load Json check
		if (!$this->js_loaded('jquery.json')) {
			$this->document->addScript(JURI::root() .'media/com_getbible/js/jquery.json.min.js');
		}
		// Load Jstorage check
		if (!$this->js_loaded('jstorage')) {
			$this->document->addScript(JURI::root() .'media/com_getbible/js/jstorage.min.js');
		}
		// Load Tag It check
		if (!$this->js_loaded('tag-it')) {
			$this->document->addScript(JURI::root() .'media/com_getbible/js/tag-it.js');
		}
		// Load Offline check
		if (!$this->js_loaded('offline')) {
			$this->document->addScript(JURI::root() .'media/com_getbible/js/offline.min.js');
		}
		
		$this->document->addScriptDeclaration($setApp);  
		$this->document->addScript(JURI::root() .'media/com_getbible/js/app.js');
		// debug offline status
		// $this->document->addScript(JURI::root() .'media/com_getbible/js/offline-simulate-ui.min.js');
						
		// to check in app is online
		$offline	= '	jQuery(document).ready(function(){ 
							Offline.options = {checks: { image: {url: "'.JURI::root() .'media/com_getbible/images/vdm.png"}, active: "image"}};
							window.setInterval(function() {
								
								if (Offline.state === "up"){
									Offline.check();				
								}
								
							}, 3000);
						});';
		$this->document->addScriptDeclaration($offline);
		
	}
	
	/**
	 * Get the correct path
	 */
	protected function getRouteUrl($route) {
		
		// Get the global site router.
		$config = JFactory::getConfig();
		$router = JRouter::getInstance('site');
		$router->setMode( $config->get('sef', 1) );
	
		$uri    = $router->build($route);
		$path   = $uri->toString(array('path', 'query', 'fragment'));
	
		return $path;
	}
	
	protected function js_loaded($script_name)
	{
		// UIkit check point
		if($script_name == 'uikit'){
			$getTemplateName  	= JFactory::getApplication()->getTemplate('template')->template;
			
			if (strpos($getTemplateName,'yoo') !== false) {
				return true;
			}
		}
		
		$head_data 	= $this->document->getHeadData();
		foreach (array_keys($head_data['scripts']) as $script) {
			if (stristr($script, $script_name)) {
				return true;
			}
		}

		return false;
	}
	
	protected function css_loaded($script_name)
	{
		// UIkit check point
		if($script_name == 'uikit'){
			$getTemplateName  	= JFactory::getApplication()->getTemplate('template')->template;
			
			if (strpos($getTemplateName,'yoo') !== false) {
				return true;
			}
		}
		
		$head_data 	= $this->document->getHeadData();
		
		foreach (array_keys($head_data['styleSheets']) as $script) {
			if (stristr($script, $script_name)) {
				return true;
			}
		}
		return false;
	}
}
