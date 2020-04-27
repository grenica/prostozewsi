(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[1],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Product.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/Product.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_AddCard_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../components/AddCard.vue */ "./resources/js/components/AddCard.vue");
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
    AddCard: _components_AddCard_vue__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  data: function data() {
    return {
      prodID: this.$route.params.id,
      ActiveItem: null
    };
  },
  //  mounted: function(){
  //      console.log('jestem w Products');
  //     axios.get('http://localhost/api/product/')
  //         .then(response => this.product = response.data);
  // }
  created: function created() {
    //let param = this.$route.params.id;
    console.log("Product - fetchProduct" + this.prodID);
    this.$store.dispatch('fetchProduct', this.prodID);
  },
  computed: {
    product: function product() {
      //console.log('jest computed');
      return this.$store.getters.getProductId(this.prodID);
    },
    // defaultImage() {
    //     let wynik = '';
    //     let products = this.$store.getters.getProductId(this.prodID);
    //     // console.log(products.images);
    //     //szukam image z tablicy "images" gdzie jest default=1
    //     products.images.forEach(element => {
    //         if(element.isdefault) {
    //             console.log(element.image);
    //             wynik = element.image;
    //         }
    //     });
    //     return wynik;
    // },
    // nondefaultImage() {
    //     let products = this.$store.getters.getProductId(this.prodID);
    //     // const def = products.images.find(element => element.isdefault === 1 );
    //     // console.log('tablica obrazków:'+ JSON.stringify(products.images)  );
    //     // wszystkie elementy z tablicy products gdzie w obiekcie nie ma w polu default 1
    //     let arr = products.images.filter(item => item.isdefault !== 1);
    //     return arr;
    // },
    sortedProductImages: function sortedProductImages() {
      //this.$store.dispatch('fetchProduct',this.prodID);
      var products = this.$store.getters.getProductId(this.prodID); // wszystkie elementy z tablicy products gdzie w obiekcie nie ma w polu default 1

      var arr = products.images.filter(function (item) {
        return item.isdefault !== 1;
      }); // szukam elementu gdzie jest zaznaczony domyślny obraz (isdefault = 1)

      var def = products.images.find(function (element) {
        return element.isdefault === 1;
      }); // dodaje znaleziony element na początku tablicy arr

      arr.unshift(def);
      console.log(arr);
      return arr;
    }
  },
  methods: {
    hover: function hover(index) {
      this.ActiveItem = index;
      console.log("hover: " + index);
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Product.vue?vue&type=template&id=7b8d5cc0&":
/*!*****************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/Product.vue?vue&type=template&id=7b8d5cc0& ***!
  \*****************************************************************************************************************************************************************************************************/
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
  return _c("div", [
    _c("div", { staticClass: "product_container" }, [
      _vm.product
        ? _c("div", { staticClass: "product_info" }, [
            _vm.product.images && _vm.sortedProductImages.length > 1
              ? _c(
                  "div",
                  { staticClass: "product_images" },
                  _vm._l(_vm.sortedProductImages, function(p, index) {
                    return _c("img", {
                      key: index,
                      attrs: { src: "/storage/produkty/" + p.image },
                      on: {
                        mouseover: function($event) {
                          return _vm.hover(index)
                        }
                      }
                    })
                  }),
                  0
                )
              : _vm._e(),
            _vm._v(" "),
            _vm.product.images
              ? _c(
                  "div",
                  { staticClass: "product_preview" },
                  _vm._l(_vm.sortedProductImages, function(p, index) {
                    return _c("img", {
                      key: index,
                      class: { active: index === _vm.ActiveItem },
                      attrs: { src: "/storage/produkty/" + p.image }
                    })
                  }),
                  0
                )
              : _vm._e(),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "product_title" },
              [
                _c("router-link", { attrs: { to: { name: "welcome" } } }, [
                  _vm._v(_vm._s(_vm.product.FarmerName))
                ]),
                _vm._v(" "),
                _vm.product
                  ? _c("h5", [_vm._v(_vm._s(_vm.product.name))])
                  : _vm._e(),
                _vm._v(" "),
                _c("div", { staticClass: "price_info" }, [
                  _c("span", [_vm._v(_vm._s(_vm.product.price) + " zł")]),
                  _vm._v("/" + _vm._s(_vm.product.Unit) + "\n            ")
                ]),
                _vm._v(" "),
                _c("AddCard", { attrs: { product: _vm.product } })
              ],
              1
            )
          ])
        : _vm._e()
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/views/Product.vue":
/*!****************************************!*\
  !*** ./resources/js/views/Product.vue ***!
  \****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Product_vue_vue_type_template_id_7b8d5cc0___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Product.vue?vue&type=template&id=7b8d5cc0& */ "./resources/js/views/Product.vue?vue&type=template&id=7b8d5cc0&");
/* harmony import */ var _Product_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Product.vue?vue&type=script&lang=js& */ "./resources/js/views/Product.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Product_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Product_vue_vue_type_template_id_7b8d5cc0___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Product_vue_vue_type_template_id_7b8d5cc0___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/Product.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/Product.vue?vue&type=script&lang=js&":
/*!*****************************************************************!*\
  !*** ./resources/js/views/Product.vue?vue&type=script&lang=js& ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Product_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./Product.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Product.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Product_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/Product.vue?vue&type=template&id=7b8d5cc0&":
/*!***********************************************************************!*\
  !*** ./resources/js/views/Product.vue?vue&type=template&id=7b8d5cc0& ***!
  \***********************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Product_vue_vue_type_template_id_7b8d5cc0___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Product.vue?vue&type=template&id=7b8d5cc0& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Product.vue?vue&type=template&id=7b8d5cc0&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Product_vue_vue_type_template_id_7b8d5cc0___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Product_vue_vue_type_template_id_7b8d5cc0___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);