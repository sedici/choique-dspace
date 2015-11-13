<h2> <?php echo $name;?> </h2>
<ol>
<?php 
foreach ( $groups as $feed ) {
    foreach ($feed as $item){
    ?> 
    <li><?php echo $nombre=$item->get_title();?></li>
    <?php
        }
}
?>
</ol>



