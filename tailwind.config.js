module.exports = {
  purge: ["./public/**/*.html", "./src/**/*.vue"],
  theme: {
    extend: {
      fontFamily: {
        montserrat: ["Montserrat"]
      },
      colors: {
        "button-blue": "#008aff",
        "site-color": "#f2f2f2",
        footer: {
          bg: "#263135",
          header: "#86a5a7",
          text: "#676e70",
          textHover: "#008aff"
        },
        bgColor: {
          from: "#b1d5e1",
          to: "#d2dbd1"
        },
        firstCircle: {
          from: "#0066ff",
          to: "#0084ff"
        },
        secondCircle: {
          from: "#ffd200",
          to: "#36ff00"
        },
        thirdCircle: {
          from: "#d02626",
          to: "#ec4c4c"
        },
        fourthCircle: {
          from: "#a97e19",
          to: "#b7a110"
        },
        fifthCircle: {
          from: "#cd3773",
          to: "#e24c96"
        }
      },
      screens: {
        "2xl": { min: "1536px", max: "1920px" },
        "3xl": { min: "1921px" }
      },
      width: {
        "12-percent": "12%",
        "10-percent": "10%",
        "70-percent": "70%",
        "30-percent": "30%",
        "55-percent": "55%"
      },
      height: {
        "3/4-screen": "75vh",
        "3/5-screen": "60vh"
      }
    }
  },
  variants: {
    extend: {}
  },
  plugins: []
};
