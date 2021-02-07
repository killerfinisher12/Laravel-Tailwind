<template>
    <div class="">
        <button class="btn btn-primary" @click="followusers">Try lang</button>
    </div>
</template>

<script>
    export default {
      props: ['userid'],
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
          followusers(){
           /* axios.post('/follow/'+ this.userid).then(response => {
              alert(response.data);
            })*/ alert('follow');
          }
        }
    }
</script>
