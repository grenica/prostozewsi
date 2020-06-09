(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[0],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Filters.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Filters.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({// props:['typ'],
  // created() {
  //     // this.$store.dispatch('fetchFilter');
  // },
  // computed: {
  //     // filters() {
  //     //     return this.$store.state.filters;
  //     // }
  // },
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/News.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/News.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_AddCard_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../components/AddCard.vue */ "./resources/js/components/AddCard.vue");
/* harmony import */ var _components_Filters_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../components/Filters.vue */ "./resources/js/components/Filters.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    AddCard: _components_AddCard_vue__WEBPACK_IMPORTED_MODULE_0__["default"],
    Filters: _components_Filters_vue__WEBPACK_IMPORTED_MODULE_1__["default"]
  },
  created: function created() {
    this.$store.dispatch('fetchProductsNewsAll');
  },
  computed: {
    products: function products() {
      return this.$store.state.products;
    },
    products_old: function products_old() {
      //  return this.$store.state.products;
      // zmieniam obiekt w tablice []
      //let ls = Object.entries(this.$store.state.products) ;
      //usuwam ostatnie dwa elementy z tablicy products
      var ls = this.$store.state.products;
      var wynik = ls.slice(0, -2); // console.log(wynik);
      // wynik spowrotem zamieniam z tablicy na obiekt
      //const w = Object.fromEntries(wynik);
      // console.log(w);

      return wynik;
    },
    categories: function categories() {
      var ls2 = this.$store.state.products.category_list; // const wynik2 = ls2.slice(-1);
      // const w = Object.fromEntries(wynik);
      // console.log('cat: '+wynik2);
      // const last =ls2.pop(); category_list
      // console.log(last)

      return ls2;
    },
    features: function features() {
      return this.$store.state.products.features_list;
    } // findDefault(obj) {
    //     //let lista = Object.entries(obj);
    //     // let obj2 = lista.filter(ob => {
    //     //     return ob.isdefault = 1;
    //     // });
    //     // let lista = Object.values(obj);//.filter(v => v.isdefault === 1);
    //     // console.log(lista);
    //     return obj;
    // }

  },
  methods: {
    addProductToCart: function addProductToCart(product) {
      this.$store.dispatch('addToCart', product);
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Filters.vue?vue&type=template&id=b9055040&":
/*!**********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Filters.vue?vue&type=template&id=b9055040& ***!
  \**********************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _vm._m(0)
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", [_c("h5", [_vm._v("Filter TODO")])])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/News.vue?vue&type=template&id=3e37c8f2&":
/*!**************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/News.vue?vue&type=template&id=3e37c8f2& ***!
  \**************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "category_wrapper" },
    [
      _c("div", { staticClass: "filters" }, [_c("Filters")], 1),
      _vm._v(" "),
      _c("div", [
        _c(
          "ul",
          _vm._l(_vm.categories, function(item) {
            return _c("li", { key: item.id }, [
              _c("label", [
                _c("input", {
                  attrs: { type: "checkbox", name: "feat_input[]", id: "" }
                }),
                _vm._v(
                  "\n                    " +
                    _vm._s(item.name) +
                    " \n                "
                )
              ]),
              _vm._v(" "),
              _c("span", [_vm._v(" " + _vm._s(item.count))])
            ])
          }),
          0
        ),
        _vm._v(" "),
        _c("hr"),
        _vm._v(" "),
        _c(
          "ul",
          _vm._l(_vm.features, function(item) {
            return _c("li", { key: item.id, staticClass: "features_filter" }, [
              _c("label", [
                _c("input", {
                  attrs: { type: "checkbox", name: "feat_input[]", id: "" }
                }),
                _vm._v(
                  "\n                    " +
                    _vm._s(item.name) +
                    " \n                "
                )
              ]),
              _vm._v(" "),
              _c("span", [_vm._v(" " + _vm._s(item.count))])
            ])
          }),
          0
        )
      ]),
      _vm._v(" "),
      _vm._l(_vm.products, function(item) {
        return _c(
          "div",
          { key: item.id, staticClass: "item_pos" },
          [
            _c(
              "router-link",
              { attrs: { to: { name: "product", params: { id: item.id } } } },
              _vm._l(item.images, function(item2) {
                return _c("div", { key: item2.id }, [
                  item2.isdefault
                    ? _c("img", {
                        staticClass: "card_img",
                        attrs: {
                          src:
                            "/storage/produkty/thumbnail/" +
                            item2.image +
                            ".webp"
                        }
                      })
                    : _vm._e()
                ])
              }),
              0
            ),
            _vm._v(" "),
            _c("h2", [_vm._v(_vm._s(item.name))]),
            _vm._v(" "),
            _c("p", [
              _c("span", { staticClass: "strong" }, [
                _vm._v(_vm._s(item.price))
              ]),
              _vm._v(" zł / ")
            ]),
            _vm._v(" "),
            _c("AddCard", { attrs: { product: item } })
          ],
          1
        )
      })
    ],
    2
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/Filters.vue":
/*!*********************************************!*\
  !*** ./resources/js/components/Filters.vue ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Filters_vue_vue_type_template_id_b9055040___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Filters.vue?vue&type=template&id=b9055040& */ "./resources/js/components/Filters.vue?vue&type=template&id=b9055040&");
/* harmony import */ var _Filters_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Filters.vue?vue&type=script&lang=js& */ "./resources/js/components/Filters.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Filters_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Filters_vue_vue_type_template_id_b9055040___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Filters_vue_vue_type_template_id_b9055040___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Filters.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Filters.vue?vue&type=script&lang=js&":
/*!**********************************************************************!*\
  !*** ./resources/js/components/Filters.vue?vue&type=script&lang=js& ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Filters_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./Filters.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Filters.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Filters_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/Filters.vue?vue&type=template&id=b9055040&":
/*!****************************************************************************!*\
  !*** ./resources/js/components/Filters.vue?vue&type=template&id=b9055040& ***!
  \****************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Filters_vue_vue_type_template_id_b9055040___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Filters.vue?vue&type=template&id=b9055040& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Filters.vue?vue&type=template&id=b9055040&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Filters_vue_vue_type_template_id_b9055040___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Filters_vue_vue_type_template_id_b9055040___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/views/News.vue":
/*!*************************************!*\
  !*** ./resources/js/views/News.vue ***!
  \*************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _News_vue_vue_type_template_id_3e37c8f2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./News.vue?vue&type=template&id=3e37c8f2& */ "./resources/js/views/News.vue?vue&type=template&id=3e37c8f2&");
/* harmony import */ var _News_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./News.vue?vue&type=script&lang=js& */ "./resources/js/views/News.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");
/* harmony import */ var _News_vue_vue_type_custom_index_0_blockType_ul__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./News.vue?vue&type=custom&index=0&blockType=ul */ "./resources/js/views/News.vue?vue&type=custom&index=0&blockType=ul");
/* harmony import */ var _News_vue_vue_type_custom_index_0_blockType_ul__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_News_vue_vue_type_custom_index_0_blockType_ul__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _News_vue_vue_type_custom_index_1_blockType_hr__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./News.vue?vue&type=custom&index=1&blockType=hr */ "./resources/js/views/News.vue?vue&type=custom&index=1&blockType=hr");
/* harmony import */ var _News_vue_vue_type_custom_index_1_blockType_hr__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_News_vue_vue_type_custom_index_1_blockType_hr__WEBPACK_IMPORTED_MODULE_4__);





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _News_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _News_vue_vue_type_template_id_3e37c8f2___WEBPACK_IMPORTED_MODULE_0__["render"],
  _News_vue_vue_type_template_id_3e37c8f2___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* custom blocks */

