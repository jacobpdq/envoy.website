 <?php

 use Cake\I18n\I18n;

 switch($language) {
      case "en":
      I18n::locale('en_CA');
      break;
      case "fr":
      I18n::locale('fr_CA');
      break;
      default:
      I18n::locale('en_CA'); 
      break;   
    }

    print(I18n);
?>
    
