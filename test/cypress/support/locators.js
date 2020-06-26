const enviroments = {
  URL: 'http://127.0.0.1/faculdade/biblioteca'
};

const menu_locator = {
  USER: '#fUsuario',
  PASSWORD: '#fSenha',
  BTN_LOGIN: '#btnEntrar',
  BUTTON: '#incluirAmigo',
  NAME: '#cNome',
  EMAIL: '#cEmail',
  PHONE: '#cTelefone',
  ACTION: '#btnAcao',
  OPTION_DELETE: '#excluir',
  OPTION_UPDATE: '#alterar'
};

const  friend = {
  NAME: 'clebinho',
  EMAIL: 'clebinho@slc.com',
  PHONE: '127361873',
  NAME2: 'joana',
  EMAIL2: 'joana@slc.com',
  PHONE2: '98392823'
};

const users = {
  ADMIN: {
    USER: 'xunda',
    PASSWORD: '123'
  }
};

const menus = {
  PRINCIPAL: '/principal.php'
}

module.exports = { enviroments, menu_locator, friend, users, menus };