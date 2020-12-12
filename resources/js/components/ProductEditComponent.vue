<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    <h1>Edit Product</h1>
                </div>
                <div class="card-body">
                    <form @submit.prevent="updateProduct">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" v-model="product.id">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" v-model="product.name">
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" class="form-control" v-model="product.price">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" id="" cols="30" rows="10" v-model="product.description"></textarea>
                                </div><br>
                                <div class="form-group">
                                    <button class="btn btn-primary">Create</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                product: {
                    id: '',
                    name: '',
                    price: 0,
                    description: ''
                }
            }
        },
        created() {
            // console.log('abcd');
            this.axios.get(`/api/product/edit/${this.$route.params.id}`).then(response=>{
                this.product = response.data;
                console.log(this.product);
            });
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            updateProduct() {
                this.axios.post(`/api/product/update/${this.$route.params.id}`,this.product).then(response=>{
                    console.log(this.response.data);
                });
            }
        }
    }
</script>