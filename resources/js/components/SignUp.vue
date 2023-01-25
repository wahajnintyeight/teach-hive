<template>
    <section
        class="p-16 bg-[conic-gradient(at_bottom_left,_var(--tw-gradient-stops))] from-indigo-600 via-pink-900 to-orange-900 min-h-100">
        <div class=" items-center px-5 py-12 lg:px-20">
            <div class="flex flex-col w-full max-w-md p-10 mx-auto my-6 transition duration-500 ease-in-out transform bg-white rounded-lg md:mt-0"
                v-bind:class="{
                    'animate-pulse': isLoading
                }">
                <div class="mt-8">
                    <!-- <span class="m-4 text-center">Sign Up</span> -->
                    <div class="mt-4">
                        <form action="#" @submit.prevent="register()" method="POST" class="space-y-6">

                            <div>
                                <label for="email" class="block text-sm font-medium text-neutral-600"> Full Name
                                </label>
                                <div class="mt-1">
                                    <input id="fname" v-model="fname" name="fname" type="text" required
                                        placeholder="Your Full Name"
                                        class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                                </div>
                            </div>

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
                            <div class="space-y-1">
                                <label for="password" class="block text-sm font-medium text-neutral-600">Confirm
                                    Password
                                </label>
                                <div class="mt-1">
                                    <input id="password" v-model="password2" name="password" type="password"
                                        autocomplete="current-password" required="" placeholder="Confirm Password"
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
                                    <a href="#" class="font-medium text-blue-600 hover:text-blue-500"> Already have an
                                        account? Sign in. </a>
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
            password2: '',
            password: '',
            email: '',
            fname: '',
            isLoading: false,
            payload: {}
        };
    },
    methods: {
        async register() {
            this.isLoading = true
            this.payload = {
                "model": "text-davinci-003",
            }
            try {
                const response = await axios.post('http://localhost:8000/api/register', this.payload);
                if (typeof response != 'undefined') {
                    this.isLoading = false;
                    console.log(response)
                }
            } catch (error) {
                this.isLoading = false;
                console.error(error)
            }
            // }
        },
    },
}
</script>