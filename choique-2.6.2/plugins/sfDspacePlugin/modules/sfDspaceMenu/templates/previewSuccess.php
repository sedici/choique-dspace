<?php
require_once('View.php');


echo (link_to('Volver', 'sfDspaceMenu/index'));

$view = new View();
if ($all) {
    $view->all_publications ( $groups, $attributes,$type );
} else {
    $view-> publications( $groups, $attributes,$type );
}
?>





