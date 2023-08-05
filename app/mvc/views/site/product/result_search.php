<?php 
  if (empty($error)) {
    foreach($result as $item) {
      ?>
<a href="<?= base_url('product/show&id='.$item["pdt_id"].'') ?>"><?= $item['pdt_title']?></a>
<?php
      }
} else {
  ?>
<h4 style="color: red;"><?=$error ?></h4>
<?php
}
?>