<script setup lang="ts">
import { ref, watch } from "vue";

const props = defineProps({
  withIteration: {
    type: Boolean,
    default: false,
  },
  paginatedCollection: null,
  colspan: {
    type: String,
    default: "",
  },
  showTableMeta: {
    type: Boolean,
    default: false,
  },
  sortable: {
    type: Boolean,
    default: false,
  },
  withMinWidth: {
    type: Boolean,
    default: false,
  },
  offset: {
    type: Number,
    default: 0,
  },
  withPagination: {
    type: Boolean,
    default: true,
  },
});
const emits = defineEmits(["sorted"]);

const sortedPaginatedCollection = ref(
  Object.assign({}, props.paginatedCollection),
);

watch(
  () => props.paginatedCollection?.data,
  () => {
    sortedPaginatedCollection.value = Object.assign(
      {},
      props.paginatedCollection,
    );
  },
);
const handleSortedCollection = () => {
  const mappedCollection = sortedPaginatedCollection.value.data.map(
    function (data, index) {
      return data.id;
    },
  );

  emits("sorted", {
    mappedCollection: mappedCollection,
    offset: props.offset,
  });
};

const futureIndexRef = ref(null);
const movingIndexRef = ref(null);
const relatedRef = ref(null);

const handleOnEnd = () => {
  if (relatedRef.value?.classList?.contains("disabled")) {
    return false;
  }

  const movingElement =
    sortedPaginatedCollection.value.data[movingIndexRef.value];
  const futureElement =
    sortedPaginatedCollection.value.data[futureIndexRef.value];
  sortedPaginatedCollection.value.data[movingIndexRef.value] = futureElement;
  sortedPaginatedCollection.value.data[futureIndexRef.value] = movingElement;

  handleSortedCollection();
};

const handleOnMove = (event) => {
  const { index, futureIndex, element } = event.draggedContext;

  futureIndexRef.value = futureIndex;
  movingIndexRef.value = index;
  relatedRef.value = event.related;

  return false;
};
</script>

<template>
  <div class="table-responsive">
    <table class="table" :class="{ 'with-min-width': withMinWidth }">
      <thead class="thead-light">
        <tr>
          <th v-if="withIteration" width="50">#</th>
          <slot name="thead" />
        </tr>
      </thead>
      <template v-if="sortable">
        <draggable
          v-model="sortedPaginatedCollection.data"
          group="data"
          tag="tbody"
          item-key="id"
          :move="handleOnMove"
          @end="handleOnEnd"
        >
          <template #item="{ element, index }">
            <tr
              class="tr-border-bottom py-2"
              :class="{
                disabled:
                  element.hasOwnProperty('is_editable') && !element.is_editable,
              }"
            >
              <td v-if="withIteration" class="p-0 text-center iteration-column">
                #{{ index + paginatedCollection.meta?.from }}
              </td>
              <slot name="tbody" :data="element" />
            </tr>
          </template>
        </draggable>
      </template>
      <template v-else>
        <tbody>
          <template v-if="paginatedCollection?.data.length">
            <tr
              v-for="(data, index) in paginatedCollection.data"
              :key="data.id"
              class="tr-border-bottom py-2"
              :class="{
                disabled:
                  data.hasOwnProperty('is_editable') && !data.is_editable,
              }"
            >
              <td v-if="withIteration" class="p-0 text-center">
                #{{ index + paginatedCollection.meta?.from }}
              </td>
              <slot name="tbody" :data="data" />
            </tr>
          </template>
          <template v-else>
            <slot name="empty">
              <tr>
                <td :colspan="colspan">
                  <p class="text-center">Data not found.</p>
                </td>
              </tr>
            </slot>
          </template>
        </tbody>
      </template>
    </table>
  </div>
  <template v-if="paginatedCollection?.data.length">
    <div class="row px-3 mt-3">
      <div class="col-md-6">
        <template v-if="showTableMeta">
          <div>
            <p>
              <b
                >Showing {{ paginatedCollection.meta?.from }} to
                {{ paginatedCollection.meta?.to }} of
                {{ paginatedCollection.meta?.total }} Entries</b
              >
            </p>
          </div>
        </template>
      </div>
      <div
        v-if="paginatedCollection.meta && withPagination"
        class="col-md-6 overflow-auto"
      >
        <div class="float-md-right">
          <BKPagination :links="paginatedCollection?.meta.links"></BKPagination>
        </div>
      </div>
    </div>
  </template>
</template>

<style scoped>
table.table.with-min-width {
  min-width: 1500px !important;
}
tr.disabled {
  background-color: #0000000a;
}
.tr-border-bottom {
  border-bottom: 1px solid #ededed;
}
</style>
