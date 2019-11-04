<template>
        <img :src="item.url"  class="card-img-top p-1" >
</template>

<script>
export default {
    name:'image-component',
    props:['item'],
}
</script>