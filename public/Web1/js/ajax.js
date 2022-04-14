function getJSON(url, data, callback, type) {
  let xhr = new XMLHttpRequest();
  xhr.onload = function () {
    callback(this.responseText);
  };
  xhr.open(type, url, true);
  xhr.send(data);
}
const httpClient = {
  get: function (url, callback) {
    getJSON(url, null, (data) => callback(data), "GET");
  },
  put: function (url, data, callback) {
    getJSON(url, JSON.stringify(data), (data) => callback(data), "PUT");
  },
  post: function (url, data, callback) {
    getJSON(url, JSON.stringify(data), (data) => callback(data), "POST");
  },
  delete: function (url, data, callback) {
    getJSON(url, data, (data) => callback(data), "DELETE");
  },
};
export { httpClient, getJSON };
