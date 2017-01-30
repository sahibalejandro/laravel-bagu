let mix = require('laravel-mix').mix;

mix.js('resources/assets/js/app.js', 'public/js/bundle.js')
   .sass('resources/assets/sass/app.scss', 'public/css/bundle.css');
