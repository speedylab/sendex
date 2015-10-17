<?php
/** @noinspection PhpIncludeInspection */
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var sendex $sendex */
$sendex = $modx->getService('sendex', 'sendex', $modx->getOption('sendex_core_path', null, $modx->getOption('core_path') . 'components/sendex/') . 'model/sendex/');
$modx->lexicon->load('sendex:default');

// handle request
$corePath = $modx->getOption('sendex_core_path', null, $modx->getOption('core_path') . 'components/sendex/');
$path = $modx->getOption('processorsPath', $sendex->config, $corePath . 'processors/');
$modx->request->handleRequest(array(
	'processors_path' => $path,
	'location' => '',
));