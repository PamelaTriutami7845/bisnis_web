module.exports = {
  content: [
    "./src/**/*.{html,js,php}",
    "./node_modules/tw-elements/js/**/*.js"
  ],
  plugins: [require("tw-elements/plugin.cjs")],
  darkMode: "class"
};