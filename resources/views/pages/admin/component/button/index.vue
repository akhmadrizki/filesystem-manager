<template layout="admin">
  <Head title="Button" />

  <PageSection header="Button Page">
    <PageTitle>Button</PageTitle>
    <PageDescription>Button usage example.</PageDescription>

    <div class="row">
      <div class="col-6">
        <div class="card">
          <div class="card-header">
            <h4>Solid Color</h4>
          </div>
          <div class="card-body">
            <BKButton class="mr-2 mb-2" color="primary">Primary</BKButton>
            <BKButton class="mr-2 mb-2" color="secondary">Secondary</BKButton>
            <BKButton class="mr-2 mb-2" color="success">Success</BKButton>
            <BKButton class="mr-2 mb-2" color="warning">Warning</BKButton>
            <BKButton class="mr-2 mb-2" color="danger">Danger</BKButton>
            <BKButton class="mr-2 mb-2" color="info">Info</BKButton>
            <BKButton class="mr-2 mb-2" color="dark">Dark</BKButton>
            <BKButton class="mr-2 mb-2" color="light">Light</BKButton>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card">
          <div class="card-header">
            <h4>Outline Color</h4>
          </div>
          <div class="card-body">
            <BKButton class="mr-2 mb-2" variant="outline" color="primary">Primary</BKButton>
            <BKButton class="mr-2 mb-2" variant="outline" color="secondary">Secondary</BKButton>
            <BKButton class="mr-2 mb-2" variant="outline" color="success">Success</BKButton>
            <BKButton class="mr-2 mb-2" variant="outline" color="warning">Warning</BKButton>
            <BKButton class="mr-2 mb-2" variant="outline" color="danger">Danger</BKButton>
            <BKButton class="mr-2 mb-2" variant="outline" color="info">Info</BKButton>
            <BKButton class="mr-2 mb-2" variant="outline" color="dark">Dark</BKButton>
            <BKButton class="mr-2 mb-2" variant="outline" color="light">Light</BKButton>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card">
          <div class="card-header">
            <h4>Pill Shape</h4>
          </div>
          <div class="card-body">
            <BKButton class="mr-2 mb-2" color="primary" shape="pill">Primary</BKButton>
            <BKButton class="mr-2 mb-2" color="secondary" shape="pill">Secondary</BKButton>
            <BKButton class="mr-2 mb-2" color="success" shape="pill">Success</BKButton>
            <BKButton class="mr-2 mb-2" color="warning" shape="pill">Warning</BKButton>
            <BKButton class="mr-2 mb-2" color="danger" shape="pill">Danger</BKButton>
            <BKButton class="mr-2 mb-2" color="info" shape="pill">Info</BKButton>
            <BKButton class="mr-2 mb-2" color="dark" shape="pill">Dark</BKButton>
            <BKButton class="mr-2 mb-2" color="light" shape="pill">Light</BKButton>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card">
          <div class="card-header">
            <h4>Square Shape</h4>
          </div>
          <div class="card-body">
            <BKButton class="mr-2 mb-2" color="primary" shape="square">Primary</BKButton>
            <BKButton class="mr-2 mb-2" color="secondary" shape="square">Secondary</BKButton>
            <BKButton class="mr-2 mb-2" color="success" shape="square">Success</BKButton>
            <BKButton class="mr-2 mb-2" color="warning" shape="square">Warning</BKButton>
            <BKButton class="mr-2 mb-2" color="danger" shape="square">Danger</BKButton>
            <BKButton class="mr-2 mb-2" color="info" shape="square">Info</BKButton>
            <BKButton class="mr-2 mb-2" color="dark" shape="square">Dark</BKButton>
            <BKButton class="mr-2 mb-2" color="light" shape="square">Light</BKButton>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card">
          <div class="card-header">
            <h4>Size</h4>
          </div>
          <div class="card-body">
            <BKButton class="mr-2" color="primary" size="sm">Small</BKButton>
            <BKButton class="mr-2" color="primary" size="md">Medium</BKButton>
            <BKButton class="mr-2" color="primary" size="lg">Large</BKButton>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card">
          <div class="card-header">
            <h4>Block</h4>
          </div>
          <div class="card-body">
            <BKButton class="mb-2" color="primary">Normal Button</BKButton>
            <BKButton class="mb-2" color="primary" block>Block Button</BKButton>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card">
          <div class="card-header">
            <h4>State</h4>
          </div>
          <div class="card-body">
            <BKButton class="mr-1" color="primary" disabled>Disabled</BKButton>
            <BKButton class="mr-1" color="primary" progress>Progress</BKButton>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card">
          <div class="card-header">
            <h4>Inertia Link</h4>
          </div>
          <div class="card-body">
            <BKLinkButton :href="$route('admin.dashboard')" visit>Link to Dashboard</BKLinkButton>
          </div>
        </div>
      </div>
    </div>
  </PageSection>
</template>

<script setup lang="ts">
import PageDescription from "@/views/components/admin/layout/Page/PageDescription.vue";
import PageSection from "@/views/components/admin/layout/Page/PageSection.vue";
import PageTitle from "@/views/components/admin/layout/Page/PageTitle.vue";
import { Head } from "@inertiajs/vue3";
</script>
