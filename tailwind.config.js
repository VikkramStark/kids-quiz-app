/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [  "./index.html","./src/**/*.{html,js}","./*.{html,js,php}", "./pages/**/*.{html,js,php}"],
  theme: {
    extend: {colors:{
      options:{
        hover:"#2c3e50" 
      }
    },
      backgroundImage:{
         'try': "url('./assets/10 SCENE.png')",
                  'desert': "url('./assets/desert.png')",
                  'statue':"url('./assets/landscape/DrawKit Vector Illustration Landscape & Scenery (3).png')",
                  'landscape1':"url('./assets/landscape/DrawKit Vector Illustration Landscape & Scenery (3).png')",
                  'landscape2':"url('./assets/landscape/DrawKit Vector Illustration Landscape & Scenery (2).png')",
'landscape3': "linear-gradient( rgba(0,0,0,0.5) , rgba(0,0,0,0.5)), url('./assets/landscape/DrawKit Vector Illustration Landscape & Scenery (4).png')",
                  'landscape4':"url('./assets/landscape/DrawKit Vector Illustration Landscape & Scenery (5).png')",
                  'landscape5':"url('./assets/landscape/DrawKit Vector Illustration Landscape & Scenery (6).png')",
                  'landscape6':"url('./assets/landscape/DrawKit Vector Illustration Landscape & Scenery (7).png')",
                  'landscape7':"url('./assets/landscape/DrawKit Vector Illustration Landscape & Scenery (8).png')",
                  'landscape8':"url('./assets/landscape/DrawKit Vector Illustration Landscape & Scenery (9).png')",
                  'landscape9':"url('./assets/landscape/DrawKit Vector Illustration Landscape & Scenery (10).png')",
                  'landscape10':"url('./assets/landscape/DrawKit Vector Illustration Landscape & Scenery (11).png')",
                  'landscape11':"url('./assets/landscape/DrawKit Vector Illustration Landscape & Scenery 12).png')",
                  'landscape12':"url('./assets/landscape/DrawKit Vector Illustration Landscape & Scenery (14).png')",
                  'landscape13':"url('./assets/landscape/DrawKit Vector Illustration Landscape & Scenery (15).png')",
                  'hero':"url('./assets/Desktop - 1.png')",
                  
      },
      keyframes: {
        'border-spin': {
          '100%': {
            transform: 'rotate(-360deg)',
          },
        },
      },
      animation: {
        'border-spin': 'border-spin 7s linear infinite',
      },
  
    },
  },
  plugins: [],
}

