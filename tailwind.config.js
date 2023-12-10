/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./common/**/*.{html,js,php}",
    "./common/**/**/*.{html,js,php}",
    "./common/**/**/**/.{html,js,php}"
  ],
  theme: {
    extend: {
      colors: {
        primary: "#F2F2F2",
        primaryfd: "#d8d8d8",
        secondary: "#F96D00",
        tertiary: "#5C636E",
        quatenary: "#393E46",
        err: "#B00020",
        errbg: "#FF8181",
        scs: "#008000",
        scsbg: "#adff2f",
        wrng: "#FFA500",
        wrngbg: "#ffcc6e"
      }
    },
  },
  plugins: [
    require("daisyui")
  ],
  daisyui : {
    darkTheme: "light"
  }
}

