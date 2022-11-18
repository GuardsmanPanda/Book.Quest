import Toastify from 'toastify-js'
import 'htmx.org';

htmx.config.historyCacheSize = 0;

const toast = (type, message) => {
    let classes = 'rounded font-medium shadow text-sm py-3 px-5 before:top-0 before:left-0 before:absolute fixed before:h-full  before:w-2.5 '
    Toastify({
        text: message,
        className: classes + (type === 'success' ? 'text-green-50 bg-green-600 shadow-green-600/40 before:bg-green-700' : 'bg-red-600 text-red-50 shadow-red-600/40 before:bg-red-800'),
        onClick: function () {
        }
    }).showToast();
}

const fastNavFunction = function (el) {
    el.addEventListener('mousedown', function (e) {
        if (e.button === 0) {
            htmx.ajax('GET', el.getAttribute('href'), el.getAttribute('hx-target') ?? '#primary');
            history.pushState({}, 'we', el.getAttribute('href'))
            if (typeof el.getAttribute('hx-fastnav') === 'string' && el.getAttribute('hx-fastnav') !== '') {
                document.querySelectorAll('.' + el.getAttribute('hx-fastnav')).forEach(function (el2) {
                    el2.classList.toggle(el.getAttribute('hx-fastnav'));
                });
                el.classList.toggle(el.getAttribute('hx-fastnav'));
            }
        }
    });
    el.addEventListener('click', e =>  e.preventDefault());
}

window.onload = () => {
    document.querySelectorAll("[hx-fastnav]").forEach(fastNavFunction);
}
htmx.on('htmx:afterOnLoad', event => {
    event.target.querySelectorAll('[hx-fastnav]').forEach(fastNavFunction);
});


htmx.on("htmx:afterRequest", event => {
    if (event.detail.successful) {
        if (event.detail.requestConfig.headers['hx-dialog'] === 'open') {
            document.getElementById('dialog').showModal();
        } else if (event.detail.requestConfig.headers['hx-dialog'] === 'close') {
            document.getElementById('dialog').close();
        }
        if ('hx-toast' in event.detail.requestConfig.headers) {
            toast('success', event.detail.requestConfig.headers['hx-toast']);
        }
    } else {
        toast('error', 'Something went wrong');
    }
});
