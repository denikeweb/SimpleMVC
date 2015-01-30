<?php

	namespace App;

	class Router {

		private $do = NULL;
		private $action = NULL;
		public static $get = NULL;
		public static $post = NULL;
		
		private $ctrls = [
			'index' => 'Index',
			'404' => 'C404'
		];

		/**
		 * function for routing ajax queries
		 *
		 * @param $request
		 */
		private function ajaxRoute(&$ctrlName) {
			$request = $this->action;
			$className = 'Ajax\\' . $this->action;
		}

		/**
		 * application start
		 */
		public function runApp () {
			// route ajax queries
			if (isset ($_GET ['do']))
				$this->do = $_GET ['do'];
			if (isset ($_GET ['action']))
				$this->action = $_GET ['action'];

			$ctrlName = $this->ctrls [$this->do];
			if (is_null($ctrlName) or !isset ($ctrlName))
				$ctrlName = $this->ctrls ['index'];
				
			if (!is_null($this->do) and $this->do == 'ajax')
				$this->ajaxCtrls ($ctrlName);
			
			self::$get = $_GET;
			self::$post = $_POST;
			unset (self::$get ['do']);
			unset (self::$get ['ajax']);
			
			$className = '\\Controllers\\' . $ctrlName;
			$ctrl = new $className ();
			$ctrl->run ();
		}
	}