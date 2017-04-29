"use strict";

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _get = function get(object, property, receiver) { if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { return get(parent, property, receiver); } } else if ("value" in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } };

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var avatar = function (_CORM) {
  _inherits(avatar, _CORM);

  function avatar(formData) {
    _classCallCheck(this, avatar);

    var _this = _possibleConstructorReturn(this, (avatar.__proto__ || Object.getPrototypeOf(avatar)).call(this));

    _this.avatar = formData;
    _get(avatar.prototype.__proto__ || Object.getPrototypeOf(avatar.prototype), "setPrefix", _this).call(_this, '/avatar');
    return _this;
  }

  _createClass(avatar, [{
    key: "save",
    value: function save(method, success) {
      _get(avatar.prototype.__proto__ || Object.getPrototypeOf(avatar.prototype), "save", this).call(this, this.avatar, method, success);
    }
  }, {
    key: "update",
    value: function update(id, method, success) {
      this.avatar.append('id', id);
      _get(avatar.prototype.__proto__ || Object.getPrototypeOf(avatar.prototype), "update", this).call(this, this.avatar, method, success);
    }
  }], [{
    key: "allSprites",
    value: function allSprites(success) {
      _get(avatar.__proto__ || Object.getPrototypeOf(avatar), "any", this).call(this, null, "POST", success, "/sprite", "all");
    }
  }, {
    key: "allSecuences",
    value: function allSecuences(success) {
      _get(avatar.__proto__ || Object.getPrototypeOf(avatar), "any", this).call(this, null, "POST", success, "secuence", "all");
    }
  }, {
    key: "allAvatars",
    value: function allAvatars(success) {
      _get(avatar.__proto__ || Object.getPrototypeOf(avatar), "any", this).call(this, null, "POST", success, "/avatar", "all");
    }
  }, {
    key: "allStyles",
    value: function allStyles(success) {
      _get(avatar.__proto__ || Object.getPrototypeOf(avatar), "any", this).call(this, null, "POST", success, "/avatar", "allStylesAvatars");
    }
  }, {
    key: "delete",
    value: function _delete(id, method, success) {
      _get(avatar.__proto__ || Object.getPrototypeOf(avatar), "delete", this).call(this, { id: id }, method, success, 'avatar');
    }
  }, {
    key: "addStyles",
    value: function addStyles(formData, success) {
      _get(avatar.__proto__ || Object.getPrototypeOf(avatar), "any", this).call(this, formData, "POST", success, "/avatar", "addStyle");
    }
  }, {
    key: "deleteStyle",
    value: function deleteStyle(id, success) {
      _get(avatar.__proto__ || Object.getPrototypeOf(avatar), "any", this).call(this, id, "POST", success, "/avatar", "deleteStyle");
    }
  }, {
    key: "updateStyle",
    value: function updateStyle(data, success) {
      _get(avatar.__proto__ || Object.getPrototypeOf(avatar), "any", this).call(this, data, "POST", success, "/avatar", "updateStyle");
    }
  }, {
    key: "saveSprites",
    value: function saveSprites(data, success) {
      _get(avatar.__proto__ || Object.getPrototypeOf(avatar), "any", this).call(this, data, "POST", success, "/sprite", "save");
    }
  }, {
    key: "deleteSprite",
    value: function deleteSprite(id, success) {
      _get(avatar.__proto__ || Object.getPrototypeOf(avatar), "any", this).call(this, id, "POST", success, "/sprite", "delete");
    }
  }, {
    key: "updateSprite",
    value: function updateSprite(data, success) {
      _get(avatar.__proto__ || Object.getPrototypeOf(avatar), "any", this).call(this, data, "POST", success, "/sprite", "update");
    }
  }]);

  return avatar;
}(CORM);