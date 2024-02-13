<template>
  <div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <Link :href="$route('admin.dashboard')"
          ><img src="@/images/logo-black.svg" alt="logo" class="w-75"
        /></Link>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <Link :href="$route('admin.dashboard')"
          ><img src="@/images/logo-black-square.svg" alt="logo" class="w-50"
        /></Link>
      </div>
      <ul class="sidebar-menu">
        <SideBarHeader>Menu</SideBarHeader>
        <SideBarLink
          icon="fas fa-fire"
          :href="$route('admin.dashboard')"
          :active="routeIs('admin.dashboard')"
        >
          Dashboard
        </SideBarLink>

        <SideBarLink
          icon="fas fa-folder-open"
          :href="$route('admin.dashboard.project.index')"
          :active="routeIs('admin.dashboard.project.index')"
        >
          Projects
        </SideBarLink>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
          <BKLinkButton
            class="btn-lg btn-block btn-icon-split"
            :href="$route('admin.dashboard.project.index')"
          >
            <i class="fas fa-rocket"></i> Documentation
          </BKLinkButton>
        </div>
      </ul>
    </aside>
  </div>
</template>

<script setup lang="ts">
import { nextTick, onMounted } from "vue";
import initStisla from "@/scripts/utils/stisla";
import SideBarLink from "./SideBarLink.vue";
import SideBarHeader from "./SideBarHeader.vue";
import { Link } from "@inertiajs/vue3";
import { useRoute } from "@/scripts/utils/ziggy/useRoute";

const { routeIs } = useRoute();

onMounted(() => {
  nextTick(() => {
    initStisla();
  });
});

if (import.meta.hot) {
  import.meta.hot.accept(() => {
    nextTick(() => {
      initStisla();
    });
  });
}
</script>

<style scoped></style>
