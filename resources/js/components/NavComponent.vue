
<template>
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="background: #202C45 !important;">
      <a class="navbar-brand brand-logo" href="index.html"><img src="http://127.0.0.1:8000/frontend/images/logo.svg" alt="logo"/></a>
      <a class="navbar-brand brand-logo-mini" href="index.html"><img src="http://127.0.0.1:8000/frontend/images/logo-mini.svg" alt="logo"/></a>
      <button class="navbar-toggler navbar-toggler align-self-center d-none d-lg-flex" type="button" data-toggle="minimize">
        <span class="typcn typcn-th-menu"></span>
      </button>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" style="background: #202C45 !important;">
      <ul class="navbar-nav mr-lg-2">
        
        
        <li  v-if="isLogin && type =='user'" class="nav-item  d-none d-lg-flex">
          <router-link to="/UserDashboard" class="nav-link">
            UserDashboard
          </router-link>
        </li>
        
        <li class="nav-item  d-none d-lg-flex">
          <router-link to="/MicanicDashboard" class="nav-link">
            MicanicDashboard
          </router-link>
        </li>


        <li class="nav-item  d-none d-lg-flex">
          <router-link to="/AdminstrationDashboard" class="nav-link">
            AdminstrationDashboard
          </router-link>
        </li>


        <li class="nav-item  d-none d-lg-flex">
          <router-link to="/Home" class="nav-link">
            Home
          </router-link>
        </li>
        
        <!-- <p>Computed reversed message: "{{ reversedMessage }}"</p> -->

      
        <li class="nav-item dropdown d-flex">
          <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
            <i class="typcn typcn-message-typing"></i>
            <span class="count bg-success">2</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
            <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="http://127.0.0.1:8000/frontend/images/faces/face4.jpg" alt="image" class="profile-pic">
              </div>
              <div class="preview-item-content flex-grow">
                <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                </h6>
                <p class="font-weight-light small-text mb-0">
                  The meeting is cancelled
                </p>
              </div>
            </a>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="http://127.0.0.1:8000/frontend/images/faces/face2.jpg" alt="image" class="profile-pic">
              </div>
              <div class="preview-item-content flex-grow">
                <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                </h6>
                <p class="font-weight-light small-text mb-0">
                  New product launch
                </p>
              </div>
            </a>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="http://127.0.0.1:8000/frontend/images/faces/face3.jpg" alt="image" class="profile-pic">
              </div>
              <div class="preview-item-content flex-grow">
                <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
                </h6>
                <p class="font-weight-light small-text mb-0">
                  Upcoming board meeting
                </p>
              </div>
            </a>
          </div>
        </li>
        <li class="nav-item dropdown  d-flex">
          <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
            <i class="typcn typcn-bell mr-0"></i>
            <span class="count bg-danger">2</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
            <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-success">
                  <i class="typcn typcn-info-large mx-0"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <h6 class="preview-subject font-weight-normal">Application Error</h6>
                <p class="font-weight-light small-text mb-0">
                  Just now
                </p>
              </div>
            </a>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-warning">
                  <i class="typcn typcn-cog mx-0"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <h6 class="preview-subject font-weight-normal">Settings</h6>
                <p class="font-weight-light small-text mb-0">
                  Private message
                </p>
              </div>
            </a>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-info">
                  <i class="typcn typcn-user-outline mx-0"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <h6 class="preview-subject font-weight-normal">New user registration</h6>
                <p class="font-weight-light small-text mb-0">
                  2 days ago
                </p>
              </div>
            </a>
          </div>
        </li>
        <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle  pl-0 pr-0" href="#" data-toggle="dropdown" id="profileDropdown">
            <i class="typcn typcn-user-outline mr-0"></i>
            <span class="nav-profile-name"  v-if="isLogin">{{userName}}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item">
            <i class="typcn typcn-cog text-primary"></i>
            Settings
            </a>

            <LogoutComponent v-on:logout="logout" v-if="isLogin"></LogoutComponent>

            <router-link v-if="!isLogin" to="/LoginComponent" class="dropdown-item">
                Login
              </router-link>

          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="typcn typcn-th-menu"></span>
      </button>
    </div>
  </nav>
</template>
<script>
import LogoutComponent from "./auth/LogoutComponent.vue";

export default {
  name: "NavComponent",
  components:{
    LogoutComponent
  },
  data() {
    return {
        logout:true,
        isLogin:false,
        userName:localStorage.getItem("name"),
        type:localStorage.getItem("type"),
        Notifications:[]

    };
  }, created() {
        const token = localStorage.getItem("token");
        console.log(token);
        if (token) {
            this.isLogin = true;
        }else{
            this.isLogin = false;
        }
        
        this.$root.$on("isLogin", (islogin) => {
            this.isLogin = islogin;
        });

Pusher.logToConsole = true;
var pusher = new Pusher('74b3ee488d87f739442a', {
  cluster: 'mt1'
});
var m=this.Notifications;
var channel = pusher.subscribe('channeMicanic');
channel.bind('PodcastProcessed', function(data) {
  m.push(JSON.stringify(data.order));
});

    //     var userId=localStorage.getItem('id');
    //   Echo.private(`App.Models.Micanic.${userId}`)
    // .notification((notification) => {
    //     console.log(notification);
    // });

    }
    // ,mounted() {
    //   window.Echo.Channel(`channeMicanic`)
    // .listen('podcast-processed', (e) => {
    //     console.log(e);
    //     this.Notifications.push(e)
    // });

    
    // }
    ,
  methods: {
    logout(){
        this.isLogin = false;
    }

  },

  computed: {
    // a computed getter
    reversedMessage: function () {
      // `this` points to the vm instance
      return this.Notifications;
    }
  }

};
</script>
<style scoped>
a{
    color: aliceblue;
}
</style>