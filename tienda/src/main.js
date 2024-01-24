import 'jquery';
import 'popper.js';

import 'bootstrap/dist/css/bootstrap.css';

import Vue from 'vue'
import VueResource from 'vue-resource'; // Importa Vue Resource
import App from './App'

Vue.use(VueResource); // Usa Vue Resource como un plugin
Vue.config.productionTip = false


new Vue({
  render: h => h(App),
  el: '#app',
  components: { App },
  template: '<App/>'
}).$mount('#app')
