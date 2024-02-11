// Import the necessary dependencies
import './bootstrap';
import { createApp } from 'vue';
import PrimeVue from 'primevue/config';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import 'primevue/resources/themes/saga-blue/theme.css';
import 'primevue/resources/primevue.min.css';
import 'primeicons/primeicons.css';
import TableComponent from './components/TableComponent.vue';
import ChartComponent from './components/ChartComponent.vue';

const app = createApp({});


app.use(PrimeVue);


app.component('DataTable', DataTable);
app.component('Column', Column);


app.component('table-component', TableComponent);
app.component('chart-component', ChartComponent);


app.mount('#app');