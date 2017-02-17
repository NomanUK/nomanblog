<?php
namespace Craft;

/**
 * Blog plugin for Craft CMS.
 *
 * @author    NomanGaming
 * @copyright Copyright (c) 2017, NomanGaming
 * @package   craft.plugins.nomanblog
 * @since     0.1
 */
class NomanBlogPlugin extends BasePlugin
{
	/**
     * The plugin name.
     *
     * @return string
     */
    function getName()
    {
         return 'Blog';
    }
	
	/**
     * The plugin description.
     *
     * @return string
     */
	function getDescription()
	{
		return "Blog plugin for Craft CMS.";
	}

	/**
     * Plugin version.
     *
     * @return string
     */
    function getVersion()
    {
        return '0.1';
    }

	/**
     * Developer Name.
     *
     * @return string
     */
    function getDeveloper()
    {
        return 'Noman Ali';
    }

	/**
     * Developer URL.
     *
     * @return string
     */
    function getDeveloperUrl()
    {
        return 'http://nomangaming.co.uk';
    }
	
	/**
     * Has a control panel section.
     *
     * @return bool
     */
    public function hasCpSection()
    {
        return true;
    }
	
	/**
     * Register control panel routes
     *
     * @return array
     */
	public function registerCpRoutes()
    {
        return array(
            'nomanblog' => 'nomanblog/posts',
       );
    }
	
	/**
     * Make sure requirements are met before installation.
     *
     * @return bool
     * @throws Exception
     */
    public function onBeforeInstall()
    {
        if (version_compare(craft()->getVersion(), '2.6', '<')) {
            // No way to gracefully handle this, so throw an Exception.
            throw new Exception('Blog requires Craft CMS 2.6+ in order to run.');
        }

        if (!defined('PHP_VERSION_ID') || PHP_VERSION_ID < 50400) {
            Craft::log('Blog requires PHP 5.4+ in order to run.', LogLevel::Error);
            return false;
        }
    }
	
	/**
     * @inheritDoc IPlugin::onBeforeUninstall()
     *
     * @return void
     */
    public function onBeforeUninstall()
    {
		
    }
	
	/**
     * @inheritDoc IPlugin::onAfterInstall()
     *
     * @return void
     */
    public function onAfterInstall()
    {
        
    }
	
	/**
     * @inheritDoc IPlugin::defineSettings()
     *
     * @return array
     */
	protected function defineSettings()
    {
        return array(
            'enableComments' => array(AttributeType::Bool, 'default' => true),
			'showAuthor' => array(AttributeType::Bool, 'default' => true),
        );
    }
	
	/**
     * @inheritDoc IPlugin::getSettingsHtml()
     *
     * @return string
     */
	public function getSettingsHtml()
    {
       return craft()->templates->render('nomanblog/settings', array(
           'settings' => $this->getSettings()
       ));
	}
}