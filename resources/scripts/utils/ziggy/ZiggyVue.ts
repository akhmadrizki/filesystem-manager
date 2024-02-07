/* eslint-disable @typescript-eslint/no-explicit-any */
import { App } from "vue";
import routeFn, { Config, RouteName, RouteParams, Router } from "ziggy-js";

export default {
  install: (app: App, options: Config) => {
    const r = <T extends RouteName>(
      name?: any | T,
      params?: RouteParams<T>,
      absolute?: boolean,
      config?: Config,
    ): string | Router => {
      return routeFn(name, params, absolute, config || options);
    };

    app.config.globalProperties.$route = r as typeof routeFn;

    app.provide("route", r);
  },
};
