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
        $log = print_r('plgsystemcleantalkantispamInstallerScript->update', true);
        file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
    }
    public function uninstall($parent)
    {
        $log = print_r('plgsystemcleantalkantispamInstallerScript->uninstall', true);
        file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
    }
}
