<?php

function strim($string){
return ucfirst(strtolower(trim(strip_tags($string))));
}

function warning($string){
    echo '<div class="col s12"><div class="alert alert-warning alert-dismissible" style="font-size:9px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Warning!</strong>'.' '.$string.'</div></div>';
}


?>