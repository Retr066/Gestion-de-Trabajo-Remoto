//require('./bootstrap');
import Echo from 'laravel-echo';


require('alpinejs');
window.Swal = require('sweetalert2');
window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});
