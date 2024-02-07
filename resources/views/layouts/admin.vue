<template>
  <div class="main-wrapper" :class="{ 'main-wrapper-1': wrapper }">
    <div class="navbar-bg"></div>
    <NavBar />
    <SideBar />

    <div class="main-content">
      <slot />
    </div>

    <MainFooter />
  </div>
</template>

<script setup lang="ts">
import NavBar from "@components/admin/layout/NavBar/NavBar.vue";
import SideBar from "@components/admin/layout/SideBar/SideBar.vue";
import MainFooter from "@components/admin/layout/MainFooter.vue";
import { provide, readonly, ref } from "vue";

let wrapper = ref(false);

function wrapPage(condition: boolean) {
  wrapper.value = condition;
}

provide("page-wrapper", { wrapper: readonly(wrapper), wrapPage });
</script>

<style scoped>
.main-content {
  min-height: 606px;
}
</style>
