// eslint.config.js
import { defineConfig } from 'eslint-define-config';

export default defineConfig({
    overrides: [
        {
            files: ['*.js', '*.vue'],
            rules: {
                 'no-debugger': 'error',
                 'curly': 'error',
                 'vue/no-unused-components': 'warn',
                 'vue/require-default-prop': 'error',		
            },
        },
    ],
});
