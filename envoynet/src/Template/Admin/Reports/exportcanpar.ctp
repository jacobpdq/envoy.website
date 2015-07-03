<?php
// File: /app/views/orders/csv/export.ctp
// Loop through the data array
/*
foreach ($data as $row) {
  // Loop through every value in a row
  foreach ($row['Subscription'] as &$value) {
    // Apply opening and closing text delimiters to every value
    $value = "\"" . $value . "\"";
  }
  // Echo all values in a row comma separated
  echo implode(",", $row['Subscription']) . "\n";
}
 *
 */
foreach ($data as $row) {
// Loop through every value in a row
$this->Csv->addRow($row['Report']);
// Echo all values in a row comma separated
}
echo $this->Csv->render($filename.'.csv');
?>