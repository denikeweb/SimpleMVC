<?php

	namespace App;

	class Router {

		private $do = NULL;
		private $action = NULL;
		private $method = NULL;
		private $get = NULL;
		private $post = NULL;

		public function  getDo ( ) {
			return $this->do;
		}

		public function  getAction ( ) {
			return $this->action;
		}

		public function  getMethod ( ) {
			return $this->method;
		}

		/**
		 * function for routing ajax queries
		 *
		 * @param $request
		 */

		private function ajaxRoute(&$ctrlName, &$method) {
			$ctrlName = 'Ajax\\' . $this->action;
			$method = $_REQUEST ['method'];
		}

		/**
		 * application start
		 */
		public function runApp () {
			// route ajax queries
			if (isset ($_REQUEST ['do']))
				$this->do = $_REQUEST ['do'];
			if (isset ($_REQUEST ['action']))
				$this->action = $_REQUEST ['action'];
			$method = 'run';

			$ctrlName = Config::get_ctrls() [$this->do];
			if (is_null($ctrlName) or !isset ($ctrlName))
				$ctrlName = Config::get_ctrls() ['index'];

			if (!is_null($this->do) and $this->do == 'ajax')
				$this->ajaxRoute ($ctrlName, $method);

			$this->get = $_GET;
			$this->post = $_POST;
			$this->do     = $this->get ['do'];
			$this->action = $this->get ['action'];
			$this->method = $this->get ['method'];
			unset ($this->get ['do']);
			unset ($this->get ['action']);
			unset ($this->get ['method']);

			$className = '\\Controllers\\' . $ctrlName;
			$ctrl = new $className ();
			if ($ctrl instanceof Controller) {
				if (isset ($_REQUEST ['jsonData']))
					$ctrl->setData ($_REQUEST ['jsonData']);
				$ctrl->setCore ($this);
			}
			$ctrl->$method ();
		}
	}