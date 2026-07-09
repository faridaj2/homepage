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
        'sans': ['Inter', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'sans-serif'],
        'serif': ['Playfair Display', 'Georgia', 'serif'],
        'Petrona': ['Petrona', 'serif'],
        'Inter': ['Inter', 'sans-serif'],
      },
      colors: {
        apple: {
          'bg': '#ffffff',
          'bg-secondary': '#f5f5f7',
          'dark': '#1d1d1f',
          'text': '#1d1d1f',
          'text-secondary': '#86868b',
          'text-tertiary': '#6e6e73',
          'border': '#d2d2d7',
          'nav': 'rgba(255, 255, 255, 0.8)',
        },
        'primary': '#10b981',
        'primary-dark': '#059669',
        'primary-light': '#d1fae5',
        background: "#F6F7FA",
        base: "#FFF",
        accentYellow: "#EBFF87",
        accentDark: "#222222",
        "secondary": "#68A6F4",
        "accent": "#10b981",
        "neutral": "#271f34",
        "base-100": "#fff",
        "info": "#00d5ff",
        "success": "#00de6c",
        "warning": "#ff9100",
        "error": "#d20019",
      },
      borderRadius: {
        'apple': '18px',
        'apple-lg': '24px',
      },
      boxShadow: {
        'apple-sm': '0 1px 3px rgba(0, 0, 0, 0.04)',
        'apple': '0 4px 14px rgba(0, 0, 0, 0.08)',
        'apple-lg': '0 8px 30px rgba(0, 0, 0, 0.12)',
        'costum1': '6px 2px 16px 0px rgba(136, 165, 191, 0.48) , -6px -2px 16px 0px rgba(255, 255, 255, 0.8)',
        'popUp': '0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23)',
      },
      transitionTimingFunction: {
        'apple': 'cubic-bezier(0.25, 0.1, 0.25, 1)',
        'apple-in': 'cubic-bezier(0.11, 0, 0.5, 0)',
        'apple-out': 'cubic-bezier(0.5, 1, 0.89, 1)',
      },
      transitionDuration: {
        '400': '400ms',
        '600': '600ms',
        '800': '800ms',
        '1000': '1000ms',
      },
      screens: {
        'apple-sm': '735px',
        'apple-md': '1068px',
        'apple-lg': '1440px',
      },
      spacing: {
        '18': '4.5rem',
        '22': '5.5rem',
        '30': '7.5rem',
      },
      letterSpacing: {
        'apple-tight': '-0.03em',
        'apple-wide': '0.02em',
      },
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms')
  ],
}
