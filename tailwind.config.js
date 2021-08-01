const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('./node_modules/tailwindcss/colors');

module.exports = {
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            borderRadius:{
                'big':'4rem',
                '2big':'6rem'
            },
            scale:{
                '70':'0.7',
            },
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                backgroundCerebrum: '#425958',
                rose: colors.rose,
                fuchsia: colors.fuchsia,
                indigo: colors.indigo,
                teal: colors.teal,
                lime: colors.lime,
                orange: colors.orange,
                orangeCerebrum: '#FFCEA2',
            }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
