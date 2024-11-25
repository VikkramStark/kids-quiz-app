/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{html,js,php}", "./pages/**/*.{html,js,php}"],  
  theme: {
    extend: {
      colors:{
        options:{
          hover:"#2c3e50" 
        }
      }
    },
  },
  plugins: [],
}

