<template>
<a class="dropdown-item" v-on:click="logout">
    <i class="typcn typcn-power text-primary"></i>
    Logout
  </a>
</template>
<script>

export default {
data() {
    return {

    }
},mounted() {},
methods:{
        logout(){
          // window.axios.defaults.headers.common['Authorization'] = localStorage.getItem("token");;

        axios.get("http://127.0.0.1:8000/api/logoutAll",{
  headers: {
    'Content-Type': 'multipart/form-data',
    'Authorization': localStorage.getItem("token")
  }
}).then(  (response) => {
                    localStorage.removeItem("token");
                    localStorage.removeItem("type");
                    this.$root.$emit("isLogin", false);
                }).catch((error) => console.log(error)); 

                this.$router.replace('/')

              } 

                  

              
              },
    
};
</script>



