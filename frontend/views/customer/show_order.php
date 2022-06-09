<?php
foreach ($orders as $order) {
   foreach ($order->customers as $customer) {
      $tmp_customer_id = $customer->id;
?>
      <h4 style="margin: 0; margin-top:30px;"><?= $customer->nama ?></h4>
   <?php
   }
   if ($order->customer_id == $tmp_customer_id) {
   ?>
      <p style="margin:0;">Nomor Order: <?= $order->id ?></p>
      <p style="margin:0;">Tanggal Order: <?= $order->date ?></p>
      <p style="margin:0; margin-top:20px;">Item</p>
      <ul>
         <?php
         foreach ($order->items as $item) {
            if ($order->id == $item['order_id']) {
         ?>
               <li style="margin:0;"><?= $item['name'] ?></li>
         <?php
            }
         }
         ?>
      </ul>
<?php
   }
}
?>