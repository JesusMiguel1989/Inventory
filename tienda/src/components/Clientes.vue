<template>
    <div>
        <div class="producto" v-if="tienda">
            <h1 class="text-center fw-bold text-decoration-underline">Clientes</h1>
            <div class="row bg-secondary">
                <div class="col-2 text-light fw-bold p-2"> Nombre </div>
                <div class="col-2 text-light fw-bold p-2"> Direccion </div>
                <div class="col-2 text-light fw-bold p-2"> Compañia </div>
                <div class="col-1 text-light fw-bold p-2"> Producto </div>
                <div class="col-1 text-light fw-bold p-2"> Unidades </div>
                <div class="col-1 text-light fw-bold p-2"> Precio </div>
                <div class="col-1 text-light fw-bold p-2"> Eliminación </div>
                <div class="col-1 text-light fw-bold p-2"> Edición </div>
            </div>

            <div class="row">
                <div v-for="client in clients" class="row rounded ms-1" :key="client.id">
                    <div class="row my-2">
                        <div class="col-2 text-center fw-bold my-2">
                            {{ client.name }}
                        </div>
                        <div class="col-2 text-center fw-bold my-2">
                            {{ client.address }}
                        </div>
                        <div class="col-2 text-center fw-bold my-2">
                            {{ client.company }}
                        </div>
                        <div class="col-1 text-center fw-bold my-2 mx-1">
                            {{ client.product }}
                        </div>
                        <div class="col-1 text-center fw-bold my-2 mx-1">
                            {{ client.unities }} Unds.
                        </div>
                        <div class="col-1 text-center fw-bold my-2 mx-1">
                            {{ client.price }} €
                        </div>
                        <div class="col-1">
                            <button type="button" @click="deleteClient(client)" class="text-center fw-bold btn btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 100 100">
                                    <path
                                        d="M 46 13 C 44.35503 13 43 14.35503 43 16 L 43 18 L 32.265625 18 C 30.510922 18 28.879517 18.922811 27.976562 20.427734 L 26.433594 23 L 23 23 C 20.802666 23 19 24.802666 19 27 C 19 29.197334 20.802666 31 23 31 L 24.074219 31 L 27.648438 77.458984 C 27.88773 80.575775 30.504529 83 33.630859 83 L 66.369141 83 C 69.495471 83 72.11227 80.575775 72.351562 77.458984 L 75.925781 31 L 77 31 C 79.197334 31 81 29.197334 81 27 C 81 24.802666 79.197334 23 77 23 L 73.566406 23 L 72.023438 20.427734 C 71.120481 18.922811 69.489078 18 67.734375 18 L 57 18 L 57 16 C 57 14.35503 55.64497 13 54 13 L 46 13 z M 46 15 L 54 15 C 54.56503 15 55 15.43497 55 16 L 55 18 L 45 18 L 45 16 C 45 15.43497 45.43497 15 46 15 z M 32.265625 20 L 43.832031 20 A 1.0001 1.0001 0 0 0 44.158203 20 L 55.832031 20 A 1.0001 1.0001 0 0 0 56.158203 20 L 67.734375 20 C 68.789672 20 69.763595 20.551955 70.306641 21.457031 L 71.833984 24 L 68.5 24 A 0.50005 0.50005 0 1 0 68.5 25 L 73.5 25 L 77 25 C 78.116666 25 79 25.883334 79 27 C 79 28.116666 78.116666 29 77 29 L 23 29 C 21.883334 29 21 28.116666 21 27 C 21 25.883334 21.883334 25 23 25 L 27 25 L 61.5 25 A 0.50005 0.50005 0 1 0 61.5 24 L 28.166016 24 L 29.693359 21.457031 C 30.236405 20.551955 31.210328 20 32.265625 20 z M 64.5 24 A 0.50005 0.50005 0 1 0 64.5 25 L 66.5 25 A 0.50005 0.50005 0 1 0 66.5 24 L 64.5 24 z M 26.078125 31 L 73.921875 31 L 70.357422 77.306641 C 70.196715 79.39985 68.46881 81 66.369141 81 L 33.630859 81 C 31.53119 81 29.803285 79.39985 29.642578 77.306641 L 26.078125 31 z M 38 35 C 36.348906 35 35 36.348906 35 38 L 35 73 C 35 74.651094 36.348906 76 38 76 C 39.651094 76 41 74.651094 41 73 L 41 38 C 41 36.348906 39.651094 35 38 35 z M 50 35 C 48.348906 35 47 36.348906 47 38 L 47 73 C 47 74.651094 48.348906 76 50 76 C 51.651094 76 53 74.651094 53 73 L 53 69.5 A 0.50005 0.50005 0 1 0 52 69.5 L 52 73 C 52 74.110906 51.110906 75 50 75 C 48.889094 75 48 74.110906 48 73 L 48 38 C 48 36.889094 48.889094 36 50 36 C 51.110906 36 52 36.889094 52 38 L 52 63.5 A 0.50005 0.50005 0 1 0 53 63.5 L 53 38 C 53 36.348906 51.651094 35 50 35 z M 62 35 C 60.348906 35 59 36.348906 59 38 L 59 39.5 A 0.50005 0.50005 0 1 0 60 39.5 L 60 38 C 60 36.889094 60.889094 36 62 36 C 63.110906 36 64 36.889094 64 38 L 64 73 C 64 74.110906 63.110906 75 62 75 C 60.889094 75 60 74.110906 60 73 L 60 47.5 A 0.50005 0.50005 0 1 0 59 47.5 L 59 73 C 59 74.651094 60.348906 76 62 76 C 63.651094 76 65 74.651094 65 73 L 65 38 C 65 36.348906 63.651094 35 62 35 z M 38 36 C 39.110906 36 40 36.889094 40 38 L 40 73 C 40 74.110906 39.110906 75 38 75 C 36.889094 75 36 74.110906 36 73 L 36 38 C 36 36.889094 36.889094 36 38 36 z M 59.492188 41.992188 A 0.50005 0.50005 0 0 0 59 42.5 L 59 44.5 A 0.50005 0.50005 0 1 0 60 44.5 L 60 42.5 A 0.50005 0.50005 0 0 0 59.492188 41.992188 z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <div class="col-1">
                            <button type="button" @click="modificar(client)" class="text-center fw-bold btn btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 64 64">
                                    <path fill="#ed7899"
                                        d="M46.2,7.92h9.63a4,4,0,0,1,4,4V17.1a0,0,0,0,1,0,0H42.2a0,0,0,0,1,0,0V11.92a4,4,0,0,1,4-4Z"
                                        transform="rotate(45 51.017 12.512)"></path>
                                    <path fill="#c2cde7" d="M32.5 15.51H55.129999999999995V24.869999999999997H32.5z"
                                        transform="rotate(45 43.817 20.19)"></path>
                                    <path fill="#f9e3ae" d="M17.12 17.45H35.5V57.92999999999999H17.12z"
                                        transform="rotate(45 26.318 37.691)"></path>
                                    <path fill="#f6d397" d="M27.38 21.7H33.74V62.17999999999999H27.38z"
                                        transform="rotate(45 30.567 41.941)"></path>
                                    <path fill="#faefde" d="M5 57L6 46 13 47 14 50 16.92 51.5 19 59 7 59 5 57z"></path>
                                    <path fill="#faefde" d="M18.88 13.2H25.24V53.67999999999999H18.88z"
                                        transform="rotate(45 22.068 33.441)"></path>
                                    <path fill="#8d6c9f"
                                        d="M60.59,15.9a4,4,0,0,0-1.17-2.83L50.93,4.59a4.09,4.09,0,0,0-5.66,0L41,8.83a2,2,0,0,0-2.83,0l-5.66,5.66a2,2,0,0,0,0,2.83l.05.05L5.52,44.4a3,3,0,0,0-.87,1.88L4,54.68l-.7,4.92a1,1,0,0,0,1,1.14H4.4L9.32,60l8.45-.62a3,3,0,0,0,1.9-.87l27.08-27a2,2,0,0,0,2.77,0l5.66-5.66a2,2,0,0,0,0-2.83l4.24-4.24A4,4,0,0,0,60.59,15.9Zm-48.69,32,.58,2.88a1,1,0,0,0,.78.78l2.88.58,1.07,5.34L9.59,58,6,54.41l.61-7.6ZM19,56.35l-1-4.77L34.67,35a1,1,0,0,0-1.41-1.41L16.66,50.17,14.3,49.7l-.47-2.36L27.59,33.58a1,1,0,0,0-1.41-1.41L12.42,45.93,7.75,45,34,18.78,45.32,30.09ZM52.34,25.8h0a1,1,0,0,0-1.41,0l-1.41,1.41a1,1,0,0,0,0,1.41h0L48.1,30h0L34,15.9l1.41-1.41a1,1,0,0,0,1.41,0l1.41-1.41a1,1,0,0,0,0-1.41l1.41-1.41.71.71L53.05,23.68l.71.71ZM58,17.31l-4.24,4.24L42.44,10.24,46.69,6a2,2,0,0,1,2.83,0L58,14.49a2,2,0,0,1,0,2.83Z">
                                    </path>
                                    <path fill="#8d6c9f"
                                        d="M40.32 15.19l-1.41 1.41A1 1 0 1 0 40.32 18l1.41-1.41a1 1 0 0 0-1.41-1.41zM43.86 18.73l-1.41 1.41a1 1 0 1 0 1.41 1.41l1.41-1.41a1 1 0 0 0-1.41-1.41zM47.39 22.26L46 23.68a1 1 0 1 0 1.41 1.41l1.41-1.41a1 1 0 0 0-1.41-1.41zM31.84 26.51L29 29.33a1 1 0 1 0 1.41 1.41l2.83-2.83a1 1 0 0 0-1.41-1.41z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-success m-3" @click="addclient">Agregar</button>
                <button type="button" class="btn btn-secondary m-3" @click="inicio">Tienda</button>
            </div>
            <div class="row">
                <AgregarCliente :showModal="modalVisible" @close="closeModal" />
                <ModificarCliente :showModal="modalVisible2" :client="selectedclient" @close="closeModal" />
            </div>
        </div>
    </div>
