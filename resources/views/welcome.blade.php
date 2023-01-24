<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Teach Hive</title>
</head>

<body>
    <div id="app">
        @vite('resources/js/app.js')
    </div>
</body>
<script>
    
window.addEventListener('scroll', e => {
    const header = document.querySelector('#header_')
    e.preventDefault()
    header.classList.toggle('sticky-nav', window.scrollY > 0);
})

const toggleMobileMenu = document.querySelector('#hamburger')
const navbar = document.querySelector('#navbar')

toggleMobileMenu.addEventListener('click', e => {
    e.preventDefault()
    toggleMobileMenu.querySelector('#line').classList.toggle('rotate-45')
    toggleMobileMenu.querySelector('#line').classList.toggle('translate-y-1.5')

    toggleMobileMenu.querySelector('#line2').classList.toggle('-rotate-45')
    toggleMobileMenu.querySelector('#line2').classList.toggle('-translate-y-1')
    if (navbar.clientHeight === 0) {
        navbar.style.paddingTop = '20px'
        navbar.style.paddingBottom = '20px'
        navbar.style.height = `${parseInt(navbar.scrollHeight) + 60}px`
        return
    }
    navbar.style.height = '0px'
    navbar.style.paddingTop = '0px'
    navbar.style.paddingBottom = '0px'
})
</script>

</html>
