<template>
  <div>
    <DataTable :value="items" paginator :rows="5" :rowsPerPageOptions="[5, 10, 20, 50]" tableStyle="min-width: 50rem"
      paginatorTemplate="RowsPerPageDropdown FirstPageLink PrevPageLink CurrentPageReport NextPageLink LastPageLink"
      currentPageReportTemplate="{first} to {last} of {totalRecords}">
      <Column field="name" header="Nazwa" sortable style="width: 25%"></Column>
      <Column field="category" header="Kategoria" sortable style="width: 25%"></Column>
      <Column field="amount" header="Ilość" sortable style="width: 25%"></Column>
      <Column field="date" header="Data" sortable style="width: 25%"></Column>
      <Column field="action" header="Action" sortable style="width: 25%">
        <template #body="slotProps">
          <Button icon="pi pi-trash" outlined rounded severity="danger" @click="confirmDeleteProduct(slotProps.data)" />
        </template>
      </Column>
    </DataTable>
  </div>
</template>

<script>
import Button from 'primevue/button';
import axios from 'axios';

export default {
  components: {
    Button,
  },
  props: {
    items: {
      type: Array,
      default: () => [],
    },
  },
  setup() {
    const token = document.head.querySelector('meta[name="csrf-token"]');
    
    const confirmDeleteProduct = async (id) => {
      if (confirm('Czy na pewno chcesz usunąć ten produkt?')) {
        try {
          if (token) {
            axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
          } else {
            console.error('CSRF token not found!');
          }
          
          const response = await axios.delete(`/budget/`+id.id);
          if (response.status === 200) {
            console.log('Produkt został pomyślnie usunięty.');
          } else {
            console.error('Wystąpił błąd podczas usuwania produktu.');
          }
        } catch (error) {
          console.error('Wystąpił błąd podczas komunikacji z serwerem:', error);
        }
      } else {
        console.log('Anulowano usuwanie produktu.');
      }
    };

    return {
      confirmDeleteProduct
    };
  },
};
</script>