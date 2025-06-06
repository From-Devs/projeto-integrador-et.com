<?php
function Camp($nome, $tipo="text", $class="campo") {
    $id = strtolower(str_replace(' ', '_', $nome)); // Gera um ID único baseado no nome
    $asterisco = ($nome === "Nome Social:") ? "" : "<b id=\"red\">*</b>"; // Remove o asterisco se for "Nome social"
    
    return "
    <div class='$class-campo-container'>
        <input type='$tipo' name='$id' id='$id' class='input' required placeholder=' '>
        <label for='$id'>$nome $asterisco</label>
    </div>";
}
?>
