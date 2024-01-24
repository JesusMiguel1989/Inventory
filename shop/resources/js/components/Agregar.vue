<template>
    <div>
        <h1 class="text-center fw-bold mt-3">Agregar Producto</h1>
        <form @submit.prevent="addProducto" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" v-model="newProduct.nombre" id="nombre"><br>
            <label for="color">Color</label>
            <input type="text" v-model="newProduct.color" id="color"><br>
            <label for="foto">Foto</label>
            <input type="text" v-model="newProduct.foto" id="foto"><br>
            <label for="stock">Stock</label>
            <input type="text" v-model="newProduct.stock" id="stock"><br>
            <label for="precio">Precio</label>
            <input type="text" v-model="newProduct.precio" id="precio"><br>
            <label for="ventas">Ventas</label>
            <input type="text" v-model="newProduct.ventas" id="ventas"><br>
            <button type="submit" class="text-center fw-bold btn btn-primary btn-sm m-auto">Agregar</button>
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
            console.log('Añadiendo', this.newProduct);

            this.$http.post('http://localhost:5173/product/store', this.newProduct)
                .then(
                    console.log(this.products)
                )
                .catch(error => console.error('Error al obtener los productos:', error));
            this.products.push({ ...this.newProduct });
            this.newProduct = {
                nombre: '',
                color: '',
                foto: '',
                stock: '',
                precio: '',
                ventas: ''
            };
        },
        deleteProducto(producto) {
            console.log('Borrando', producto);
            this.products.splice(this.products.indexOf(producto), 1);
        }
    },
    created() {
        this.$http.get('http://localhost:5173/product')
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
  