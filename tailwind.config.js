import defaultTheme from 'tailwindcss/defaultTheme';
import typography from '@tailwindcss/typography';
import forms from '@tailwindcss/forms';
import aspectRatio from '@tailwindcss/aspect-ratio';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/livewire/*.blade.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './vendor/wire-elements/modal/config/livewire-ui-modal.php',
        './vendor/wire-elements/modal/**/*.blade.php',
    ],
    purge: {
        content: [
          './vendor/wire-elements/modal/resources/views/*.blade.php',
          './storage/framework/views/*.php',
          './resources/views/**/*.blade.php',
        ],
        options: {
          safelist: [
            'sm:max-w-2xl'
          ]
        }
    },

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        forms,
        typography,
        aspectRatio
    ],
};