</template>

<script>
import AgregarCliente from './AgregarCliente.vue';
import ModificarCliente from './ModificarCliente.vue';

export default {
    components: {
        AgregarCliente,
        ModificarCliente
    },
    data() {
        return {
            tienda: true,
            modalVisible: false,
            modalVisible2: false,
            modalVisible3: false,
            clients: [],
            newclient: {
                name: '',
                address: '',
                company: '',
                product: '',
                unities: '',
                price: ''
            },
            selectedclient: {},
            mensaje:''
        };
    },
    methods: {
        addclient() {
            console.log('Añadiendo');

            this.modalVisible = true;
            console.log(this.modalVisible);
        },
        deleteClient(client) {
            console.log('Borrando', client.id);
            this.$http.delete(`http://localhost:8089/client/${client.id}`, {
                headers: {
                    'X-CSRF-TOKEN': this.csrfToken,
                    'Accept': 'application/json'
                }
            })
                .then(response => {
                    console.log(response);
                    this.clients.splice(this.clients.indexOf(client), 1);
                })
                .catch(error => {
                    console.error('Error al Eliminar los productos:', error);
                });
        },
        modificar(client) {
            this.selectedclient = { ...client };
            console.log(this.selectedclient);

            this.modalVisible2 = true;
            console.log(this.modalVisible);
        },
        closeModal() {
            this.modalVisible = false;
            this.modalVisible2 = false;
            this.$http.get('http://localhost:8089/client')
                .then(res => {
                    this.clients = res.body;
                })
                .catch(error => console.error('Error al obtener los productos:', error));
        },
        inicio() {
            window.location.reload();
        }
    },
    created() {
        this.$http.get('http://localhost:8089/client')
            .then(res => {
                this.clients = res.body;
                //console.log(clients);
            })
            .catch(error => console.error('Error al obtener los productos:', error));

    }


};
</script>
  
<style media="screen"></style>
