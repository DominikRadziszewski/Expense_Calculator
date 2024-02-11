<template>
  <div>
    <DataTable :value="items" paginator :rows="5" :rowsPerPageOptions="[5, 10, 20, 50]" tableStyle="min-width: 50rem"
      paginatorTemplate="RowsPerPageDropdown FirstPageLink PrevPageLink CurrentPageReport NextPageLink LastPageLink"
      currentPageReportTemplate="{first} to {last} of {totalRecords}">
      <Column field="name" header="Nazwa" sortable style="width: 25%"></Column>
      <Column field="category" header="Kategoria" sortable style="width: 25%"></Column>
      <Column field="amount" header="Ilość" sortable style="width: 25%"></Column>
      <Column field="date" header="Data" sortable style="width: 25%"></Column>
    </DataTable>
  </div>
</template>

<script>
export default {
  props: {
    items: {
      type: Array,
      default: () => [],
    },
  },
};
</script>
