<template layout="admin">
  <Head title="Modal" />

  <PageSection header="Modal Page" :back-link="$route('admin.dashboard')">
    <PageTitle>Modal</PageTitle>
    <PageDescription>Modal component usage example.</PageDescription>

    <div class="row">
      <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4>Modal</h4>
          </div>
          <div class="card-body">
            <div class="form-group">
              <p class="mb-2">Default Modal</p>
              <button
                class="btn btn-primary"
                data-toggle="modal"
                data-target="#defaultModal"
              >
                Show Default Modal
              </button>
            </div>
            <div class="form-group">
              <p class="mb-2">Centered Modal</p>
              <button
                class="btn btn-primary"
                data-toggle="modal"
                data-target="#centeredModal"
              >
                Show Centered Modal
              </button>
            </div>
            <div class="form-group">
              <p class="mb-2">Without Animation Modal</p>
              <button
                class="btn btn-primary"
                data-toggle="modal"
                data-target="#withoutAnimationModal"
              >
                Show Without Animation Modal
              </button>
            </div>
            <div class="form-group">
              <p class="mb-2">Sized Modal</p>
              <button
                class="btn btn-primary"
                data-toggle="modal"
                data-target="#sizedModal"
              >
                Show Sized Modal
              </button>
            </div>
            <div class="form-group">
              <p class="mb-2">Custom Naming Modal</p>
              <button
                class="btn btn-primary"
                data-toggle="modal"
                data-target="#customNamingModal"
              >
                Show Custom Naming Modal
              </button>
            </div>
            <div class="form-group">
              <p class="mb-2">Custom Template Modal</p>
              <button
                class="btn btn-primary"
                data-toggle="modal"
                data-target="#customTemplateModal"
              >
                Show Custom Template Modal
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </PageSection>

  <Teleport to="body">
    <BKModal
      id="defaultModal"
      title="Default Modal"
      @submit="submit"
      @show="(event) => show(event)"
      @shown="shown"
      @hide="hide"
      @hidden="hidden"
    >
      <p>Modal body goes here.</p>
    </BKModal>

    <BKModal
      id="centeredModal"
      title="Centered Modal"
      :is-center="true"
      @submit="submit"
    >
      <p>Modal body goes here.</p>
    </BKModal>

    <BKModal
      id="withoutAnimationModal"
      title="Without Animation Modal"
      :with-fade="false"
      @submit="submit"
    >
      <p>Modal body goes here.</p>
    </BKModal>

    <BKModal id="sizedModal" title="Sized Modal" size="lg" @submit="submit">
      <p>Modal body goes here.</p>
    </BKModal>

    <BKModal
      id="customNamingModal"
      title="Custom Naming Modal"
      submit-text="Save"
      close-text="Exit"
      @submit="submit"
    >
      <p>Modal body goes here.</p>
    </BKModal>

    <BKModal id="customTemplateModal">
      <template #header>
        <b><i>Custom Template</i></b>
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close"
        >
          <span aria-hidden="true">×</span>
        </button>
      </template>

      <template #default>
        <p>Modal body goes here.</p>
      </template>

      <template #footer>
        <button type="button" class="btn btn-warning" @click="submit">
          Update
        </button>
        <button type="button" class="btn btn-danger">Delete</button>
      </template>
    </BKModal>
  </Teleport>
</template>

<script setup lang="ts">
import PageDescription from "@components/admin/layout/Page/PageDescription.vue";
import PageSection from "@components/admin/layout/Page/PageSection.vue";
import PageTitle from "@components/admin/layout/Page/PageTitle.vue";
import { Head } from "@inertiajs/vue3";

function submit() {
  console.log("submitted");
}

function show(event: JQuery.Event) {
  console.log("show");
  console.log(event);
}

function shown() {
  console.log("shown");
}

function hide() {
  console.log("hide");
}

function hidden() {
  console.log("hidden");
}
</script>
<style scoped></style>
