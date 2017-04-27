'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _get = function get(object, property, receiver) { if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { return get(parent, property, receiver); } } else if ("value" in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } };

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var News = function (_CORM) {
	_inherits(News, _CORM);

	function News(formdata) {
		_classCallCheck(this, News);

		var _this = _possibleConstructorReturn(this, (News.__proto__ || Object.getPrototypeOf(News)).call(this));

		_this.new = formdata;
		_get(News.prototype.__proto__ || Object.getPrototypeOf(News.prototype), 'setPrefix', _this).call(_this, '/news');
		return _this;
	}

	_createClass(News, [{
		key: 'save',
		value: function save(method, success) {
			$.ajax({
				url: '/news/save',
				type: 'POST',
				data: this.new,
				cache: false,
				contentType: false,
				processData: false
			}).done(function (response) {
				success(response);
			});
		}
	}, {
		key: 'update',
		value: function update(id, method, success) {
			this.new.append('id', id);
			_get(News.prototype.__proto__ || Object.getPrototypeOf(News.prototype), 'update', this).call(this, this.new, method, success);
		}
	}], [{
		key: 'delete',
		value: function _delete(id, method, success) {
			_get(News.__proto__ || Object.getPrototypeOf(News), 'delete', this).call(this, { id: id }, method, success, '/news');
		}
	}, {
		key: 'get',
		value: function get(success) {
			_get(News.__proto__ || Object.getPrototypeOf(News), 'any', this).call(this, null, "GET", success, "/news", "get");
		}
	}, {
		key: 'title',
		value: function title(success) {
			_get(News.__proto__ || Object.getPrototypeOf(News), 'any', this).call(this, null, "POST", success, "/news", "title");
		}
	}]);

	return News;
}(CORM);