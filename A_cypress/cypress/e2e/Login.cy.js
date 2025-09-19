describe('Cadastro Tela', () => {
  const data = {
    "id": 1,
    "id": 1,
    "id": 1,
    "id": 1,
    "id": 1,
  }
  it('Cadastro teste Realizado Correto', () => {
    cy.viewport(1920, 1080) 
    cy.visit('/CadastroUsuario.php')
    cy.get("#nome").type("teste")
    cy.get("#data_nascimento").type("2007-12-15")
    cy.get("#senha").type("123")
    cy.get("#confirmar_senha").type("123")
    cy.get("#email").type("teste@teste")
    cy.get("#telefone").type("679925-6895")
    cy.get("#cpf").type("485.565.455-75")
    cy.get("#termos").click()
    cy.get(".botaoConfirmar").click()
  })
  it('Cadastro teste Realizado Incorreto 01', () => {
    cy.viewport(1920, 1080) 
    cy.visit('/CadastroUsuario.php')
    cy.get("#nome").type("teste")
    cy.get("#data_nascimento").type("2007-12-15")
    cy.get("#senha").type("123")
    cy.get("#confirmar_senha").type("123")
    cy.get("#email").type("teste@teste")
    cy.get("#telefone").type("679925-6895")
    cy.get("#cpf").type("485.565.455-75")
    cy.get("#termos").click()
    cy.get(".botaoConfirmar").click()
  })
})