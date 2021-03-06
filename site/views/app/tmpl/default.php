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

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$versions = $this->cpanel;
?>
<div class="searchbuttons" style="display:none;">
<?php if($this->params->get('search_display') == 1): ?>
<form class="uk-form">
    <fieldset data-uk-margin="">
		<button class="uk-button submit_search" data-uk-offcanvas="{target:'#search_scripture'}"><i class="uk-icon-search"></i><span class="uk-hidden-small"> <?php echo JText::_($this->params->get('search_button')); ?></span></button>
        <button onclick="printTag()" class="uk-button" type="button"><i class="uk-icon-print"></i></button>
        <?php if($this->user->id > 0 && $this->params->get('account')): ?>
        	<button onclick="setupEmail()" class="uk-button" type="button"><i class="uk-icon-envelope-o"></i></button>
        <?php endif; ?>
<?php elseif($this->params->get('search_display') == 2):?>
<form class="uk-form uk-margin-remove uk-display-block" id="search_form" method="post">
    <fieldset data-uk-margin="">
        <input class="search_field uk-form-width-medium" type="text" name="search" placeholder="<?php echo JText::_($this->params->get('search_phrase')); ?>">
        <button onclick="printTag()" class="uk-button" type="button"><i class="uk-icon-print"></i></button>
        <?php if($this->user->id > 0 && $this->params->get('account')): ?>
        	<button onclick="setupEmail()" class="uk-button" type="button"><i class="uk-icon-envelope-o"></i></button>
        <?php endif; ?>
        <input type="submit" style="display:none;" >
        <input  class="uk-hidden search_crit" type="hidden" name="search_crit"  
        value="<?php echo $this->params->get('search_crit1'); ?>_<?php echo $this->params->get('search_crit2'); ?>_<?php echo $this->params->get('search_crit3'); ?>" >
        <input class="uk-hidden search_type" type="hidden" name="search_type" value="<?php echo $this->params->get('search_type'); ?>">
        <input class="uk-hidden search_version" type="hidden" name="search_version" value="<?php echo $this->params->get('version'); ?>">
        <input class="uk-hidden search_app" type="hidden" name="search_app" value="1">
<?php elseif($this->params->get('search_display') == 3):?>
<form class="uk-form uk-margin-remove uk-display-block" id="search_form" method="post">
    <fieldset data-uk-margin="">
        <input class="search_field uk-form-width-medium" type="text" name="search" placeholder="<?php echo JText::_($this->params->get('search_phrase')); ?>">
        <button class="uk-button submit_search" type="submit"><i class="uk-icon-search"></i><span class="uk-hidden-small"> <?php echo JText::_($this->params->get('search_button')); ?></span></button>
        <button onclick="printTag()" class="uk-button" type="button"><i class="uk-icon-print"></i></button>
        <?php if($this->user->id > 0 && $this->params->get('account')): ?>
        	<button onclick="setupEmail()" class="uk-button" type="button"><i class="uk-icon-envelope-o"></i></button>
        <?php endif; ?>
        <input  class="uk-hidden search_crit" type="hidden" name="search_crit"  
        value="<?php echo $this->params->get('search_crit1'); ?>_<?php echo $this->params->get('search_crit2'); ?>_<?php echo $this->params->get('search_crit3'); ?>" >
        <input class="uk-hidden search_type" type="hidden" name="search_type" value="<?php echo $this->params->get('search_type'); ?>">
        <input class="uk-hidden search_version" type="hidden" name="search_version" value="<?php echo $this->params->get('version'); ?>">
        <input class="uk-hidden search_app" type="hidden" name="search_app" value="1">
<?php elseif($this->params->get('search_display') == 4):?>
<form class="uk-form uk-margin-remove uk-display-block" id="search_form" method="post">
    <fieldset data-uk-margin="">
        <input class="search_field uk-form-width-medium" type="text" name="search" placeholder="<?php echo JText::_($this->params->get('search_phrase')); ?>">
        <div class="uk-button-group">
        <button class="uk-button submit_search" type="submit"><i class="uk-icon-search"></i><span class="uk-hidden-small"> <?php echo $this->params->get('search_button'); ?></span></button>
        <?php if($this->params->get('search_options') == 1): ?>
        <button class="uk-button" data-uk-offcanvas="{target:'#search_scripture'}"><i class="uk-icon-cog"></i><span class="uk-hidden-small"> <?php echo JText::_($this->params->get('advanced_button')); ?></span></button>
        <?php endif; ?>
        <button onclick="printTag()" class="uk-button" type="button"><i class="uk-icon-print"></i></button>
        <?php if($this->user->id > 0 && $this->params->get('account')): ?>
        	<button onclick="setupEmail()" class="uk-button" type="button"><i class="uk-icon-envelope-o"></i></button>
        <?php endif; ?>
        </div>
        <input  class="uk-hidden search_crit" type="hidden" name="search_crit"  
        value="<?php echo $this->params->get('search_crit1'); ?>_<?php echo $this->params->get('search_crit2'); ?>_<?php echo $this->params->get('search_crit3'); ?>" >
        <input class="uk-hidden search_type" type="hidden" name="search_type" value="<?php echo $this->params->get('search_type'); ?>">
        <input class="uk-hidden search_version" type="hidden" name="search_version" value="<?php echo $this->params->get('version'); ?>">
        <input class="uk-hidden search_app" type="hidden" name="search_app" value="1">
<?php elseif($this->params->get('search_display') == 5):?>
<form class="uk-form uk-margin-remove uk-display-block" id="search_form" method="post">
    <fieldset data-uk-margin="">
        <input class="search_field uk-form-width-medium" type="text" name="search" placeholder="<?php echo JText::_($this->params->get('search_phrase')); ?>">
        <input type="submit" style="display:none;" >
        <?php if($this->params->get('search_options') == 1): ?>
        <button class="uk-button" data-uk-offcanvas="{target:'#search_scripture'}"><i class="uk-icon-cog"></i><span class="uk-hidden-small"> <?php echo JText::_($this->params->get('advanced_button')); ?></span></button>
        <?php endif; ?>
        <button onclick="printTag()" class="uk-button" type="button"><i class="uk-icon-print"></i></button>
        <?php if($this->user->id > 0 && $this->params->get('account')): ?>
        	<button onclick="setupEmail()" class="uk-button" type="button"><i class="uk-icon-envelope-o"></i></button>
        <?php endif; ?>
        <input  class="uk-hidden search_crit" type="hidden" name="search_crit"  
        value="<?php echo $this->params->get('search_crit1'); ?>_<?php echo $this->params->get('search_crit2'); ?>_<?php echo $this->params->get('search_crit3'); ?>" >
        <input class="uk-hidden search_type" type="hidden" name="search_type" value="<?php echo $this->params->get('search_type'); ?>">
        <input class="uk-hidden search_version" type="hidden" name="search_version" value="<?php echo $this->params->get('version'); ?>">
        <input class="uk-hidden search_app" type="hidden" name="search_app" value="1"> 
<?php endif; ?>
    
<?php if($this->params->get('highlight_option') == 2): ?>
		<a class="uk-button" onClick="highScripture()" href="javascript:void(0)"><?php echo JText::_('COM_GETBIBLE_HIGHLIGHT'); ?></a>
   	</fieldset>
</form>
<?php else: ?>
	</fieldset>
</form>
<?php endif ?>
</div>

