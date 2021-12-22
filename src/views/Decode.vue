<template>
	<div class="decode">
		<Header />
		<main>
			<div class="container">
				<textarea v-model="base64" placeholder="Enter your code" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" col="1"></textarea>
				<Button class="button" text="Decode" v-bind:activeInput="false" v-on:click="decode" />
				<ul v-if="images">
					<li
					v-for="(image, index) in images" 
					:key="index"
					v-on:click="download(image, $event)"
					>	
						<ListItem v-bind:image="image" actionText="Saved" />
					</li>
				</ul>
			</div>			
		</main>
	</div>
</template>
<script>
	import Header from '../components/Header.vue';
	import Button from '../components/Button.vue';
	import ListItem from '../components/ListItem/ListItem.vue';
	import listItemAction from '../components/ListItem/action';

	export default {
		components: { Header, Button, ListItem },
		data() {
			return {
				base64: '',
				images: [],
			}	
		},
		mounted() {
			let textarea = this.$el.querySelector('textarea');
			textarea.onpaste = () => {
				setTimeout(() => {textarea.scrollTop = 0; textarea.scrollLeft = 0;}, 10);
			}
		},
		methods: {
			decode() {
				if (this.base64) {
					let matches = this.base64.match(/data:image\/(jpeg|png|svg|webp|gif|bmp)/);

					let image = {
						name: 'image',
						size: this.base64.length,
						base64: this.base64,
						error: '',							
					}

					if (matches === null || typeof matches[1] === 'undefined') {
						image.error = 'Invalid image format';
					} else {
						image.name = image.name + '.' + matches[1];
					}

					if (!image.error) {
						let img = new Image();
						img.onerror = () => {
							image.error = 'Invalid Base64';
						}
						img.src = this.base64;
						img = null;
					}
			
					this.images.push(image);
					this.base64 = '';	
				} else {
					let textarea = this.$el.querySelector('textarea');
					textarea.classList.add('textareaError');
					textarea.onclick = () => {
						textarea.classList.remove('textareaError');
					}
				}
			},
			download(image, e) {
				if (image.error) return;

				let a = document.createElement('a');
				a.setAttribute('href', image.base64);
				a.setAttribute('download', image.name);
				a.click();
				a.remove();
				listItemAction.action(e);
			},
		}
	}
</script>
<style scoped>
	textarea {
		width: 100%;
		max-width: 82rem;
		height: 29.4rem;
		margin: 0 auto;
		padding: 1.2rem;
		display: block;
		color: #373D47;
		font-family: Arial, sans-serif;
		font-size: 2.8rem;
		background-color: #1F2228;
		border: 0.4rem solid #373D47;
		border-radius: 1rem;
		transition: all 0.2s ease;
		resize: none;
		scrollbar-width: none;
		-ms-overflow-style: none;
		overflow-x: hidden;
		overflow: hidden;
	}

	textarea::-webkit-scrollbar {
		width: 0;
	}

	textarea::placeholder {
		color: inherit;
		font-family: 'Roboto', sans-serif;
	}

	textarea:hover, textarea:focus {
		cursor: pointer;
		color: #4A7BA4;
		border-color: #4A7BA4;
	}

	.textareaError {
		color: #96525B;
		border-color: #96525B;
	}

	.button {
		width: 24rem;
		height: 6rem;
		margin: 3.2rem auto 0;
		font-size: 2.8rem;
		border-radius: 10rem;
	}
	
	ul {
		max-width: 82rem;
		margin: 6.4rem auto;
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

	li a {
		color: inherit;
		text-decoration: none;
		border-radius: inherit;
	}
</style>
