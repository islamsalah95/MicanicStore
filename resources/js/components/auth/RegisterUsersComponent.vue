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
                        <label for="exampleInputEmail1"
                            >Name</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            id="exampleInputEmail1"
                            v-model.trim="name"
                        />
                        <div
                            v-if="namelVal"
                            class="alert alert-danger"
                        >
                        name is required
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
                        <label for="exampleInputPassword1"
                            >password confirmation</label
                        >
                        <input
                            type="password"
                            class="form-control"
                            id="exampleInputPassword1"
                            v-model.trim="password_confirmation"
                        />
                        <div
                            v-if="password_confirmationVal"
                            class="alert alert-danger"
                        >
                        password confirmation is required , and match must be complecated
                        </div>
                    </div>


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
</div>
</div>

</template>

<script>
export default {
    data() {
        return {
            name: "islam",
            email: "user98798@gmail.com",
            password: "@User1995",
            password_confirmation: "@User1995",

            emailVal: false,
            passwordVal: false,
            nameVal: false,
            password_confirmationVal: false,

            
        };
    },
    mounted() {},
    methods: {
        register() {
            this.emailVal = false;
            this.passwordVa = false;
            this.nameVal = false;

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
            } 
            else if (
               this.password_confirmation == "" || this.password_confirmation !==this.password
            ) {
                this.password_confirmationVal = true;
            }
            else if (
               this.name == "" || typeof(this.name) !='string'
            ) {
                this.nameVal = true;
            }
            else {
                axios
                    .post("http://127.0.0.1:8000/api/register", {
                        name: this.name,
                        email: this.email,
                        password: this.password,
                        password_confirmation:this.password_confirmation,

                    })
                    .then(async (res) => {
                        console.log(res);
                        if(res.status==200){
                       res.data.files;
                        res.status; // HTTP status
                        console.log(res.data.data);
                        Notification.success();
                        this.$router.replace("/VerifyPass")
                        }
                    })
                    .catch((error) => console.log(error));
            }
        },
    },
};
</script>
