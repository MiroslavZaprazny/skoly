<template>
  <div class="bg-gray-50">
    <div>
      <searchbar @setSearchResult="setSearchResult"></searchbar>
    </div>
    <div
      class="flex grid gap-16 grid-cols-1 sm:grid-cols-2 mt-20 lg:grid-cols-3 2xl:grid-cols-4 mx-16"
      v-if="schools?.length >= 1"
    >
      <div v-for="(school, index) in schools" :key="index">
        <router-link
          :to="{
            name: 'SchoolDetail',
            params: { slug: school.slug },
          }"
        >
          <school-item
            :name="school.name"
            :rating="school.average_rating"
            :description="school.description"
          />
        </router-link>
      </div>
    </div>
    <h1 v-if="!schools || input?.length <= 1">
      Prosím zadajte názov školy do vyhľadávania
    </h1>
    <h1 v-if="input?.length >= 2 && schools?.length == 0">
      Nenasiel sa vysledok pre vyhladanie "{{ input }}"
    </h1>
  </div>
</template>

<script>
import schoolItem from "../../components/homepage/schoolItem.vue";
import Searchbar from "../../components/homepage/searchbar.vue";

export default {
  components: { schoolItem, Searchbar },
  methods: {
    setSearchResult(searchResult, input) {
      this.schools = searchResult;
      this.input = input;
    },
  },

  data() {
    return {
      schools: [],
      input: "",
    };
  },
};
</script>

<style></style>
