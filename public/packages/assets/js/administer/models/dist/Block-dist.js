'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _get = function get(object, property, receiver) { if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { return get(parent, property, receiver); } } else if ("value" in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } };

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var Block = function (_CORM) {
    _inherits(Block, _CORM);

    function Block(formData) {
        _classCallCheck(this, Block);

        var _this = _possibleConstructorReturn(this, (Block.__proto__ || Object.getPrototypeOf(Block)).call(this));

        _this.block = formData;
        _get(Block.prototype.__proto__ || Object.getPrototypeOf(Block.prototype), 'setPrefix', _this).call(_this, '/blocks');
        return _this;
    }

    _createClass(Block, [{
        key: 'save',
        value: function save(method, success) {
            _get(Block.prototype.__proto__ || Object.getPrototypeOf(Block.prototype), 'save', this).call(this, this.block, method, success);
        }
    }, {
        key: 'update',
        value: function update(id, method, success) {
            this.block.append('id', id);
            _get(Block.prototype.__proto__ || Object.getPrototypeOf(Block.prototype), 'update', this).call(this, this.block, method, success);
        }
    }], [{
        key: 'delete',
        value: function _delete(id, method, success) {
            _get(Block.__proto__ || Object.getPrototypeOf(Block), 'delete', this).call(this, { id: id }, method, success, '/blocks');
        }
    }, {
        key: 'all',
        value: function all(method, success) {
            _get(Block.__proto__ || Object.getPrototypeOf(Block), 'all', this).call(this, method, success, '/blocks');
        }
    }, {
        key: 'find',
        value: function find(id, method, success) {
            _get(Block.__proto__ || Object.getPrototypeOf(Block), 'find', this).call(this, { id: id }, method, success, '/blocks');
        }
    }, {
        key: 'any',
        value: function any(data, method, success, pathRoute) {
            _get(Block.__proto__ || Object.getPrototypeOf(Block), 'any', this).call(this, data, method, success, '/blocks', pathRoute);
        }
    }]);

    return Block;
}(CORM);