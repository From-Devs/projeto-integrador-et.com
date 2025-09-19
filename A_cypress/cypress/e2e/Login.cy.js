describe('Login Tela', () => {
    it('Login teste Realizado Correto', () => {
      cy.viewport(1920, 1080) 
      cy.visit('/Login.php')
      cy.get("#esqueciSenha").click()
      cy.get("#recoverPassword").type("a@a")
      cy.get(".recoverPasswordButtonText").click()
      cy.get("#email").type("a@a")
      cy.get("#senha").type("123")
      cy.get("#botaoEntrar").click()
    })

    it('Login teste SemRecoverSenha', () => {
        cy.viewport(1920, 1080) 
        cy.visit('/Login.php')
        cy.get("#esqueciSenha").click()
        cy.get("#recoverPassword").type("")
        cy.get(".recoverPasswordButtonText").click()
        cy.get("#email").type("a@a")
        cy.get("#senha").type("123")
        cy.get("#botaoEntrar").click()
      })

    it('Login teste semSenha', () => {
        cy.viewport(1920, 1080) 
        cy.visit('/Login.php')
        cy.get("#email").type("a@a")
        cy.get("#senha").type(" ")
        cy.get("#botaoEntrar").click()

        cy.url().then((currentUrl) => {
            const urlObj = new URL(currentUrl)
            const erro = urlObj.searchParams.get('erro')
            cy.log('Erro encontrado:', erro)
            console.log('Erro encontrado:', erro)
            
            expect(erro).to.not.be.null
        })
    })
})