if (typeof _News_vue_vue_type_custom_index_0_blockType_ul__WEBPACK_IMPORTED_MODULE_3___default.a === 'function') _News_vue_vue_type_custom_index_0_blockType_ul__WEBPACK_IMPORTED_MODULE_3___default()(component)

if (typeof _News_vue_vue_type_custom_index_1_blockType_hr__WEBPACK_IMPORTED_MODULE_4___default.a === 'function') _News_vue_vue_type_custom_index_1_blockType_hr__WEBPACK_IMPORTED_MODULE_4___default()(component)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/News.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/News.vue?vue&type=custom&index=0&blockType=ul":
/*!**************************************************************************!*\
  !*** ./resources/js/views/News.vue?vue&type=custom&index=0&blockType=ul ***!
  \**************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {



/***/ }),

/***/ "./resources/js/views/News.vue?vue&type=custom&index=1&blockType=hr":
/*!**************************************************************************!*\
  !*** ./resources/js/views/News.vue?vue&type=custom&index=1&blockType=hr ***!
  \**************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {



/***/ }),

/***/ "./resources/js/views/News.vue?vue&type=script&lang=js&":
/*!**************************************************************!*\
  !*** ./resources/js/views/News.vue?vue&type=script&lang=js& ***!
  \**************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_News_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./News.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/News.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_News_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/News.vue?vue&type=template&id=3e37c8f2&":
/*!********************************************************************!*\
  !*** ./resources/js/views/News.vue?vue&type=template&id=3e37c8f2& ***!
  \********************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_News_vue_vue_type_template_id_3e37c8f2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./News.vue?vue&type=template&id=3e37c8f2& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/News.vue?vue&type=template&id=3e37c8f2&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_News_vue_vue_type_template_id_3e37c8f2___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_News_vue_vue_type_template_id_3e37c8f2___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);