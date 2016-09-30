var elixir = require('laravel-elixir');


elixir(function(mix) {
  mix.copy('node_modules/jquery/dist/jquery.min.js', 'resources/assets/js/libs/jquery.min.js');
  mix.copy('node_modules/bootstrap/dist/js/bootstrap.min.js', 'resources/assets/js/libs/bootstrap.min.js');

  mix.sass('app.scss')
  .scripts([
      'libs/jquery.min.js', 'libs/bootstrap.min.js' ,'libs/sweetalert-dev.js' , 'resources/assets/js/libs/dropzone.js'
    ] , './public/js/libs.js')
  .styles([
      'libs/sweetalert.css' , 'libs/dropzone.css'
  ], './public/css/libs.css');
});
