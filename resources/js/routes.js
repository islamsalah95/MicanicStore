import UserDashboard from "./components/UserDashboard/UserDashboard.vue";
import FirstChild from "./components/UserDashboard/FirstChild.vue";
import SecondChild from "./components/UserDashboard/SecondChild.vue";
import chickOutComponent from "./components/UserDashboard/chickOutComponent.vue";
import PaymentComponent from "./components/UserDashboard/PaymentComponent.vue";
import OrderComponent from "./components/UserDashboard/OrderComponent.vue";



import MicanicDashboard from "./components/MicanicDashboard/MicanicDashboard.vue";
import FirstChildMicanic from "./components/MicanicDashboard/FirstChild.vue";
import CloseOrders from "./components/MicanicDashboard/CloseOrders.vue";


import AdminstrationDashboard from "./components/AdminstrationDashboard/AdminstrationDashboard.vue";
import FirstAdmin from "./components/AdminstrationDashboard/FirstAdmin.vue";
import addCityService from "./components/AdminstrationDashboard/addCityService.vue";
import AllOrdersAdmin from "./components/AdminstrationDashboard/AllOrdersAdmin.vue";
import AllpPaymentsAdmin from "./components/AdminstrationDashboard/AllpPaymentsAdmin.vue";
import HireMicanic from "./components/AdminstrationDashboard/HireMicanic.vue";
import Home from "./components/website/Home.vue";

import LoginComponent from "./components/auth/LoginComponent.vue"


import ResetPass from "./components/auth/ResetPass.vue"
import UpdatePass from "./components/auth/UpdatePass.vue"
import RegisterUsersComponent from "./components/auth/RegisterUsersComponent.vue"
import RegisterMicancsComponent from "./components/auth/RegisterMicancsComponent.vue"
import RatingComponent from "./components/UserDashboard/RatingComponent.vue"




export const routes = [
  {
    path: '/UserDashboard',
    component: UserDashboard,
    children: [
      {path: '',component: FirstChild},
      {path: '/SecondChild/:micanicId',component: SecondChild},
      {path: '/chickOutComponent',component: chickOutComponent},
      {path: '/PaymentComponent',component: PaymentComponent},
      {path: '/OrderComponent',component: OrderComponent},
    ],
    beforeEnter: (to, from,next) => {
      const token=localStorage.getItem('token')
      const type=localStorage.getItem('type');

      if (!token || type !=='user') {
     return  next('/')
      }else{ return  next() }
    },
  },

    { path: '/MicanicDashboard',component: MicanicDashboard,
    children: [
      {path: '',component: FirstChildMicanic},
      {path: '/CloseOrders',component: CloseOrders},


    ],
    beforeEnter: (to, from,next) => {
      const token=localStorage.getItem('token');
      const type=localStorage.getItem('type');

      if (!token || type !=='micanic') {
     return  next('/')
      }else{ return  next() }
    },
  
  },






    { path: '/AdminstrationDashboard',component: AdminstrationDashboard,
    children: [
      {path: '',component: FirstAdmin},
      {path: '/addCityService',component: addCityService},
      {path: '/AllOrdersAdmin',component: AllOrdersAdmin},
      {path: '/AllpPaymentsAdmin',component: AllpPaymentsAdmin},
      {path: '/HireMicanic',component: HireMicanic},
  

    ],

    beforeEnter: (to, from,next) => {
      const token=localStorage.getItem('token');
      const type=localStorage.getItem('type');
      if (!token || type !=='admin') {
     return  next('/')
      }else{ return  next() }
    },
  
  },



    
    { path: '/',component:Home},
    { path: '/LoginComponent',component:LoginComponent},
    { path: '/ResetPass',component:ResetPass},
    { path: '/UpdatePass',component:UpdatePass},
    { path: '/RegisterUsersComponent',component:RegisterUsersComponent},
    { path: '/RegisterMicancsComponent',component:RegisterMicancsComponent},
    { path: '/RatingComponent',component:RatingComponent,
    beforeEnter: (to, from,next) => {
      const token=localStorage.getItem('token')
      const type=localStorage.getItem('type');

      if (!token || type !=='user') {
     return  next('/')
      }else{ return  next() }
    }},


    { path: '/:pathMatch(.*)*', component: Home },
  ]