<?php if($this->params->get('toolbar') == 2): ?>
<div id="cPanel" data-uk-sticky="" style="background:#fff;" >
<?php else: ?>
<div id="cPanel">
<?php endif; ?>
	<?php if($this->params->get('search_display') == 1): ?>
    <form class="uk-form uk-display-block">
        <div class="uk-button-group">
            <a class="uk-button" href="#user_cPanel" data-uk-modal><i class="uk-icon-cog uk-icon-spin"></i></a>
            <div class="uk-button-dropdown" data-uk-dropdown="">
                <a href="javascript:void(0)" class="uk-button"><i class="uk-icon-font"></i></a>
                <div class="uk-dropdown uk-dropdown-small">
                    <ul class="uk-nav uk-nav-dropdown">
                        <li><a href="javascript:void(0)" onClick="setCurrentTextSize('small')"><?php echo JText::_('COM_GETBIBLE_SMALL'); ?></a></li>
                        <li><a href="javascript:void(0)" onClick="setCurrentTextSize('medium')"><?php echo JText::_('COM_GETBIBLE_MEDIUM'); ?></a></li>
                        <li><a href="javascript:void(0)" onClick="setCurrentTextSize('large')"><?php echo JText::_('COM_GETBIBLE_LARGE'); ?></a></li>
                    </ul>
                </div>
            </div>
            <button class="uk-button submit_search" data-uk-offcanvas="{target:'#search_scripture'}"><i class="uk-icon-search"></i><span class="uk-hidden-small"> <?php echo JText::_($this->params->get('search_button')); ?></span></button>
            <button class="uk-button" type="button" onClick="showSmallCpanel()"><i class="uk-icon-book"></i><span class="uk-hidden-small"> <span class="booksMenu"></span></span></button>
            <button class="uk-button button_chapters" type="button" style="display:none;" onClick="showChapters()"><i class="uk-icon-list-ol"></i><span class="uk-hidden-small"> <?php echo JText::_('COM_GETBIBLE_SELECT_CHAPTER'); ?></span></button>
        </div>
    </form>
    <?php elseif($this->params->get('search_display') == 2):?>
        <form class="uk-form  uk-margin-remove uk-display-block" id="search_form" method="post">
        	<fieldset data-uk-margin="">
                <input class="search_field uk-form-width-medium" type="text" name="search" placeholder="<?php echo JText::_($this->params->get('search_phrase')); ?>">
                <input type="submit" style="display:none;" >
                <input  class="uk-hidden search_crit" type="hidden" name="search_crit"  
                value="<?php echo $this->params->get('search_crit1'); ?>_<?php echo $this->params->get('search_crit2'); ?>_<?php echo $this->params->get('search_crit3'); ?>" >
                <input class="uk-hidden search_type" type="hidden" name="search_type" value="<?php echo $this->params->get('search_type'); ?>">
                <input class="uk-hidden search_version" type="hidden" name="search_version" value="<?php echo $this->params->get('version'); ?>">
                <input class="uk-hidden search_app" type="hidden" name="search_app" value="1">
                <select class="versions" class="uk-margin-small-top">
                <option value=""><?php echo JText::_('COM_GETBIBLE_SELECT_VERSION'); ?></option>
                    <?php foreach($versions as $key => $version): ?>
                        <?php if($key == $this->AppDefaults['version']) :?>
                        <option value="<?php echo $key; ?>" selected="selected">(<?php echo $version->language; ?>) <?php echo $version->version_name; ?></option>
                        <?php else: ?>
                        <option value="<?php echo $key; ?>" >(<?php echo $version->language; ?>) <?php echo $version->version_name; ?></option>
                        <?php endif;?>
                    <?php endforeach; ?>
                </select>
                <select class="f_loader" class="uk-margin-small-top"  style="display:none;">
                    <option value="" selected="selected"><?php echo JText::_('COM_GETBIBLE_LOADING'); ?></option>
                </select>
                <select class="books" class="uk-margin-small-top"  style="display:none;">
                </select>
                <button class="uk-button button_chapters" type="button" style="display:none;" onClick="showChapters()"><i class="uk-icon-list-ol"></i><span class="uk-hidden-small"> <?php echo JText::_('COM_GETBIBLE_SELECT_CHAPTER'); ?></span></button>
                <div class="uk-navbar-flip">
                    <div class="uk-button-group">
                        <div class="uk-button-dropdown" data-uk-dropdown="">
                            <a href="javascript:void(0)" class="uk-button"><i class="uk-icon-font"></i></a>
                            <div class="uk-dropdown uk-dropdown-small">
                                <ul class="uk-nav uk-nav-dropdown">
                                    <li><a href="javascript:void(0)" onClick="setCurrentTextSize('small')"><?php echo JText::_('COM_GETBIBLE_SMALL'); ?></a></li>
                                    <li><a href="javascript:void(0)" onClick="setCurrentTextSize('medium')"><?php echo JText::_('COM_GETBIBLE_MEDIUM'); ?></a></li>
                                    <li><a href="javascript:void(0)" onClick="setCurrentTextSize('large')"><?php echo JText::_('COM_GETBIBLE_LARGE'); ?></a></li>
                                </ul>
                            </div>
                        </div>
                        <a class="uk-button" href="#user_cPanel" data-uk-modal><i class="uk-icon-cog uk-icon-spin"></i></a>
                    </div>
                </div>
        	</fieldset>
        </form>
