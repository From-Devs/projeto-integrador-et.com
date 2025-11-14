<?php
function Camp($label, $tipo="text", $name=null, $class="campo", $value = "", $erro="") {
    $id = $name ?? strtolower(str_replace(' ', '_', $label));
    $asterisco = "<b id='red'>*</b>";
    $classErro = !empty($erro) ? 'input-erro' : '';
    $classErroLabel = !empty($erro) ? 'label-erro' : '';

    return "
    <div class='{$class}-campo-container'>
        <input type='{$tipo}' name='{$id}' id='{$id}' class='input {$classErro}' required placeholder=' ' value='" . htmlspecialchars($value, ENT_QUOTES) . "'>
        <label for='{$id}' class='{$classErroLabel}'>{$label} {$asterisco}</label>
    </div>";
}
?>