<?php

namespace ZRay;

use Typo3\Typo3GlobalHooks;
use Typo3\Typo3GlobalVars;
use Typo3\Typo3Logs;

$zre = new \ZRayExtension('TYPO3');
$zre->setMetadata(array(
    'logo' => __DIR__ . DIRECTORY_SEPARATOR . 'logo.png',
));

$zre->setEnabledAfter('TYPO3\CMS\Frontend\Http\Application::__construct');

require_once 'Typo3Logs.php';
$typo3Logs = new Typo3Logs;
$zre->traceFunction('TYPO3\CMS\Core\Log\Logger::log', function(){}, array($typo3Logs, 'afterExit'));

require_once 'Typo3GlobalVars.php';
$typo3GlobalVars = new Typo3GlobalVars;
$zre->traceFunction('TYPO3\CMS\Frontend\Http\Application::run', array($typo3GlobalVars, 'beforeStart'), function(){});

require_once 'Typo3Hooks.php';
$typo3Hooks = new Typo3GlobalHooks;
$zre->traceFunction('TYPO3\CMS\Frontend\Http\Application::run', function(){}, array($typo3Hooks, 'afterExit'));
