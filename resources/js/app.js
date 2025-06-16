import './bootstrap';
import { createApp } from 'vue';

import Step from './components/StepByStep.vue';

const app = createApp({});
app.component('step', Step);

app.mount('#app');