<?php elseif($this->params->get('search_display') == 3):?>
    <form class="uk-form  uk-margin-remove uk-display-block" id="search_form" method="post">
        <fieldset data-uk-margin="">
            <input class="search_field" type="text" name="search" placeholder="<?php echo JText::_($this->params->get('search_phrase')); ?>">
            <div class="uk-button-group">
                <button class="uk-button submit_search" type="submit" ><i class="uk-icon-search"></i><span class="uk-hidden-small"> <?php echo JText::_($this->params->get('search_button')); ?></span></button>
                <button class="uk-button" type="button" onClick="showSmallCpanel()"><i class="uk-icon-book"></i><span class="uk-hidden-small"> <span class="booksMenu"></span></span></button>
                <button class="uk-button button_chapters" type="button" style="display:none;" onClick="showChapters()"><i class="uk-icon-list-ol"></i><span class="uk-hidden-small"> <?php echo JText::_('COM_GETBIBLE_SELECT_CHAPTER'); ?></span></button>
                <div class="uk-button-dropdown" data-uk-dropdown="">
                    <a href="javascript:void(0)" class="uk-button"><i class="uk-icon-font"></i></a>
                    <div class="uk-dropdown uk-dropdown-small">
                        <ul class="uk-nav uk-nav-dropdown">
                            <li><a href="javascript:void(0)" onClick="setCurrentTextSize('small')"><?php echo JText::_('COM_GETBIBLE_SMALL'); ?></a></li>
                            <li><a href="javascript:void(0)" onClick="setCurrentTextSize('medium')"><?php echo JText::_('COM_GETBIBLE_MEDIUM'); ?></a></li>
                            <li><a href="javascript:void(0)" onClick="setCurrentTextSize('large')"><?php echo JText::_('COM_GETBIBLE_LARGE'); ?></a></li>
                        </ul>
                    </div>
                </div>
                <a class="uk-button" href="#user_cPanel" data-uk-modal><i class="uk-icon-cog uk-icon-spin"></i></a>
            </div>
            <input  class="uk-hidden search_crit" type="hidden" name="search_crit"  
            value="<?php echo $this->params->get('search_crit1'); ?>_<?php echo $this->params->get('search_crit2'); ?>_<?php echo $this->params->get('search_crit3'); ?>" >
            <input class="uk-hidden search_type" type="hidden" name="search_type" value="<?php echo $this->params->get('search_type'); ?>">
            <input class="uk-hidden search_version" type="hidden" name="search_version" value="<?php echo $this->params->get('version'); ?>">
            <input class="uk-hidden search_app" type="hidden" name="search_app" value="1">
        </fieldset>
    </form>
    <?php elseif($this->params->get('search_display') == 4):?>
    <form class="uk-form uk-margin-remove uk-display-block" id="search_form" method="post">
        <fieldset data-uk-margin="">
            <input class="search_field uk-form-width-medium" type="text" name="search" placeholder="<?php echo JText::_($this->params->get('search_phrase')); ?>">
            <div class="uk-button-group">
            	<button class="uk-button submit_search" type="submit" ><i class="uk-icon-search"></i><span class="uk-hidden-small"> <?php echo JText::_($this->params->get('search_button')); ?></span></button>
                <?php if($this->params->get('search_options') == 1): ?>
                <button class="uk-button" data-uk-offcanvas="{target:'#search_scripture'}"><i class="uk-icon-cog"></i><span class="uk-hidden-small"> <?php echo JText::_($this->params->get('advanced_button')); ?></span></button>
                <?php endif; ?>
                <button class="uk-button" type="button" onClick="showSmallCpanel()"><i class="uk-icon-book"></i><span class="uk-hidden-small"> <span class="booksMenu"></span></span></button>
                <button class="uk-button button_chapters" type="button" style="display:none;" onClick="showChapters()"><i class="uk-icon-list-ol"></i><span class="uk-hidden-small"> <?php echo JText::_('COM_GETBIBLE_SELECT_CHAPTER'); ?></span></button>
                <div class="uk-button-dropdown" data-uk-dropdown="">
                    <a href="javascript:void(0)" class="uk-button"><i class="uk-icon-font"></i></a>
                    <div class="uk-dropdown uk-dropdown-small">
                        <ul class="uk-nav uk-nav-dropdown">
                            <li><a href="javascript:void(0)" onClick="setCurrentTextSize('small')"><?php echo JText::_('COM_GETBIBLE_SMALL'); ?></a></li>
                            <li><a href="javascript:void(0)" onClick="setCurrentTextSize('medium')"><?php echo JText::_('COM_GETBIBLE_MEDIUM'); ?></a></li>
                            <li><a href="javascript:void(0)" onClick="setCurrentTextSize('large')"><?php echo JText::_('COM_GETBIBLE_LARGE'); ?></a></li>
                        </ul>
                    </div>
                </div>
                <a class="uk-button" href="#user_cPanel" data-uk-modal><i class="uk-icon-cog uk-icon-spin"></i></a>
            </div>
            <input  class="uk-hidden search_crit" type="hidden" name="search_crit"  
            value="<?php echo $this->params->get('search_crit1'); ?>_<?php echo $this->params->get('search_crit2'); ?>_<?php echo $this->params->get('search_crit3'); ?>" >
            <input class="uk-hidden search_type" type="hidden" name="search_type" value="<?php echo $this->params->get('search_type'); ?>">
            <input class="uk-hidden search_version" type="hidden" name="search_version" value="<?php echo $this->params->get('version'); ?>">
            <input class="uk-hidden search_app" type="hidden" name="search_app" value="1">
        </fieldset>
    </form> 
    <?php elseif($this->params->get('search_display') == 5):?>
    <form class="uk-form uk-display-block" id="search_form" method="post">
        <fieldset data-uk-margin="">
            <input class="search_field" type="text" name="search" placeholder="<?php echo JText::_($this->params->get('search_phrase')); ?>">
            <input type="submit" style="display:none;" >
            <?php if($this->params->get('search_options') == 1): ?>
            <button class="uk-button" data-uk-offcanvas="{target:'#search_scripture'}"><i class="uk-icon-cog"></i><span class="uk-hidden-small"> <?php echo JText::_($this->params->get('advanced_button')); ?></span></button>
            <?php endif; ?>
            <select class="versions" class="uk-margin-small-top">
            <option value=""><?php echo JText::_('COM_GETBIBLE_SELECT_VERSION'); ?></option>
                <?php foreach($versions as $key => $version): ?>
                    <?php if($key == $this->AppDefaults['version']) :?>
                    <option value="<?php echo $key; ?>" selected="selected">(<?php echo $version->language; ?>) <?php echo $version->version_name; ?></option>
                    <?php else: ?>
                    <option value="<?php echo $key; ?>" >(<?php echo $version->language; ?>) <?php echo $version->version_name; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <select class="f_loader" class="uk-margin-small-top"  style="display:none;">
                <option value="" selected="selected"><?php echo JText::_('COM_GETBIBLE_LOADING'); ?></option>
            </select>
            <select class="books" class="uk-margin-small-top"  style="display:none;">
            </select>
            <button class="uk-button button_chapters" type="button" style="display:none;" onClick="showChapters()"><i class="uk-icon-list-ol"></i><span class="uk-hidden-small"> <?php echo JText::_('COM_GETBIBLE_SELECT_CHAPTER'); ?></span></button>
            <div class="uk-navbar-flip">
                <div class="uk-button-group">
                    <div class="uk-button-dropdown" data-uk-dropdown="">
                        <a href="javascript:void(0)" class="uk-button"><i class="uk-icon-font"></i></a>
                        <div class="uk-dropdown uk-dropdown-small">
                            <ul class="uk-nav uk-nav-dropdown">
                                <li><a href="javascript:void(0)" onClick="setCurrentTextSize('small')"><?php echo JText::_('COM_GETBIBLE_SMALL'); ?></a></li>
                                <li><a href="javascript:void(0)" onClick="setCurrentTextSize('medium')"><?php echo JText::_('COM_GETBIBLE_MEDIUM'); ?></a></li>
                                <li><a href="javascript:void(0)" onClick="setCurrentTextSize('large')"><?php echo JText::_('COM_GETBIBLE_LARGE'); ?></a></li>
                            </ul>
                        </div>
                    </div>
                    <a class="uk-button" href="#user_cPanel" data-uk-modal><i class="uk-icon-cog uk-icon-spin"></i></a>
                </div>
            </div>
            <input  class="uk-hidden search_crit" type="hidden" name="search_crit"  
            value="<?php echo $this->params->get('search_crit1'); ?>_<?php echo $this->params->get('search_crit2'); ?>_<?php echo $this->params->get('search_crit3'); ?>" >
            <input class="uk-hidden search_type" type="hidden" name="search_type" value="<?php echo $this->params->get('search_type'); ?>">
            <input class="uk-hidden search_version" type="hidden" name="search_version" value="<?php echo $this->params->get('version'); ?>">
            <input class="uk-hidden search_app" type="hidden" name="search_app" value="1">
        </fieldset>
    </form>
    <?php else : ?>
    <form class="uk-form uk-display-block">
        <fieldset data-uk-margin="">
            <div class="uk-button-group">
                <a class="uk-button" href="#user_cPanel" data-uk-modal><i class="uk-icon-cog uk-icon-spin"></i></a>
                <div class="uk-button-dropdown" data-uk-dropdown="">
                    <a href="javascript:void(0)" class="uk-button"><i class="uk-icon-font"></i></a>
                    <div class="uk-dropdown uk-dropdown-small">
                        <ul class="uk-nav uk-nav-dropdown">
                            <li><a href="javascript:void(0)" onClick="setCurrentTextSize('small')"><?php echo JText::_('COM_GETBIBLE_SMALL'); ?></a></li>
                            <li><a href="javascript:void(0)" onClick="setCurrentTextSize('medium')"><?php echo JText::_('COM_GETBIBLE_MEDIUM'); ?></a></li>
                            <li><a href="javascript:void(0)" onClick="setCurrentTextSize('large')"><?php echo JText::_('COM_GETBIBLE_LARGE'); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <select class="versions" class="uk-margin-small-top">
            <option value=""><?php echo JText::_('COM_GETBIBLE_SELECT_VERSION'); ?></option>
                <?php foreach($versions as $key => $version): ?>
                    <?php if($key == $this->AppDefaults['version']) :?>
                    <option value="<?php echo $key; ?>" selected="selected">(<?php echo $version->language; ?>) <?php echo $version->version_name; ?></option>
                    <?php else: ?>
                    <option value="<?php echo $key; ?>" >(<?php echo $version->language; ?>) <?php echo $version->version_name; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <select class="f_loader" class="uk-margin-small-top"  style="display:none;">
                <option value="" selected="selected"><?php echo JText::_('COM_GETBIBLE_LOADING'); ?></option>
            </select>
            <select class="books" class="uk-margin-small-top"  style="display:none;">
            </select>
            <button class="uk-button button_chapters" type="button" style="display:none;" onClick="showChapters()"><i class="uk-icon-list-ol"></i><span class="uk-hidden-small"> <?php echo JText::_('COM_GETBIBLE_SELECT_CHAPTER'); ?></span></button>        
        </fieldset>
    </form>
	<?php endif; ?>
