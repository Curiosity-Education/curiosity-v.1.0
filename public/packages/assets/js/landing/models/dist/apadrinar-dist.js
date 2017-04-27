'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _get = function get(object, property, receiver) { if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { return get(parent, property, receiver); } } else if ("value" in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } };

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var apadrinar = function (_CORM) {
    _inherits(apadrinar, _CORM);

    function apadrinar(data) {
        _classCallCheck(this, apadrinar);

        var _this = _possibleConstructorReturn(this, (apadrinar.__proto__ || Object.getPrototypeOf(apadrinar)).call(this));

        _this.datos = data;
        _get(apadrinar.prototype.__proto__ || Object.getPrototypeOf(apadrinar.prototype), 'setPrefix', _this).call(_this, '/apadrinar');
        return _this;
    }

    _createClass(apadrinar, [{
        key: 'getChildren',
        value: function getChildren(method, success) {
            $.ajax({
                url: '/apadrinar/get-children',
                type: 'POST',
                data: this.datos,
                cache: false,
                contentType: false,
                processData: false
            }).done(function (response) {
                success(response);
            });
        }
    }], [{
        key: 'any',
        value: function any(data, method, success, prefix, pathRoute) {
            _get(apadrinar.__proto__ || Object.getPrototypeOf(apadrinar), 'any', this).call(this, data, method, success, prefix, pathRoute);
        }
    }]);

    return apadrinar;
}(CORM);