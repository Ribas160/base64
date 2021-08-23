<template>
    <div id="app">
        <router-view />
    </div>
</template>

<style>
    :root {
        --theme-color: #282C34;

        font-size: 10px;
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
        max-width: 70rem;
        margin: 0 auto;
        padding: 0 15px;
    }

    @media (max-width: 822px) {
        :root {
            font-size: 1.1vw;
        }
    }
</style>
