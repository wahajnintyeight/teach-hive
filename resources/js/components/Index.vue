<template>
    <Nav></Nav>
    <Home></Home>
</template>
<script>

import Nav from './Nav.vue';
import Home from './Home.vue'
// import TextEditor from './components/TextEditor.vue';
export default {
    name: 'Index',
    components: {
        // HomePage,
        Nav,
        Home
    },
    mounted() {
        console.log("MOUNTED")
    }
}
</script>