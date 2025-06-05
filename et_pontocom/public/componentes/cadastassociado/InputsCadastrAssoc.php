<?php
function Campos($nome,$tipo="text",$class="campo"){
    return "<div class=\"organizacao\">
            <input type=\"$tipo\" name=\"$nome\" class=\"$class\" required placeholder=\"\">
             <label for=\"$nome\">$nome</label>
            </div>";
}
?>