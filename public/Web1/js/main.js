import { httpClient, getJSON } from "/js/ajax.js";

httpClient.get("/js/aaa.json", function (res) {
  console.log(res);
});
var dma = {
  name: "Teo nguyen van",
  chucvu: "admin",
};

var dm = {
  customer: {
    ...dma,
  },
};
console.log(dm);
