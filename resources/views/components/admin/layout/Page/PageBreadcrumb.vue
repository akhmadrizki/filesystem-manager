<template>
  <div
    v-if="items.length > 0"
    aria-label="breadcrumb"
    class="section-header-breadcrumb"
  >
    <template v-for="(breadcrumb, index) in items" :key="index">
      <div v-if="breadcrumb.url && lastIndex !== index" class="breadcrumb-item">
        <Link :href="breadcrumb.url">{{ breadcrumb.title }}</Link>
      </div>
      <div v-else class="breadcrumb-item active">
        {{ breadcrumb.title }}
      </div>
    </template>
  </div>
</template>

<script setup lang="ts">
import { BreadcrumbItem } from "@/scripts/types/page-props";
import { Link } from "@inertiajs/vue3";
import { computed, PropType } from "vue";

const props = defineProps({
  items: {
    type: Array as PropType<BreadcrumbItem[]>,
    required: false,
    default: () => [],
  },
});

const lastIndex = computed(() => props.items.length - 1);
</script>
