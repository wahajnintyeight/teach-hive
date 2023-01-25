<template>
    <Nav></Nav>
</template>
<script>

import Nav from './Nav.vue';
// import Home from './Home.vue'
// import TextEditor from './components/TextEditor.vue';
export default {
    name: 'Index',
    components: {
        // HomePage,
        Nav
    },
    mounted() {
        console.log("MOUNTED")
    }
}
</script>