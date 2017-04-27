"use strict";

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Database = function () {
    function Database() {
        _classCallCheck(this, Database);
    }

    _createClass(Database, [{
        key: "save",
        value: function save(prefix, options) {
            if ((typeof options === "undefined" ? "undefined" : _typeof(options)) != "object") {
                options = {
                    method: "GET",
                    data: null,
                    success: function success() {}
                };
            }
            var path = prefix + '/save';
            Request.send(options.method, path, options.success, options.data);
        }
    }, {
        key: "update",
        value: function update(prefix, options) {
            if ((typeof options === "undefined" ? "undefined" : _typeof(options)) != "object") {
                options = {
                    method: "GET",
                    data: null,
                    success: function success() {}
                };
            }
            var path = prefix + '/update';
            Request.send(options.method, path, options.success, options.data);
        }
    }], [{
        key: "all",
        value: function all(prefix, options) {
            if ((typeof options === "undefined" ? "undefined" : _typeof(options)) != "object") {
                options = {
                    method: "GET",
                    data: null,
                    success: function success() {}
                };
            }
            var path = prefix + '/all';
            Request.send(options.method, path, options.success, options.data);
        }
    }, {
        key: "find",
        value: function find(prefix, options) {
            if ((typeof options === "undefined" ? "undefined" : _typeof(options)) != "object") {
                options = {
                    method: "GET",
                    data: null,
                    success: function success() {}
                };
            }
            var path = prefix + '/find';
            Request.send(options.method, path, options.success, options.data);
        }
    }, {
        key: "delete",
        value: function _delete(prefix, options) {
            if ((typeof options === "undefined" ? "undefined" : _typeof(options)) != "object") {
                options = {
                    method: "GET",
                    data: null,
                    success: function success() {}
                };
            }
            var path = prefix + '/delete';
            Request.send(options.method, path, options.success, options.data);
        }
    }, {
        key: "any",
        value: function any(method, path, callback, data) {
            Request.send(method, path, callback, data);
        }
    }]);

    return Database;
}();