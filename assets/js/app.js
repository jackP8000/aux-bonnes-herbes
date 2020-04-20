const $ = require('jquery');

require('bootstrap');
require('../css/app.scss');
require('@fortawesome/fontawesome-free/css/all.min.css');
require('@fortawesome/fontawesome-free/js/all.js');

$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});