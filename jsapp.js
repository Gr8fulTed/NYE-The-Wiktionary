var isRequestFinished = true;

function disableForm() {
    var form = document.forms['filters'];
    var elements = form.elements;
    for (var i = 0, len = elements.length; i < len; ++i) {
        elements[i].disabled = true;

    }
}

function enableForm() {
    var form = document.forms['filters'];
    var elements = form.elements;
    for (var i = 0, len = elements.length; i < len; ++i) {
        elements[i].disabled = false;

    }
}

function NYE(strURL) {
    if (isRequestFinished) {
       
        isRequestFinished = false;
        disableForm();
        var xmlHttpReq = false;
        var self = this;
        // Mozilla/Safari
        if (window.XMLHttpRequest) {
            self.xmlHttpReq = new XMLHttpRequest();
        }
        // IE
        else if (window.ActiveXObject) {
            self.xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");
        }
        self.xmlHttpReq.open('POST', strURL, true);
        self.xmlHttpReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        self.xmlHttpReq.onreadystatechange = function () {
            if (self.xmlHttpReq.readyState == 4) {
                $('#sentback').hide().fadeOut('slow');
                updatepage(self.xmlHttpReq.responseText);
isRequestFinished = true;
enableForm();

            }
        }
        self.xmlHttpReq.send(getstring());

        return false;
    }
}

function getstring() {
    var form = document.forms['filters'];
    var person = form.person.value;
    if (isEmpty(person)) {
       person = 'Rush Limbaugh';
    }
   
    squery = 'person=' + encodeURIComponent(person); // NOTE: no '?' before querystring
   

    return squery;
}

function isEmpty(str) {
    return (!str || 0 === str.length);
}


function updatepage(str) {

    document.getElementById("sentback").innerHTML = str;

    $('#sentback').hide().fadeIn('slow');

}