</div>
<?php if($this->params->get('search_display') == 1 || $this->params->get('search_display') == 3 || $this->params->get('search_display') == 4): ?>
<div id="small_cpanel"  style="display:none;">
	<br />
    <form class="uk-form">
        <fieldset data-uk-margin="">
            <select class="versions" class="uk-margin-small-top">
                    <option value=""><?php echo JText::_('COM_GETBIBLE_SELECT_VERSION'); ?></option>
                <?php foreach($versions as $key => $version): ?>
                    <?php if($key == $this->AppDefaults['version']) :?>
                    <option value="<?php echo $key; ?>" selected="selected">(<?php echo $version->language; ?>) <?php echo $version->version_name; ?></option>
                    <?php else: ?>
                    <option value="<?php echo $key; ?>" >(<?php echo $version->language; ?>) <?php echo $version->version_name; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <select class="f_loader" class="uk-margin-small-top"  style="display:none;">
                <option value="" selected="selected"><?php echo JText::_('COM_GETBIBLE_LOADING'); ?></option>
            </select>
            <select class="books" class="uk-margin-small-top"  style="display:none;">
            </select>
        </fieldset>
    </form>
</div>
<?php endif; ?>
<div id="t_loader" class="uk-progress uk-progress-striped uk-active" ><div class="uk-progress-bar" style="width: 100%;"><?php echo JText::_('COM_GETBIBLE_LOADING'); ?></div></div>

<div id="getbible" style="display:none;">   
	<div id="chapters" style="display:none;"></div> 
    <div id="scripture" class="uk-margin-remove uk-display-block"></div>
	<?php if($this->params->get('app_mode') == 2): ?>
		<?php if($this->params->get('up_button') == 1): ?>
            <button id="button_top" class="uk-button uk-button-primary" type="button" style="display:none; position: fixed; bottom: 0px; z-index: 3;" onClick="gotoTop()"><?php echo JText::_('COM_GETBIBLE_GO_TOP'); ?> <i class="uk-icon-arrow-up"></i></button>
        <?php elseif($this->params->get('up_button') == 2): ?>
            <div id="button_top" class="uk-panel uk-width-1-2 uk-container-center uk-text-center" style="display:none;" >
                <a class="uk-button searchbuttons" type="button" onClick="gotoTop()"><?php echo JText::_('COM_GETBIBLE_GO_TOP'); ?> <i class="uk-icon-arrow-up"></i></a>
            </div>
        <?php endif; ?>
        <div class="navigation uk-panel uk-width-1-2 uk-hidden-small uk-container-center uk-text-center" style="display:none;">
            <div class="uk-button-group">
                <a class="uk-button button_chapters" type="button"  onClick="showChapters()"><i class="uk-icon-list-ol"></i> <?php echo JText::_('COM_GETBIBLE_SELECT_CHAPTER'); ?></a>
                <a id="prev" class="uk-button" href="javascript:void(0)" onClick="prevChapter()"><i class="uk-icon-fast-backward"></i> <?php echo JText::_('COM_GETBIBLE_PREV'); ?></a>
                <a class="uk-button" href="javascript:void(0)" onClick="nextChapter()"><?php echo JText::_('COM_GETBIBLE_NEXT'); ?> <i class="uk-icon-fast-forward"></i></a>
            </div>
        </div>







        <div class="navigation uk-panel uk-visible-small" style="display:none;" data-uk-margin>
        	<div class="uk-button-group">
                <a class="uk-button button_chapters" type="button"  onClick="showChapters()"><i class="uk-icon-list-ol"></i><span class="uk-hidden-small"> <?php echo JText::_('COM_GETBIBLE_SELECT_CHAPTER'); ?></span></a>
                <a id="prev" class="uk-button" href="javascript:void(0)" onClick="prevChapter()"><i class="uk-icon-fast-backward"></i><span class="uk-hidden-small"> <?php echo JText::_('COM_GETBIBLE_PREV'); ?></span></a>
                <a class="uk-button" href="javascript:void(0)" onClick="nextChapter()"><span class="uk-hidden-small"><?php echo JText::_('COM_GETBIBLE_NEXT'); ?> </span><i class="uk-icon-fast-forward"></i></a>
            </div>
        </div>
    <?php else: ?>
	<button class="uk-button uk-button-primary button_chapters" type="button" style="display:none; position: fixed; bottom: 0px; z-index: 3;" onClick="showChapters()"><i class="uk-icon-list-ol"></i><span class="uk-hidden-small">  <?php echo JText::_('COM_GETBIBLE_SELECT_CHAPTER'); ?></span></button>
    <?php if($this->params->get('up_button') == 1): ?>
        <button id="button_top" class="uk-button uk-button-primary" type="button" style="display:none; position: fixed; bottom: 0px; z-index: 3;" onClick="gotoTop()"><span class="uk-hidden-small"><?php echo JText::_('COM_GETBIBLE_GO_TOP'); ?> </span><i class="uk-icon-arrow-up"></i></button>
	<?php elseif($this->params->get('up_button') == 2): ?>
        <div id="button_top" class="uk-panel uk-width-1-2 uk-container-center uk-text-center" style="display:none;" >
            <a class="uk-button searchbuttons" type="button"  onClick="gotoTop()"><span class="uk-hidden-small"><?php echo JText::_('COM_GETBIBLE_GO_TOP'); ?> </span><i class="uk-icon-arrow-up"></i></a>
        </div>
    <?php endif; ?>
        <div class="navigation uk-panel uk-width-1-2 uk-container-center uk-text-center" style="display:none;">
            <a class="uk-button" href="javascript:void(0)" onClick="nextChapter()"><span class="uk-hidden-small"><?php echo JText::_('COM_GETBIBLE_NEXT'); ?> </span><i class="uk-icon-fast-forward"></i></a>
        </div>
    <?php endif; ?>
