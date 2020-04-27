<template>
    <div>
        <div style="display:none">
            <select class="ui dropdown" v-model="report_type" @change="fetchThis">
                <option>Daily</option>
                <option>Weekly</option>
                <option>Monthly</option>
            </select>
        </div>

        <p align="right">
            <button :class="{'ui button primary small': report.vehicles > 0,'ui button primary small disabled': report.vehicles <= 0}">
                    <a style="color:#fff !important" href="/reports/daily/vehicles/download"><i class="file pdf icon"></i> Generate Pdf</a>
            </button>
        </p>
        
      <table class="ui celled striped  fixed single line table">
        <tbody>
          <tr>
            <td>
              <strong>Total new vehicles registered</strong>
            </td>
            <td>
              {{report.vehicles}}
            </td>
          </tr>
          <tr>
            <td>
              <strong>Total new vehicles from Harare</strong>
            </td>
            <td>
              {{report.harare}}
            </td>
          </tr>

          <tr>
            <td>
              <strong>Total new vehicles from Bulawayo</strong>
            </td>
            <td>
              {{report.bulawayo}}
            </td>
          </tr>

          <tr>
            <td>
              <strong>Total new vehicles from Other</strong>
            </td>
            <td>
              {{report.others}}
            </td>
          </tr>

          <tr>
            <td>
              <strong>Total vehicles in the system</strong>
            </td>
            <td>
              {{report.all}}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
</template>
<script>
import Axios from 'axios'

export default {
    data(){
        return{
            report_type:"Daily",
            report:{
                harare:0,
                vehicles:0,
                bulawayo:0,
                others:0,
                all:0,
            }
        }
    },
    methods:{
        getDaily(){
            Axios.post("/reports/get/daily/vehicles")
            .then(response=>{
                this.report = response.data;
            })
            .catch(error=>{
                alert("Cannot fetch daily report")
            });
        },

        getWeekly(){
            Axios.post("/reports/get/weekly/vehicles")
            .then(response=>{
                this.report = response.data;
            })
            .catch(error=>{
                alert("Cannot fetch weekly report")
            });
        },

        getMonthly(){
            Axios.post("/reports/get/monthly/vehicles")
            .then(response=>{
                this.report = response.data;
            })
            .catch(error=>{
                alert("Cannot fetch monthly report")
            });
        },

        fetchThis(){
            var type = this.report_type
            if(type == "Daily"){
                this.getDaily();
            }

            else if(type == "Weekly"){
                this.getWeekly();
            }

            else if(type == "Monthly"){
                this.getMonthly();
            }
        }
    },

    mounted(){
        this.getDaily();
    }
}
</script>