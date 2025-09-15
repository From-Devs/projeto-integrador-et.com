<?php
function Camp($label, $tipo="text", $name=null, $class="campo", $value = "") {
    $id = $name ?? strtolower(str_replace(' ', '_', $label));
    $asterisco = "<b id='red'>*</b>";

    return "
    <div class='{$class}-campo-container'>
        <input type='{$tipo}' name='{$id}' id='{$id}' class='input' required placeholder=' ' value='" . htmlspecialchars($value, ENT_QUOTES) . "'>
        <label for='{$id}'>{$label} {$asterisco}</label>
    </div>";
}
?>