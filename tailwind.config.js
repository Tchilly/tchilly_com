const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");
const round = (num) =>
    num
        .toFixed(7)
        .replace(/(\.[0-9]+?)0+$/, "$1")
        .replace(/\.0$/, "");
const rem = (px) => `${round(px / 16)}rem`;
const em = (px, base) => `${round(px / base)}em`;

module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        colors: {
            transparent: "transparent",
            current: "currentColor",
            black: colors.black,
            white: colors.white,
            red: colors.red,
            gray: colors.gray,
            dark: {
                DEFAULT: "#141414",
                50: "#2E2E2E",
                100: "#292929",
                200: "#242424",
                300: "#1F1F1F",
                400: "#1A1A1A",
                500: "#141414",
                600: "#121212",
                700: "#0F0F0F",
                800: "#0D0D0D",
                900: "#0A0A0A",
            },
            primary: {
                DEFAULT: "#44A524",
                50: "#ACE898",
                100: "#9FE587",
                200: "#84DD66",
                300: "#69D645",
                400: "#52C62C",
                500: "#44A524",
                600: "#31771A",
                700: "#1E4910",
                800: "#0B1B06",
                900: "#000000",
            },
        },
        minHeight: {
            lg: "550px",
            full: "100%",
            screen: "100vh",
        },
        extend: {
            fontFamily: {
                sans: ["Inter var", ...defaultTheme.fontFamily.sans],
            },
            typography: (theme) => ({
                DEFAULT: {
                    css: {
                        color: theme("colors.gray.400"),
                        h2: {
                            color: theme("colors.gray.300"),
                            fontSize: rem(20),
                        },
                        h3: {
                            color: theme("colors.gray.300"),
                            fontSize: rem(18),
                        },
                        strong: {
                            color: theme("colors.gray.200"),
                        },
                        a: {
                            color: theme("colors.primary.500"),
                            "&:hover": {
                                color: theme("colors.primary.600"),
                            },
                        },
                        code: {
                            fontSize: rem(16),
                        },
                    },
                },
                lg: {
                    css: {
                        h2: {
                            fontSize: rem(22),
                        },
                        h3: {
                            fontSize: rem(20),
                        },
                    },
                },
            }),
            dropShadow: {
                "text-bg": "0 0 10px rgba(0, 0, 0, 1)",
            },
            backgroundImage: {
                "spec-bg": "url('/images/spec-bg.jpg')",
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        require("@tailwindcss/line-clamp"),
        require("@tailwindcss/aspect-ratio"),
    ],
};
