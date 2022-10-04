// const { find } = require("lodash");

window.addEventListener("load", function () {
//animate crroussel

const nextSelectedItem = document.querySelector('.gallery-controls-next');
setInterval (function () {nextSelectedItem.click(); }, 6000);
});