</div>
<div id="b_loader" style="display:none;" class="uk-progress uk-progress-striped uk-active" ><div class="uk-progress-bar" style="width: 100%;"><?php echo JText::_('COM_GETBIBLE_LOADING'); ?></div></div>

<div id="user_cPanel" class="uk-modal">
    <div class="uk-modal-dialog">
        <a class="uk-modal-close uk-close"></a>
        <?php if($this->params->get('account') && $this->user->id == 0): ?>
            <ul class="uk-tab" data-uk-tab="{connect:'#user_cPanel_tab'}">
                <li><a href=""><i class="uk-icon-paint-brush"></i> <?php echo JText::_('COM_GETBIBLE_COLORS'); ?></a></li>
                <li><a href=""><i class="uk-icon-cog uk-icon-spin"></i> <?php echo JText::_('COM_GETBIBLE_ACCOUNT'); ?></a></li>
                <li><a href=""><i class="uk-icon-book"></i> <?php echo JText::_('COM_GETBIBLE_GLOBAL'); ?></a></li>
            </ul>
            <ul id="user_cPanel_tab" class="uk-switcher uk-margin">
                <li>
                    <div class="uk-hidden-small" data-uk-margin>
                        <?php foreach($this->highlights as $mark => $details): ?>
                            <a class="uk-modal-close uk-button uk-width-1-1 uk-button-primary uk-button-large uk-margin-small-bottom" href="javascript:void(0)" onClick="setCurrentColor('<?php echo $mark; ?>')">
                                <?php echo JText::_($details['name']); ?>&nbsp;&nbsp;&nbsp;
                                <span style="color:<?php echo $details['text']; ?>; background:<?php echo $details['background'];?>; font-size: <?php echo $this->params->get('font_medium'); ?>px;">
                                    &nbsp;<i class="uk-icon-pencil"></i>&nbsp;<?php echo JText::_('COM_GETBIBLE_TEXT'); ?>&nbsp;&nbsp;
                                </span>
                            </a>
                        <?php endforeach; ?>
                    </div>

                    <div class="uk-visible-small" data-uk-margin>
                        <?php foreach($this->highlights as $mark => $details): ?>
                            <a class="uk-modal-close uk-button uk-width-1-1 uk-button-primary uk-button-small uk-margin-small-bottom" href="javascript:void(0)" onClick="setCurrentColor('<?php echo $mark; ?>')">
                                <?php echo JText::_($details['name']); ?>&nbsp;&nbsp;&nbsp;
                                <span style="color:<?php echo $details['text']; ?>; background:<?php echo $details['background'];?>;">
                                    &nbsp;<i class="uk-icon-pencil"></i>&nbsp;<?php echo JText::_('COM_GETBIBLE_TEXT'); ?>&nbsp;&nbsp;
                                </span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </li>
                <li>
                    <div class="uk-panel uk-panel-box uk-text-center">
						<h1><?php echo JText::_($this->params->get('account_header')); ?></h1>
						<?php echo JText::_($this->params->get('account_highlight_text')); ?>
                        <a class="uk-button uk-width-1-1 uk-margin-small-bottom uk-button-large uk-button-primary" href="<?php echo $this->signupUrl; ?>" >
                            <?php echo JText::_($this->params->get('account_button')); ?>
                        </a>
                        <a class="uk-button uk-width-1-1 uk-button-large" href="<?php echo $this->loginUrl; ?>" >
                            <?php echo JText::_('Login'); ?>
                        </a>
                    </div>
                </li>
                <li>
                    <?php /*?><button id="toggleHighlights" rel="hide" class="uk-button uk-width-1-1 uk-margin-small-bottom uk-button-primary" onclick="toggle('highlights')" toggle="<?php echo JText::_('COM_GETBIBLE_SHOW_HIGHLIGHTS') ?>" ><?php echo JText::_('COM_GETBIBLE_HIDE_HIGHLIGHTS') ?></button><?php */?>
                    <button class="uk-button uk-width-1-1 uk-margin-small-bottom uk-button-primary" data-uk-modal="{target:'#clear_highlights'}" ><?php echo JText::_('COM_GETBIBLE_REMOVE_ALL_HIGHLIGHTS') ?></button>
                    <button class="uk-button uk-width-1-1 uk-margin-small-bottom uk-button-primary" data-uk-modal="{target:'#clear_browser'}" ><?php echo JText::_('COM_GETBIBLE_CLEAR_BROWSER_MEMORY') ?></button>
                </li>
            </ul>
        <?php elseif($this->params->get('account')): ?>
            <ul class="uk-tab" data-uk-tab="{connect:'#user_cPanel_tab'}">
                <li><a href=""><i class="uk-icon-paint-brush"></i> <?php echo JText::_('COM_GETBIBLE_COLORS'); ?></a></li>
                <li><a href=""><i class="uk-icon-tags"></i> <?php echo JText::_('COM_GETBIBLE_TAGS'); ?></a></li>
                <li><a href=""><i class="uk-icon-book"></i> <?php echo JText::_('COM_GETBIBLE_GLOBAL'); ?></a></li>
            </ul>
      		<ul id="user_cPanel_tab" class="uk-switcher uk-margin">
                <li>
        			<div class="uk-hidden-small" data-uk-margin>
						<?php foreach($this->highlights as $mark => $details): ?>
                            <a class="uk-modal-close uk-button uk-width-1-1 uk-button-primary uk-button-large uk-margin-small-bottom" href="javascript:void(0)" onClick="setCurrentColor('<?php echo $mark; ?>')">
                                <?php echo JText::_($details['name']); ?>&nbsp;&nbsp;&nbsp;
                                <span style="color:<?php echo $details['text']; ?>; background:<?php echo $details['background'];?>; font-size: <?php echo $this->params->get('font_medium'); ?>px;">
                                    &nbsp;<i class="uk-icon-pencil"></i>&nbsp;<?php echo JText::_('COM_GETBIBLE_TEXT'); ?>&nbsp;&nbsp;
                                </span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <div class="uk-visible-small" data-uk-margin>
						<?php foreach($this->highlights as $mark => $details): ?>
                            <a class="uk-modal-close uk-button uk-width-1-1 uk-button-primary uk-button-small uk-margin-small-bottom" href="javascript:void(0)" onClick="setCurrentColor('<?php echo $mark; ?>')">
                                <?php echo JText::_($details['name']); ?>&nbsp;&nbsp;&nbsp;
                                <span style="color:<?php echo $details['text']; ?>; background:<?php echo $details['background'];?>;">
                                    &nbsp;<i class="uk-icon-pencil"></i>&nbsp;<?php echo JText::_('COM_GETBIBLE_TEXT'); ?>&nbsp;&nbsp;
                                </span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </li>
                <li>
                	<div class="uk-grid">
                        <div class="uk-width-medium-2-5">
                            <ul class="uk-tab uk-tab-left" data-uk-tab="{connect:'#tagBody'}" id="tagMenus">
                                <li class="uk-active"><a href=""><?php echo JText::_('COM_GETBIBLE_TAGS_ALL_ACTIVE') ?></a></li>
                                <li><a href=""><?php echo JText::_('COM_GETBIBLE_TAGS_ALL_INACTIVE') ?></a></li>
                                <li><a href=""><?php echo JText::_('COM_GETBIBLE_TAGS_INACTIVE_DEFAULTS') ?></a></li>
                            </ul>
                        </div>
                        <div class="uk-width-medium-3-5">
                            <ul id="tagBody" class="uk-switcher">
                                <li id="usedTags"><?php echo JText::_('No Active tags') ?></li>
                                <li id="unusedTags"><?php echo JText::_('No Inactive tags') ?></li>
                                <li id="defaultTags"><?php echo JText::_('No Inactive Defaults tags') ?></li>
                            </ul> 
                    	</div>
                	</div>   
                </li>
                <li>
                    <button id="toggleTags" rel="hide" class="uk-button uk-width-1-1 uk-margin-small-bottom uk-button-primary" onclick="toggle('tags')" toggle="<?php echo JText::_('COM_GETBIBLE_SHOW_TAGS') ?>" ><?php echo JText::_('COM_GETBIBLE_HIDE_TAGS') ?></button>
                    <button id="toggleNotes" rel="hide" class="uk-button uk-width-1-1 uk-margin-small-bottom uk-button-primary" onclick="toggle('notes')" toggle="<?php echo JText::_('COM_GETBIBLE_SHOW_NOTES') ?>" ><?php echo JText::_('COM_GETBIBLE_HIDE_NOTES') ?></button>
                    <?php /*?><button id="toggleHighlights" rel="hide" class="uk-button uk-width-1-1 uk-margin-small-bottom uk-button-primary" onclick="toggle('highlights')" toggle="<?php echo JText::_('COM_GETBIBLE_SHOW_HIGHLIGHTS') ?>" ><?php echo JText::_('COM_GETBIBLE_HIDE_HIGHLIGHTS') ?></button><?php */?>
                    <button class="uk-button uk-width-1-1 uk-margin-small-bottom uk-button-primary" data-uk-modal="{target:'#clear_highlights'}" ><?php echo JText::_('COM_GETBIBLE_REMOVE_ALL_HIGHLIGHTS') ?></button>
                    <button class="uk-button uk-width-1-1 uk-margin-small-bottom uk-button-primary" data-uk-modal="{target:'#clear_browser'}" ><?php echo JText::_('COM_GETBIBLE_CLEAR_BROWSER_MEMORY') ?></button>
                </li>
        	</ul>
         <?php else: ?>
            <div class="uk-hidden-small" data-uk-margin>
				<?php foreach($this->highlights as $mark => $details): ?>
                    <a class="uk-modal-close uk-button uk-width-1-1 uk-button-primary uk-button-large uk-margin-small-bottom" href="javascript:void(0)" onClick="setCurrentColor('<?php echo $mark; ?>')">
                        <?php echo JText::_($details['name']); ?>&nbsp;&nbsp;&nbsp;
                        <span style="color:<?php echo $details['text']; ?>; background:<?php echo $details['background'];?>; font-size: <?php echo $this->params->get('font_medium'); ?>px;">
                            &nbsp;<i class="uk-icon-pencil"></i>&nbsp;<?php echo JText::_('COM_GETBIBLE_TEXT'); ?>&nbsp;&nbsp;
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="uk-visible-small" data-uk-margin>
                <?php foreach($this->highlights as $mark => $details): ?>
                    <a class="uk-modal-close uk-button uk-width-1-1 uk-button-primary uk-button-small uk-margin-small-bottom" href="javascript:void(0)" onClick="setCurrentColor('<?php echo $mark; ?>')">
                        <?php echo JText::_($details['name']); ?>&nbsp;&nbsp;&nbsp;
                        <span style="color:<?php echo $details['text']; ?>; background:<?php echo $details['background'];?>;">
                            &nbsp;<i class="uk-icon-pencil"></i>&nbsp;<?php echo JText::_('COM_GETBIBLE_TEXT'); ?>&nbsp;&nbsp;
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<div id="clear_browser" class="uk-modal">
    <div class="uk-modal-dialog">
        <a class="uk-modal-close uk-close"></a>
        <h2><?php echo JText::_('COM_GETBIBLE_CLEAR_BROWSER_WARNING_MESSAGE'); ?></h2>
        <div class="uk-button-group">
        	<button class="uk-button uk-button-success uk-modal-close" onclick="clearBrowser()" ><?php echo JText::_('COM_GETBIBLE_YES'); ?></button> 
        	<button class="uk-button uk-modal-close" ><?php echo JText::_('COM_GETBIBLE_CANCEL'); ?></button>
        </div>
    </div>
