import dialogPolyfill from 'dialog-polyfill';
import 'hyperscript.org'
import 'htmx.org'

htmx.config.historyCacheSize = 0;
window.Dialog = dialogPolyfill;

window.dialog = function (url) {
    htmx.ajax('GET', url, '#pop')
        .then(_ => {
            document.getElementById('general-dialog').showModal()
        });
}

const fastNavFunction = function (el) {
    el.addEventListener('mousedown',  function (e) {
        if (e.button === 0) {
            htmx.ajax('GET', el.getAttribute('href'), '#primary')
            history.pushState({}, 'Book.Quest - ' + 'we', el.getAttribute('href'))
        }
    });
    el.addEventListener('click', function (e) {
        e.preventDefault();
    });
}
window.onload = () =>document.querySelectorAll("[hx-fastnav]").forEach(fastNavFunction);
htmx.on('htmx:afterProcessNode', event => event.target.querySelectorAll('[hx-fastnav]').forEach(fastNavFunction));
