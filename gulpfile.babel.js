"use strict";

import elixir from 'laravel-elixir';
let bower = './vendor/bower_components';

elixir.config.sourcemaps = false;

elixir((mix) => {
  mix.copy(`${bower}/metaphor/dist/css/metaphor.css`, 'public/css/metaphor.css');
  mix.copy(`${bower}/metaphor/dist/js/metaphor.js`, 'public/js/metaphor.js');
  mix.copy(`${bower}/jquery/dist/jquery.min.js`,'public/js/jquery.min.js');
  mix.copy(`${bower}/metaphor/dist/fonts`, 'public/fonts');
  mix.copy(`${bower}/Jcrop/js/Jcrop.js`, 'public/js/Jcrop.js');
  mix.copy(`${bower}/Jcrop/css/Jcrop.css`, 'public/css/Jcrop.css');
  mix.copy(`${bower}/Jcrop/css/Jcrop.gif`, 'public/css');
  mix.copy(`resources/js/loadProfileImages.js`, 'public/js/loadProfileImages.js');

  // mix.webpack([
  //   'expertise.js',
  // ], 'public/js/expertise.js', 'resources/js');

  // mix.webpack([
  //   'collab.js'
  // ], 'public/js/collab.js', 'resources/js');

  mix.scripts([
    'scripts.js',
    'collaborators.js'
  ], 'public/js/scripts.js', 'resources/js');

  mix.sass('app.scss');

});


