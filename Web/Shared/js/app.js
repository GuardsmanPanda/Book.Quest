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