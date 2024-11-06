import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary:{
                   DEFAULT:  '#F0F0F0',
                   dark: '#A8A9AD',
                    text: '#292929'
                },
                secondary: '#007AFF'
            },
            boxShadow: {
                'custom-light': '0px 1px 3px 1px #00000026',
                'custom-dark': '0px 1px 2px 0px #0000004D',
            },
        },
    },
    plugins: [],
};
