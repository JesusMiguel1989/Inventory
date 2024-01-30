<template>
    <div class="modal modal2 rounded border border-3 border-dark" v-if="showModal">
        <div class="modal-title text-center">
            <h3 class="mt-2 pt-3 pb-1 bg-primary text-light">Modificar Cliente</h3>
        </div>
        <div class="modal-content modal2">
            <form @submit.prevent="updateClient" method="post">
                <div class="row my-2">
                    <div class="col-2"></div>
                    <div class="col-3 text-center">
                        <label for="name" class="fw-bold">Nombre</label>
                    </div>
                    <div class="col-6 text-start">
                        <input type="text" class="rounded text-center" v-model="client.name" id="name">
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-2"></div>
                    <div class="col-3 text-center">
                        <label for="address" class="fw-bold">Direccion</label>
                    </div>
                    <div class="col-6 text-start">
                        <input type="text" class="rounded text-center" v-model="client.address" id="address">
                    </div>
                </div>
                <div class="row y-2">
                    <div class="col-2"></div>
                    <div class="col-3 text-center">
                        <label for="company" class="fw-bold">Compañia</label>
                    </div>
                    <div class="col-6 text-start">
                        <input type="text" class="rounded text-center" v-model="client.company" id="company">
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-2"></div>
                    <div class="col-3 text-center">
                        <label for="product" class="fw-bold">Producto</label>
                    </div>
                    <div class="col-6 text-start">
                        <input type="text" class="rounded text-center" v-model="client.product" id="product">
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-2"></div>
                    <div class="col-3 text-center">
                        <label for="unities" class="fw-bold">Unidades</label>
                    </div>
                    <div class="col-6 text-start">
                        <input type="text" class="rounded text-center" v-model="client.unities" id="unities">
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-2"></div>
                    <div class="col-3 text-center">
                        <label for="price" class="fw-bold">Precio</label>
                    </div>
                    <div class="col-6 text-start">
                        <input type="text" class="rounded text-center" v-model="client.price" id="price">
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-12">
                        <button type="submit" class="text-center fw-bold btn btn-success btn-sm m-auto mt-2">Modificar
                            Cliente</button>
                    </div>
                </div>


            </form>
        </div>
        <div class="modal-footer">
            <button @click="closeModal" class="text-center my-2 fw-bold btn btn-danger btn-sm m-auto mt-2">Cerrar</button>
        </div>
    </div>
</template>
  
<script>
export default {
    props: [
        'showModal',
        'client'
    ],
    methods: {
        closeModal() {
            this.$emit('close');
        },
        updateClient() {
            console.log(this.client.id);
            this.$http.patch('http://localhost:8089/client/edit/' + this.client.id, this.client, {
                headers: {
                    'X-CSRF-TOKEN': this.csrfToken,
                    'Access-Control-Allow-Origin': 'http://localhost:8080',
                }
            });
        },
        volver() {
            console.log("Cerrando modal");
            this.modalVisible = false;
        }
    }
};
</script>
  
<style scoped>
.modal {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 500px;
    height: 430px;
    background-color: white;
    z-index: 1000;
    display: block !important;
}
.modal2{
    background-color: rgb(243, 242, 242);
}
</style>
  