</div>

<div id="clear_highlights" class="uk-modal">
    <div class="uk-modal-dialog">
        <a class="uk-modal-close uk-close"></a>
        <h2><?php echo JText::_('COM_GETBIBLE_CLEAR_HIGHLIGHTS_WARNING_MESSAGE'); ?></h2>
        <div class="uk-button-group">
        	<button class="uk-button uk-button-success uk-modal-close" onclick="clearAllHighlights()" ><?php echo JText::_('COM_GETBIBLE_YES'); ?></button> 
        	<button class="uk-button uk-modal-close" ><?php echo JText::_('COM_GETBIBLE_CANCEL'); ?></button> 
        </div>
    </div>
</div>

<?php if($this->user->id > 0 && $this->params->get('account')): ?>

<div id="delete_tag" class="uk-modal">
    <div class="uk-modal-dialog">
        <a class="uk-modal-close uk-close"></a>
        <h2><?php echo JText::_('COM_GETBIBLE_DELETE_TAG_WARNING_MESSAGE'); ?></h2>
        <div class="uk-button-group">
        	<button id="confirmDelete" rel="" class="uk-button uk-button-success uk-modal-close" onclick="removeTag_confirmed()" ><?php echo JText::_('COM_GETBIBLE_YES'); ?></button> 
        	<button class="uk-button uk-modal-close" data-uk-modal="{target:'#user_cPanel'}"><?php echo JText::_('COM_GETBIBLE_CANCEL'); ?></button>
        </div>
    </div>
</div>

<div id="setup_email" class="uk-modal">
    <div class="uk-modal-dialog">
        <a class="uk-modal-close uk-close"></a>
        <form class="uk-form">
            <div class="uk-form-row">
                <h2>Send Email</h2>
                <input class="uk-margin-small-top" id="email_address" type="text" placeholder="email address" value="<?php echo $this->user->email; ?>">
                <input class="uk-button uk-modal-close" type="submit" onclick="sendEmail(); return false;" value="send">
            </div>
        </form>
    </div>
</div>
<?php endif; ?>

