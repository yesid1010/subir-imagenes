<template>
<div>

    <div>
        <div class="media text-muted pt-3" v-for="(items, index) in comments" :key="index">
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <!-- <strong class="d-block text-gray-dark"> usuario : @{{item.user_id}}</strong> -->
                <div class="d-flex justify-content-between align-items-center w-100">
                    <span class="d-block"> {{items.comment}}</span>
                    <button class=" btn-sm btn-danger" v-if="user.id == items.user_id" @click="deletecomment(items,index)">X</button>
                </div>
                
            </div>

        </div>
    </div>
</div>
</template>

<script>
import { EventBus } from "./../Bus";
export default {
    name:'comments-component',
    props : ['item'],
    data(){
        return {
            comments : [],
            user:''
        }
    },
    mounted(){
        axios.get('/users').then(data=>{
                this.user = data.data
        })
        setTimeout(() => {
           this.viewcomments() 
        }, 1000);
    },
    methods:{
        viewcomments(){
            axios.get(`/show-comments/${this.item}`)
            .then(data =>{
                this.comments = data.data
            })

            EventBus.$on('comment',data => {
                this.comments.push(data)
            })
        },
        deletecomment(items,index){
            axios.get(`deletecomment/${items.id}`)
            .then(() => {  
                this.comments.splice(index,1);
            })
        }
    },
 
   
}
</script>

