<template>
    <div class="button">
        <input type="file" name="images" id="images" multiple accept="image/*" ref="file" v-on:change="filesUpload()">
        <button for="images" v-on:click="inputTrigger" :class="{error: hasError, inactive: isInactive}">{{ text }}</button>
    </div>
</template>
<script>

export default {
    props: {
        text: {
            type: String,
            required: true,
        },
        hasError: {
            type: Boolean,
            default: false,
        },
        isInactive: {
            type: Boolean,
            default: false,
        }
    },
    methods: {
        filesUpload() {
            this.$emit('filesUpload', this.$refs.file.files);
        },
        inputTrigger() {
            document.querySelector('input').click();
        }
    }
}

</script>
<style scoped>
    input {
        display: none;
    }

    .button {
        width: 18rem;
        height: 5rem;
        margin: 2.8rem auto 0;
        font-size: 2.3rem;
        border-radius: 5rem;
    }

    button {
        width: inherit;
        height: inherit;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: inherit;
        font-weight: 500;
        color: var(--theme-color);
        background-color: #C678DD;
        border-radius: inherit;
        border: none;
    }

    button:hover {
        cursor: pointer;
        background-color: #9E62AF;
    }

    button:focus {
        background-color: #9E62AF;
        outline: none;
    }

    .images:active {
        background-color: #9E62AF;
    }

    .error {
        color: #B5000E;
        background-color: #E06C75;
    }

    .inactive {
        color: #5A5E65;
        background-color: #ABB2BF;
        pointer-events: none;
    }
</style>