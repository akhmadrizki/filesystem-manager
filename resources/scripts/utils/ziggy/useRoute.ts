import { usePage } from "@inertiajs/vue3";
import { computed, inject } from "vue";
import routeFn, { RouteName, RouteParams } from "ziggy-js";

export function useRoute() {
  const route = inject("route") as typeof routeFn;

  const routeIs = computed<{
    <T extends RouteName>(name: T): boolean;
    <T extends RouteName>(name: T, params: RouteParams<T>): boolean;
  }>(() => {
    usePage().url;

    return <T extends RouteName>(name: T, params?: RouteParams<T>) =>
      route().current(name, params);
  });

  return { route, routeIs };
}
