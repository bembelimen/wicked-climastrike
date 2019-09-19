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

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\HTML\HTMLHelper;

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

		HTMLHelper::_('script', 'https://assets.digitalclimatestrike.net/widget.js', [], ['async' => true]);
	}
}
