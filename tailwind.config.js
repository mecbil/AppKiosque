/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './templates/**/*.html.twig',
    './src/**/template/**/*.html.twig',
    './src/**/template/**/*.html38',  // au cas où tu as ce type de fichiers
    './assets/**/*.js',
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
