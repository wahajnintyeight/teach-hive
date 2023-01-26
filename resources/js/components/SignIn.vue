<template>
    <section
        class="p-16 bg-[conic-gradient(at_bottom_left,_var(--tw-gradient-stops))] from-indigo-600 via-pink-900 to-orange-900 min-h-100">
        <div class=" items-center px-5 py-12 lg:px-20">
            <div class="flex flex-col w-full max-w-md p-10 mx-auto my-6 transition duration-500 ease-in-out transform bg-white rounded-lg md:mt-0"
                v-bind:class="{
                    'animate-pulse': isLoading, 'shake-horizontal': isShaking
                }">
                <div class="mt-8">
                    <!-- <span class="m-4 text-center">Sign Up</span> -->
                    <div class="mt-4">
                        <form action="#" @submit.prevent="login()" method="POST" class="space-y-6">

                            <div>
                                <label for="email" class="block text-sm font-medium text-neutral-600"> Email address
                                </label>
                                <div class="mt-1">
                                    <input id="email" name="email" type="email" v-model="email" autocomplete="email"
                                        required="" placeholder="Your Email"
                                        class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                                </div>
                            </div>

                            <div class="space-y-1">
                                <label for="password" class="block text-sm font-medium text-neutral-600"> Password
                                </label>
                                <div class="mt-1">
                                    <input id="password" v-model="password" name="password" type="password"
                                        autocomplete="current-password" required="" placeholder="Your Password"
                                        class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <input id="remember-me" name="remember-me" type="checkbox"
                                        placeholder="Your password"
                                        class="w-4 h-4 text-blue-600 border-gray-200 rounded focus:ring-blue-500">
                                    <label for="remember-me" class="block ml-2 text-sm text-neutral-600"> Remember me
                                    </label>
                                </div>

                                <div class="text-sm">
                                    <router-link to="/signin">
                                        <span class="font-medium text-blue-600 hover:text-blue-500">
                                            Already have an
                                            account? Sign in.
                                        </span> </router-link>
                                </div>
                            </div>

                            <div>
                                <button type="submit"
                                    class="flex items-center justify-center w-full px-10 py-4 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-blue-600 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Sign
                                    Up</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    name: 'SignUp',
    data() {
        return {

            isShaking: false,
            password: '',
            email: '',
            isLoading: false,
            payload: {}
        };
    },
    methods: {
        async login() {
            this.isLoading = true
            this.payload = {
                'email': this.email,
                'password': this.password,
            }
            try {

                const response = await axios.post('http://localhost:8000/api/login', this.payload);
                // if (typeof response != 'undefined') {
                this.isLoading = false;
                this.$swal(response.data.message);
                if (response.data.success == false) {
                    this.isShaking = true;
                    console.log(response.data);
                } else {
                    localStorage.setItem("token", response.data.data.token)
                    localStorage.setItem("name", response.data.data.name)
                }
                // }

            } catch (error) {
                this.isLoading = false;
                console.error(error)
            }
            // }
        },
    },
}
</script>

<style scoped>
.shake-horizontal {
    animation: shake-horizontal 0.8s cubic-bezier(.36, .07, .19, .97) both;
}

@keyframes shake-horizontal {

    10%,
    90% {
        transform: translateX(-10px);
    }

    20%,
    80% {
        transform: translateX(10px);
    }

    30%,
    50%,
    70% {
        transform: translateX(-10px);
    }

    40%,
    60% {
        transform: translateX(10px);
    }
}
</style>