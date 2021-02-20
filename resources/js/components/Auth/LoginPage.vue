<template>
    <div class="font-main">
        <div class="relative">
            <div class="absolute flex w-full z-10 p-10">
                <p class="text-5xl text-white font-light">Goodmorning,</p>
            </div>
            <div class="blur">
                <img class="w-full h-96 object-cover" src="/img/main-banner.jpg" alt="">
            </div>
        </div>
        <div class="flex justify-center">
            <div class="w-96 -mt-10 px-10 pb-10 pt-4 relative flex bg-white rounded-2xl">
                <div class="w-full">
                    <input v-model="form.email" class="mb-2 py-2 w-full border-b-2 border-primary" type="email" name="email" autocomplete="email" placeholder="Email" id="email" required>
                    <input v-model="form.password" class="mb-2 py-2 w-full border-b-2 border-primary" type="password" name="password" autocomplete="current-password" placeholder="Password" id="password" required>
                </div>
                <button @click="login" class="text-xl font-bold bg-primary absolute bottom-0 left-0 w-full text-white rounded-b-2xl py-1">Inloggen</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  data () {
    return {
        form: {},
    }
  },
  methods: {
      login() {
          if(this.form.email && this.form.password){
              axios.get('https://tailwindcss.com/docs/customizing-colors');
          }
      }
  },

}
</script>

<style>

</style>
