module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
  theme: {
    extend: {},
    container: {
      center: true,
    },
  },
  variants: {},
  plugins: [
    require('@tailwindcss/ui'),
  ]
}
