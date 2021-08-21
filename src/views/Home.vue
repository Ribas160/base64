<template>
    <div class="home">
        <div class="container">
            <img class="logo" src="../assets/logo.svg" alt="Base64 logo">
            <h1>Convert your <span>Images</span> to <span>Base64</span></h1>
            <p>
                You can upload up to 20 images as JPG, PNG, GIF, WebP, SVG or BMP.
            </p>
            <Button class="button" text="Start" v-on:filesUpload="goToMain" />
        </div>
    </div>
</template>

<script>
import Button from '../components/Button.vue';

export default {
    name: 'Home',
    components: {
        Button,
    },
    methods: {
        goToMain(formData) {
            this.$router.push({ 
                name: 'Main', 
                params: { formData: formData },
            });
        },
    },
}
</script>
<style scoped>
    .container {
       max-width: 140rem;
    }

    .home {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        left: 0;
        right: 0;
        margin: 0 auto;
    }

    .logo {
        width: 28rem;
        margin: 0 auto;
        display: block;
    }

    h1 span:first-of-type {
        color: #96C077;
    }

    h1 span:last-of-type {
        color: #61AFEF;
    }

    p {
        max-width: 60rem;
        margin: 2.4rem auto 0;
        font-family: 'Open Sans', sans-serif;
        font-size: 2.8rem;
        text-align: center;
    }

    .button {
        width: 36rem;
        height: 10rem;
        margin: 5.6rem auto 0;
        font-size: 4.6rem;
        border-radius: 10rem;
    }

    @media (orientation: landscape) and (max-height: 670px) {
        h1, .logo, p {
            display: none;
        }

        .button {
            margin-top: 0;
        }
    }
</style>