<?php

/**
 * Class sendexMainController
 */
abstract class sendexMainController extends modExtraManagerController {
	/** @var sendex $sendex */
	public $sendex;


	/**
	 * @return void
	 */
	public function initialize() {
		$corePath = $this->modx->getOption('sendex_core_path', null, $this->modx->getOption('core_path') . 'components/sendex/');
		require_once $corePath . 'model/sendex/sendex.class.php';

		$this->sendex = new sendex($this->modx);
		//$this->addCss($this->sendex->config['cssUrl'] . 'mgr/main.css');
		$this->addJavascript($this->sendex->config['jsUrl'] . 'mgr/sendex.js');
		$this->addHtml('
		<script type="text/javascript">
			sendex.config = ' . $this->modx->toJSON($this->sendex->config) . ';
			sendex.config.connector_url = "' . $this->sendex->config['connectorUrl'] . '";
		</script>
		');

		parent::initialize();
	}


	/**
	 * @return array
	 */
	public function getLanguageTopics() {
		return array('sendex:default');
	}


	/**
	 * @return bool
	 */
	public function checkPermissions() {
		return true;
	}
}


/**
 * Class IndexManagerController
 */
class IndexManagerController extends sendexMainController {

	/**
	 * @return string
	 */
	public static function getDefaultController() {
		return 'home';
	}
}