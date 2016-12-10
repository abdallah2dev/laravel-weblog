// if (global.$ === undefined && window.$ === undefined) {
    window.$ = window.jQuery = require('jquery');
// }

require('bootstrap-sass');

window.MediumEditor = require('medium-editor');
require('medium-editor-insert-plugin')($);
require('cropper');

require('selectize');
require('./post-editor');
