/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 161);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/metronic/js/pages/others/html5-qrcode.js":
/*!************************************************************!*\
  !*** ./resources/metronic/js/pages/others/html5-qrcode.js ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("throw new Error(\"Module build failed (from ./node_modules/babel-loader/lib/index.js):\\nSyntaxError: /Users/amik_eyro/Documents/Project/UNILEVER/people-control/resources/metronic/js/pages/others/html5-qrcode.js: Support for the experimental syntax 'classProperties' isn't currently enabled (16:26):\\n\\n\\u001b[0m \\u001b[90m 14 | \\u001b[39m\\u001b[36mclass\\u001b[39m \\u001b[33mHtml5Qrcode\\u001b[39m {\\u001b[0m\\n\\u001b[0m \\u001b[90m 15 | \\u001b[39m    \\u001b[90m//#region static constants\\u001b[39m\\u001b[0m\\n\\u001b[0m\\u001b[31m\\u001b[1m>\\u001b[22m\\u001b[39m\\u001b[90m 16 | \\u001b[39m    static \\u001b[33mDEFAULT_WIDTH\\u001b[39m \\u001b[33m=\\u001b[39m \\u001b[35m300\\u001b[39m\\u001b[33m;\\u001b[39m\\u001b[0m\\n\\u001b[0m \\u001b[90m    | \\u001b[39m                         \\u001b[31m\\u001b[1m^\\u001b[22m\\u001b[39m\\u001b[0m\\n\\u001b[0m \\u001b[90m 17 | \\u001b[39m    static \\u001b[33mDEFAULT_WIDTH_OFFSET\\u001b[39m \\u001b[33m=\\u001b[39m \\u001b[35m2\\u001b[39m\\u001b[33m;\\u001b[39m\\u001b[0m\\n\\u001b[0m \\u001b[90m 18 | \\u001b[39m    static \\u001b[33mFILE_SCAN_MIN_HEIGHT\\u001b[39m \\u001b[33m=\\u001b[39m \\u001b[35m300\\u001b[39m\\u001b[33m;\\u001b[39m\\u001b[0m\\n\\u001b[0m \\u001b[90m 19 | \\u001b[39m    static \\u001b[33mSCAN_DEFAULT_FPS\\u001b[39m \\u001b[33m=\\u001b[39m \\u001b[35m2\\u001b[39m\\u001b[33m;\\u001b[39m\\u001b[0m\\n\\nAdd @babel/plugin-proposal-class-properties (https://git.io/vb4SL) to the 'plugins' section of your Babel config to enable transformation.\\nIf you want to leave it as-is, add @babel/plugin-syntax-class-properties (https://git.io/vb4yQ) to the 'plugins' section to enable parsing.\\n    at Parser._raise (/Users/amik_eyro/Documents/Project/UNILEVER/people-control/node_modules/@babel/parser/lib/index.js:748:17)\\n    at Parser.raiseWithData (/Users/amik_eyro/Documents/Project/UNILEVER/people-control/node_modules/@babel/parser/lib/index.js:741:17)\\n    at Parser.expectPlugin (/Users/amik_eyro/Documents/Project/UNILEVER/people-control/node_modules/@babel/parser/lib/index.js:9106:18)\\n    at Parser.parseClassProperty (/Users/amik_eyro/Documents/Project/UNILEVER/people-control/node_modules/@babel/parser/lib/index.js:12722:12)\\n    at Parser.pushClassProperty (/Users/amik_eyro/Documents/Project/UNILEVER/people-control/node_modules/@babel/parser/lib/index.js:12690:30)\\n    at Parser.parseClassMemberWithIsStatic (/Users/amik_eyro/Documents/Project/UNILEVER/people-control/node_modules/@babel/parser/lib/index.js:12595:14)\\n    at Parser.parseClassMember (/Users/amik_eyro/Documents/Project/UNILEVER/people-control/node_modules/@babel/parser/lib/index.js:12532:10)\\n    at /Users/amik_eyro/Documents/Project/UNILEVER/people-control/node_modules/@babel/parser/lib/index.js:12477:14\\n    at Parser.withTopicForbiddingContext (/Users/amik_eyro/Documents/Project/UNILEVER/people-control/node_modules/@babel/parser/lib/index.js:11516:14)\\n    at Parser.parseClassBody (/Users/amik_eyro/Documents/Project/UNILEVER/people-control/node_modules/@babel/parser/lib/index.js:12454:10)\\n    at Parser.parseClass (/Users/amik_eyro/Documents/Project/UNILEVER/people-control/node_modules/@babel/parser/lib/index.js:12427:22)\\n    at Parser.parseStatementContent (/Users/amik_eyro/Documents/Project/UNILEVER/people-control/node_modules/@babel/parser/lib/index.js:11718:21)\\n    at Parser.parseStatement (/Users/amik_eyro/Documents/Project/UNILEVER/people-control/node_modules/@babel/parser/lib/index.js:11676:17)\\n    at Parser.parseBlockOrModuleBlockBody (/Users/amik_eyro/Documents/Project/UNILEVER/people-control/node_modules/@babel/parser/lib/index.js:12258:25)\\n    at Parser.parseBlockBody (/Users/amik_eyro/Documents/Project/UNILEVER/people-control/node_modules/@babel/parser/lib/index.js:12249:10)\\n    at Parser.parseTopLevel (/Users/amik_eyro/Documents/Project/UNILEVER/people-control/node_modules/@babel/parser/lib/index.js:11607:10)\\n    at Parser.parse (/Users/amik_eyro/Documents/Project/UNILEVER/people-control/node_modules/@babel/parser/lib/index.js:13415:10)\\n    at parse (/Users/amik_eyro/Documents/Project/UNILEVER/people-control/node_modules/@babel/parser/lib/index.js:13468:38)\\n    at parser (/Users/amik_eyro/Documents/Project/UNILEVER/people-control/node_modules/@babel/core/lib/parser/index.js:54:34)\\n    at parser.next (<anonymous>)\\n    at normalizeFile (/Users/amik_eyro/Documents/Project/UNILEVER/people-control/node_modules/@babel/core/lib/transformation/normalize-file.js:99:38)\\n    at normalizeFile.next (<anonymous>)\\n    at run (/Users/amik_eyro/Documents/Project/UNILEVER/people-control/node_modules/@babel/core/lib/transformation/index.js:31:50)\\n    at run.next (<anonymous>)\\n    at Function.transform (/Users/amik_eyro/Documents/Project/UNILEVER/people-control/node_modules/@babel/core/lib/transform.js:27:41)\\n    at transform.next (<anonymous>)\\n    at step (/Users/amik_eyro/Documents/Project/UNILEVER/people-control/node_modules/gensync/index.js:261:32)\\n    at /Users/amik_eyro/Documents/Project/UNILEVER/people-control/node_modules/gensync/index.js:273:13\\n    at async.call.result.err.err (/Users/amik_eyro/Documents/Project/UNILEVER/people-control/node_modules/gensync/index.js:223:11)\");//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IiIsImZpbGUiOiIuL3Jlc291cmNlcy9tZXRyb25pYy9qcy9wYWdlcy9vdGhlcnMvaHRtbDUtcXJjb2RlLmpzLmpzIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/metronic/js/pages/others/html5-qrcode.js\n");

/***/ }),

/***/ 161:
/*!******************************************************************!*\
  !*** multi ./resources/metronic/js/pages/others/html5-qrcode.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/amik_eyro/Documents/Project/UNILEVER/people-control/resources/metronic/js/pages/others/html5-qrcode.js */"./resources/metronic/js/pages/others/html5-qrcode.js");


/***/ })

/******/ });