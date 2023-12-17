import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js',
            "resources/themes/bws/css/vendor.min.css" ,
            "resources/themes/bws/css/theme-core.css" ,
            "resources/themes/bws/css/module-essentials.min.css" ,
            "resources/themes/bws/css/module-material.min.css" ,
            "resources/themes/bws/css/module-layout.min.css" ,
            "resources/themes/bws/css/module-sidebar.min.css" ,
            "resources/themes/bws/css/module-sidebar-skins.min.css" ,
            "resources/themes/bws/css/module-navbar.min.css" ,
            "resources/themes/bws/css/module-messages.min.css" ,
            "resources/themes/bws/css/module-carousel-slick.min.css" ,
            "resources/themes/bws/css/module-charts.min.css" ,
            "resources/themes/bws/css/module-maps.min.css" ,
            "resources/themes/bws/css/module-colors-alerts.min.css" ,
            "resources/themes/bws/css/module-colors-background.min.css" ,
            "resources/themes/bws/css/module-colors-buttons.min.css" ,
            "resources/themes/bws/css/module-colors-text.min.css" ,
            "resources/themes/bws/css/font-style.css" ,
            "resources/themes/bws/css/custom-font.css" ,
        ],
            refresh: true,
        }),
    ],
});
