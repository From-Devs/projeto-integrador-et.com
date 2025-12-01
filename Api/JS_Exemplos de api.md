# JSON GET
```js
fetch('Url://caminho.com/funcao')
    .then(res => res.json())
    .then(data => {
        console.log("Resultado:", data);
    })
    .catch(err => console.error(err));
```
# JSON POST
```js
const data = {
    titulo: "Banner Novo",
    imagem: "banner.png",
    id_produto: 12
};

fetch("http://localhost/store_c", {
    method: "POST",
    headers: {
        "Content-Type": "application/json"
    },
    body: JSON.stringify(data) // <<< igual ao $data do PHP
})
    .then(res => res.json())
    .then(resp => console.log("Resultado:", resp))
    .catch(err => console.error(err));

```
# exemplo pratico 
fazer ele pegar de simples input
```js
<input type="text" id="nome" placeholder="Nome">
<input type="number" id="idade" placeholder="Idade">
<button onclick="enviar()">Enviar</button>
<script>
function enviar() {
    const nome = document.getElementById("nome").value;
    const idade = Number(document.getElementById("idade").value);

    const data = {
        nome: nome,
        idade: idade
    };

    fetch("http://localhost/store_c", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    })
    .then(res => res.json())
    .then(resp => console.log("Servidor respondeu:", resp))
    .catch(err => console.error(err));
}
</script>
```
