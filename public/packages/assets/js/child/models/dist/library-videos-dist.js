"use strict";

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _get = function get(object, property, receiver) { if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { return get(parent, property, receiver); } } else if ("value" in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } };

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var libraryVideos = function (_CORM) {
    _inherits(libraryVideos, _CORM);

    function libraryVideos() {
        _classCallCheck(this, libraryVideos);

        return _possibleConstructorReturn(this, (libraryVideos.__proto__ || Object.getPrototypeOf(libraryVideos)).call(this));
    }

    _createClass(libraryVideos, null, [{
        key: "getIntelligences",
        value: function getIntelligences(success) {
            _get(libraryVideos.__proto__ || Object.getPrototypeOf(libraryVideos), "any", this).call(this, null, "POST", success, "/intelligences", "all");
        }
    }, {
        key: "getLevels",
        value: function getLevels(success) {
            _get(libraryVideos.__proto__ || Object.getPrototypeOf(libraryVideos), "any", this).call(this, null, "POST", success, "/levels", "all");
        }
    }, {
        key: "getBlocks",
        value: function getBlocks(success) {
            _get(libraryVideos.__proto__ || Object.getPrototypeOf(libraryVideos), "any", this).call(this, null, "POST", success, "/blocks", "all");
        }
    }, {
        key: "getTopics",
        value: function getTopics(success) {
            _get(libraryVideos.__proto__ || Object.getPrototypeOf(libraryVideos), "any", this).call(this, null, "POST", success, "/topics", "all");
        }
    }, {
        key: "getVideos",
        value: function getVideos(success) {
            _get(libraryVideos.__proto__ || Object.getPrototypeOf(libraryVideos), "any", this).call(this, null, "POST", success, "/video", "all");
        }
    }, {
        key: "getTeachers",
        value: function getTeachers(success) {
            _get(libraryVideos.__proto__ || Object.getPrototypeOf(libraryVideos), "any", this).call(this, null, "POST", success, "/teacher", "all");
        }
    }, {
        key: "getSchools",
        value: function getSchools(success) {
            _get(libraryVideos.__proto__ || Object.getPrototypeOf(libraryVideos), "any", this).call(this, null, "POST", success, "/schoolasc", "all");
        }
    }]);

    return libraryVideos;
}(CORM);