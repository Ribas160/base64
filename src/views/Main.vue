<template>
    <div class="main">
        <header>
            <div class="container">
                <router-link 
                :to="{ name: 'Home' }" 
                v-on:focus.native="onFocus"
                v-on:blur.native="onBlur"
                >
                    <img class="logo" src="../assets/logo.svg" alt="Base64 logo">
                </router-link>
            </div>
        </header>
        <main>
            <div class="container">
                <List v-if="images" v-bind:images="this.images" />
                <Button text="Add files" v-on:filesUpload="encode" />
            </div>
        </main>
    </div>
</template>
<script>
    import api from '../api/FileUploading';
    import Button from '../components/Button.vue';
    import List from '../components/List.vue';

    export default {
        components: { Button, List },
        data() {
            return {
                images: [],
            }
        },
        methods: {
            encode(formData) {
                if (this.$route.params.formData) formData = this.$route.params.formData;

                if (formData) {
                    api.encode(formData)
                        .then(res => this.images = this.images.concat(res.data))
                        .catch(err => console.log(err));
                    formData = {};
                }
            },
            onFocus(e) {
                e.target.querySelector('.logo').classList.add('onFocus');
            },
            onBlur(e) {
                e.target.querySelector('.logo').classList.remove('onFocus');
            }
        },
        mounted() {
            this.encode();
        }
    }
</script>
<style scoped>
    .logo {
        width: 6rem;
        margin-top: 2rem;
    }

    .onFocus {
        opacity: 0.7;
    }

    main {
        margin: 5rem 0;
    }
</style>