<?php if($this->user->id > 0 && $this->params->get('account')): ?>
<div id="highlight_checker" class="uk-modal">
    <div class="uk-modal-dialog">
        <a class="uk-modal-close uk-close"></a>
            <h1><?php echo JText::_('COM_GETBIBLE_NOT_IN_SYNC') ?></h1>
        <div class="both_has slectionSync" style="display:none;">
            <a 	class="uk-modal-close uk-button uk-width-1-1 uk-margin-small-bottom" 
            	href="javascript:void(0)" onClick="saveBrowserHighlights(2)" 
                title="<?php echo JText::_('COM_GETBIBLE_KEEP_ONLY_BROWSER_HIGHLIGHT_DESC') ?>" data-uk-tooltip="{pos:'top'}">
                <i class="uk-icon-arrow-up"></i>&nbsp;&nbsp;<?php echo JText::_('COM_GETBIBLE_KEEP_ONLY_BROWSER_HIGHLIGHT_LABEL') ?>&nbsp;
            </a>
            <a 	class="uk-modal-close uk-button uk-width-1-1 uk-margin-small-bottom" 
            	href="javascript:void(0)" onClick="mergeAllHighlights()" 
                title="<?php echo JText::_('COM_GETBIBLE_MERGE_ALL_HIGHLIGHT_DESC') ?>" data-uk-tooltip="{pos:'top'}">
                <i class="uk-icon-refresh uk-icon-spin"></i>&nbsp;&nbsp;<?php echo JText::_('COM_GETBIBLE_MERGE_ALL_HIGHLIGHT_LABEL') ?>&nbsp;
            </a>
            <a 	class="uk-modal-close uk-button uk-width-1-1 uk-margin-small-bottom" 
            	href="javascript:void(0)" onClick="loadServerHighlights(true)" 
                title="<?php echo JText::_('COM_GETBIBLE_KEEP_ONLY_ACCOUNT_HIGHLIGHT_DESC') ?>" data-uk-tooltip="{pos:'top'}">
                <i class="uk-icon-arrow-down"></i>&nbsp;&nbsp;<?php echo JText::_('COM_GETBIBLE_KEEP_ONLY_ACCOUNT_HIGHLIGHT_LABEL') ?>&nbsp;
            </a>
            <a 	class="uk-modal-close uk-button uk-width-1-1 uk-margin-small-bottom" 
            	href="javascript:void(0)" onClick="clearAllHighlights()" 
                title="<?php echo JText::_('COM_GETBIBLE_CLEAR_ALL_HIGHLIGHT_DESC') ?>" data-uk-tooltip="{pos:'top'}">
                <i class="uk-icon-trash"></i>&nbsp;&nbsp;<?php echo JText::_('COM_GETBIBLE_CLEAR_ALL_HIGHLIGHT_LABEL') ?>&nbsp;
            </a>
        </div>
        <div class="server_has slectionSync"  style="display:none;">
            <a 	class="uk-modal-close uk-button uk-width-1-1 uk-margin-small-bottom" 
            	href="javascript:void(0)" onClick="loadServerHighlights()" 
                title="<?php echo JText::_('COM_GETBIBLE_LOAD_ACCOUNT_HIGHLIGHT_DESC') ?>" data-uk-tooltip="{pos:'top'}">
                <i class="uk-icon-arrow-down"></i>&nbsp;&nbsp;<?php echo JText::_('COM_GETBIBLE_LOAD_ACCOUNT_HIGHLIGHT_LABEL') ?>&nbsp;
            </a>
            <a 	class="uk-modal-close uk-button uk-width-1-1 uk-margin-small-bottom" 
            	href="javascript:void(0)" onClick="clearAllHighlights()" 
                title="<?php echo JText::_('COM_GETBIBLE_CLEAR_ALL_HIGHLIGHT_DESC') ?>" data-uk-tooltip="{pos:'top'}">
                <i class="uk-icon-trash"></i>&nbsp;&nbsp;<?php echo JText::_('COM_GETBIBLE_CLEAR_ALL_HIGHLIGHT_LABEL') ?>&nbsp;
            </a>        
        </div>
        <div class="browser_has slectionSync"  style="display:none;">
            <a 	class="uk-modal-close uk-button uk-width-1-1 uk-margin-small-bottom" 
            	href="javascript:void(0)" onClick="saveBrowserHighlights(1)" 
                title="<?php echo JText::_('COM_GETBIBLE_ADD_HIGHLIGHT_TO_ACCOUNT_DESC') ?>" data-uk-tooltip="{pos:'top'}">
                <i class="uk-icon-arrow-up"></i>&nbsp;&nbsp;<?php echo JText::_('COM_GETBIBLE_ADD_HIGHLIGHT_TO_ACCOUNT_LABEL') ?>&nbsp;
            </a>
            <a 	class="uk-modal-close uk-button uk-width-1-1 uk-margin-small-bottom" 
            	href="javascript:void(0)" onClick="clearAllHighlights()" 
                title="<?php echo JText::_('COM_GETBIBLE_CLEAR_ALL_HIGHLIGHT_DESC') ?>" data-uk-tooltip="{pos:'top'}">
                <i class="uk-icon-trash"></i>&nbsp;&nbsp;<?php echo JText::_('COM_GETBIBLE_CLEAR_ALL_HIGHLIGHT_LABEL') ?>&nbsp;
            </a>        
        </div>
    </div>
</div>
<?php endif; ?>
<?php if($this->params->get('account')): ?>
<div id="note_maker" class="uk-modal">
    <div class="uk-modal-dialog">
        <a class="uk-modal-close uk-close"></a><br />
        <?php if($this->user->id > 0): ?>
        <div class="uk-grid">
        	<div class="uk-grid-width-1-1 uk-width-medium-1-2">
                <button id="toggleNote" class="uk-button uk-width-1-1 uk-button-mini" onclick="toggle('notes')" ><?php echo JText::_('COM_GETBIBLE_HIDE_NOTES') ?></button>
                <form class="uk-form" id="post_note">
                    <div class="uk-form-row">


                        <h2><span class="note_verse"></span></h2>
                        <textarea id="active_note" name="note" cols="100%" rows="4" placeholder="add note here!" autocomplete="off"></textarea>
                        <input class="uk-button uk-modal-close" type="submit" onclick="submitNote(); return false;" value="submit">
                        <input type="hidden" name="jsonKey" value="<?php echo JSession::getFormToken(); ?>" />
                        <input id="note_verse" type="hidden" name="verse" value="" />
                        <input type="hidden" name="tu" value="<?php echo base64_encode($this->user->id); ?>" />
                    </div>
                </form>
            </div>
       		<div class="uk-grid-width-1-1 uk-width-medium-1-2">
               	<button id="toggleTag" class="uk-button uk-width-1-1 uk-button-mini" onclick="toggle('tags')" ><?php echo JText::_('COM_GETBIBLE_HIDE_TAGS') ?></button>
                <div class="uk-panel">
                    <h2><?php echo JText::_('COM_GETBIBLE_TAGS'); ?></h2>
					<div id="tagDiv"></div>
                </div>
            </div>
		</div>
        <?php else: ?>
        	<br />
            <div class="uk-panel uk-panel-box uk-text-center">
                <h1><?php echo JText::_($this->params->get('account_header')); ?></h1>
                <?php echo JText::_($this->params->get('account_note_text')); ?>
                <a class="uk-button uk-width-1-1 uk-margin-small-bottom uk-button-large uk-button-primary" href="<?php echo $this->signupUrl; ?>" >
                    <?php echo JText::_($this->params->get('account_button')); ?>
                </a>
                <a class="uk-button uk-width-1-1 uk-button-large" href="<?php echo $this->loginUrl; ?>" >
                    <?php echo JText::_('Login'); ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>
