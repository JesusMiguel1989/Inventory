<template>
  <div id="app">
    <h1>Productos</h1>
    <Agregar/>
  </div>
</template>

<script>
//import HelloWorld from './components/HelloWorld'
import Agregar from './Agregar.vue';
import Tienda from './tienda.vue';

export default {

  name: 'App',
  components: {
    //HelloWorld
    Agregar,
    Tienda
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
