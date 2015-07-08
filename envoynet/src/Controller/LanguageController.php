<?php
namespace App\Controller;

use App\Controller\AppController;

class MainController extends AppController
{
    	public function language($language = null) {

		switch($language) {
			case "en":
			I18n::locale('en_CA');
			break;
			case "fr":
			I18n::locale('fr_CA');
			default:
			I18n::locale('en_CA');    
		}

		return $this->redirect($this->referer());
	}
}