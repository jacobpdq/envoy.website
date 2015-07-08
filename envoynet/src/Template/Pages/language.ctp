 <?php

use Cake\I18n\I18n;

$language = $this->request->session()->read('language');

if ($language) {

 switch($language) {
      case "fr":
      I18n::locale('fr_CA');
      $this->request->session()->write('language', 'en');
      break;
      case "en":
      I18n::locale('en_CA');
      $this->request->session()->write('language', 'fr');
      break;
    }
} else {
    $this->request->session()->write('language', 'en');
}

?>

<script>
document.location = document.referrer;
</script>
    
