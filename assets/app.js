/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
import 'bootstrap';
// any CSS you import will output into a single css file (app.scss in this case)
import './styles/app.scss';

// start the Stimulus application


import $ from 'jquery';

$('input[type="radio"]').change(function (e) {
    document.genreForm.submit();
});

$('#searchForm').change(function (e) {
    document.searchForm.submit();
});


