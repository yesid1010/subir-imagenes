<template>
    <div class=" container mt-5">
        <router-view/>
    </div>
</template>
<script>
import {EventBus} from './../Bus'
export default {
    props:['user'],
    methods:{
        est(){
         EventBus.$emit('userss',this.user);

        }
    }

}
</script>