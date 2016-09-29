var elixir = require('laravel-elixir');


elixir(function(mix) {
  mix.sass('app.scss')
  .scripts([
      'libs/sweetalert-dev.js' , 'libs/dropzone.js'
    ] , './public/js/libs.js')
  .styles([
      'libs/sweetalert.css' , 'libs/dropzone.css'
  ], './public/css/libs.css');
});
