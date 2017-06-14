'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _get = function get(object, property, receiver) { if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { return get(parent, property, receiver); } } else if ("value" in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } };

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var ItemGroup = function (_CORM) {
    _inherits(ItemGroup, _CORM);

    function ItemGroup(name, intelligence) {
        _classCallCheck(this, ItemGroup);

        var _this = _possibleConstructorReturn(this, (ItemGroup.__proto__ || Object.getPrototypeOf(ItemGroup)).call(this));

        _this.itemGroup = {
            nombre: name,
            inteligencia: intelligence
        };
        _get(ItemGroup.prototype.__proto__ || Object.getPrototypeOf(ItemGroup.prototype), 'setPrefix', _this).call(_this, '/admin-itemGroup');
        return _this;
    }

    _createClass(ItemGroup, [{
        key: 'save',
        value: function save(method, success) {
            _get(ItemGroup.prototype.__proto__ || Object.getPrototypeOf(ItemGroup.prototype), 'save', this).call(this, this.itemGroup, method, success);
        }
    }, {
        key: 'update',
        value: function update(id, method, success) {
            this.itemGroup.id = id;
            _get(ItemGroup.prototype.__proto__ || Object.getPrototypeOf(ItemGroup.prototype), 'update', this).call(this, this.itemGroup, method, success);
        }
    }], [{
        key: 'delete',
        value: function _delete(id, method, success) {
            _get(ItemGroup.__proto__ || Object.getPrototypeOf(ItemGroup), 'delete', this).call(this, { id: id }, method, success, '/admin-itemGroup');
        }
    }, {
        key: 'all',
        value: function all(method, success) {
            _get(ItemGroup.__proto__ || Object.getPrototypeOf(ItemGroup), 'all', this).call(this, method, success, '/itemGroup');
        }
    }, {
        key: 'find',
        value: function find(id, method, success) {
            _get(ItemGroup.__proto__ || Object.getPrototypeOf(ItemGroup), 'find', this).call(this, { id: id }, method, success, '/itemGroup');
        }
    }, {
        key: 'any',
        value: function any(data, method, success, pathRoute) {
            _get(ItemGroup.__proto__ || Object.getPrototypeOf(ItemGroup), 'any', this).call(this, data, method, success, '/itemGroup', pathRoute);
        }
    }]);

    return ItemGroup;
}(CORM);