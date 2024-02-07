<template>
  <nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li>
          <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"
            ><i class="fas fa-bars"></i
          ></a>
        </li>
      </ul>
    </form>
    <ul class="navbar-nav navbar-right">
      <UserMenu />
    </ul>
  </nav>
</template>

<script setup lang="ts">
import UserMenu from "./UserMenu.vue";
</script>

<style scoped></style>
