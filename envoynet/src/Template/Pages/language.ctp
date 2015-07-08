 <?php

use Cake\I18n\I18n;

$language = $this->request->session()->read('Config.language');

echo $language;

if ($language) {

 switch($language) {
      case "fr":
      I18n::locale('fr_CA');
      $this->request->session()->write('Config.language', 'en');
      break;
      case "en":
      I18n::locale('en_CA');
      $this->request->session()->write('Config.language', 'fr');
      break;
    }
} else {
    $this->request->session()->write('Config.language', 'en');
}


?>
    
