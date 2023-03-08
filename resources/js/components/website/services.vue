<template>
    <div>
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Services</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="service">
            <div class="container">
                <div class="section-header text-center">
                    <p>What We Do?</p>
                    <h2>Our Services</h2>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6" v-for="service in services" :key="service.id">
                        <div class="service-item">
                            <h3>{{service.name}}</h3>
                            <h4>Price: {{service.price}}</h4>
                            <p>Lorem ipsum dolor sit amet elit. Phase nec preti facils ornare velit non metus tortor</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            services:[]
        }
    },
    mounted(){
        axios.get("http://127.0.0.1:8000/api/allServices").then((res) => {
            this.services = res.data.data.results
        });
    }
}
</script>
