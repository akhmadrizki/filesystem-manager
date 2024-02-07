<template>
  <Head :title="title" />
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="page-error">
          <div class="page-inner">
            <h1>{{ status }}</h1>
            <div class="page-description">{{ description }}</div>
            <div class="page-search">
              <div class="mt-3">
                <button
                  type="button"
                  class="btn btn-primary btn-lg text-uppercase"
                  @click="goBack"
                >
                  Go Back
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="simple-footer mt-5">
          Copyright &copy; Timedoor Indonesia 2022
        </div>
      </div>
    </section>
  </div>
</template>

<script setup lang="ts">
import { Head } from "@inertiajs/vue3";
import { computed } from "vue";

const props = defineProps<{
  status: number;
}>();

let title = computed<string>(
  () =>
    ({
      503: "503: Service Unavailable",
      500: "500: Server Error",
      404: "404: Page Not Found",
      403: "403: Forbidden",
    }[props.status] || "500: Server Error")
);

let description = computed<string>(
  () =>
    ({
      503: "Sorry, we are doing some maintenance. Please check back soon.",
      500: "Whoops, something went wrong on our servers.",
      404: "Sorry, the page you are looking for could not be found.",
      403: "Sorry, you are forbidden from accessing this page.",
    }[props.status] || "Whoops, something went wrong on our servers.")
);

const goBack = () => {
  window.history.back();
};
</script>

<style scoped></style>
