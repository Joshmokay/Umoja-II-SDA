const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                'adventist-blue': '#0F4C81',
                'primary': '#005DAA',
                'secondary': '#004080',
                'accent': '#1f2937',
            },
            fontFamily: {
                sans: ['Georgia', '"Times New Roman"', 'serif', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
