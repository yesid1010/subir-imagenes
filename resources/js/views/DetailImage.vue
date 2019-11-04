<template>
    <div class="container mt-5 row text-center">
        <div class="col-md-2"></div>
        <div class=" card col-md-6">
            <image-component :item="image"/>
        </div>
        <div class="col-md-4">
            <comment-component :item="image"/>
            <comments-component :item="$route.params.id"/>
        </div>
    </div>
</template>
<script>
import ImageComponent from './../components/ImageComponent'
import CommentComponent from './../components/CommentComponent'
import CommentsComponent from './../components/CommentsComponent'
export default {
    components:{
        ImageComponent,
        CommentComponent,
        CommentsComponent
    },
    created(){
        axios.get(`/show-image/${this.$route.params.id}`)
        .then(data => {
            this.image = data.data
        })

    },

    data(){
        return {
            image:''
        }
    }
}
</script>