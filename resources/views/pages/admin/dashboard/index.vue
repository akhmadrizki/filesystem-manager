<script setup lang="ts">
import PageDescription from "@components/admin/layout/Page/PageDescription.vue";
import PageSection from "@components/admin/layout/Page/PageSection.vue";
import PageTitle from "@components/admin/layout/Page/PageTitle.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template layout="admin">
  <Head title="Dashboard" />

  <PageSection header="Dashboard Page" :back-link="$route('admin.dashboard')">
    <PageTitle>Dashboard</PageTitle>
    <PageDescription>Description for the page.</PageDescription>
  </PageSection>
</template>

<style scoped></style>
