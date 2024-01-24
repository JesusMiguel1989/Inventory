<template>
  <div id="app">
    <div class="row g-0 mx-2">
      <div class="col-6">
        <button v-if="mostrarBoton" type="button" @click="agregar"
          class="text-center fw-bold btn btn-secondary btn-sm my-3">Agregar Producto</button>
      </div>
      <div class="col-6">
        <button v-if="mostrarBoton" type="button" @click="cliente"
          class="text-center fw-bold btn btn-secondary btn-sm my-3">Ventas</button>
      </div>
    </div>
    <component :is="componenteActual" />
  </div>
</template>

<script>
import Tienda from './components/tienda.vue';
import Agregar from './components/Agregar.vue';
import Clientes from './components/Clientes.vue';
import AgregarCliente from './components/AgregarCliente.vue';
import Modificar from './components/Modificar.vue';

export default {
  name: 'App',
  components: {
    Tienda,
    Agregar,
    Clientes,
    AgregarCliente,
    Modificar,
  },
  data() {
    return {
      componenteActual: 'Tienda',
    };
  },
  computed: {
    mostrarBoton() {
      return this.componenteActual === 'Tienda';
    },
  },
  methods: {
    agregar() {
      this.componenteActual = (this.componenteActual === 'Tienda') ? 'Agregar' : 'Tienda';
    },
    cliente() {
      this.componenteActual = (this.componenteActual === 'Tienda') ? 'Clientes' : 'Tienda';
    },
  },
};
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  background-color: rgb(243, 242, 242);
}

</style>
