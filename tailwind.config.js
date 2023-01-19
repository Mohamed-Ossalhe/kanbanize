/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["app/view/**/*.php", "node_modules/flowbite/**/*.js"],
    theme: {
        extend: {
            "colors": {
                "primary": "#4D63EE",
                "secondary": "#00ADE1",
                "accent": "#00D0E9",
                "third": "#DCE0EB",
                "fourth": "#FBF9F3",
                "fifth": "#DCE0EB"
            },
            backgroundImage: {
                "op-header-texture": "url('../img/header-bg-image.png')"
            }
        },
    },
    plugins: [
        require('tailwind-scrollbar-hide'), // eslint-disable-line quotes
        require('flowbite/plugin') // eslint-disable-line quotes
    ],
};
