<script setup lang="ts">
import { ref } from "vue";

const props = defineProps(["isSortable", "name"]);
const emits = defineEmits(["sort"]);

const sortBy = ref(null);
const sortDirection = ref("");

function handleSort() {
  switch (sortDirection.value) {
    case "asc":
      sortBy.value = null;
      sortDirection.value = "";
      break;
    case "desc":
      sortBy.value = props.name;
      sortDirection.value = "asc";
      break;
    case "":
      sortBy.value = props.name;
      sortDirection.value = "desc";
      break;
  }

  emits("sort", {
    sortBy: sortBy.value,
    sortDirection: sortDirection.value,
  });
}
</script>

<template>
  <th>
    <template v-if="isSortable">
      <a class="sort-item" href="#" @click.prevent="handleSort">
        <div class="d-flex">
          <slot></slot>
          <div
            class="sort-icon-wrapper ml-1"
            :class="[{ 'text-primary': sortBy }, sortDirection ?? 'reset']"
          >
            <span
              >&nbsp;<ion-icon
                name="arrow-down-outline"
                class="sort-icon-down"
              ></ion-icon
            ></span>
          </div>
        </div>
      </a>
    </template>
    <template v-else>
      <slot></slot>
    </template>
  </th>
</template>

<style scoped>
.sort-icon-wrapper {
  width: max-content;
}
.sort-icon-wrapper.desc {
  transform: rotate(180deg) !important;
}
.sort-icon-wrapper.asc {
  transform: rotate(0deg) !important;
}
.sort-icon-wrapper.reset {
  transform: rotate(0deg) !important;
}
.sort-icon-down {
  font-size: 16px;
}
.sort-item {
  color: #6c757d;
  text-decoration: none;
  font-weight: bold;
}
</style>
