<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    <h1>Create Product</h1>
                </div>
                <div class="card-body">
                    <form @submit.prevent="addProduct">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" v-model="product.name">
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" class="form-control" v-model="product.price">
                                </div>
                                <div class="form-group">
                                    <label for="product_desc">Description</label>
                                    <textarea name="description" id="product_desc" class="form-control" cols="30" rows="10" v-model="product.description"></textarea>
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
                    name: '',
                    price: 0,
                    description: ''
                }
            }
        },
        mounted() {
            console.log('')
        },
        methods: {
            addProduct() {
                this.axios.post(`/api/product/create`,this.product).then(response => {
                    console.log(response.data);
                });
            }
        }
    }
</script>