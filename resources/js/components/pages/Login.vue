<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Login</div>

                <div class="card-body">
                     <div>
                        <p v-show="isError">認証に失敗しました。</p>
                        <form @submit.prevent="login">
                            <h1>ログイン</h1>
                            メールアドレス: <input type="email" v-model="email">
                            パスワード: <input type="password" v-model="password">
                            <button type="submit" class="btn btn-primary">ログイン</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
  </div>
</template>

<script>
    export default {
        data() {
            return {
                isError: false,
                email: '',
                password: '',
            }
        },
        created() {
            // this.axios.get('/api/product').then(response=>{
            //     this.products = response.data;
            //     console.log(this.products);
            // });
        },
        methods: {
            login() {
                console.log('login');
                this.axios.post('/api/login', {
                    email: this.email,
                    password: this.password,
                }).then(response => {
                    const token = res.data.access_token;
                    console.log('res');
                    axios.defaults.headers.common['Authorization'] = 'Bearer' + token;
                    state.isLogin = true;
                    this.router.push({ path: '/' });
                }).catch(error => {
                    this.isError = true;
                });
            }
        },
        // mounted() {
        //     console.log('Component mounted.')
        // },
    }
</script>