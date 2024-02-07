<template layout="admin">
  <Head title="Alert" />

  <PageSection header="Alert Page">
    <PageTitle>Alert</PageTitle>
    <PageDescription>Alert usage example.</PageDescription>

    <div class="row">
      <div class="col-6">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Default</h4>
              </div>
              <div class="card-body">
                <BKAlert color="primary">This is primary alert</BKAlert>
                <BKAlert color="secondary">This is secondary alert</BKAlert>
                <BKAlert color="success">This is success alert</BKAlert>
                <BKAlert color="danger">This is danger alert</BKAlert>
                <BKAlert color="warning">This is warning alert</BKAlert>
                <BKAlert color="info">This is info alert</BKAlert>
                <BKAlert color="light">This is light alert</BKAlert>
                <BKAlert color="dark">This is dark alert</BKAlert>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Icon</h4>
              </div>
              <div class="card-body">
                <BKAlert title="Primary" color="primary" icon="far fa-lightbulb">This is primary alert</BKAlert>
                <BKAlert title="Secondary" color="secondary" icon="far fa-lightbulb">This is secondary alert</BKAlert>
                <BKAlert title="Success" color="success" icon="far fa-lightbulb">This is success alert</BKAlert>
                <BKAlert title="Danger" color="danger" icon="far fa-lightbulb">This is danger alert</BKAlert>
                <BKAlert title="Warning" color="warning" icon="far fa-lightbulb">This is warning alert</BKAlert>
                <BKAlert title="Info" color="info" icon="far fa-lightbulb">This is info alert</BKAlert>
                <BKAlert title="Light" color="light" icon="far fa-lightbulb">This is light alert</BKAlert>
                <BKAlert title="Dark" color="dark" icon="far fa-lightbulb">This is dark alert</BKAlert>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Title</h4>
              </div>
              <div class="card-body">
                <BKAlert title="Primary" color="primary">This is primary alert</BKAlert>
                <BKAlert title="Secondary" color="secondary">This is secondary alert</BKAlert>
                <BKAlert title="Success" color="success">This is success alert</BKAlert>
                <BKAlert title="Danger" color="danger">This is danger alert</BKAlert>
                <BKAlert title="Warning" color="warning">This is warning alert</BKAlert>
                <BKAlert title="Info" color="info">This is info alert</BKAlert>
                <BKAlert title="Light" color="light">This is light alert</BKAlert>
                <BKAlert title="Dark" color="dark">This is dark alert</BKAlert>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Dismissible</h4>
              </div>
              <div class="card-body">
                <BKAlert color="primary" dismissible fade>This is primary alert</BKAlert>
                <BKAlert color="secondary" dismissible fade>This is secondary alert</BKAlert>
                <BKAlert color="success" dismissible fade>This is success alert</BKAlert>
                <BKAlert color="danger" dismissible fade>This is danger alert</BKAlert>
                <BKAlert color="warning" dismissible fade>This is warning alert</BKAlert>
                <BKAlert color="info" dismissible fade>This is info alert</BKAlert>
                <BKAlert color="light" dismissible fade>This is light alert</BKAlert>
                <BKAlert color="dark" dismissible fade>This is dark alert</BKAlert>
              </div>
            </div>
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
