<template>
    <div class="font-main">
        <div v-if="succesNotification" @click="succesNotification = false" class="absolute z-50 justify-center top-16 left-0 w-full flex">
            <div class="w-64 p-3 rounded-xl text-white flex flex-col bg-notification">
                <p class="font-bold text-xl">Link aangemaakt</p>
                <p @click="goToLastLink" class="font-light text-sm underline">Bekijk de link</p>
            </div>
        </div>
        <div class="relative">
            <div class="absolute flex-col flex w-full z-10 p-10">
                <p class="text-5xl text-white font-light">Goodmorning,</p>
                <p class="text-5xl text-white font-light">{{ user.name }}</p>
            </div>
            <div @click="logout" class="absolute z-10 top-10 right-10 flex">
                <i class="las la-sign-out-alt text-4xl text-white"></i>
                <a class="text-white underline text-xl hidden sm:block ">Logout</a>
            </div>
            <div class="blur">
                <img class="w-full h-96 object-cover" src="/img/main-banner.jpg" alt="">
            </div>
        </div>
        <div class="flex justify-center z-50">
            <div class="w-96 -mt-10 px-10 pb-10 pt-4 relative flex bg-white rounded-2xl">
                <input v-model="url" class="mb-2 py-2 w-full border-b-2 border-primary" type="text" name="url" autocomplete="url" placeholder="Link" id="url" required>
                <button @click="addLink" class="text-xl font-bold bg-primary absolute bottom-0 left-0 w-full text-white rounded-b-2xl py-1">Add</button>
            </div>
        </div>
        <div class="bg-white h-half shadow-2xl w-full absolute bottom-0 overflow-auto">
            <div v-for="link in links" v-bind:key="link.id">
                <div class="px-14 py-1 flex flex-col border-t-2 border-gray-200">
                    <a class="text-primary font-bold text-xl" :href="link.url">{{ link.url }}</a>
                    <a class="font-light text-sm underline text-primary">Meer info</a>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
  data () {
    return {
        user: {},
        url: null,
        succesNotification: false,
        lastLink: null,
        links: [],
    }
  },
  methods: {
    logout(){
        this.$store.dispatch('logout');
        this.$router.push('/login');

    },
    goToLastLink(){

    },
    addLink() {
      axios.post('/api/link',{
          url: this.url
      })
      .then(response=> {
          if(response.status == 200){
              this.succesNotification = true;
              this.getLinks();
          }
      });
    },
    getUserData() {
        this.$store.dispatch('setUserData');

    },
    getLinks() {
        axios.get('/api/link')
        .then(response=>{
            this.links = response.data;
        });
    },
  },
  mounted(){
        this.getUserData();
        this.getLinks();
        console.log(this.user);

    }

}
</script>

<style>

</style>

