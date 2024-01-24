import './bootstrap';
import Vue from 'vue';
import App from './components/app.vue';
import router from './routes';

import Agregar from './components/Agregar.vue';
import Tienda from './components/tienda.vue';

new Vue({
  render: (h) => h(App),
  router,
  components: {
    Agregar,
    Tienda,
  },
}).$mount('#app');
