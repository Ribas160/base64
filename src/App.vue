<template>
    <div id="app">
        <router-view />
    </div>
</template>
<style>
    @font-face {
        font-family: 'Open Sans';
        src: url('~@/assets/fonts/OpenSans-Regular.ttf') format('truetype'),
             url('~@/assets/fonts/OpenSans-Regular.woff') format('woff'),
             url('~@/assets/fonts/OpenSans-Regular.woff2') format('woff2');
        font-weight: 400;
    }

    @font-face {
        font-family: 'Roboto';
        src: url('~@/assets/fonts/Roboto-Regular.ttf') format('truetype'),
             url('~@/assets/fonts/Roboto-Regular.woff') format('woff'),
             url('~@/assets/fonts/Roboto-Regular.woff2') format('woff2');
        font-weight: 400;
    }

    @font-face {
        font-family: 'Roboto';
        src: url('~@/assets/fonts/Roboto-Medium.ttf') format('truetype'),
             url('~@/assets/fonts/Roboto-Medium.woff') format('woff'),
             url('~@/assets/fonts/Roboto-Medium.woff2') format('woff2');
        font-weight: 500;
    }

    @font-face {
        font-family: 'Roboto';
        src: url('~@/assets/fonts/Roboto-Bold.ttf') format('truetype'),
             url('~@/assets/fonts/Roboto-Bold.woff') format('woff'),
             url('~@/assets/fonts/Roboto-Bold.woff2') format('woff2');
        font-weight: 700;
    }

    :root {
        --theme-color: #282C34;
        --home-var: 1;

        font-size: 0.5208333333vw;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        outline: none;
    }

    body {
        font-family: 'Roboto', sans-serif;
        color: #fff;
        background-color: var(--theme-color);
        -webkit-text-size-adjust: 100%;
    }

    h1 {
        margin: 5.6rem 0 0;
        font-size: 5.6rem;
        text-align: center;
    }

    button {
        font-family: inherit;
        color: inherit;
        background-color: none;
        border: none;
    }

    .container {
        max-width: 118rem;
        margin: 0 auto;
        padding: 0 15px;
    }

    @media (max-width: 822px) {
        :root {
            font-size: 0.8vw;
        }
    }
</style>
