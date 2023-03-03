<template>
        <div class="container" style="margin-top: 94px;">
            <div class="row">
                <div class="col-12">                   
                    <div class="card" style="text-align: center">
                        <div class="card-body">
                            
                            <form @submit.prevent="Rateme()" class="contact-form">


                              <div class="form-group">
                                <label for="exampleTextarea1">rate</label>
                                <select 
                                v-model.number="rate"
                                class="form-control form-control-sm"
                                id="exampleFormControlSelect3" >
                                <option value="" selected disabled>chose rate</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                              </div>
              

            

                              <div class="form-group">
                                <label for="exampleTextarea1">comment</label>
                                <textarea 
                                v-model.trim="comment"
                                class="form-control" id="exampleTextarea1" rows="4"></textarea>
                              </div>
            



                              <button @click="Rateme()" type="submit" class="btn btn-primary mr-2">Submit</button>






                              
                              </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</template>

<script>
export default {
  name: "VisaCardComponent",
  components:{
  },
  data() {
    return {
      rate: this.rate,
      comment: this.comment,
    };
  },
  methods: {
    async Rateme() {
console.log(typeof(this.rate));
console.log(typeof(this.comment));

if(typeof(this.comment) !== 'string'  || this.comment == '' ||  this.rate == '' || typeof(this.rate) !== 'number' ){
  Notification.error("inputs is required success");
}else{
  await axios.post(
          `http://127.0.0.1:8000/api/ratingStore`,
          {
            rate: this.rate,
            comment: this.comment,
          },
          {'Authorization': localStorage.getItem("token") ,
          'Accept':'application/json'}
        )
        .then((response) => {
          console.log(response.data.data.rate);
          Notification.success("rate success");
      return this.$router.push("/UserDashboard");
        })
        .catch((error) => {
          console.log(error.response);
          if(error.response.status==404){
            Notification.error("you have alraedy rate this user before");
          }
        });
}
    },
  },
};
</script>



