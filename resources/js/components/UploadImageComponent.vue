<template>
    <div class="row mb-5">
        <input type="file" @change="obtenerImagen" id="files" class="form-control col-md-8" accept="image/png, .jpeg, .jpg, image/gif">  
        <button class="btn btn-primary col-md-2 ml-2" v-if="cargada" @click="subir" >upload</button>
        <hr>
    </div>
</template>

<script>
import { EventBus } from './../Bus';
export default {
    name:'upload-image',

    data(){
        return{
            image: { url: "" },
            cargada:false
        }
    },
    methods:{
        obtenerImagen(e) {
            let file = e.target.files[0];
            this.image.url = file;
            this.cargada = true
        },
        subir() {
            let formData = new FormData();
            formData.append("url", this.image.url);
            this.image = { url: "" };
            axios.post("/create", formData).then(data => {
                console.log("creado");
                EventBus.$emit('data', data);
            });
            $("#files").val("");
            this.cargada = false
        },
    }
}
</script>