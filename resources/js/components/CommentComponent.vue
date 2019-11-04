<template>
    <div class="modal-footer">
        <input type="text" class="form-control" v-model="comment">
        <button type="button" class="btn btn-primary" @click="enviar">comment</button>
    </div>
    
</template>

<script>
import CommentsComponent from './CommentsComponent'
import {EventBus} from './../Bus';
export default {
    components:{
         CommentsComponent
    },

    name:'comment-component',
    data(){
        return {
            comment : '',
        }
    },
    props:['item'],
    methods:{
        enviar(){
           let formData = new FormData();       
           formData.append('comment',this.comment);
           formData.append('image_id',this.item.id);
           
           this.comment = ''
           axios.post('/create-comment',formData)
           .then(data=>{
               console.log(data)
               EventBus.$emit('comment', data.data); 
           })
           
        }
    }
}
</script>

