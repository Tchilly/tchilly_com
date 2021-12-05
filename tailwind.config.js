const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            black: colors.black,
            white: colors.white,
            gray: colors.coolGray,
            primary: {
                DEFAULT: '#8205B4',
                '50': '#D575FB',
                '100': '#CF62FB',
                '200': '#C33AFA',
                '300': '#B712F8',
                '400': '#9F06DC',
                '500': '#8205B4',
                '600': '#5B037D',
                '700': '#330247',
                '800': '#16011E',
                '900': '#0B000F',
            },
            secondary: {
                DEFAULT: '#00C8AF',
                '50': '#81FFEF',
                '100': '#6CFFED',
                '200': '#43FFE8',
                '300': '#1BFFE2',
                '400': '#00F1D3',
                '500': '#00C8AF',
                '600': '#00907E',
                '700': '#00584D',
                '800': '#00201C',
                '900': '#000F0D',
            },
        },
        minHeight: {
            'lg': '550px',
            '0': '0px',
            'full': '100%',
            'screen': '100vh',
        },
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
            typography: {
                DEFAULT: {
                    css: {
                        color: '#fff',
                        a: {
                            color: '#3182ce',
                            '&:hover': {
                                color: '#2c5282',
                            },
                        },
                        h2: {
                            color: '#E5E7EB',
                        }
                    },
                },
            },
            dropShadow: {
                'text-bg': '0 0 10px rgba(0, 0, 0, 1)',
            },
            backgroundImage: {
                'spec-bg': "url('/images/spec-bg.jpg')",
            }
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/line-clamp'),
        require('@tailwindcss/aspect-ratio'),
    ],
};
