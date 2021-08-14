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
            spacing: {
                '309': '19rem',
                '84': '21rem',
                '837': '52rem',
                '449': '28rem',
              },
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
                grayCerebrum: '#6e6e6e',
                greenTable1:'#7BA6A4',
                greenTableheader:'#327370',
                rose: colors.rose,
                fuchsia: colors.fuchsia,
                indigo: colors.indigo,
                teal: colors.teal,
                lime: colors.lime,
                orange: colors.orange,
                orangeCerebrum: '#FFCEA2',
                tabletext: '#2B2B2B',
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
