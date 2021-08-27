<template>
    <div class="main">
        <header>
            <div class="container">
                <router-link 
                :to="{ name: 'Home' }" 
                v-on:focus.native="onFocus"
                v-on:blur.native="onBlur"
                >
                <Logo class="logo" />
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
    import Logo from '../assets/logo.svg';
    import Button from '../components/Button.vue';
    import List from '../components/List.vue';

    export default {
        components: { Logo, Button, List},
        data() {
            return {
                images: [],
            }
        },
        methods: {
            async encode(files) {
                if (!files && this.$route.params.files) files = this.$route.params.files;

                if (files) {
                    for (const key in files) {
                        if (key === 'length' || key === 'item') continue;

                        if (files[key]['size'] > (1048576 * 20)) {
                            this.images.push({
                                name: files[key]['name'],
                                size: files[key]['size'],
                                base64: '',
                                error: 'File is too big. Max. 20 MB per file.',
                            });
                        } else {
                            let formData = new FormData();
                            formData.append(key, files[key]);
                            await api.encode(formData)
                                .then(res => this.images = this.images.concat(res.data))
                                .catch(err => console.log(err));
                        }
                    }
                    files = {};
                }
            },
            onFocus(e) {
                e.target.querySelector('.logo').classList.add('onFocus');
            },
            onBlur(e) {
                e.target.querySelector('.logo').classList.remove('onFocus');
            },
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

    .logo:hover {
      cursor: pointer;
    }

    .logo:hover path:nth-of-type(2),
    .logo:hover path:nth-of-type(3) {
      fill: #57942B;
    }

    .logo:hover path:last-of-type {
      fill: #266293;
    }

    .onFocus {
        opacity: 0.7;
    }

    main {
        margin: 5rem 0;
    }
</style>