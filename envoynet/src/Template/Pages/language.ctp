 <?php

use Cake\I18n\I18n;

if (isset($_POST["language"])) {

 switch($_POST['language']) {
      case "en":
      I18n::locale('fr_CA');
      $_POST['language'] = 'fr';
      echo 'variable now french';
      break;
      case "fr":
      I18n::locale('en_CA');
      $_POST['language'] = 'en';
      echo 'post now english';
      break;
      default:
      I18n::locale('en_CA');
      $_POST['language'] == "en";
      break;   
    }
} else {
	$_POST["language"] = "en";
}

?>
    
