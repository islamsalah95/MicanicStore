<template>
<div class="container">
<div class="row" 
style="
display: flex;
flex-wrap: wrap;
margin-right: -15px;
margin-left: -15px;
align-items: center;
justify-content: center;
"
>
    <div class="col-8">
        <div class="card" style="margin-top:170px; text-align: center;">
            <div class="card-body">
                <form class="forms-sample" @submit.prevent="register">
                    
                    <div class="form-group">
                        <label for="exampleInputName"
                            >Name</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            id="exampleInputName"
                            v-model.trim="name"
                        />
                        <div
                            v-if="nameVal"
                            class="alert alert-danger"
                        >
                        Name is required
                        </div>
                    </div>

                    
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1"
                            >Email address</label
                        >
                        <input
                            type="email"
                            class="form-control"
                            id="exampleInputEmail1"
                            v-model.trim="email"
                        />
                        <div
                            v-if="emailVal"
                            class="alert alert-danger"
                        >
                            email is required
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword1"
                            >Password</label
                        >
                        <input
                            type="password"
                            class="form-control"
                            id="exampleInputPassword1"
                            v-model.trim="password"
                        />
                        <div
                            v-if="passwordVal"
                            class="alert alert-danger"
                        >
                            passwordVald is required , must be
                            complecated
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="exampleInputPassword2"
                            >Password Confirmation</label
                        >
                        <input
                            type="password"
                            class="form-control"
                            id="exampleInputPassword2"
                            v-model.trim="password_confirmation"
                        />
                        <div
                            v-if="password_confirmationVal"
                            class="alert alert-danger"
                        >
                        Password Confirmation is required , must be
                            match
                        </div>
                    </div>



                    <label>National Id</label>
                        <div class="form-group">
                        <input
                        class="file-upload-browse btn btn-primary"
                            type="file"
                            id="nid_img"
                            @change="uploadId_img"
                            ref="nid_img"
                        />
                      </div>


                      <label>certefication</label>
                      <div class="form-group">
                      <input
                      class="file-upload-browse btn btn-primary"
                          type="file"
                          id="cert_img"
                          @change="uploadCert_img"
                          ref="cert_img"
                      />
                    </div> 

                    <select v-model="selected">
                        <option v-for="item in items" :key="item.id" :value="item.id">
                          {{ item.city }}
                        </option>
                      </select>
                      
                      <!-- <div class="form-group">
                        <label for="exampleFormControlSelect1">select city</label>
                        <select v-model="city_id" class="form-control form-control-lg" id="exampleFormControlSelect1">
                        <option value="">select city</option>
                          <option v-for="item in items" :key="item.id" :value="item.id"> {{item.city}}</option>
                        </select>
                      </div> -->



                    <button
                        type="submit"
                        class="btn btn-primary mr-2"
                        @click="register"
                    >
                        Submit
                    </button>


                    
                </form>
            </div>
        </div>
    </div>



    <div> items==> {{item}}</div>

    

</div>
</div>

</template>

<script>
export default {
    data() {
        return {
            name:"",
            email: "user@gmail.com",
            password: "@User1995",
            password_confirmation:"",
            nid_img:"",
            cert_img:"",
            city_id:"",
            items:"ooo",
            nameVal: false,
            emailVal: false,
            passwordVal: false,
            password_confirmationVal: false,
            nid_imgVal: false,
            cert_imgVal: false,
            city_idVal: false,
        };
    },
    mounted() {
        axios.get("http://127.0.0.1:8000/api/allCities").then((response) => {
                    console.log(response.data.data.results);
                   this.items="islam";
                }).catch((error) => console.log(error)); 
},
    methods: {
        register() {
            this.emailVal = false;
            this.passwordVa = false;
            var mailformatemail =
                /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var mailformatpassword =
                /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,30}$/;
            if (!this.email.match(mailformatemail) || this.email == "") {
                this.emailVal = true;
            } else if (
                !this.password.match(mailformatpassword) ||
                this.password == ""
            ) {
                this.passwordVal = true;
            } else {
                axios
                    .post("http://127.0.0.1:8000/api/registerMicanic", {
                        email: this.email,
                        password: this.password,
                    })
                    .then(async (response) => {
                        console.log(response.data.data.user);
                        await localStorage.setItem(
                            "token",
                            response.data.data.user.token
                        );
                        localStorage.setItem(
                            "type",
                            response.data.data.user.type
                        );

                        this.$store.dispatch("user", response.data.data.user);

                        Notification.success("register success");

                        this.$router.replace("/UserDashboard");
                    })
                    .catch((error) => console.log(error));
            }
        },
    },
};
</script>
