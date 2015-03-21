<?php 
namespace App\Controller\Admin;
use App\Controller\AppController as AppC;
use \Core\Auth\DBAuth;
use \App;

/**
 * 
 */
Class AppController extends AppC{

	/**
	 * Template name to use based on the view page
	 * @var string
	 */
	protected $template = 'admin';

	public function __construct()
	{
		parent::__construct();
		$app = App::getInstance();
		$auth = new DBAuth($app->getDb());
		if (!$auth->logged()) {
			$this->forbidden();
		}
	}

}