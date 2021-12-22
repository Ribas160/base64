<template>
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
</template>
<script>
	import Logo from '../assets/img/logo.svg';

	export default {
		components: { Logo },
		methods: {
			onFocus(e) {
                e.target.querySelector('.logo').classList.add('onFocus');
            },
            onBlur(e) {
                e.target.querySelector('.logo').classList.remove('onFocus');
            },

		}
	}
</script>
<style scoped>
	header {
		margin-bottom: 6.4rem;
	}
    .logo {
        width: 8rem;
        margin-top: 3.2rem;
    }

    .logo:hover {
      cursor: pointer;
    }

    .logo:hover path:nth-of-type(2),
    .logo:hover path:nth-of-type(3) {
      fill: #72925A;
    }

    .logo:hover path:last-of-type {
      fill: #266293;
    }

    .onFocus {
        opacity: 0.7;
    }
</style>
