<template>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12">
                    <div v-if="isLoading">
                        <BaseSpinner></BaseSpinner>
                    </div>
                   
                    <div class="card" style="text-align: center">
                        <div class="card-body">
                            
                            <form @submit.prevent="pay()" class="contact-form">
                                <div style="text-align: center" class="mb-3 mt-3">
                                  <label for="number" class="form-label">Card Number:</label>
                                  <input
                                    v-model.trim="number"
                                    type="number"
                                    class="form-control"
                                    id="number"
                                    name="number"
                                  />
                                </div>
              
                                <div class="date">
                                  <div id="date" style="text-align: center" class="mb-3">
                                    <label for="exp_month" class="form-label"
                                      >Exp Month:</label
                                    >
                                    <input
                                      v-model.trim="exp_month"
                                      type="exp_month"
                                      class="form-control"
                                      id="exp_month"
                                      name="exp_month"
                                    />
                                  </div>
              
                                  <div id="date" style="text-align: center" class="mb-3">
                                    <label for="exp_year" class="form-label">Exp Year:</label>
                                    <input
                                      v-model.trim="exp_year"
                                      type="exp_year"
                                      class="form-control"
                                      id="exp_year"
                                      name="exp_year"
                                    />
                                  </div>
                                </div>
              
                                <div id="cvccvc" style="text-align: center" class="mb-3">
                                  <label for="cvc" class="cvc">cvc:</label>
                                  <input
                                    v-model.trim="cvc"
                                    type="number"
                                    class="cvc"
                                    id="cvc"
                                    name="cvc"
                                  />
                                </div>
              
                                <div style="text-align: center" class="mb-3">
                                  <input
                                    @click="pay()"
                                    type="button"
                                    class="btn btn-primary"
                                    value="submit"
                                  />
                                </div>
                              </form>

                              
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
import BaseSpinner from '../BaseSpinner.vue'
export default {
  name: "VisaCardComponent",
  components:{
    BaseSpinner
  },
  data() {
    return {
      number: 4242424242424242,
      exp_month: 10,
      exp_year: 2024,
      cvc: 123,
      isLoading:false
    };
  },
  methods: {
    async pay() {
      this.isLoading=true
      const headers = { Authorization: localStorage.getItem("token") };

     await axios.post(
          `http://127.0.0.1:8000/api/paymentStore`,
          {
            number: this.number,
            exp_month: this.exp_month,
            exp_year: this.exp_year,
            cvc: this.cvc,
          },
          { headers }

        )
        .then((response) => {
          console.log(response.data);
            Notification.success("payment success");
            this.isLoading=false
        })
        .catch((error) => {
          if (error) {
            console.log(error.response.request.status) ;
            Notification.error(error.response.data.message)
            this.isLoading=false
            this.$router.replace("/OrderComponent");
                      }
        });

        this.isLoading=false
    },
  },
};
</script>
