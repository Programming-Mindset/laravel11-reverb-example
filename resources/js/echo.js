import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
import Toastify from 'toastify-js';
import 'toastify-js/src/toastify.css';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
});

const isAdmin = document.getElementById('is_admin').value;

if ((isAdmin)) {

    window.Echo.channel('messages')
        .listen('.create', (event) => {
            console.log('Received event:', event);

            Toastify({
                text: `New message received: ${event.data.message}`, // Replace 'message' with your event payload
                duration: 20000,
                close: true,
                gravity: 'bottom',
                position: 'left',
                backgroundColor: 'green',
            }).showToast();

        }).error((error) => {

        console.log('Error listening to the event:', error);
    });
}
