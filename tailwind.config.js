/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php'
  ],
  theme: {
    extend: {
      fontFamily: {
        'Petrona': ['Petrona', 'serif'],
        'Poppins': ['Poppins', 'sans-serif']
      },
      boxShadow: {
        'costum1': '6px 2px 16px 0px rgba(136, 165, 191, 0.48) , -6px -2px 16px 0px rgba(255, 255, 255, 0.8)',
        'popUp': '0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23)'
      },
      colors: {
        background: "#F6F7FA",
        base: "#FFF",
        accentYellow: "#EBFF87",
        accentDark: "#222222"
      },

    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms')
  ],
}