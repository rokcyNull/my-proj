/** 
 * 歌曲搜索接口
 * 接口地址：https://autumnfish.cn/search
 * 请求方法：get
 * 请求参数：keywords(查询关键字)
 * 响应内容：歌曲搜索结果
 */

/**
 * 歌曲URL获取接口
 * 接口地址：https://autumnfish.cn/song/url
 * 请求方法：get
 * 请求参数：id(歌曲id)
 * 响应内容：歌曲url的id
 */

/**
 * 歌曲封面获取接口
 * 接口地址：https://autumnfish.cn/song/detail
 * 请求方法：get
 * 请求参数：ids(歌曲id)
 * 响应内容：歌曲信息，包含封面信息
 */

/**
 * 歌曲评论获取接口
 * 接口地址：https://autumnfish.cn/comment/hot?type=0
 * 请求方法：get
 * 请求参数：id(歌曲id,type固定为0)
 * 响应内容：歌曲的热门评论
 */


new Vue({
  el: "#app",
  data: {
    query: "五月天",
    musicUrl: "",
    musicCover: "./assets/song-cover.jpg",
    musicList: [],
    isPlaying: false,
    commentList: []
  },
  mounted() {
    this.searchMusic();
  },
  methods: {
    searchMusic: function() {
      let that = this;
      axios.get("https://autumnfish.cn/search?keywords="+that.query)
        .then(function(response) {
          that.musicList = response.data.result.songs;
        })
        .catch(function(error) {
          console.log(error);
        })
    },
    generateSongName(song) {
      let artist = song.artists && song.artists[0].name;
      if (artist) {
        return song.name + '--' +artist
      } else {
        return song.name
      }
    },
    playMusic(musicId) {
      let that = this;
      axios.get("https://autumnfish.cn/song/url?id="+musicId)
        .then(function(response) {
          that.musicUrl = response.data.data[0].url
        })
        .catch(function(error) {
          console.log(response);
        })
      this.setMusicCover(musicId);
      this.setSongComments(musicId);
    },
    setMusicCover(musicId) {
      let that = this;
      axios.get("https://autumnfish.cn/song/detail?ids="+musicId)
        .then(function(response) {
          that.musicCover = response.data.songs[0].al.picUrl
        })
        .then(function(error) {
          console.log(error);
        })
    },
    setSongComments(musicId) {
      let that = this;
      axios.get("https://autumnfish.cn/comment/hot?type=0&id="+musicId)
        .then(function(response) {
          console.log(response.data.hotComments);
          that.commentList = response.data.hotComments;
        })
        .then(function(error) {
          console.log(error);
        }) 
    },
    play() {
      this.isPlaying = true;
    },
    pause() {
      this.isPlaying = false;
    }
  }
})