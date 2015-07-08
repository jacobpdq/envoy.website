 <?php

use Cake\I18n\I18n;



if (isset($_SESSION["language"])) {


	echo 'isset';

 switch($_SESSION['language']) {
      case "en":
      I18n::locale('fr_CA');
      $_SESSION['language'] = 'fr';
      echo 'variable now french';
      break;
      case "fr":
      I18n::locale('en_CA');
      $_SESSION['language'] = 'en';
      echo 'post now english';
      break;
      default:
      I18n::locale('en_CA');
      $_SESSION['language'] == "en";
      break;   
    }
} else {
	$_SESSION["language"] = "en";
}


?>
    
