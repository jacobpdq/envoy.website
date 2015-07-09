<?php // Custom Handler - goes in src/Error/AppError.php

// In src/Error/AppError.php
namespace App\Error;

use Cake\Error\BaseErrorHandler;

class AppError extends BaseErrorHandler
{
    public function _displayError($error, $debug)
    {
    return $this->redirect(array('controller' => 'Main', 'action' => 'index'));

    }
    public function _displayException($exception)
    {
   return $this->redirect(array('controller' => 'Main', 'action' => 'index'));
 }

	public function handleFatalError($code, $description, $file, $line)
    {
   return $this->redirect(array('controller' => 'Main', 'action' => 'index'));
 }

}

?>