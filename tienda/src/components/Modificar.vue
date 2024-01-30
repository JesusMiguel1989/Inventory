<template>
    <div class="modal modal2 rounded border border-3 border-dark" v-if="showModal">
        <div class="modal-title text-center">
            <h3 class="pt-3 pb-1 bg-primary text-light">Modificacion</h3>
        </div>
        <div class="modal-content modal2">
            <form @submit.prevent="updateProduct" method="post">
                <div class="row my-2">
                    <div class="col-1"></div>
                    <div class="col-4 text-center fw-bold">
                        <label for="nombre" class="">Id</label>
                    </div>
                    <div class="col-7">
                        <input type="text" class="rounded text-center" v-model="producto.id" id="id">
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-1"></div>
                    <div class="col-4 text-center fw-bold">
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="col-7">
                        <input type="text" class="rounded text-center" v-model="producto.nombre" id="nombre">
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-1"></div>
                    <div class="col-4 text-center fw-bold">
                        <label for="color">Color</label>
                    </div>
                    <div class="col-7">
                        <input type="text" class="rounded text-center" v-model="producto.color" id="color">
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-1"></div>
                    <div class="col-4 text-center fw-bold">
                        <label for="foto">Foto</label>
                    </div>
                    <div class="col-7">
                        <input type="text" class="rounded text-center" v-model="producto.foto" id="foto">
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-1"></div>
                    <div class="col-4 text-center fw-bold">
                        <label for="stock">Stock</label>
                    </div>
                    <div class="col-7">
                        <input type="text" class="rounded text-center" v-model="producto.stock" id="stock">
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-1"></div>
                    <div class="col-4 text-center fw-bold">
                        <label for="precio">Precio</label>
                    </div>
                    <div class="col-7">
                        <input type="text" class="rounded text-center" v-model="producto.precio" id="precio">
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-1"></div>
                    <div class="col-4 text-center fw-bold">
                        <label for="ventas">Ventas</label>
                    </div>
                    <div class="col-7">
                        <input type="text" class="rounded text-center" v-model="producto.ventas" id="ventas">
                    </div>
                </div>
                <button type="submit" class="text-center my-2 fw-bold btn btn-success btn-sm m-auto mt-2">Modificar</button>
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
        'producto'
    ],
    methods: {
        closeModal() {
            this.$emit('close');
        },
        updateProduct() {
            console.log(this.producto.id);
            this.$http.patch('http://localhost:8089/product/edit/' + this.producto.id, this.producto, {
                headers: {
                    'X-CSRF-TOKEN': this.csrfToken,
                    'Access-Control-Allow-Origin': 'http://localhost:8080',
                }
            });
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
    height: 460px;
    background-color: white;
    z-index: 1000;
    display: block !important;
}
.modal2{
    background-color: rgb(243, 242, 242);
}
</style>
  