<template>
    <div>
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                    <h2>Micanic Details</h2>
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
                    <div class="col-4">
                        <div class="team-img" >
                            <img
                                src="http://127.0.0.1:8000/frontend/website/img/team-1.jpg"
                                alt="Team Image"
                            />
                        </div>
                    </div>
                    <div class="col-8">
                        <h1 class="pb-3">{{ targetmicanic.name }}</h1>
                        <div class="row">
                            <div class="col-4">
                                <h5>Rating</h5>
                            </div>
                            <div class="col-4">
                                <h5>Comment</h5>
                            </div>
                        </div>
                        <div class="row"  v-for="rate in micanicrate" :key="rate.id">
                            <div class="col-4">
                                <div v-if="rate.rate == 0">
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <div v-else-if="rate.rate == 1">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <div v-else-if="rate.rate == 2">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <div v-else-if="rate.rate == 3">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <div v-else-if="rate.rate == 4">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <div v-else-if="rate.rate == 5">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                            <div class="col-4">
                                <h3>{{ rate.comment }}</h3>
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
      micanics: [],
      targetmicanic: [],
      micanicrate: [],
    };
  },
  props: ["micanicid"],
  mounted() {
    axios.get("http://127.0.0.1:8000/api/allMicanicRating").then((res) => {
      this.micanics = res.data.data.results;
      for (let i = 0; i < this.micanics.length; i++) {
        if (this.micanics[i].id == this.micanicid) {
          this.targetmicanic = this.micanics[i];

          for (let i = 0; i < this.targetmicanic.rate.length; i++) {
            this.micanicrate = this.targetmicanic.rate;
            console.log(this.micanicrate);
          }
        }
      }
    });
  },
};
</script>
