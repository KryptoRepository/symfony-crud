/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import $ from 'jquery';
import 'bootstrap';


$(document).ready(function () {
    $('#addItemModal').on('shown.bs.modal', function () {
        $('#addItemModal').trigger('focus')
    })
    renderItems($('#items-list').attr("data-url"));
});

function renderItems(url) {
    getResource(url).then((data) => {
        console.log(data);
        // TODO: create child elements
    });
}

async function getResource(url) {
    const res = await fetch(url);

    if (!res.ok) {
        throw new Error(`Could not fetch ${url}, status: ${res.status}`);
    }

    return await res.json();
}

async function postData(url, data) {
    const res = await fetch(url, {
        method: "POST",
        body: data,
        headers: {
            "Content-type": "application/json",
            Accept: "application/json",
        },
    });

    if (!res.ok) {
        throw new Error(`Could not fetch ${url}, status: ${res.status}`);
    }

    return await res.json();
}


