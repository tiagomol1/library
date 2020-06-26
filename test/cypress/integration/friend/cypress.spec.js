const { enviroments, friend, menus } = require('../../support/locators');

describe('Teste de criar Amigo', ()=>{
  beforeEach(() => {
    cy.createFriend(enviroments.URL, friend.NAME, friend.PHONE, friend.EMAIL);
  })

  it('teste de criar amigo', () => {
    cy.visit(enviroments.URL + menus.PRINCIPAL)
  })
})


describe('Teste de Alterar Amigo', ()=>{
  beforeEach(() => {
    cy.updateFriend(enviroments.URL, friend.NAME2, friend.PHONE2, friend.EMAIL2);
  })

  it('teste de alterar amigo', () => {
    cy.visit(enviroments.URL + menus.PRINCIPAL)
  })
})


describe('Teste de Excluir Amigo', ()=>{
  beforeEach(() => {
    cy.deleteFriend(enviroments.URL);
  })

  it('teste de Excluir amigo', () => {
    cy.visit(enviroments.URL + menus.PRINCIPAL)
  })
})