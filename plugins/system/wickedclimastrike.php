<?php
/**
 * @package    Wicked Climastrike
 * @subpackage Plugin.System.WickedClimastrike
 *
 * @author     Benjamin Trenkle <kontakt@wicked-software.de>
 * @copyright  Copyright (C) 2019 Wicked Software, Benjamin Trenkle. All rights reserved.
 * @license    GNU General Public License version 3 or later; see LICENSE
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Plugin\CMSPlugin;

/**
 * Load the JS file
 *
 * @package     Wicked Climastrike
 * @subpackage  Plugin.System.WickedClimastrike
 *
 * @since       1.0
 */
class PlgSystemWickedClimastrike extends CMSPlugin
{
	/**
	 *
	 * @var \Joomla\CMS\Application\CMSApplication
	 */
	protected $app;

	public function onAfterInitialise()
	{
		if (!$this->app->isClient('site'))
		{
			return true;
		}
		
		$language = substr(Factory::getLanguage()->getTag(), 0, 2);
		
		switch ($language)
		{
			case 'en':
			case 'de':
			case 'es':
			case 'cs':
			case 'fr':
			case 'nl':
			case 'tr':
			case 'pt':
				break;
				
			default:
				$language = null;
		}
		
		$js = "
			var DIGITAL_CLIMATE_STRIKE_OPTIONS = {
				disableGoogleAnalytics: true,
				language: '" . $language . "'
			}
		";
		
		Factory::getDocument()->addScriptDeclaration($js);

		HTMLHelper::_('script', 'https://assets.digitalclimatestrike.net/widget.js', [], ['async' => true]);
	}
}
