'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _get = function get(object, property, receiver) { if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { return get(parent, property, receiver); } } else if ("value" in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } };

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var ChildrenHome = function (_CORM) {
    _inherits(ChildrenHome, _CORM);

    function ChildrenHome(formData) {
        _classCallCheck(this, ChildrenHome);

        var _this = _possibleConstructorReturn(this, (ChildrenHome.__proto__ || Object.getPrototypeOf(ChildrenHome)).call(this));

        _this.sponsored = formData;
        _get(ChildrenHome.prototype.__proto__ || Object.getPrototypeOf(ChildrenHome.prototype), 'setPrefix', _this).call(_this, '/admin-godhouses');
        return _this;
    }

    _createClass(ChildrenHome, [{
        key: 'save',
        value: function save(success) {
            _get(ChildrenHome.prototype.__proto__ || Object.getPrototypeOf(ChildrenHome.prototype), 'save', this).call(this, this.sponsored, Curiosity.methodSend.POST, success);
        }
    }, {
        key: 'update',
        value: function update(id, success) {
            this.sponsored.append('id', id);
            _get(ChildrenHome.prototype.__proto__ || Object.getPrototypeOf(ChildrenHome.prototype), 'update', this).call(this, this.sponsored, Curiosity.methodSend.POST, success);
        }
    }], [{
        key: 'delete',
        value: function _delete(id, success) {
            _get(ChildrenHome.__proto__ || Object.getPrototypeOf(ChildrenHome), 'delete', this).call(this, { id: id }, Curiosity.methodSend.POST, success, '/admin-godhouses');
        }
    }, {
        key: 'any',
        value: function any(data, success, pathRoute) {
            _get(ChildrenHome.__proto__ || Object.getPrototypeOf(ChildrenHome), 'any', this).call(this, data, Curiosity.methodSend.POST, success, '/admin-godhouses', pathRoute);
        }
    }]);

    return ChildrenHome;
}(CORM);