
import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler'

const app = createApp({});

import TotalPost from './component/TotalPost.vue';
import Notification from './component/website/Notification.vue';

app.component('total-post', TotalPost);
app.component('notify-list', Notification);

app.mount("#wrapper");

// Echo.channel(`post-channel`)
//     .listen('.App\\Events\\PostNotify', (e) => {
//         console.log('xxxxx');
//     });

