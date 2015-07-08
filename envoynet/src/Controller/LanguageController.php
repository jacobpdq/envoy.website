<?php
namespace App\Controller;

use App\Controller\AppController;

class LanguageController extends AppController
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
		echo 'test;';
		return $this->redirect($this->referer());
	}

    public function en()
    {
    	I18n::locale('en_CA'); 
    	echo 'teenst;';
    	return $this->redirect($this->referer());
    }
        public function fr()
    {
    	I18n::locale('en_FR');
    	echo 'tefrst;'; 
    	return $this->redirect($this->referer());
    }
}