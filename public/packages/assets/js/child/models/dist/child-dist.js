'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _get = function get(object, property, receiver) { if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { return get(parent, property, receiver); } } else if ("value" in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } };

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var Child = function (_CORM) {
    _inherits(Child, _CORM);

    function Child(data) {
        _classCallCheck(this, Child);

        var _this = _possibleConstructorReturn(this, (Child.__proto__ || Object.getPrototypeOf(Child)).call(this));

        _this.child = {
            usuario: data.usuario,
            nombre: data.nombre,
            apellidos: data.apellidos,
            password: data.password,
            cpassword: data.cpassword,
            genero: data.genero,
            promedio: data.promedio,
            grado: data.grado
        };
        _get(Child.prototype.__proto__ || Object.getPrototypeOf(Child.prototype), 'setPrefix', _this).call(_this, '/admin-child');
        return _this;
    }

    _createClass(Child, [{
        key: 'save',
        value: function save(method, success) {
            _get(Child.prototype.__proto__ || Object.getPrototypeOf(Child.prototype), 'save', this).call(this, this.child, method, success);
        }
    }], [{
        key: 'updateConf',
        value: function updateConf(data, method, success) {
            this.child = {
                username: data.username,
                pass: data.pass,
                npass: data.npass,
                cpass: data.cpass
            };
            _get(Child.__proto__ || Object.getPrototypeOf(Child), 'any', this).call(this, this.child, method, success, '/admin-child', 'updateConf');
        }
    }]);

    return Child;
}(CORM);