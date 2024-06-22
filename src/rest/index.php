<?php

require_once dirname(__FILE__, 2) . '/config.core.php';
require_once MODX_CORE_PATH . 'model/modx/modx.class.php';
$modx = new modX();
$modx->initialize('web');
$modx->getService('error', 'error.modError', '', '');

$rest = $modx->getService('rest', 'rest.modRestService', '', array(
    'basePath' => dirname(__FILE__) . '/controllers/',
    'controllerClassSeparator' => '',
    'controllerClassPrefix' => 'restController',
    'xmlRootNode' => 'response',
    'requestParameter' => '_rest',
));

$rest->prepare();

$rest->process();