function about_shop(){
    var xmlhttp;

    if (window.XMLHttpRequest) {
        xmlhttp=new XMLHttpRequest();
    } else {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById('sideMenu').innerHTML=xmlhttp.responseText;
        }
    }

    xmlhttp.open("GET","khach_hang/about_shop/",true);
    xmlhttp.send();
}

/*function loadUser(){
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '/api/user1');
    xhr.responseType = 'json';
    xhr.onreadystatechange = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            const status = xhr.status;
            if (status === 0 || (status >= 200 && status < 400)) {
                console.log(xhr.response);
                // this.showUser(xhr.response);
            } else {
                console.log('error');
            }
        }
    };
    xhr.send();
}*/
