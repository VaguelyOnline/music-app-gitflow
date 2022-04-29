require('./bootstrap');

// Starter-kit boilerplate (optional if you've implemented your own)
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

// Initialise Vue components
import HelloWorld from './components/HelloWorld';
import WordSearch from './components/WordSearch';

// register component with Vue
import { createApp } from 'vue';
let vueApp = createApp({});
vueApp.component('hello-world', HelloWorld);
vueApp.component('word-search', WordSearch);
vueApp.mount('#vue-app');
