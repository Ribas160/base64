<template>
	<button 
		v-bind:class="{error: image.error}"
		>
		<div class="img" v-bind:style="{backgroundImage: 'url(' + image.base64 + ')'}"></div>
		<p class="name">{{ shortName(image.name) }}</p>
		<p class="text">{{ (image.error) ? image.error : getFileSize(image.size) }}</p>
		<p class="message">{{ actionText }}</p>
	</button>
</template>
<script>
export default {
    props: {
		image: {
			type: Object,
			required: true,			
		},
		actionText: {
			type: String,
			required: true,
		}

	},
    methods: {
        getFileSize(bytes) {
            const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
            if (bytes == 0) return '0 Byte';
            let i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
            let num = bytes / Math.pow(1024, i);
            return num.toFixed(2) + ' ' + sizes[i];
        },
        shortName(file) {
            let name = file.split('.').slice(0, -1).join('.');
            let ext = file.replace(name, '');

            if (name.length > 5) return name.substr(0, 5) + '... ' + ext;
            else return name + ext;
		}
	}
}
</script>
<style scoped>
    button {
        width: 100%;
        height: 100%;
        padding: 1rem;
        display: flex;
        align-items: center;
        background-color: #373D47;
        border-radius: inherit;
        animation: fadeIn 0.5s linear;
    }

    button:hover, button:focus {
        background-color: #61AFEF;
    }

    button:hover {
        cursor: pointer;
    }

    button:active, .action {
        background-color: rgba(150,192,119, 0.6);
    }

    button:active .size {
        color: #93DD5D;
    }

	button .img {
		width: 5.2rem;
		height: 5.2rem;
		margin-right: 1.2rem;
		background-size: cover;
		background-position: center top;
	}

    button .img img {
        max-width: 100%;
        max-height: 100%;
    }

    button p {
        font-size: 2.8rem;
        transition: all 0.5s ease;
        pointer-events: none;
    }

    .name {
        width: 20rem;
        text-align: left;
    }

    button .text {
        min-width: 18rem;
        margin: 0 auto;
        color: #D19A66;
    }

    .message {
        min-width: 18rem;
        margin: 0 auto;
        display: none;
        color: #93DD5D;
    }

    .action:hover, .action:focus {
        background-color: rgba(150,192,119, 0.75);
    }

    .error {
        background: #E06C75;
        pointer-events: none;
    }

    .error .text {
        color: #9C1721;
    }


    @keyframes fadeIn {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }
</style>
