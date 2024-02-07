<template>
  <Head title="Login"/>

  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div
          class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white"
        >
          <div class="p-4 m-3">
            <img
              src="@/images/logo-black.svg"
              alt="logo"
              width="150"
              class="mb-5 mt-2"
            />
            <h4 class="text-dark font-weight-normal">
              Welcome to <span class="font-weight-bold">Timedoor</span>
            </h4>
            <p class="text-muted">
              Before you get started, you must login or register if you don't
              already have an account.
            </p>
            <form method="POST" action="#" @submit.prevent="submit">
              <div class="form-group">
                <label for="email">Email</label>
                <input
                  id="email"
                  v-model="loginForm.email"
                  type="email"
                  class="form-control"
                  :class="{ 'is-invalid': loginForm.errors.email }"
                  name="email"
                  tabindex="1"
                  required
                  autofocus
                />
                <div v-if="loginForm.errors.email" class="invalid-feedback">
                  {{ loginForm.errors.email }}
                </div>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input
                  id="password"
                  v-model="loginForm.password"
                  type="password"
                  class="form-control"
                  name="password"
                  tabindex="2"
                  required
                />
                <div class="invalid-feedback">please fill in your password</div>
              </div>

              <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input
                    id="remember-me"
                    v-model="loginForm.remember"
                    type="checkbox"
                    name="remember"
                    class="custom-control-input"
                    tabindex="3"
                  />
                  <label class="custom-control-label" for="remember-me">
                    Remember Me
                  </label>
                </div>
              </div>

              <div class="form-group text-right">
                <a href="auth-forgot-password.html" class="float-left mt-3">
                  Forgot Password?
                </a>
                <button
                  type="submit"
                  class="btn btn-primary btn-lg btn-icon icon-right"
                  tabindex="4"
                >
                  Login
                </button>
              </div>

              <div class="mt-5 text-center">
                Don't have an account?
                <a href="auth-register.html">Create new one</a>
              </div>
            </form>

            <div class="text-center mt-5 text-small">
              Copyright &copy; Timedoor Indonesia.
              <div class="mt-2">
                <a href="#">Privacy Policy</a>
                <div class="bullet"></div>
                <a href="#">Terms of Service</a>
              </div>
            </div>
          </div>
        </div>
        <div
          id="login-background"
          class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom"
        ></div>
      </div>
    </section>
  </div>
</template>

<script setup lang="ts">
import { useRoute } from '@/scripts/utils/ziggy/useRoute';
import { Head, useForm } from '@inertiajs/vue3';

const { route } = useRoute();
const loginForm = useForm({
  email: '',
  password: '',
  remember: false,
});
const submit = () => {
  loginForm.post(route('admin.login'), {
    onFinish: () => loginForm.reset('password'),
  });
};
</script>

<style scoped>
#login-background {
  background-image: url("https://source.unsplash.com/random/1000x1000/?indonesia,mountain,forest");
}
</style>
