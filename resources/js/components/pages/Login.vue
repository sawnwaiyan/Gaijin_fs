<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Product List</div>

                <div class="card-body">
                    <ul class="list-group" >
                        <li class="list-item list-group-item" v-for="product in products" :key="product.id">
                            {{ product.name }}
                            <router-link class="btn btn-primary" :to="{name:'productedit',params: { id: product.id }}">
                                Edit
                            </router-link>
                            <button class="btn btn-danger" @click="deleteProduct(product.id)">Delete</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
  </div>
</template>

<script>
    export default {
        state: {
            isLogin: false
        },
        data() {
            return {
                products: []
            }
        },
        created() {
            this.axios.get('/api/product').then(response=>{
                this.products = response.data;
                console.log(this.products);
            });
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            deleteProduct(id) {
                console.log(id);
                
                this.axios.delete(`/api/product/delete/${id}`).then(response=>{        
                    console.log(this.response.data);
                });
            }
        }
    }
</script>