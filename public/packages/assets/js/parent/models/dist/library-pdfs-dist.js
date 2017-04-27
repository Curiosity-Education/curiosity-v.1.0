"use strict";

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _get = function get(object, property, receiver) { if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { return get(parent, property, receiver); } } else if ("value" in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } };

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var libraryPdfs = function (_CORM) {
    _inherits(libraryPdfs, _CORM);

    function libraryPdfs() {
        _classCallCheck(this, libraryPdfs);

        var _this = _possibleConstructorReturn(this, (libraryPdfs.__proto__ || Object.getPrototypeOf(libraryPdfs)).call(this));

        _get(libraryPdfs.prototype.__proto__ || Object.getPrototypeOf(libraryPdfs.prototype), "setPrefix", _this).call(_this, '/pdfs');
        return _this;
    }

    _createClass(libraryPdfs, null, [{
        key: "getIntelligences",
        value: function getIntelligences(success) {
            _get(libraryPdfs.__proto__ || Object.getPrototypeOf(libraryPdfs), "any", this).call(this, null, "POST", success, "/intelligences", "all");
        }
    }, {
        key: "getLevels",
        value: function getLevels(success) {
            _get(libraryPdfs.__proto__ || Object.getPrototypeOf(libraryPdfs), "any", this).call(this, null, "POST", success, "/levels", "all");
        }
    }, {
        key: "getBlocks",
        value: function getBlocks(success) {
            _get(libraryPdfs.__proto__ || Object.getPrototypeOf(libraryPdfs), "any", this).call(this, null, "POST", success, "/blocks", "all");
        }
    }, {
        key: "getTopics",
        value: function getTopics(success) {
            _get(libraryPdfs.__proto__ || Object.getPrototypeOf(libraryPdfs), "any", this).call(this, null, "POST", success, "/topics", "all");
        }
    }, {
        key: "getPdfs",
        value: function getPdfs(success) {
            _get(libraryPdfs.__proto__ || Object.getPrototypeOf(libraryPdfs), "any", this).call(this, null, "POST", success, "/pdfs", "all");
        }
    }]);

    return libraryPdfs;
}(CORM);