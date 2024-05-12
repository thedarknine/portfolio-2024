/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
  ],
  theme: {
    extend: {
      colors: {
        transparent: 'transparent',
        current: '#1d283d',
        'white': '#ffffff',
        'light': '#dde1e6',
        'blue-dark': '#0f2238',
        'blue-nine': '#163970',
        'blue-medium': '#1c385b',
        'turquoise': '#0C91B9',
        'yellow-nine': '#ffaa00',
        'yellow-dark': '#fca311',
        'perfect': '#215589',
        'coffreo': '#ff5e00',
        'gray-nine': '#94a3b8',
        'gray-light-nine': '#CFD7E8',
        'error-nine': '#C90000',
      },
      fontFamily: {
        'accent': ['Spartan', 'sans-serif'],
        'normal': ['Oxygen', '"Open Sans"', 'Arial', 'sans-serif'],
      },
      transitionDuration: {
        DEFAULT: '300ms',
      },
      extend: {
        animation: {
          'infinite-scroll': 'infinite-scroll 45s linear infinite',
        },
        keyframes: {
          'infinite-scroll': {
            from: { transform: 'translateX(0)' },
            to: { transform: 'translateX(-100%)' },
          }
        }
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
