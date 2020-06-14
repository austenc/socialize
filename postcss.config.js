module.exports = {
  plugins: [
    require('tailwindcss'),
    require('postcss-prepend-selector')({ selector: '.socialize ' }),
    require('autoprefixer'),
  ],
}
