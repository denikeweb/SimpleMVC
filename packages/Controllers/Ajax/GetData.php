<?php
/**
 * @class Catalogue
 * @package Controllers\Ajax
 * @author Denis Dragomirik <den@lux-blog.org>
 * @version 1.0
 * @since 27.04.2015 / 11:09
 */

namespace Controllers\Ajax;


use App\Controller;

class GetData extends Controller {

	function run () {}

	function getList () {
		$files = [
				'content'       => 'index',
		];

		$data = [
			'count' => 23,
			'paginate' => 5,
			'list' => [
				[
					'id' => 21,
					'title' => 'Peter Thiel. From zero to one',
					'weight' => 580,
				],
				[
					'id' => 22,
					'title' => 'Minecraft: The Official Construction Handbook',
					'weight' => 240,
				],
				[
					'id' => 23,
					'title' => 'The Power of Habit: Why We Do What We Do, and How to Change',
					'weight' => 960,
				],
			],
		];

		echo \App\View::getView ($files, $data);
	}
} 