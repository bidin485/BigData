import { defineConfig } from 'eslint-define-config';

export default defineConfig([
    {
        ignores: ['public/vendor/jquery/*'], // Ignore jQuery files
        rules: {
            'no-debugger': 'error', // Disallow debugger statements
            // Add any other global rules here
        },
    },
    {
        files: ['*.js', '*.vue'],
        rules: {
            // Add any other project-specific rules here
        },
    },
    {
        files: ['public/vendor/jquery/*.js'],
        rules: {
            'no-unused-expressions': 'off', // Disable for jQuery files specifically
        },
    },
]);
