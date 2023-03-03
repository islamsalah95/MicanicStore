<template>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Order Payments</h4>

                    <div class="table-responsive pt-3">
                      <table class="table table-dark">
                        <thead>
                          <tr>
                            <th>
                             Order 
                            </th>
                            <th>
                              Amount
                            </th>
                            <th>
                              Deadline
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="result in results" :key="result.id">
                            <td>
                              {{result.order_id}}
                            </td>
                            <td>
                             {{result.total_price}}
                            </td>
                            <td>
                              {{result.created_at}}
                            </td>
                          </tr>
                        </tbody>
                      </table>
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
  name: "PaymentComponent",
  components:{
  },
  data() {
    return {
      results: [],

    };
  },created(){
    axios.get(
          `http://127.0.0.1:8000/api/UserPayments`,
          {'Authorization':localStorage.getItem("token") ,
          'Accept':'application/json'
        }
        )
        .then((response) => {
          console.log(response.data.data.results);
          this.results=response.data.data.results;
        })
        .catch((error) => {
          console.log(error);
        });
  },
  methods: {

  },
};
</script>
