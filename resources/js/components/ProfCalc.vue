<template>
  <div>
    <div class="row align-items-center">
      <div class="col-12 col-lg-6">
        <div class="mb-3">
          <label for="videocardAmount">Количество видеокарт</label>
          <select v-model="videocardAmount" id="videocardAmount" class="form-select">
            <option value="4">4</option>
            <option value="6">6</option>
            <option value="8">8</option>
            <option value="12">12</option>
          </select>
        </div>
        <div>
          <label for="electricityCost">Цена за кВт⋅ч</label>
          <input v-model="electricityCost" id="electricityCost" type="text" class="form-control">
        </div>
      </div>
      <div class="col-12 col-lg-6">
        <button @click="calc()">Рассчитать</button>
        {{ (Math.ceil(parseFloat(result) / 50) * 50).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") }} ₽
      </div>
    </div>
  </div>
</template>

<script>
  import axios from 'axios';

  export default {
    data() {
      return {
        videocardAmount: 4,
        electricityCost: 3,

        btcKurs: '',
        usdKurs: '',
        result: ''
      };
    },
    created() {
      axios
      .get(`https://blockchain.info/ticker`)
      .then((response => {
        this.btcKurs = response.data.USD.last
      }));
      axios
      .get(`https://www.cbr-xml-daily.ru/daily_json.js`)
      .then((response => {
        this.usdKurs = response.data.Valute.USD.Value
      }));
    },
    computed: {
      electricityCostUsd() {
        return parseFloat(this.electricityCost / this.usdKurs).toFixed(3)
      }
    },
    methods: {
      calc() {
        axios
        .get(`https://whattomine.com/coins.json?eth=true&factor%5Beth_hr%5D=58.1&factor%5Beth_p%5D=130.0&factor%5Be4g_hr%5D=58.1&factor%5Be4g_p%5D=130.0&factor%5Bzh_hr%5D=0.0&factor%5Bzh_p%5D=0.0&factor%5Bcnh_hr%5D=0.0&factor%5Bcnh_p%5D=0.0&factor%5Bcng_hr%5D=2850.0&factor%5Bcng_p%5D=190.0&factor%5Bcnr_hr%5D=0.0&factor%5Bcnr_p%5D=0.0&factor%5Bcnf_hr%5D=0.0&factor%5Bcnf_p%5D=0.0&factor%5Beqa_hr%5D=370.0&factor%5Beqa_p%5D=190.0&factor%5Bcc_hr%5D=9.8&factor%5Bcc_p%5D=190.0&factor%5Bcr29_hr%5D=9.7&factor%5Bcr29_p%5D=190.0&factor%5Bct31_hr%5D=0.55&factor%5Bct31_p%5D=190.0&factor%5Bct32_hr%5D=0.5&factor%5Bct32_p%5D=190.0&factor%5Beqb_hr%5D=32.5&factor%5Beqb_p%5D=190.0&factor%5Brmx_hr%5D=0.0&factor%5Brmx_p%5D=0.0&factor%5Bns_hr%5D=0.0&factor%5Bns_p%5D=0.0&factor%5Bal_hr%5D=160.0&factor%5Bal_p%5D=130.0&factor%5Bops_hr%5D=48.0&factor%5Bops_p%5D=190.0&factor%5Beqz_hr%5D=0.0&factor%5Beqz_p%5D=0.0&factor%5Bzlh_hr%5D=54.5&factor%5Bzlh_p%5D=190.0&factor%5Bkpw_hr%5D=27.0&factor%5Bkpw_p%5D=190.0&factor%5Bppw_hr%5D=26.0&factor%5Bppw_p%5D=190.0&factor%5Bx25x_hr%5D=0.0&factor%5Bx25x_p%5D=0.0&factor%5Bfpw_hr%5D=25.0&factor%5Bfpw_p%5D=150.0&factor%5Bvh_hr%5D=1.19&factor%5Bvh_p%5D=140.0&factor%5Bcost%5D=${this.electricityCostUsd}&sort=Profitability24&volume=0&revenue=24h&factor%5Bexchanges%5D%5B%5D=&factor%5Bexchanges%5D%5B%5D=binance&dataset=Main`)
        .then((response => {
            this.result = response.data.coins.Ethereum.btc_revenue24 * this.btcKurs * this.videocardAmount * this.usdKurs
        }));
      }
    }
  }
</script>