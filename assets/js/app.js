const $ = require('jquery');

require('bootstrap');
require('../css/app.scss');

$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});