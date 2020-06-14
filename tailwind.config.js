module.exports = {
  purge: ['./resources/**/*', 'src/**/*.php'],
  theme: {
    extend: {
      scale: {
        '115': '1.15',
      },
      colors: {
        social: {
          twitter: '#1da1f2',
          facebook: '#1877f2',
          instagram: '#c32aa3',
          pinterest: '#bd081c',
        },
      },
    },
  },
  variants: {},
  plugins: [],
}
