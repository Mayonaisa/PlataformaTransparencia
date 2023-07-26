import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
const colors = require('tailwindcss/colors')
/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                ...colors,
                "green": {
                    50: "#FFFFFF",
                    100: "#FFFFFF",
                    200: "#FFFFFF",
                    300: "#FCFCFC",
                    400: "#FCFCFC",
                    500: "#FCFCFC",
                    600: "#C9C9C9",
                    700: "#969696",
                    800: "#666666",
                    900: "#333333",
                    950: "#1A1A1A"
                  }
            },
        },
    },
    
    plugins: [forms],
};
