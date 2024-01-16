// Import the necessary dependencies
import './bootstrap';
import { createApp } from 'vue';
import ChartComponent from './components/ChartComponent.vue';

// Create a Vue app instance
const app = createApp({});

// Register components with the application instance
app.component('chart-component', ChartComponent);

// Mount the app to an element with the id 'app'
app.mount('#app');
