 <?php

 use Cake\I18n\I18n;

if (isset($_POST["username"])) {

 switch($_POST['language']) {
      case "en":
      I18n::locale('fr_CA');
      $_POST['language'] = 'fr';
      break;
      case "fr":
      I18n::locale('en_CA');
      $_POST['language'] = 'en';
      break;
      default:
      I18n::locale('en_CA');
      $_POST['language'] == "en";

      break;   
    }
}

?>
    
