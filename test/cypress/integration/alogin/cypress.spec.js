const { enviroments, users, menus } = require('../../support/locators');

describe('Teste de Login', ()=>{
  beforeEach(() => {
    cy.login(enviroments.URL, users.ADMIN.USER, users.ADMIN.PASSWORD);
  })

  it('Listar de Login', () => {
    cy.visit(enviroments.URL + menus.PRINCIPAL);
  })

})
