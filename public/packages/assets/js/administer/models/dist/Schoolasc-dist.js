'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _get = function get(object, property, receiver) { if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { return get(parent, property, receiver); } } else if ("value" in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } };

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var Schoolasc = function (_CORM) {
    _inherits(Schoolasc, _CORM);

    function Schoolasc(formData) {
        _classCallCheck(this, Schoolasc);

        var _this = _possibleConstructorReturn(this, (Schoolasc.__proto__ || Object.getPrototypeOf(Schoolasc)).call(this));

        _this.schoolAsc = formData;
        _get(Schoolasc.prototype.__proto__ || Object.getPrototypeOf(Schoolasc.prototype), 'setPrefix', _this).call(_this, '/schoolasc');
        return _this;
    }

    _createClass(Schoolasc, [{
        key: 'save',
        value: function save(method, success) {
            _get(Schoolasc.prototype.__proto__ || Object.getPrototypeOf(Schoolasc.prototype), 'save', this).call(this, this.schoolAsc, method, success);
        }
    }, {
        key: 'update',
        value: function update(id, method, success) {
            this.schoolAsc.append('id', id);
            _get(Schoolasc.prototype.__proto__ || Object.getPrototypeOf(Schoolasc.prototype), 'update', this).call(this, this.schoolAsc, method, success);
        }
    }], [{
        key: 'delete',
        value: function _delete(id, method, success) {
            _get(Schoolasc.__proto__ || Object.getPrototypeOf(Schoolasc), 'delete', this).call(this, { id: id }, method, success, '/schoolasc');
        }
    }, {
        key: 'all',
        value: function all(method, success) {
            _get(Schoolasc.__proto__ || Object.getPrototypeOf(Schoolasc), 'all', this).call(this, method, success, '/schoolasc');
        }
    }, {
        key: 'find',
        value: function find(id, method, success) {
            _get(Schoolasc.__proto__ || Object.getPrototypeOf(Schoolasc), 'find', this).call(this, { id: id }, method, success, '/schoolasc');
        }
    }, {
        key: 'any',
        value: function any(data, method, success, pathRoute) {
            _get(Schoolasc.__proto__ || Object.getPrototypeOf(Schoolasc), 'any', this).call(this, data, method, success, '/schoolasc', pathRoute);
        }
    }]);

    return Schoolasc;
}(CORM);