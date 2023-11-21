import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import plugin from 'tailwindcss/plugin'

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
        },
    },
    variants: {
        extend: {
            border: ['label-checked'],
        },
    },

    plugins: [forms, require('flowbite'), plugin(({ addVariant, e }) => {
        addVariant('label-checked', ({ modifySelectors, separator }) => {
            modifySelectors(
                ({ className }) => {
                    const eClassName = e(`label-checked${separator}${className}`);
                    const yourSelector = 'input[type="checkbox"]';
                    return `${yourSelector}:checked ~ .${eClassName}`;
                }
            )
        })
    }),],
};
