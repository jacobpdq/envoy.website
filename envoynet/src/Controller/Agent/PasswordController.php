<?php

namespace App\Controller\Agent;

use App\Controller\AppController;

class PasswordController extends AppController
{

    public function initialize()
    {

		$this->layout = 'default';

    }

    public function forgot()
	    {

			$this->layout = 'default';

	    }

       public function send()
    {

		$this->layout = 'default';

    }

}

?>