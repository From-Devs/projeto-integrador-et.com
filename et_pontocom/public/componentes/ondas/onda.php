<?php
function createOnda($tipo){
    if ($tipo == 1){
        return "<div class='wave solida'></div>";
    }else{
        return "<div class='wave fantasma'></div>";
    }
}
?>