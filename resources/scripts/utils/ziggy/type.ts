declare module "ziggy-js";

import routeFn, { Config } from "ziggy-js";

declare module "@vue/runtime-core" {
  interface ComponentCustomProperties {
    $route: typeof routeFn;
  }
}

declare global {
  interface Window {
    Ziggy?: Config;
  }
}
