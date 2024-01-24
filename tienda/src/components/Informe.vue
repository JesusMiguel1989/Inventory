<template>
    <div>
        <hr>
        <h2>Detalles del Producto</h2>
        <hr>
        <div class="row">
            <div class="col-3">
                <img :src="selectedProduct.foto" alt=selectedProduct.nombre>
            </div>
            <div class="col-9">
                <div class="row">
                    <div class="col-6">
                        <h3>Identificador</h3>
                    </div>
                    <div class="col-6">
                        <h3>{{selectedProduct.id}}</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h3>Nombre</h3>
                    </div>
                    <div class="col-6">
                        <h3>{{selectedProduct.nombre}}</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h3>Color</h3>
                    </div>
                    <div class="col-6">
                        <h3>{{selectedProduct.color}}</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h3>Stock Actual</h3>
                    </div>
                    <div class="col-6">
                        <h3>{{selectedProduct.stock}} </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h3>Precio</h3>
                    </div>
                    <div class="col-6">
                        <h3>{{selectedProduct.precio}} €</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h3>Ventas Totales</h3>
                    </div>
                    <div class="col-6">
                        <h3>{{selectedProduct.ventas}}</h3>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <button @click="closeDetails" class="text-center my-2 fw-bold btn btn-primary btn-sm m-auto mt-2">Cerrar Detalles</button>
    </div>
</template>

<script>
export default {
    props: ['selectedProduct'],
    methods: {
        closeDetails() {
            this.$emit('closeDetails');
            //window.location.reload();
        },
    },
};
</script>
