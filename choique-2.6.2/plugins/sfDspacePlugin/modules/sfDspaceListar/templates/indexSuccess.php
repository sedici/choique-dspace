<?php
require_once('View.php');
$view = new View();
if ($all) {
    $view->all_publications ( $groups, $attributes,$type );
} else {
    $view-> publications( $groups, $attributes,$type );
}
?>










