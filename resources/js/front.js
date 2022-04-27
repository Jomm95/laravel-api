// file responsabile js frontend

window.Vue = require('vue');
window.axios = require('axios');

// importo il componente vue
import Vue from 'vue';
import App from './views/App';

// istanzio nuovo Vue
const app = new Vue ({
    // circoscrivo area azione vue
    el: '#root',
    render: h => h(App), // mostra App all'avvio di Vue
});