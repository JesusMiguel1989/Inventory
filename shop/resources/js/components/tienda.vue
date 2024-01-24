<template>
    <div class="producto">
        <h1 class="text-center fw-bold mt-3">Productos</h1>

        <div class="row">
            <div v-for="product in products" class="col-3 productos" :key="product.id">

                <div class="row">
                    <div class="col-6 text-center fw-bold bg-secondary text-light">
                        Producto
                    </div>
                    <div class="col-6 text-center ">
                        {{ product.nombre }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 text-center fw-bold bg-secondary text-light">
                        Color
                    </div>
                    <div class="col-6 text-center">
                        {{ product.color }}
                    </div>
                </div>
                <div class="row">
                    <img :src="product.foto" alt="Product Image" crossorigin="anonymous" />
                </div>
                <div class="row">
                    <div class="col-6 text-center fw-bold bg-secondary text-light">
                        Stock
                    </div>
                    <div class="col-6 text-center">
                        {{ product.stock }}
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-6 text-center fw-bold bg-secondary text-light">
                        Precio
                    </div>
                    <div class="col-6 text-center">
                        {{ product.precio }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 text-center fw-bold bg-secondary text-light">
                        Producto
                    </div>
                    <div class="col-6 text-center">
                        {{ product.ventas }}
                    </div>
                </div>
                <div class="row">
                    <button type="button" @click="deleteProducto(product)" class="text-center fw-bold btn btn-primary btn-sm m-auto">Borrar</button>
                </div>

            </div>
        </div>
        <br>
    </div>
</template>
  
<script>
import axios from 'axios';

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
        axios.get('http://localhost:5173/product')
            .then(res => {
                this.products = res.data; 
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
  