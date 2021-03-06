<template>
  <div class="">
    
    <div>
  <form @submit.prevent="followusers" method="POST" action="/follow">
    <slot></slot>
      <input type="hidden" name="profile_id" v-model="profile_id">
  
      <button type="submit" class="btn btn-primary" v-text="followStatus"  :class="{following: status}"></button>
      
  </form>
    </div>
    
    </div>
</template>

<script>
    export default {
      props: ['userid', 'follows'],
      
      data(){
        return{
          status: this.follows,
        }
      },
      
      mounted() {
            //alert(this.status)
        },
        
      methods: {
          followusers(){
            this.status = !this.status
            axios.post('/follow/'+ this.userid).then(res =>
              this.result = res.data
            )
            //this.profile = this.userid
            //this.$refs.followbtn.innerText = "Following"
            //alert(this.profile.id)
            
          },
          

          showPost(){
            axios.get('/profile/2').then(res => this.result = res.data)
          }
        },
        
      computed: {
        followStatus(){
         return (this.status) ? 'Unfollow' : 'Follow';
        }
      }
    }
</script>

<style scoped>
  .following{
    background-color: black;
  }
</style>
