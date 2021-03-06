<template>
  <div @click="showCount">
    {{userpost}}
    {{userfollowers}}
    {{userfollowing}}
  </div>
</template>

<script>
  export default{
    
    data(){
      return{
        userfollowers: this.userfollower
      }
    },
    
    props: ['userpost', 'userfollowing', 'userfollower'],
    
    methods:{
      showCount(){
        alert(this.userfollowers)
      }
    },
    
    mounted() {
      setInterval(() => {
        axios.get('/profile/2').then(res => res.data)
        this.userfollowers = this.userfollower
      }, 2000)
    }
  }
</script>