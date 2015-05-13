<?php
/**
 * @class Controller
 * @package App
 * @author Denis Dragomirik <den@lux-blog.org>
 * @version 1.0
 * @since 26.04.2015 / 8:54
 */

namespace App;


class Controller {
	protected $data;
	protected $core;

	function setData ($jsonStr) {
		$this->data = json_decode($jsonStr);
	}

	function setCore ($core) {
		$this->core = $core;
	}
} 