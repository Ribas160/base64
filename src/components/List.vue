<template>
    <ul>
        <li 
        v-for="image in images" 
        :key="image.id" 
        v-clipboard="image.base64" 
        v-on:success="success"
        v-on:click="copied"
        :class="{error: image.error}"
        >
            <button>
                <!-- <div class="img"><img :src="image.base64"></div> -->
                <div class="img" v-bind:style="{backgroundImage: 'url(' + image.base64 + ')'}"></div>
                <p class="name">{{ image.name }}</p>
                <p class="size" v-if="!image.error">{{ image.size }}</p>
                <p class="size" v-if="image.error">{{ image.error }}</p>
                <p class="message">Copied</p>
            </button>
        </li>
    </ul>
</template>
<script>
export default {
    props: ['images'],
    data() {
        return {
            target: {},
        }
    },
    methods: {
        copied(e) {
            this.target = e.target;
        },
        success() {
            let pSize = this.target.querySelector('.size');
            let message = this.target.querySelector('.message');

            this.target.classList.add('copied');
            pSize.style.display = 'none';
            message.style.display = 'block';

            setTimeout(() => {
                pSize.style.display = 'block';
                message.style.display = 'none';
            }, 2000);
        }
    }
}
</script>
<style scoped>
    ul {
        max-width: 58rem;
        margin: 0 auto;
    }

    li {
        margin-top: 0.2rem;
        border-radius: 0.5rem;
        list-style-type: none;
    }

    button {
        width: 100%;
        height: 100%;
        padding: 1rem;
        display: flex;
        align-items: center;
        background-color: #373D47;
        border-radius: inherit;
        transition: all 0.5s ease;
    }

    button:hover, button:focus {
        background-color: #61AFEF;
    }

    button:hover {
        cursor: pointer;
    }

    li:active, .copied {
        background-color: #96C077;
    }

    li:active .size {
        color: #93DD5D;
    }

    li .img {
        width: 3rem;
        height: 3rem;
        margin-right: 1rem;
        background-size: cover;
        background-position: center top;
    }

    li .img img {
        max-width: 100%;
        max-height: 100%;
    }

    li p {
        font-size: 1.6rem;
        transition: all 0.5s ease;
        pointer-events: none;
    }

    .name {
        width: 10rem;
    }

    li .size {
        margin: 0 auto;
        color: #D19A66;
    }

    .message {
        margin: 0 auto;
        display: none;
        color: #93DD5D;
    }

    .copied:hover {
        background-color: #96C077;
    }

    .error {
        background: #E06C75;
        pointer-events: none;
    }
</style>