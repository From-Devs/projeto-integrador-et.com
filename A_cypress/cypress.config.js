const { defineConfig } = require("cypress");

module.exports = defineConfig({
  e2e: {
    setupNodeEvents(on, config) {
      // implement node event listeners here
    },
    baseUrl:"http://localhost/projeto-integrador-et.com/app/views/usuario/"
    // baseUrl:"http://localhost/projeto-integrador-et.com/app/views/associado/"
    // baseUrl:"http://localhost/projeto-integrador-et.com/app/views/adm/"
  },
});
