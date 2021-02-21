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
        <div class="flex flex-col items-center">
            <div class="w-96 -mt-10 px-10 pb-10 pt-4 relative flex bg-white rounded-2xl">
                <div class="w-full">
                    <input v-model="form.name" class="mb-2 py-2 w-full border-b-2 border-primary" type="text" name="name" autocomplete="name" placeholder="Name" id="name" required>
                    <input v-model="form.email" class="mb-2 py-2 w-full border-b-2 border-primary" type="email" name="email" autocomplete="email" placeholder="Email" id="email" required>
                    <input v-model="form.password" class="mb-2 py-2 w-full border-b-2 border-primary" type="password" name="password" autocomplete="current-password" placeholder="Password" id="password" required>
                </div>
                <button @click="signup" class="text-xl font-bold bg-primary absolute bottom-0 left-0 w-full text-white rounded-b-2xl py-1">Aanmelden</button>
            </div>
            <div>
                <a class="hover:underline" @click="goLogin">Login</a>
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
      goLogin(){
          this.$router.push('/login');
      },
      signup() {
          if(this.form.email && this.form.password && this.form.name){
              axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/api/auth/signup',{
                    name: this.form.name,
                    email: this.form.email,
                    password: this.form.password,
                })
                .then(response => {
                    if(response.status == 200){
                        this.$router.push('/dashboard');
                    }
                    console.log(response);
                });
            });
          }
      }
  },

}
</script>

<style>

</style>
