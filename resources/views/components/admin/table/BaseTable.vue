<script setup lang="ts">
const props = defineProps({
  paginatedCollection: {
    type: Object,
    required: true,
  },
  isShowNumberList: {
    type: Boolean,
    required: false,
    default: true,
  },
});
</script>

<template>
  <div class="table-responsive">
    <table class="table table-striped">
      <tr>
        <th v-if="props.isShowNumberList" width="50">No</th>
        <slot name="thead" />
      </tr>
      <tbody>
        <template v-if="paginatedCollection.data.length">
          <tr v-for="(data, index) in paginatedCollection.data" :key="data.id">
            <td v-if="props.isShowNumberList" class="p-0 text-center">
              {{ index + paginatedCollection.meta.from }}
            </td>
            <slot
              name="tbody"
              :data="data"
              :number-list="index + paginatedCollection.meta.from"
            />
          </tr>
        </template>
        <template v-else>
          <slot name="empty"></slot>
        </template>
      </tbody>
    </table>
    <template v-if="paginatedCollection.data.length">
      <hr />
      <div
        class="px-3 mt-3 d-flex justify-content-between align-content-center"
      >
        <div>
          <p>
            <b
              >Showing {{ paginatedCollection.meta.from }} to
              {{ paginatedCollection.meta.to }} of
              {{ paginatedCollection.meta.total }} Entries</b
            >
          </p>
        </div>
        <BKPagination :links="paginatedCollection.meta.links"></BKPagination>
      </div>
    </template>
  </div>
</template>

<style scoped></style>
