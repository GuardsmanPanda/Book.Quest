import Toastify from 'toastify-js'
import tippy from 'tippy.js';
import 'htmx.org';

htmx.config.historyCacheSize = 0;
window.Toastify = Toastify;
window.Tippy = tippy;

window.dialog = function (url) {
    htmx.ajax('GET', url, {'target' : '#dialog-content', headers: {'hx-dialog': 'open'}});
}


const fastNavFunction = function (el) {
    el.addEventListener('mousedown', function (e) {
        if (e.button === 0) {
            htmx.ajax('GET', el.getAttribute('href'), el.getAttribute('hx-target') ?? '#primary');
            history.pushState({}, 'we', el.getAttribute('href'))
        }
    });
    el.addEventListener('click', function (e) {
        e.preventDefault();
        if (typeof el.getAttribute('hx-fastnav') === 'string' && el.getAttribute('hx-fastnav') !== '') {
            document.querySelectorAll('.' + el.getAttribute('hx-fastnav')).forEach(function (el2) {
                el2.classList.toggle(el.getAttribute('hx-fastnav'));
            });
            el.classList.toggle(el.getAttribute('hx-fastnav'));
        }
    });
}

const tippyFunction = function (el) {
    tippy(el, {
        content: el.getAttribute('data-tippy-content'),
        appendTo: 'parent',
        duration: [250, 250],
        hideOnClick: false,
        inertia: true,
        theme: 'material',
    });
}

window.onload = () => {
    document.querySelectorAll("[hx-fastnav]").forEach(fastNavFunction);
    document.querySelectorAll('[data-tippy-content]').forEach(tippyFunction);
}
htmx.on('htmx:afterProcessNode', event => {
    event.target.querySelectorAll('[hx-fastnav]').forEach(fastNavFunction);
    event.target.querySelectorAll('[data-tippy-content]').forEach(tippyFunction);
});


htmx.on("htmx:afterRequest", event => {
    if (event.detail.successful) {
        if (event.detail.requestConfig.headers['hx-dialog'] === 'open') {
            document.getElementById('dialog').open();
        } else if (event.detail.requestConfig.headers['hx-dialog'] === 'close') {
            document.getElementById('dialog').close();
        }
        if ('hx-toast' in event.detail.requestConfig.headers) {
            Toastify({
                text: event.detail.requestConfig.headers['hx-toast'],
                className: "rounded font-medium",
                style: {
                    background: "SeaGreen",
                }
            }).showToast();
        }
    } else {
        Toastify({
            text: "❌ Error",
            className: "rounded font-medium",
            style: {
                background: "red",
            }
        }).showToast();
    }
});
