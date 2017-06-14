"use strict";

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _get = function get(object, property, receiver) { if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { return get(parent, property, receiver); } } else if ("value" in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } };

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var Institution = function (_CORM) {
  _inherits(Institution, _CORM);

  function Institution(formData) {
    _classCallCheck(this, Institution);

    var _this = _possibleConstructorReturn(this, (Institution.__proto__ || Object.getPrototypeOf(Institution)).call(this));

    _this.institution = formData;
    _get(Institution.prototype.__proto__ || Object.getPrototypeOf(Institution.prototype), "setPrefix", _this).call(_this, '/institutions');
    return _this;
  }

  _createClass(Institution, [{
    key: "save",
    value: function save(success) {
      _get(Institution.prototype.__proto__ || Object.getPrototypeOf(Institution.prototype), "save", this).call(this, this.institution, "POST", success);
    }
  }, {
    key: "update",
    value: function update(id, success) {
      this.institution.append('id', id);
      _get(Institution.prototype.__proto__ || Object.getPrototypeOf(Institution.prototype), "update", this).call(this, this.institution, "POST", success);
    }
  }], [{
    key: "allInstitutes",
    value: function allInstitutes(success) {
      _get(Institution.__proto__ || Object.getPrototypeOf(Institution), "any", this).call(this, null, "POST", success, "/institutions", "all");
    }
  }, {
    key: "allStates",
    value: function allStates(success) {
      _get(Institution.__proto__ || Object.getPrototypeOf(Institution), "any", this).call(this, null, "POST", success, "/state", "all");
    }
  }, {
    key: "allCities",
    value: function allCities(success) {
      _get(Institution.__proto__ || Object.getPrototypeOf(Institution), "any", this).call(this, null, "POST", success, "/cities", "all");
    }
  }, {
    key: "deleteInsti",
    value: function deleteInsti(id, success) {
      _get(Institution.__proto__ || Object.getPrototypeOf(Institution), "delete", this).call(this, { id: id }, "POST", success, '/institutions');
    }
  }, {
    key: "infoInsti",
    value: function infoInsti(id, success) {
      _get(Institution.__proto__ || Object.getPrototypeOf(Institution), "any", this).call(this, { id: id }, "POST", success, "/institutions", "info");
    }
  }]);

  return Institution;
}(CORM);