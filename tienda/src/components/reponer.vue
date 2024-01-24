<template>
    <div class="modal modal2 rounded border border-3 border-dark" v-if="showModal">
        <div class="modal-title text-center">
            <h3 class="pt-3 pb-1 bg-primary text-light">Reponer {{ producto.nombre }}</h3>
        </div>
        <div class="modal-content modal2">
            <form @submit.prevent="updateProduct" method="post">
                <div class="row my-2">
                    <div class="col-1"></div>
                    <div class="col-4 text-center fw-bold">
                        <label for="cantidadReponer">Cantidad a Reponer</label>
                    </div>
                    <div class="col-7">
                        <input type="text" class="rounded text-center" id="cantidadReponer" v-model="cantidadReponer">
                    </div>
                </div>
                <button type="submit" class="text-center my-2 fw-bold btn btn-success btn-sm m-auto mt-2">Reponer</button>
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
    data() {
        return {
            cantidadReponer: 0
        };
    },
    methods: {
        closeModal() {
            this.$emit('close');
        },
        updateProduct() {
            console.log(this.producto.id);

            const data = {
                stock: this.producto.stock + parseInt(this.cantidadReponer, 10)
            };

            this.$http.patch(`http://127.0.0.1:8000/product/replace/${this.producto.id}`, data, {
                headers: {
                    'X-CSRF-TOKEN': this.csrfToken,
                }
            })
                .then(response => {
                    console.log('Actualización exitosa:', response);
                })
                .catch(error => {
                    console.error('Error al actualizar el stock:', error);
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
    height: 255px;
    background-color: white;
    z-index: 1000;
    display: block !important;
    
}
.modal2{
    background-color: rgb(243, 242, 242);
}
</style>
