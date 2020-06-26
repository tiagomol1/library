const locator = require('./locators');

async function start(){

  await Cypress.Commands.add('login', (URL, user, password) => {
    cy.visit(URL + '/index.php');    
    cy.get(locator.menu_locator.USER).type(user);
    cy.get(locator.menu_locator.PASSWORD).type(password);
    cy.get(locator.menu_locator.BTN_LOGIN).click();
  });


  await Cypress.Commands.add('createFriend', (URL, name, phone, email) => {
    cy.visit(URL + '/index.php');    
    cy.get(locator.menu_locator.USER).type('xunda');
    cy.get(locator.menu_locator.PASSWORD).type('123');
    cy.get(locator.menu_locator.BTN_LOGIN).click();
    cy.get('#amigos').click();
    cy.get(locator.menu_locator.BUTTON).click();
    cy.get(locator.menu_locator.NAME).type(name);
    cy.get(locator.menu_locator.PHONE).type(phone);
    cy.get(locator.menu_locator.EMAIL).type(email);
    cy.get(locator.menu_locator.ACTION).click();
  });

  await Cypress.Commands.add('updateFriend', (URL, name, phone, email) => {
    cy.visit(URL + '/index.php');    
    cy.get(locator.menu_locator.USER).type('xunda');
    cy.get(locator.menu_locator.PASSWORD).type('123');
    cy.get(locator.menu_locator.BTN_LOGIN).click();
    cy.get('#amigos').click();
    cy.get(locator.menu_locator.OPTION_UPDATE).click();
    cy.get(locator.menu_locator.NAME).clear();
    cy.get(locator.menu_locator.PHONE).clear();
    cy.get(locator.menu_locator.EMAIL).clear();
    cy.get(locator.menu_locator.NAME).type(name);
    cy.get(locator.menu_locator.PHONE).type(phone);
    cy.get(locator.menu_locator.EMAIL).type(email);
    cy.get(locator.menu_locator.ACTION).click();
  });

  await Cypress.Commands.add('deleteFriend', (URL) => {
    cy.visit(URL + '/index.php');    
    cy.get(locator.menu_locator.USER).type('xunda');
    cy.get(locator.menu_locator.PASSWORD).type('123');
    cy.get(locator.menu_locator.BTN_LOGIN).click();
    cy.get('#amigos').click();
    cy.get(locator.menu_locator.OPTION_DELETE).click();
    cy.get(locator.menu_locator.ACTION).click();
  });

}

start();