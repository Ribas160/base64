<template>
    <div class="home">
        <div class="container">
            <Logo class="logo" />
            <h1>Convert your <span>Images</span> to <span>Base64</span></h1>
            <p>
                You can upload images as JPG, PNG, GIF, WebP, SVG or BMP.
            </p>
            <Button class="button" text="Start" v-on:filesUpload="goToMain" />
        </div>
    </div>
</template>

<script>
import Logo from '../assets/logo.svg';
import Button from '../components/Button.vue';

export default {
    name: 'Home',
    components: { Logo, Button },
    methods: {
        goToMain(files) {
            this.$router.push({ 
                name: 'Main', 
                params: { files: files },
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
       .logo {
           width: calc(28rem / 2);
       }

       h1 {
           margin-top: calc(5.6rem / 2);
           font-size: calc(5.6rem / 2);
       }

        p {
            max-width: calc(60rem / 2);
            margin-top: calc(2.4rem / 2);
            font-size: calc(2.8rem / 2);
        }

        .button {
            width: calc(36rem / 2);
            height: calc(10rem / 2);
            margin-top: calc(5.6rem / 2);
            font-size: calc(4.6rem / 2);
            border-radius: calc(10rem / 2);
        }
    }

    @media (orientation: landscape) and (max-height: 340px) {
        .logo {
           width: calc(28rem / 3);
       }

       h1 {
           margin-top: calc(5.6rem / 3);
           font-size: calc(5.6rem / 3);
       }

        p {
            max-width: calc(60rem / 3);
            margin-top: calc(2.4rem / 3);
            font-size: calc(2.8rem / 3);
        }

        .button {
            width: calc(36rem / 3);
            height: calc(10rem / 3);
            margin-top: calc(5.6rem / 3);
            font-size: calc(4.6rem / 3);
            border-radius: calc(10rem / 3);
        }
    }

    @media (orientation: landscape) and (max-height: 230px) {
        .logo {
           width: calc(28rem / 4);
       }

       h1 {
           margin-top: calc(5.6rem / 4);
           font-size: calc(5.6rem / 4);
       }

        p {
            max-width: calc(60rem / 4);
            margin-top: calc(2.4rem / 4);
            font-size: calc(2.8rem / 4);
        }

        .button {
            width: calc(36rem / 4);
            height: calc(10rem / 4);
            margin-top: calc(5.6rem / 4);
            font-size: calc(4.6rem / 4);
            border-radius: calc(10rem / 4);
        }
    }
</style>