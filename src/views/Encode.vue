<template>
    <div class="encode">
        <Header />
        <main>
            <div class="container">
				<ul v-if="images">
					<li 
					v-for="(image, index) in images" 
					:key="index" 
					v-clipboard="image.base64"
					v-on:success="success" 
					v-on:click="copied"
					>
						<ListItem v-bind:image="image" actionText="Copied" />
					</li>
				</ul>
                <Button class="button" text="Add files" v-on:filesUpload="encode" />
            </div>
        </main>
    </div>
</template>
<script>
	import Header from '../components/Header.vue';
    import api from '../api/FileUploading';
    import Button from '../components/Button.vue';
    import ListItem from '../components/ListItem/ListItem.vue';
	import listItemAction from '../components/ListItem/action';

    export default {
        components: { Header, Button, ListItem },
        data() {
            return {
                images: [],
				e: {},
            }
        },
        methods: {
            async encode(files) {
                if (!files && this.$route.params.files) files = this.$route.params.files;

                if (files) {
                    for (const key in files) {
                        if (key === 'length' || key === 'item') continue;

                        if (files[key]['size'] > (1048576 * 2)) {
                            this.images.push({
                                name: files[key]['name'],
                                size: files[key]['size'],
                                base64: '',
                                error: 'File is too big. Max. 2 MB per file.',
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
			copied(e) {
				this.e = e;
			},
			success() {
				listItemAction.action(this.e)
			},
		},
        mounted() {
            this.encode();
        }
    }
</script>
<style scoped>
	ul {
        max-width: 82rem;
        margin: 0 auto;
    }

    li {
        height: 7.2rem;
        margin-top: 0.2rem;
        border-radius: 1rem;
        list-style-type: none;
    }

    li:first-of-type {
        margin-top: 0;
    }

    .button {
        width: 24rem;
        height: 6rem;
        margin: 3.2rem auto 6.4rem;
        font-size: 2.8rem;
        border-radius: 10rem;
    }
</style>
