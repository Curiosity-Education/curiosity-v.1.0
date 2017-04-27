'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Request = function () {
    function Request() {
        _classCallCheck(this, Request);
    }

    _createClass(Request, null, [{
        key: 'send',
        value: function send(method, path, callback, data) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText != '') var response = JSON.parse(this.responseText);
                    var status = this.status;
                    callback(response, status, this);
                }
            };
            xhttp.open(method, path, true);
            if (data != null) {
                try {
                    data.append('tryalUndefined', null);
                    $.ajax({
                        url: path,
                        method: method,
                        data: data,
                        processData: false,
                        contentType: false
                    }).done(function (response) {
                        callback(response);
                    }).fail(function (error) {
                        callback(error);
                    });
                } catch (e) {
                    xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
                    xhttp.send(JSON.stringify(data));
                }
            } else {
                xhttp.send();
            }
        }
    }]);

    return Request;
}();