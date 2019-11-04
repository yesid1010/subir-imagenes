<template>
    <div class="container mt-5">
       <input type="email" v-model="email">
       <input type="password" v-model="password">
       <button @click="enviar">enviar</button>
    </div>
</template>
<script>
export default {
    data(){
        return {
            email:'',
            password:''
        }
    },
    methods:{
        enviar(){
            let formdata = new FormData()
            formdata.append('email',this.email)
            formdata.append('password',this.password)
            axios.post('/login',formdata)
            .then((data)=>{
                console.log(data)
            })
        }
    }
}
</script>