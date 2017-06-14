"use strict";

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _get = function get(object, property, receiver) { if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { return get(parent, property, receiver); } } else if ("value" in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } };

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var instituteUser = function (_CORM) {
  _inherits(instituteUser, _CORM);

  function instituteUser(data) {
    _classCallCheck(this, instituteUser);

    var _this = _possibleConstructorReturn(this, (instituteUser.__proto__ || Object.getPrototypeOf(instituteUser)).call(this));

    _this.institution = data;
    _get(instituteUser.prototype.__proto__ || Object.getPrototypeOf(instituteUser.prototype), "setPrefix", _this).call(_this, '/institute-user');
    return _this;
  }

  _createClass(instituteUser, null, [{
    key: "save",
    value: function save(data, success) {
      var ruta = "get-user-for-institute/" + data.range + "/" + data.id;
      console.log(data);
      console.log(ruta);
      _get(instituteUser.__proto__ || Object.getPrototypeOf(instituteUser), "any", this).call(this, {}, "GET", success, '/institute-user', ruta);
    }
  }, {
    key: "deleteUsers",
    value: function deleteUsers(ids, success) {
      var ruta = "delete-user-for-institute/" + data.idInstitute;
      console.log(data);
      _get(instituteUser.__proto__ || Object.getPrototypeOf(instituteUser), "any", this).call(this, { ids: data.idsUser }, "POST", success, '/institute-user', ruta);
    }
  }]);

  return instituteUser;
}(CORM);