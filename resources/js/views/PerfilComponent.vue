<template>
    <div class="container mt-5">
        <index-component urls="/photos" noadmin="true"/>
    </div>
</template>
<script>
import IndexComponent from "./../components/IndexComponent";
export default {
    components:{
        IndexComponent
    }
}
</script>