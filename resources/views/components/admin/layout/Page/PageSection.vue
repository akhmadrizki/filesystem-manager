<template>
  <section class="section">
    <div class="section-header">
      <slot name="header" :header="header" :back-link="backLink">
        <div v-if="backLink" class="section-header-back">
          <Link :href="backLink" class="btn btn-icon">
            <i class="fas fa-arrow-left"></i>
          </Link>
        </div>
        <h1>{{ header }}</h1>
        <PageBreadcrumb v-if="breadcrumb" :items="breadcrumbs" />
      </slot>
    </div>

    <div class="section-body">
      <slot />
    </div>
  </section>
</template>

<script setup lang="ts">
import { Link, usePage } from "@inertiajs/vue3";
import { computed, inject, watch } from "vue";
import PageBreadcrumb from "./PageBreadcrumb.vue";

const props = withDefaults(
  defineProps<{
    header: string;
    backLink?: string;
    fullWidth?: boolean;
    breadcrumb?: boolean;
  }>(),
  {
    backLink: undefined,
    fullWidth: false,
    breadcrumb: false,
  }
);

const { wrapPage } = inject("page-wrapper") as {
  wrapPage(condition: boolean): void;
};

watch(
  () => props.fullWidth,
  (value) => wrapPage(value),
  {
    immediate: true,
  }
);

const breadcrumbs = computed(() => usePage().props.breadcrumbs || []);
</script>

<style scoped></style>
