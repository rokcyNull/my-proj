/**
 * 接口地址：http://wthrcdn.etouch.cn/weather_mini
 * 请求方法：get
 * 请求参数：city(城市名)
 * 响应内容：天气信息
 */

new Vue({
  el: "#app",
  data: {
    city: "",
    weatherList: []
  },
  mounted() {
    this.city = "武汉";
    this.searchWeather();
  },
  methods: {
    searchWeather() {
      let that = this;
      axios.get("http://wthrcdn.etouch.cn/weather_mini?city="+that.city)
        .then(function(response) {
            that.weatherList = response.data.data.forecast;
        })
        .catch(function(error) {
          alert('查询出错！请检查输入是否正确')
        })
    },
    changeCity(city) {
      this.city = city;
      this.searchWeather();
    },
    formatWindText(item) {
      let reg = /\[CDATA\[(.*)\]\]/
      let fengli = item.fengli && reg.exec(item.fengli)[1]      
      return item.fengxiang + fengli
    }
  }
})