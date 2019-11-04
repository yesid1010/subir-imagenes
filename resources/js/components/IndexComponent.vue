<template>

    <div>
      <div class="col-md-6" >
        <upload-image/>
      </div>
      <div class="row">
          <div class="col-md-4" v-for="(item, index) in images" :key="index">
              <div class="card mb-4 box-shadow">
                  <image-component :item="item"/>
                  <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                                <router-link :to="'/imagen/'+item.id" class="btn btn-sm btn-primary m-1">View</router-link>    
                              <button type="button" @click="deleted(item,index)" v-if="noadmin" class="btn btn-sm btn-danger m-1">delete</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div> 
      </div>  
  </div>

</template>

<script>

import UploadImage from "./UploadImageComponent.vue";
import ImageComponent from "./ImageComponent";

import { EventBus } from "./../Bus";
export default {
 
  components:{
    UploadImage, ImageComponent
  },
  props:['urls','noadmin','user'],
  data() {
    return {
      images: [],
      data:'',
    };
  },

  mounted(){
    axios.get(this.urls)
    .then(data =>{
        this.images = data.data
    });
    EventBus.$on("data", data => {
      this.images.push(data.data)
    });

  },

  methods:{
    deleted(item,index){
      axios.get(`/delete/${item.id}`)
      .then(() =>{
        this.images.splice(index,1);
      })
    },

 
  }
  
};
</script>
