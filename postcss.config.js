/* eslint-disable @typescript-eslint/no-var-requires */

// comment this snippet to disable purgecss
const purgecss = require("@fullhuman/postcss-purgecss");

module.exports = {
  plugins: [
    purgecss({
      content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/views/**/*.vue",
        "./resources/scripts/**/*.js",
        "./resources/scripts/**/*.ts",
      ],
      defaultExtractor(content) {
        const contentWithoutStyleBlocks = content.replace(
          /<style[^]+?<\/style>/gi,
          "",
        );
        return (
          contentWithoutStyleBlocks.match(/[A-Za-z0-9-_/:]*[A-Za-z0-9-_/]+/g) ||
          []
        );
      },
      safelist: [
        /-(leave|enter|appear)(|-(to|from|active))$/,
        /^(?!(|.*?:)cursor-move).+-move$/,
        /^router-link(|-exact)-active$/,
        /data-v-.*/,

        // ignore bootstrap classes with this prefix from being purged
        // it will solve the problem of missing nested classes
        // add more prefixes if you found any missing classes
        // /(bg).*/,
        // /(btn).*/,
        // /(col).*/,
        // /(text).*/,
        // /(border).*/,
        // /(d-).*/,
        /(nav).*/,
        /(table).*/,
        /(alert).*/,
        /(card).*/,
        /(modal).*/,
      ],
    }),
  ],
};
