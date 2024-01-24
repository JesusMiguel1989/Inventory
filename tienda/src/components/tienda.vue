<template>
    <div>
        <div class="border border-4 rounded-3 mx-2">
            <h2 class="text-center fw-bold text-decoration-underline">Buscador por filtros</h2>
            <div class="row">
                <div class="col-6">
                    <div class="row mb-3">
                        <div class="col-6">
                            <h3 class="text-end fw-bold">Elige el color:</h3>
                        </div>
                        <div class="col-6">
                            <select @change="eleccion" class="form-select form-select-lg mb-3 text-center w-75"
                                aria-label="Large select">
                                <option class="fw-bold">Todos</option>
                                <option v-for="product in colores">{{ product }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row mb-3">
                        <div class="col-6">
                            <h3 class="text-end fw-bold">Stock minimo</h3>
                        </div>
                        <div class="col-6 text-start mb-3">
                            <input type="number" @change="stocked" class="mb-3 text-center w-75 h-100">
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-12 ">
                    <button type="button" class="btn btn-primary" @click="filtrar">Buscar</button>
                </div>
            </div>
        </div>


        <div class="producto" v-if="tienda">
            <h1 class="text-center fw-bold text-decoration-underline">Productos</h1>

            <div class="row px-3 justify-content-center">
                <div v-for="product in products" class="col-3 productos rounded mx-3" :key="product.id">

                    <div class="row">
                        <div class="col-6 text-center fw-bold bg-secondary text-light">
                            Producto
                        </div>
                        <div class="col-6 text-center fw-bold dato">
                            {{ product.nombre }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 text-center fw-bold bg-secondary text-light">
                            Color
                        </div>
                        <div class="col-6 text-center fw-bold dato">
                            {{ product.color }}
                        </div>
                    </div>
                    <div class="row  dato">
                        <img :src="product.foto" alt="Product Image" crossorigin="anonymous" />
                    </div>
                    <div class="row">
                        <div class="col-6 text-center fw-bold bg-secondary text-light">
                            Stock
                        </div>
                        <div class="col-6 text-center fw-bold dato">
                            {{ product.stock }}
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6 text-center fw-bold bg-secondary text-light">
                            Precio
                        </div>
                        <div class="col-6 text-center fw-bold dato">
                            {{ product.precio }} €
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 text-center fw-bold bg-secondary text-light border-bottom border-dark">
                            Ventas
                        </div>
                        <div class="col-6 text-center fw-bold dato border-bottom border-dark">
                            {{ product.ventas }}
                        </div>
                    </div>

                    <div class="row py-1 dato">
                        <div class="col-6">
                            <button type="button" @click="deleteProducto(product)"
                                class="text-center fw-bold btn btn-danger btn-sm m-auto">Borrar</button>
                        </div>
                        <div class="col-6">
                            <button type="button" @click="modificar(product)"
                                class="text-center fw-bold btn btn-primary btn-sm m-auto">Modificar</button>
                        </div>
                    </div>
                    <div class="row py-1 dato">
                        <div class="col-6">
                            <button type="button" @click="reponer(product)"
                                class="text-center fw-bold btn btn-success btn-sm m-auto">Reponer</button>
                        </div>
                        <div class="col-6">
                            <button type="button" @click="documento(product)"
                                class="text-center fw-bold btn btn-secondary btn-sm m-auto">Informe</button>
                        </div>
                    </div>
                </div>
            </div>

            <Modificar :showModal="modalVisible" :producto="selectedProduct" @close="closeModal" />
            <Reponer :showModal="modalVisible2" :producto="selectedProduct" @close="closeModal" />


        </div>
        <Informe :selectedProduct="selectedProduct" v-show="informe" @closeDetails="closeInforme" />
    </div>
</template>

<script>
import Modificar from './Modificar.vue';
import Reponer from './reponer.vue';
import Informe from './Informe.vue';

export default {
    components: {
        Modificar,
        Reponer,
        Informe
    },
    data() {
        return {
            tienda: true,
            informe: false,
            modalVisible: false,
            modalVisible2: false,
            products: [],
            allProducts: [],
            newProduct: {
                nombre: '',
                color: '',
                foto: '',
                stock: '',
                precio: '',
                ventas: ''
            },
            selectedProduct: {},
            colores: new Set(),
            stock: 0,
            colour: 'Todos'
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
            console.log('Borrando', producto.id);

            this.$http.delete(`http://127.0.0.1:8000/product/${producto.id}`, {
                headers: {
                    'X-CSRF-TOKEN': this.csrfToken,
                    'Accept': 'application/json'
                }
            })
                .then(response => {
                    console.log(response);
                    this.products.splice(this.products.indexOf(producto), 1);
                })
                .catch(error => {
                    console.error('Error al Eliminar los productos:', error);
                });
        },
        reponer(producto) {
            console.log("Reponer " + producto.id);
            this.selectedProduct = { ...producto };
            this.modalVisible2 = true;
        },
        documento(producto) {
            console.log("Informe " + producto.id);
            this.tienda = false;
            this.informe = true;
            this.selectedProduct = producto;
        },
        modificar(producto) {
            this.selectedProduct = { ...producto };
            this.modalVisible = true;
            console.log(this.modalVisible);
        },
        closeModal() {
            this.modalVisible = false;
            this.modalVisible2 = false;
            this.selectedProduct = null;
            window.location.reload();
        },
        closeInforme() {
            this.tienda = true;
            this.informe = false;
        },
        eleccion(event) {
            this.colour = event.target.value;
        },
        stocked(event) {
            this.stock = event.target.value;
        },
        filtrar() {
            this.products = [];

            if (this.colour == "Todos") {
                for (const product of this.allProducts) {
                    if (product.stock >= this.stock) {
                        this.products.push(product);
                    }
                }
            }

            if (this.colour != "Todos") {
                for (const product of this.allProducts) {
                    if (product.color == this.colour && product.stock >= this.stock) {
                        this.products.push(product);
                    }
                }
            }
        }
    },
    created() {
        this.$http.get('http://127.0.0.1:8000/product')
            .then(res => {
                this.allProducts = res.body;
                this.products = res.body;
                for (const product of res.body) {
                    this.colores.add(product.color);
                }
            })
            .catch(error => console.error('Error al obtener los productos:', error));

    }
};
</script>
  
<style media="screen">
.productos {
    border: 5px solid grey;
    margin: 10px;
}

img {
    width: 300px;
    height: 300px;
}

.celda {
    margin: 10px;
}

.dato {
    background-color: rgb(197, 197, 197);
}
</style>
  