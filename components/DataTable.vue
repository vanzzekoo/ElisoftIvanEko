<template>
  <div>
    <vue-good-table
      :columns="columns"
      :rows="rows"
      :pagination-options="paginationOptions"
      :filter-options="filterOptions"
      :search-options="searchOptions"
    ></vue-good-table>
  </div>
</template>

<script>

import VueGoodTablePlugin from 'vue-good-table';
import 'vue-good-table/dist/vue-good-table.css';
import axios from 'axios';

export default {
  components: {
    VueGoodTable: VueGoodTablePlugin,
  },
  data() {
    return {
      columns: [
        {
          label: 'Thumbnail',
          field: 'thumbnail',
        },
        {
          label: 'Judul',
          field: 'judul',
        },
        // Tambahkan kolom lain sesuai kebutuhan
      ],
      rows: [],
      paginationOptions: {
        enabled: true,
        perPage: 10,
      },
      filterOptions: {
        enabled: true,
        externalQuery: '',
        externalFn: this.filterData,
      },
      searchOptions: {
        enabled: true,
        externalQuery: '',
        externalFn: this.searchData,
      },
    };
  },
  created() {
    this.loadData();
  },
  methods: {
    filterData(query) {
      this.loadData(query);
    },
    searchData(query) {
      this.loadData(query);
    },
    loadData(query = '') {
      // Ganti URL dengan URL Anda yang sesuai
      const apiUrl = `/api/posts?query=${query}`;

      axios.get(apiUrl)
        .then((response) => {
          this.rows = response.data;
        })
        .catch((error) => {
          console.error(error);
        });
    },
  },
};
</script>
