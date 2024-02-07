<template>
  <li class="dropdown">
    <a
      href="#"
      data-toggle="dropdown"
      class="nav-link dropdown-toggle nav-link-lg nav-link-user"
    >
      <img alt="image" :src="avatar" class="rounded-circle mr-3" />
      <div class="d-sm-none d-lg-inline-block">
        Hi, {{ user?.name || "User" }}
      </div>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
      <div class="dropdown-title">Logged in 5 min ago</div>
      <a href="features-profile.html" class="dropdown-item has-icon">
        <i class="far fa-user"></i> Profile
      </a>
      <div class="dropdown-divider"></div>
      <a
        href="#"
        class="dropdown-item has-icon text-danger"
        @click.prevent="logout"
      >
        <i class="fas fa-sign-out-alt"></i> Logout
      </a>
    </div>
  </li>
</template>

<script setup lang="ts">
import { useRoute } from "@/scripts/utils/ziggy/useRoute";
import { useForm, usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const { route } = useRoute();

const logout = () => {
  useForm({}).delete(route("admin.logout"));
};

const user = computed(() => usePage().props.auth?.user);
const avatar = computed(() => {
  const params = new URLSearchParams({
    name: user.value?.name || "User",
    background: "70b5ff",
  });

  return "https://ui-avatars.com/api/?" + params.toString();
});
</script>

<style scoped></style>
