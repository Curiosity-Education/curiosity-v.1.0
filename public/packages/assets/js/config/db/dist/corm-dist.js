"use strict";

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var CORM = function () {
    function CORM() {
        _classCallCheck(this, CORM);

        this.database = new Database();
    }

    _createClass(CORM, [{
        key: "setPrefix",
        value: function setPrefix(prefix) {
            this.prefix = prefix;
        }
    }, {
        key: "save",
        value: function save(data, method, success) {
            var options = {};
            options.data = data;
            options.method = method;
            options.success = success;
            this.database.save(this.prefix, options);
        }
    }, {
        key: "update",
        value: function update(data, method, success) {
            var options = {};
            options.data = data;
            options.method = method;
            options.success = success;
            this.database.update(this.prefix, options);
        }
    }], [{
        key: "delete",
        value: function _delete(data, method, success, prefix) {
            var options = {};
            options.data = data;
            options.method = method;
            options.success = success;
            Database.delete(prefix, options);
        }
    }, {
        key: "find",
        value: function find(data, method, success, prefix) {
            var options = {};
            options.data = data;
            options.method = method;
            options.success = success;
            Database.find(prefix, options);
        }
    }, {
        key: "all",
        value: function all(method, success, prefix) {
            var options = {};
            options.method = method;
            options.success = success;
            Database.all(prefix, options);
        }
    }, {
        key: "any",
        value: function any(data, method, success, prefix, pathRoute) {
            var path = prefix + "/" + pathRoute;
            Database.any(method, path, success, data);
        }
    }]);

    return CORM;
}();