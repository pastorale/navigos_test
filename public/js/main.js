(function () {
    var httpRequest;
    document.getElementById('mess_form_submit').addEventListener('click', makeRequest);
    var form = document.querySelector('form');

    function makeRequest() {
        var form = document.querySelector('form');
        var data = serialize(form);
        postAjax('/addMessage',data,function (response) {
            location.href = '/';
        });
    }


    function postAjax(url, data, success) {
        // var params = typeof data == 'string' ? data : Object.keys(data).map(
        //     function(k){ return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]) }
        // ).join('&');

        var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
        xhr.open('POST', url);
        xhr.onreadystatechange = function() {
            if (xhr.readyState>3 && xhr.status==200) { success(xhr.responseText); }
        };
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(data);
        return xhr;
    }

    function serialize(form) {
        var field, l, s = [];
        if (typeof form == 'object' && form.nodeName == "FORM") {
            var len = form.elements.length;
            for (var i=0; i<len; i++) {
                field = form.elements[i];
                if (field.name && !field.disabled && field.type != 'file' && field.type != 'reset' && field.type != 'submit' && field.type != 'button') {
                    if (field.type == 'select-multiple') {
                        l = form.elements[i].options.length;
                        for (var j=0; j<l; j++) {
                            if(field.options[j].selected)
                                s[s.length] = encodeURIComponent(field.name) + "=" + encodeURIComponent(field.options[j].value);
                        }
                    } else if ((field.type != 'checkbox' && field.type != 'radio') || field.checked) {
                        s[s.length] = encodeURIComponent(field.name) + "=" + encodeURIComponent(field.value);
                    }
                }
            }
        }
        return s.join('&').replace(/%20/g, '+');
    }
})();