<div id="search_scripture" class="uk-offcanvas">
    <div class="uk-offcanvas-bar">
    	<?php if($this->params->get('search_display') == 1):?>
            <form class="uk-form uk-search" id="search_form" method="post">
                <input class="search_field uk-search-field" type="input" name="search" placeholder="<?php echo JText::_($this->params->get('search_phrase')); ?>">
                <?php if($this->params->get('search_options') == 1): ?>
                    <div class="uk-margin">
                        <input class="uk-button submit_search" type="submit"  value="<?php echo JText::_($this->params->get('search_button')); ?>">
                    </div>
                <?php endif; ?>
                <input  class="uk-hidden search_crit" type="hidden" name="search_crit"  
                value="<?php echo $this->params->get('search_crit1'); ?>_<?php echo $this->params->get('search_crit2'); ?>_<?php echo $this->params->get('search_crit3'); ?>" >
                <input class="uk-hidden search_type" type="hidden" name="search_type" value="<?php echo $this->params->get('search_type'); ?>">
                <input class="uk-hidden search_version" type="hidden" name="search_version" value="<?php echo $this->params->get('version'); ?>">
                <input class="uk-hidden search_app" type="hidden" name="search_app" value="1"> 
            </form>
        <?php endif; ?>
        <div class="uk-panel uk-container-center">
           	<?php if($this->params->get('search_options') == 1): ?>
            <div class="uk-margin">
                <div class="uk-button-group"  data-uk-button-radio="">
                    <?php 
                        switch($this->params->get('search_crit1')){
                            case 1:
                            $active_crit1_1 = 'uk-active'; $active_crit1_2 = ''; $active_crit1_3 = '';
                            break;
                            
                            case 2:
                            $active_crit1_1 = ''; $active_crit1_2 = 'uk-active'; $active_crit1_3 = '';
                            break;
                            
                            case 3:
                            $active_crit1_1 = ''; $active_crit1_2 = ''; $active_crit1_3 = 'uk-active';
                            break;
                        }
                    ?>
                    <button type="button" class="uk-button uk-button-primary <?php echo $active_crit1_1 ?> search_crit1" value="1"><?php echo JText::_('COM_GETBIBLE_ALL_WORDS'); ?></button>
                    <button type="button" class="uk-button uk-button-primary <?php echo $active_crit1_2 ?> search_crit1" value="2"><?php echo JText::_('COM_GETBIBLE_ANY_WORDS'); ?></button>
                    <button type="button" class="uk-button uk-button-primary <?php echo $active_crit1_3 ?> search_crit1" value="3"><?php echo JText::_('COM_GETBIBLE_PHRASE'); ?></button>
                </div>
            </div>
            <div class="uk-margin">
                <div class="uk-button-group"  data-uk-button-radio="">
                    <?php 
                        switch($this->params->get('search_type')){
                            case 'all':
                            $active_type_all = 'uk-active'; $active_type_ot = ''; $active_type_nt = '';
                            break;
                            
                            case 'ot':
                            $active_type_all = ''; $active_type_ot = 'uk-active'; $active_type_nt = '';
                            break;
                            
                            case 'nt':
                            $active_type_all = ''; $active_type_ot = ''; $active_type_nt = 'uk-active';
                            break;
                        }
                    ?>
                    <button type="button" class="uk-button uk-button-primary <?php echo $active_type_all ?> search_type_select" value="all"><?php echo JText::_('COM_GETBIBLE_BIBLE'); ?></button>
                    <button type="button" class="uk-button uk-button-primary <?php echo $active_type_ot ?> search_type_select" value="ot"><?php echo JText::_('COM_GETBIBLE_OT'); ?></button>
                    <button type="button" class="uk-button uk-button-primary <?php echo $active_type_nt ?> search_type_select" value="nt"><?php echo JText::_('COM_GETBIBLE_NT'); ?></button>
                    <button type="button" class="uk-button uk-button-primary search_type_select" id="search_book" value="john"><?php echo JText::_('COM_GETBIBLE_THIS_BOOK'); ?></button>
                </div>
            </div>
            <div class="uk-margin">
                <div class="uk-button-group"  data-uk-button-radio="">
                    <?php 
                        switch($this->params->get('search_crit2')){
                            case 1:
                            $active_crit2_1 = 'uk-active'; $active_crit2_2 = '';;
                            break;
                            
                            case 2:
                            $active_crit2_1 = ''; $active_crit2_2 = 'uk-active';;
                            break;
                        }
                    ?>
                    <button class="uk-button uk-button-mini uk-button-primary <?php echo $active_crit2_1 ?> search_crit2" type="button" value="1"><?php echo JText::_('COM_GETBIBLE_EXACT_MATCH'); ?></button>
                    <button class="uk-button uk-button-mini uk-button-primary <?php echo $active_crit2_2 ?> search_crit2" type="button" value="2"><?php echo JText::_('COM_GETBIBLE_PARTIAL_MATCH'); ?></button>
                 </div>
            </div>
            <div class="uk-margin">
                <div class="uk-button-group"  data-uk-button-radio="">
                    <?php 
                        switch($this->params->get('search_crit3')){
                            case 1:
                            $active_crit3_1 = 'uk-active'; $active_crit3_2 = '';;
                            break;
                            
                            case 2:
                            $active_crit3_1 = ''; $active_crit3_2 = 'uk-active';;
                            break;
                        }
                    ?>
                    <button class="uk-button uk-button-mini uk-button-primary <?php echo $active_crit3_1 ?> search_crit3" type="button" value="1"><?php echo JText::_('COM_GETBIBLE_CASE_INSENSITIVE'); ?></button>
                    <button class="uk-button uk-button-mini uk-button-primary <?php echo $active_crit3_2 ?> search_crit3" type="button" value="2"><?php echo JText::_('COM_GETBIBLE_CASE_SENSITIVE'); ?></button>
                 </div>
            </div>
        	<?php endif; ?>
        </div>
    </div>
</div>
<?php if ($this->params->get('vdm_logo') == 1): ?>
	<div class="uk-panel uk-align-right uk-hidden-small">
		<?php if ($this->params->get('vdm_link') == 1): ?>
			<a href="<?php echo $this->params->get('vdm_url');  ?>" target="_blank">
		<?php endif; ?>
			<span class="uk-hidden-small" data-uk-tooltip="{pos:'left'}" title="The words of eternal life!" ><img src="<?php echo JURI::base( true ) .'/media/com_getbible/images/icon.png'; ?>" /></span>
		<?php if ($this->params->get('vdm_link') == 1): ?>
			</a>
		<?php endif; ?>
	</div>
	 <div class="uk-panel uk-align-center uk-container-center uk-visible-small"><br /><center>
		<?php if ($this->params->get('vdm_link') == 1): ?>
			<a href="<?php echo $this->params->get('vdm_url');  ?>" target="_blank">
		<?php endif; ?>
			<span><img src="<?php echo JURI::base( true ) .'/media/com_getbible/images/icon.png'; ?>" /></span>
		<?php if ($this->params->get('vdm_link') == 1): ?>
			</a>
		<?php endif; ?>
	</center></div>
<?php elseif($this->params->get('vdm_text') == 1): ?>
	<div class="uk-panel uk-align-right uk-hidden-small">
		<?php if ($this->params->get('vdm_link') == 1): ?>
			<a href="<?php echo $this->params->get('vdm_url');  ?>" target="_blank">
		<?php endif; ?>
			<span data-uk-tooltip="{pos:'left'}" title="The words of eternal life!" ><?php echo $this->params->get('vdm_name');  ?></span>
		<?php if ($this->params->get('vdm_link') == 1): ?>
			</a>
		<?php endif; ?>
	</div>
	<div class="uk-panel uk-align-center uk-container-center uk-visible-small"><br /><center>
		<?php if ($this->params->get('vdm_link') == 1): ?>
			<a href="<?php echo $this->params->get('vdm_url');  ?>" target="_blank">
		<?php endif; ?>
			<span><?php echo $this->params->get('vdm_name');  ?></span>
		<?php if ($this->params->get('vdm_link') == 1): ?>
			</a>

		<?php endif; ?>
	</center></div>
<?php endif; ?>
