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
            gray: colors.neutral,
            primary: colors.emerald,
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
                        color: theme("colors.gray.600"),
                        h1: {
                            color: theme("colors.gray.700"),
                            fontSize: rem(36),
                        },
                        h2: {
                            color: theme("colors.gray.600"),
                            fontSize: rem(20),
                        },
                        h3: {
                            color: theme("colors.gray.600"),
                            fontSize: rem(18),
                        },
                        strong: {
                            color: theme("colors.gray.700"),
                        },
                        a: {
                            color: theme("colors.primary.500"),
                            textDecoration: "none",
                            "&:hover": {
                                color: theme("colors.primary.600"),
                                textDecoration: "underline",
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
