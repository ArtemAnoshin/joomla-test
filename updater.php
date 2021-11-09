<?php

/**
 * CleanTalk joomla updater file
 *
 * @since         2.2
 * @package       Cleantalk
 * @subpackage    Joomla
 * @author        CleanTalk (welcome@cleantalk.org)
 * @copyright (C) 2021 СleanTalk team (http://cleantalk.org)
 * @license       GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
 */

defined('_JEXEC') or die('Restricted access');

class plgsystemcleantalkantispamInstallerScript
{
    public function __construct($adapter)
    {
        $log = print_r('plgsystemcleantalkantispamInstallerScript->__construct', true);
        file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
    }
    public function preflight($route, $adapter)
    {
        $log = print_r('plgsystemcleantalkantispamInstallerScript->preflight', true);
        file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
    }
    public function postflight($route, $adapter)
    {
        $log = print_r('plgsystemcleantalkantispamInstallerScript->postflight', true);
        file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
    }
    public function install($parent)
    {
        $log = print_r('plgsystemcleantalkantispamInstallerScript->install', true);
        file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
    }
    public function update($parent)
    {
        // Updating roles_exclusion
        $excluded_roles = $this->params->get('roles_exclusions');

        $log = print_r($excluded_roles, true);
        file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);

        if (is_array($excluded_roles)) {
            $default_roles = self::getGroups();
            $new_data_roles_excluded = array();
            $log = print_r($default_roles, true);
            file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
            foreach ($default_roles as $default_role) {
                if (in_array(strtolower($default_role->id), $excluded_roles)) {
                    $new_data_roles_excluded[] = strtolower($default_role->title);
                }
            }
            $log = print_r($new_data_roles_excluded, true);
            file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
            $this->params->set('roles_exclusions', implode(',', $new_data_roles_excluded));

            $db = JFactory::getDbo();
            $query = $db->getQuery(true);
            $query->clear()->update($db->quoteName('#__extensions'));
            $query->set($db->quoteName('params') . '= ' . $db->quote((string) $this->params));
            $query->where($db->quoteName('element') . ' = ' . $db->quote('cleantalkantispam'));
            $query->where($db->quoteName('folder') . ' = ' . $db->quote('system'));
            $db->setQuery($query);
            $db->execute();
            $log = print_r($db, true);
            file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
        }
    }
    public function uninstall($parent)
    {
        $log = print_r('plgsystemcleantalkantispamInstallerScript->uninstall', true);
        file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
    }

    /**
     * Get all user groups
     */
    static private function getGroups()
    {
        $db = JFactory::getDBO();

        $query = $db->getQuery(true);
        $query
            ->select(array('*'))
            ->from($db->quoteName('#__usergroups'));
        $db->setQuery($query);

        return $db->loadObjectList();
    }
}
