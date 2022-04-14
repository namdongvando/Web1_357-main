function getjson(url,callback) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        // thành công
        if (this.status == 200) {
            callback(JSON.parse(this.responseText));
        }
    }
    // gửi yêu cầu đến file  users.json
    xhttp.open("GET", url, true);
    xhttp.send();
}

const HttpClient = {
    get:function(url,callback){
        return getjson(url,callback);
    }
}

export {HttpClient} 
