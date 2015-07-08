 <?php

use Cake\I18n\I18n;

if ($session->read('Config.language')) {

 switch($session->read('Config.language')) {
      case "fr":
      I18n::locale('fr_CA');
      $session->write('Config.language', 'en');
      break;
      case "en":
      I18n::locale('en_CA');
      $session->write('Config.language', 'fr');
      break;
    }
} else {
    $session->write('Config.language', 'en');
}

?>
    
