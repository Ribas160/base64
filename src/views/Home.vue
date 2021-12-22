<template>
    <div class="home">
        <div class="container">
            <Logo class="logo" />
            <h1>Convert your <span>Images</span> to <span>Base64</span> and back</h1>
            <p>
                You can upload images as JPG, PNG, GIF, WebP, SVG or BMP and decode your Base64 images.
            </p>
			<div class="buttons">
				<Button class="button" text="Encode" v-on:filesUpload="goToEncode" />
				<Button class="button" text="Decode" v-bind:activeInput="false" v-on:click="goToDecode" />
			</div>
		</div>
    </div>
</template>

<script>
import Logo from '../assets/img/logo.svg';
import Button from '../components/Button.vue';

export default {
    name: 'Home',
    components: { Logo, Button },
    methods: {
        goToEncode(files) {
            this.$router.push({ 
                name: 'Encode', 
                params: { files: files },
            });
        },
		goToDecode() {
			this.$router.push({ name: "Decode" })
		}
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
        width: calc(28rem / var(--home-var));
        margin: 0 auto;
        display: block;
    }

    h1 {
        margin: calc(5.6rem / var(--home-var)) 0 0;
        font-size: calc(5.6rem / var(--home-var));
        text-align: center;
    }

    h1 span:first-of-type {
        color: #96C077;
    }

    h1 span:last-of-type {
        color: #61AFEF;
    }

    p {
        max-width: calc(69rem / var(--home-var));
        margin: calc(2.4rem / var(--home-var)) auto 0;
        font-family: 'Open Sans', sans-serif;
        font-size: calc(2.8rem / var(--home-var));
        text-align: center;
    }

	.buttons {
		margin-top: calc(5.6rem / var(--home-var));
		display: flex;
		align-items: center;
		justify-content: center;
	}

    .button {
        width: calc(34rem / var(--home-var));
        height: calc(10rem / var(--home-var));
		margin: 0;
        font-size: calc(4.8rem / var(--home-var));
        border-radius: calc(10rem / var(--home-var));
    }

	.button:first-of-type {
		margin-right: calc(10rem / var(--home-var));
	}
</style>
<style>
    @media (orientation: landscape) and (max-height: 600px) {
        :root {
            --home-var: 1.2;
        }
    }

    @media (orientation: landscape) and (max-height: 450px) {
        :root {
            --home-var: 1.5;
        }
    }

    @media(orientation: landscape) and (max-height: 350px) {
        :root {
            --home-var: 2;
        }
    }
</style>