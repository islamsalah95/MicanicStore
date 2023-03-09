<template>
      
    <div class="container-fluid py-5">
        <Banner title="Micanic Details"></Banner>
   
        <div class="row px-xl-5">
                <div class="col-lg-5 pb-5">
                    <div id="product-carousel" class="carousel slide" data-interval="false">
                        <div class="carousel-inner border">
                            <!-- personal_img -->
                            <div class="carousel-item active">
                                <img class="w-100 h-100" :src="results.personal_img" alt="Image">
                            </div>
                          
                          <!-- cert_img -->
                            <div v-if="isAdmin=='admin'" class="carousel-item">
                                <img class="w-100 h-100" :src="results.cert_img" alt="Image">
                            </div>
                            <!-- nid_img -->
                            <div v-if="isAdmin=='admin'" class="carousel-item">
                                <img class="w-100 h-100" :src="results.nid_img" alt="Image">
                            </div>

                        </div>
                        <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                            <i class="fa fa-2x fa-angle-left text-dark"></i>
                        </a>
                        <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                            <i class="fa fa-2x fa-angle-right text-dark"></i>
                        </a>
                    </div>
                
                
                
                
                </div>
    
                <div class="col-lg-7 pb-5">
                    <h3 class="font-weight-semi-bold">{{ results.name }}</h3>
                    <div class="d-flex mb-3">
                        <div class="text-primary mb-2">
                            <i v-for="i in chick(results.avgRate)" :key="i.id" class="fas fa-star"></i>
                        </div>
                        <small class="pt-1">Rate: {{ results.avgRate }}</small>
                    </div>
    
    
                </div>
            </div>
            
            <div class="row px-xl-5">
                <div class="col">
                    <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                        <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews</a>
                    </div>
                    <div class="tab-content">
    
    
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row">
                               
                               
                                <div v-for="result in results.rate" :id="result.id" class="col-md-6">
                                    <h4 class="mb-4">{{result.user_name}}</h4>
                                    <div class="media mb-4">
                                        <div class="media-body">
                                            <h6>rate: {{result.rate}}<small></i></small></h6>
                                            <h6><i>{{result.created_at}}</i></small></h6>
                                            <div class="text-primary mb-2">
                                                <i v-for="i in chick(result.rate)" :key="i.id" class="fas fa-star"></i>
                                            </div>
                                            <p>{{result.comment}}</p>
                                        </div>
                                    </div>
                                </div>
    

                            </div>
                        </div>
                    </div>
                </div>
            </div>
     </div>
        <!-- Shop Detail End -->

</template>
<script>
import Banner from "./Banner.vue"

export default {
props: ["micanicid"],
  data() {
    return {

      results: [],
      isAdmin:localStorage.getItem("type")

    };
  },
  mounted() {
    axios.get(`http://127.0.0.1:8000/api/spacifyMicanicRating/${this.micanicid}`).then((res) => {
     console.log(res.data.data.results);
     this.results=res.data.data.results
    });
  },methods:{
    chick(rate){
return parseInt(rate);
    }

  },components:{
    Banner
    },
};
</script>
