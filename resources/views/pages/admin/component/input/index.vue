<template layout="admin">
  <Head title="Dashboard" />

  <PageSection header="Dashboard Page" :back-link="$route('admin.dashboard')">
    <PageTitle>Input</PageTitle>
    <PageDescription>Description for the page.</PageDescription>
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>Input</h4>
          </div>
          <div class="card-body">
            <div class="form-group">
              <p class="mb-2">Label Name</p>
              <BKInput v-model="name" type="text"></BKInput>
            </div>
          </div>
        </div>
      </div>
    </div>
  </PageSection>
</template>

<script setup lang="ts">
import PageDescription from "@components/admin/layout/Page/PageDescription.vue";
import PageSection from "@components/admin/layout/Page/PageSection.vue";
import PageTitle from "@components/admin/layout/Page/PageTitle.vue";

import { Head } from "@inertiajs/vue3";
import { ref } from "vue";

const name = ref("");

</script>

<style scoped></style>
