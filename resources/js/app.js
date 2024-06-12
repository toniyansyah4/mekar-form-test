// import './bootstrap';
import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler.js'; // Update the import statement to use the correct build of Vue
import FormComponent from './components/FormComponent.vue';

const app = createApp({});

app.component('form-component', FormComponent);

app.mount('#app');