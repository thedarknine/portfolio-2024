/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
  ],
  theme: {
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
      'red-nine': '#991b1b',
      'blue-gray-400': '#94a3b8',
    },
    fontFamily: {
      'accent': ['Spartan', 'sans-serif'],
      'normal': ['Oxygen', '"Open Sans"', 'Arial', 'sans-serif'],
    },
    extend: {},
  },
  plugins: [],
}
