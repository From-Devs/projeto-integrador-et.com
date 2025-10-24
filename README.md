
# ET.com - Projeto Integrador

<img src="https://www.sescsp.org.br/wp-content/uploads/2024/03/scorsese.jpeg" />
*Sistema e-commerce desenvolvido para o Projeto Integrador.* 

---

## Sumário

- [Descrição](#descrição)  
- [Tecnologias](#tecnologias)  
- [Instalação e Setup](#instalação-e-setup)  
- [Fluxo de Trabalho com Git](#fluxo-de-trabalho-com-git)  
- [Estrutura do Projeto](#estrutura-do-projeto)  
- [Contribuições](#contribuições)  
- [Status do Projeto](#status-do-projeto)  
- [Contato](#contato)

---

## Descrição

O ET.com é um sistema e-commerce robusto, construído para oferecer uma plataforma de vendas online moderna e eficiente.  
Este projeto integra diferentes áreas de conhecimento, utilizando PHP orientado a objetos, MVC e banco de dados MySQL, visando práticas profissionais de desenvolvimento.

---

## Tecnologias

- PHP 7+  
- MySQL  
- PDO para conexão segura ao banco  
- MVC (Model-View-Controller)  
- XAMPP (Apache + MySQL) para ambiente local  
- HTML5 e CSS3 para frontend básico (sem frameworks externos)  

---

## Instalação e Setup

1. Clone o repositório na pasta do servidor local (recomendado `htdocs` do XAMPP):  
   ```bash
   git clone https://github.com/seuusuario/et.git C:/xampp/htdocs/et
   ```

2. Configure o banco de dados MySQL:  
   - Crie o banco `et` (ou outro nome conforme o config).  
   - Importe o arquivo SQL de estrutura e dados iniciais (caso exista).

3. Configure as credenciais do banco no arquivo:  
   `config/database.php`

4. Inicie o Apache e o MySQL pelo painel do XAMPP.

5. Acesse via navegador:  
   `http://localhost/et`

---

## Fluxo de Trabalho com Git

- Cada desenvolvedor deve criar uma **branch** nomeada com seu nome e a tarefa em execução, por exemplo:  
  `guilherme-header` ou `mateus-sidebar`.

- Não faça merge direto na branch `main` até que a tarefa esteja completa e revisada.

- Para testar componentes isolados, crie arquivos PHP temporários na pasta do usuário correspondente:  
  `app/views/usuario`, `app/views/adm`, `app/views/associado` ou `app/views/teste`.

- Mensagens e avisos importantes devem ser comunicados no canal do time.

---

## Estrutura do Projeto

```
/app
   /Controllers
   /Models
   /Views
/config
/public
/vendor
README.md
```

- **Models:** Classes para manipulação de dados e banco.  
- **Controllers:** Lógica de controle e fluxo do sistema.  
- **Views:** Templates e arquivos HTML/PHP para interface do usuário.  
- **Config:** Configurações gerais, como banco de dados.  
- **Public:** Arquivos acessíveis publicamente (CSS, JS, imagens).  

---

## Contribuições

- Guilherme: Configuração inicial, modelagem do banco e CRUD de usuários.  
- Mateus: Desenvolvimento do header, barra de pesquisa (em progresso).  
- Nicole: Sidebar e componentes de navegação.  
- Todos devem documentar e fazer commits claros.

---

## Status do Projeto

| Módulo              | Status             | Responsável | Observações                       |
|---------------------|--------------------|-------------|---------------------------------|
| Cadastro de Usuário  | Em desenvolvimento | Guilherme   | Falta ajustes no editar usuário |
| Header              | Quase pronto       | Mateus      | Barra de pesquisa incompleta    |
| Sidebar             | Em testes          | Nicole      | Trocar sidebar provisório       |
| Funcionalidades gerais | Em progresso     | Time        | Revisão final e testes          |

---

## Contato

Para dúvidas e comunicados, utilize o canal oficial do time no [WhatsApp/Slack/Discord].

ftsdsfsfsdf