<table class="index">
  <tr>
    <th><?php echo __('Company');?></th>
    <th><?php echo __('Address');?></th>
    <th><?php echo __('City');?></th>
    <th><?php echo __('Province');?></th>
    <th><?php echo __('Phonenumber');?></th>
  </tr>
  <?php $data = ""; ?>
  <?php foreach ($agents as $agent): ?>
    <tr>
    <?php
    //'{"name":"John"}'
    $data = '{' .
            '&quot;company&quot:&quot;' . $agent['company'] . '&quot,' .
            '&quot;firstname&quot:&quot;' . $agent['firstname'] . '&quot,' .
            '&quot;lastname&quot:&quot;' . $agent['lastname'] . '&quot,' .
            '&quot;address&quot:&quot;' . $agent['address'] . '&quot,' .
            '&quot;address2&quot:&quot;' . $agent['address2'] . '&quot,' .
            '&quot;city&quot:&quot;' . $agent['city'] . '&quot,' .
            '&quot;province&quot:&quot;' . $agent['province'] . '&quot,' .
          '&quot;postalcode&quot:&quot;' . $agent['postalcode'] . '&quot,' .
            '&quot;email&quot:&quot;' . $agent['email'] . '&quot,' .
            '&quot;phonenumber&quot:&quot;' . $agent['phonenumber'] . '&quot' .
            '}';
    ?>

    <td><a href="#" class="agent-selector" onclick="update('<?php echo $data; ?>');">
        <?php echo $agent['company'] ?></a>
    </td>
    <td><?php echo $agent['address'] ?></td>
    <td><?php echo $agent['city'] ?></td>
    <td><?php echo $agent['province'] ?></td>
    <td><?php echo $agent['phonenumber'] ?></td>
  </tr>
  <?php endforeach; ?>
</table>