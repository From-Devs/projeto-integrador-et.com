describe('Cadastro Tela', () => {
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
    cy.get("#nome").should('be.visible')
    cy.get("#data_nascimento").type("2007-12-15")
    cy.get("#data_nascimento").should('be.visible')
    cy.get("#senha").type("123")
    cy.get("#senha").should('be.visible')
    cy.get("#confirmar_senha").type("123")
    cy.get("#confirmar_senha").should('be.visible')
    cy.get("#email").type("teste@teste")
    cy.get("#email").should('be.visible')
    cy.get("#telefone").type("679925-6895")
    cy.get("#telefone").should('be.visible')
    cy.get("#cpf").type("485.565.455-75")
    cy.get("#cpf").should('be.visible')
    cy.get("#termos").click()
    cy.get(".botaoConfirmar").click()

    cy.url().then((currentUrl) => {
      const urlObj = new URL(currentUrl)
      const erro = urlObj.searchParams.get('erro')
      cy.log('Erro encontrado:', erro)
      console.log('Erro encontrado:', erro)
      
  
      expect(erro).to.not.be.null
  })
  })
  it('Cadastro teste campo Nome', () => {
    cy.viewport(1920, 1080) 
    cy.visit('/CadastroUsuario.php')
    cy.get("#nome").type(" ")
    cy.get("#nome").should('be.visible')
    cy.get("#data_nascimento").type("2007-12-15")
    cy.get("#data_nascimento").should('be.visible')
    cy.get("#senha").type("123")
    cy.get("#senha").should('be.visible')
    cy.get("#confirmar_senha").type("123")
    cy.get("#confirmar_senha").should('be.visible')
    cy.get("#email").type("teste@teste")
    cy.get("#email").should('be.visible')
    cy.get("#telefone").type("679925-6895")
    cy.get("#telefone").should('be.visible')
    cy.get("#cpf").type("485.565.455-75")
    cy.get("#cpf").should('be.visible')
    cy.get("#termos").click()
    cy.get(".botaoConfirmar").click()

    cy.url().then((currentUrl) => {
      const urlObj = new URL(currentUrl)
      const erro = urlObj.searchParams.get('erro')
      cy.log('Erro encontrado:', erro)
      console.log('Erro encontrado:', erro)
      
  
      expect(erro).to.not.be.null
  })
  })
  it('Cadastro teste campo Senha', () => {
    cy.viewport(1920, 1080) 
    cy.visit('/CadastroUsuario.php')
    cy.get("#nome").type("teste")
    cy.get("#nome").should('be.visible')
    cy.get("#data_nascimento").type("2007-12-15")
    cy.get("#data_nascimento").should('be.visible')
    cy.get("#senha").type(" ")
    cy.get("#senha").should('be.visible')
    cy.get("#confirmar_senha").type("123")
    cy.get("#confirmar_senha").should('be.visible')
    cy.get("#email").type("teste@teste")
    cy.get("#email").should('be.visible')
    cy.get("#telefone").type("679925-6895")
    cy.get("#telefone").should('be.visible')
    cy.get("#cpf").type("485.565.455-75")
    cy.get("#cpf").should('be.visible')
    cy.get("#termos").click()
    cy.get(".botaoConfirmar").click()

    cy.url().then((currentUrl) => {
      const urlObj = new URL(currentUrl)
      const erro = urlObj.searchParams.get('erro')
      cy.log('Erro encontrado:', erro)
      console.log('Erro encontrado:', erro)
      
  
      expect(erro).to.not.be.null
  })
  })
  it('Cadastro teste campo ComfirmSenha', () => {
    cy.viewport(1920, 1080) 
    cy.visit('/CadastroUsuario.php')
    cy.get("#nome").type("teste")
    cy.get("#nome").should('be.visible')
    cy.get("#data_nascimento").type("2007-12-15")
    cy.get("#data_nascimento").should('be.visible')
    cy.get("#senha").type("123")
    cy.get("#senha").should('be.visible')
    cy.get("#confirmar_senha").type(" ")
    cy.get("#confirmar_senha").should('be.visible')
    cy.get("#email").type("teste@teste")
    cy.get("#email").should('be.visible')
    cy.get("#telefone").type("679925-6895")
    cy.get("#telefone").should('be.visible')
    cy.get("#cpf").type("485.565.455-75")
    cy.get("#cpf").should('be.visible')
    cy.get("#termos").click()
    cy.get(".botaoConfirmar").click()

    cy.url().then((currentUrl) => {
      const urlObj = new URL(currentUrl)
      const erro = urlObj.searchParams.get('erro')
      cy.log('Erro encontrado:', erro)
      console.log('Erro encontrado:', erro)
      
  
      expect(erro).to.not.be.null
  })
  })
  it('Cadastro teste campo E-mail', () => {
    cy.viewport(1920, 1080) 
    cy.visit('/CadastroUsuario.php')
    cy.get("#nome").type("teste")
    cy.get("#nome").should('be.visible')
    cy.get("#data_nascimento").type("2007-12-15")
    cy.get("#data_nascimento").should('be.visible')
    cy.get("#senha").type("123")
    cy.get("#senha").should('be.visible')
    cy.get("#confirmar_senha").type("123")
    cy.get("#confirmar_senha").should('be.visible')
    cy.get("#email").type("a@a")
    cy.get("#email").should('be.visible')
    cy.get("#telefone").type("679925-6895")
    cy.get("#telefone").should('be.visible')
    cy.get("#cpf").type("485.565.455-75")
    cy.get("#cpf").should('be.visible')
    cy.get("#termos").click()
    cy.get(".botaoConfirmar").click()

    cy.url().then((currentUrl) => {
      const urlObj = new URL(currentUrl)
      const erro = urlObj.searchParams.get('erro')
      cy.log('Erro encontrado:', erro)
      console.log('Erro encontrado:', erro)
      
  
      expect(erro).to.not.be.null
  })
  })
  it('Cadastro teste campo Telefone', () => {
    cy.viewport(1920, 1080) 
    cy.visit('/CadastroUsuario.php')
    cy.get("#nome").type("teste")
    cy.get("#nome").should('be.visible')
    cy.get("#data_nascimento").type("2007-12-15")
    cy.get("#data_nascimento").should('be.visible')
    cy.get("#senha").type("123")
    cy.get("#senha").should('be.visible')
    cy.get("#confirmar_senha").type("123")
    cy.get("#confirmar_senha").should('be.visible')
    cy.get("#email").type("teste@teste")
    cy.get("#email").should('be.visible')
    cy.get("#telefone").type(" ")
    cy.get("#telefone").should('be.visible')
    cy.get("#cpf").type("485.565.455-75")
    cy.get("#cpf").should('be.visible')
    cy.get("#termos").click()
    cy.get(".botaoConfirmar").click()

    cy.url().then((currentUrl) => {
      const urlObj = new URL(currentUrl)
      const erro = urlObj.searchParams.get('erro')
      cy.log('Erro encontrado:', erro)
      console.log('Erro encontrado:', erro)
      
  
      expect(erro).to.not.be.null
  })
  })
  it('Cadastro teste campo Cpf', () => {
    cy.viewport(1920, 1080) 
    cy.visit('/CadastroUsuario.php')
    cy.get("#nome").type("teste")
    cy.get("#nome").should('be.visible')
    cy.get("#data_nascimento").type("2007-12-15")
    cy.get("#data_nascimento").should('be.visible')
    cy.get("#senha").type("123")
    cy.get("#senha").should('be.visible')
    cy.get("#confirmar_senha").type("123")
    cy.get("#confirmar_senha").should('be.visible')
    cy.get("#email").type("teste@teste")
    cy.get("#email").should('be.visible')
    cy.get("#telefone").type("679925-6895")
    cy.get("#telefone").should('be.visible')
    cy.get("#cpf").type(" ")
    cy.get("#cpf").should('be.visible')
    cy.get("#termos").click()
    cy.get(".botaoConfirmar").click()

    cy.url().then((currentUrl) => {
      const urlObj = new URL(currentUrl)
      const erro = urlObj.searchParams.get('erro')
      cy.log('Erro encontrado:', erro)
      console.log('Erro encontrado:', erro)
      
  
      expect(erro).to.not.be.null
  })
  })
  it('Cadastro teste campo SenhasIguais01', () => {
    cy.viewport(1920, 1080) 
    cy.visit('/CadastroUsuario.php')
    cy.get("#nome").type("teste")
    cy.get("#nome").should('be.visible')
    cy.get("#data_nascimento").type("2007-12-15")
    cy.get("#data_nascimento").should('be.visible')
    cy.get("#senha").type("124")
    cy.get("#senha").should('be.visible')
    cy.get("#confirmar_senha").type("123")
    cy.get("#confirmar_senha").should('be.visible')
    cy.get("#email").type("teste@teste")
    cy.get("#email").should('be.visible')
    cy.get("#telefone").type("679925-6895")
    cy.get("#telefone").should('be.visible')
    cy.get("#cpf").type("485.565.455-75")
    cy.get("#cpf").should('be.visible')
    cy.get("#termos").click()
    cy.get(".botaoConfirmar").click()

    cy.url().then((currentUrl) => {
      const urlObj = new URL(currentUrl)
      const erro = urlObj.searchParams.get('erro')
      cy.log('Erro encontrado:', erro)
      console.log('Erro encontrado:', erro)
      
  
      expect(erro).to.not.be.null
  })
  })
  it('Cadastro teste campo SenhasIguais012', () => {
    cy.viewport(1920, 1080) 
    cy.visit('/CadastroUsuario.php')
    cy.get("#nome").type("teste")
    cy.get("#nome").should('be.visible')
    cy.get("#data_nascimento").type("2007-12-15")
    cy.get("#data_nascimento").should('be.visible')
    cy.get("#senha").type("123")
    cy.get("#senha").should('be.visible')
    cy.get("#confirmar_senha").type("124")
    cy.get("#confirmar_senha").should('be.visible')
    cy.get("#email").type("teste@teste")
    cy.get("#email").should('be.visible')
    cy.get("#telefone").type("679925-6895")
    cy.get("#telefone").should('be.visible')
    cy.get("#cpf").type("485.565.455-75")
    cy.get("#cpf").should('be.visible')
    cy.get("#termos").click()
    cy.get(".botaoConfirmar").click()

    cy.url().then((currentUrl) => {
      const urlObj = new URL(currentUrl)
      const erro = urlObj.searchParams.get('erro')
      cy.log('Erro encontrado:', erro)
      console.log('Erro encontrado:', erro)
      
  
      expect(erro).to.not.be.null
  })
  })
})

  