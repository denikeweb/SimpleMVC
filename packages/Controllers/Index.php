<?php

	namespace Controllers;


	use App\Controller;

	class Index extends Controller {
		public function run () {
			$files = [
				'content'       => 'index',
				'template'      => 'template',
			];
			$data = [
				'title'         => 'Title',
				'meta_d'        => '',
				'meta_k'        => '',
			];

			echo \App\View::getView ($files, $data);
			// echo \App\View::getIndexView ();
		}
	}