<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;

class ReportsController extends AppController {
  
  public function beforeFilter(Event $event) {
    parent::beforeFilter($event);
  }
 
  public function str_putcsv($data, $delimiter = ',', $enclosure = '"')
  {
    if (is_array($data) == false){
      return $data;
    } else {
      if (is_array($data[0]) == false) {
        $inputRows = [$data];
      } else {
        $inputRows = $data;
      }
    }
    $data = '';
    foreach ($inputRows as $input) {
      // Open a memory "file" for read/write...
      $fp = fopen('php://temp', 'r+');
      // ... write the $input array to the "file" using fputcsv()...
      $length = fputcsv($fp, $input, $delimiter, $enclosure);
      // ... rewind the "file" so we can read what we just wrote...
      rewind($fp);
      // ... read the entire line into a variable...
      $data .= fread($fp, $length);
      // ... close the "file"...
      fclose($fp);
      // ... and return the $data to the caller, with the trailing newline from fgets() removed.
    }
    return rtrim($data, "\n");
  }
}
?>