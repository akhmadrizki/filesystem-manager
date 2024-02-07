module.exports = {
  env: {
    node: true,
    jquery: true,
    "vue/setup-compiler-macros": true,
  },
  extends: [
    "eslint:recommended",
    "plugin:vue/vue3-recommended",
    "prettier",
    "plugin:@typescript-eslint/eslint-recommended",
    "plugin:@typescript-eslint/recommended",
  ],
  rules: {
    // override/add rules settings here, such as:
    // 'vue/no-unused-vars': 'error'
  },
  parser: "vue-eslint-parser",
  parserOptions: {
    parser: {
      // Script parser for `<script>`
      js: "espree",

      // Script parser for `<script lang="ts">`
      ts: "@typescript-eslint/parser",

      // Script parser for vue directives (e.g. `v-if=` or `:attribute=`)
      // and vue interpolations (e.g. `{{variable}}`).
      // If not specified, the parser determined by `<script lang ="...">` is used.
      "<template>": "espree",
    },
    sourceType: "module",
  },
  globals: {
    JQuery: true,
  },
};
