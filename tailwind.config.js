const defaultTheme = require('tailwindcss/defaultTheme')
module.exports = {
    content: ['Web/**/*.blade.php'],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
}