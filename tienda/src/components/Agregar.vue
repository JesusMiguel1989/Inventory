<template>
    <div>
        <h1 class="text-center fw-bold mt-3">Agregar Producto</h1>
        <form @submit.prevent="addProducto" method="post" action="./product/store">
            <div class="row my-2">
                <div class="col-4"></div>
                <div class="col-2 text-center">
                    <label for="nombre" class="fw-bold">Nombre</label>
                </div>
                <div class="col-6 text-start">
                    <input type="text" class="rounded text-center" v-model="newProduct.nombre" id="nombre">
                </div>
            </div>
            <div class="row my-2">
                <div class="col-4"></div>
                <div class="col-2 text-center">
                    <label for="color" class="fw-bold">Color</label>
                </div>
                <div class="col-6 text-start">
                    <input type="text" class="rounded text-center" v-model="newProduct.color" id="color">
                </div>
            </div>
            <div class="row ,y-2">
                <div class="col-4"></div>
                <div class="col-2 text-center">
                    <label for="foto" class="fw-bold">Foto</label>
                </div>
                <div class="col-6 text-start">
                    <input type="text" class="rounded text-center" v-model="newProduct.foto" id="foto">
                </div>
            </div>
            <div class="row my-2">
                <div class="col-4"></div>
                <div class="col-2 text-center">
                    <label for="stock" class="fw-bold">Stock</label>
                </div>
                <div class="col-6 text-start">
                    <input type="text" class="rounded text-center" v-model="newProduct.stock" id="stock">
                </div>
            </div>
            <div class="row my-2">
                <div class="col-4"></div>
                <div class="col-2 text-center">
                    <label for="precio" class="fw-bold">Precio</label>
                </div>
                <div class="col-6 text-start">
                    <input type="text" class="rounded text-center" v-model="newProduct.precio" id="precio">
                </div>
            </div>
            <div class="row my-2">
                <div class="col-4"></div>
                <div class="col-2 text-center">
                    <label for="ventas" class="fw-bold">Ventas</label>
                </div>
                <div class="col-6 text-start">
                    <input type="text" class="rounded text-center" v-model="newProduct.ventas" id="ventas">
                </div>
            </div>
            <button type="submit" class="text-center fw-bold btn btn-primary btn-sm m-auto mt-2">Agregar</button>
            <button type="button" @click="volver"
                class="text-center fw-bold btn btn-primary btn-sm m-auto mt-2">Volver</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            products: [],
            newProduct: {
                nombre: '',
                color: '',
                foto: '',
                stock: '',
                precio: '',
                ventas: ''
            }
        };
    },
    methods: {
        addProducto() {
            this.$http.post('http://127.0.0.1:8000/product/store', this.newProduct, {
                headers: {
                    'X-CSRF-TOKEN': this.csrfToken
                }
            })
                .then(response => {
                    console.log(response.data);
                    console.log('Añadiendo', this.newProduct);
                    this.products.push({ ...this.newProduct });
                    this.newProduct = {
                        nombre: '',
                        color: '',
                        foto: '',
                        stock: '',
                        precio: '',
                        ventas: ''
                    };

                    window.location.reload();
                })
                .catch(error => {
                    console.error('Error al obtener los productos:', error);
                });


        },
        volver() {
            window.location.reload();
        },
        deleteProducto(producto) {
            console.log('Borrando', producto);
            this.products.splice(this.products.indexOf(producto), 1);
        }
    },
    created() {
        this.$http.get('http://127.0.0.1:8000/product')
            .then(res => {
                this.products = res.body;
                //console.log(products);
            })
            .catch(error => console.error('Error al obtener los productos:', error));

    }


};
</script>
  
<style media="screen">
.productos {
    border: 5px solid black;
    margin: 10px;
}

img {
    width: 300px;
    height: 300px;
}

.celda {
    margin: 10px;
}
</style>
  