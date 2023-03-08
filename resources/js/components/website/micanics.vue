<template>
    <div>
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Team Member</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="team">
            <div class="container">
                <div class="section-header text-center">
                    <p>Meet Our Team</p>
                    <h2>Our Engineers & Workers</h2>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6" v-for="micanic in micanics" :key="micanic.id">
                        <div class="team-item">
                            <router-link :to="'/micanics/'+micanic.id">
                                <div class="team-img">
                                    <img
                                    src="http://127.0.0.1:8000/frontend/website/img/team-1.jpg"
                                    alt="Team Image"
                                    />
                                </div>
                            </router-link>
                            <div class="team-text">
                                <h2>{{micanic.name}}</h2>
                                <div class="team-social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                </div>
                                <!-- <div v-for="rate in rates" :key="rate.id">
                                    <div v-if="rate == 0" class="text-light">
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                    </div>
                                    <div v-if="rate== 1"  class="text-light">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                    </div>
                                    <div v-if="rate == 2"  class="text-light">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                    </div>
                                    <div v-if="rate == 3"  class="text-light">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                    </div>
                                    <div v-if="rate == 4"  class="text-light">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                    </div>
                                    <div v-if="rate == 5"  class="text-light">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
      micanics:[],
      micanicrate:[],
      rates:0
    };
  },
  mounted() {
    axios.get("http://127.0.0.1:8000/api/allMicanicRating").then((res) => {
        for(let i=0; i<res.data.data.results.length; i++)
        {
            this.micanics.push(res.data.data.results[i])
        }
        for(let i=0; i<res.data.data.results.length; i++)
        {
            this.micanicrate.push(this.micanics[i].rate[0].rate)
        }

        for(let i=0; i<res.data.data.results.length; i++)
            this.rates = this.micanicrate
        console.log(this.rates)



    });

  },
};
</script>
