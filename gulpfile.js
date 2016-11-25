
// Clean
const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

elixir(mix => {


    // DataTables

    mix.webpack('admin/datatables/apps/index.js', './public/js/admin/datatables/apps');
    mix.webpack('admin/datatables/apps/create.js', './public/js/admin/datatables/apps');
    mix.webpack('admin/datatables/apps/edit.js', './public/js/admin/datatables/apps');



    // Front Copy
    mix

        .copy(
            'node_modules/font-awesome/fonts',
            'public/front-theme/fonts/font-awesome'
        )
        .copy(
            'node_modules/bootstrap-sass/assets/fonts/bootstrap',
            'public/front-theme/fonts/bootstrap'
        )
        .copy(
            'node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js',
            'public/front-theme/js/vendor/bootstrap'
        )
        .copy(
            'resources/assets/css/front-theme/vendor/google/google-font-css.css',
            'public/front-theme/css/vendor/google/fonts.css'
        )
        .copy(
            'resources/assets/images/front-theme',
            'public/front-theme/images'
        )
        .copy(
            'resources/assets/js/front-theme/vendor/jquery',
            'public/front-theme/js/vendor/jquery'
        )


    // Front
    mix

    .sass([
        'front-theme/app.scss'
    ], 'resources/assets/css/front-theme/app.css')

    .styles([
        'front-theme/app.css'
    ], 'public/front-theme/css/front.css')

    .scripts([
        'front-theme/app.js'
    ], 'public/front-theme/js/front.js')



    // Admin Copy
    mix

        .copy(
            'node_modules/font-awesome/fonts',
            'public/admin-theme/fonts/font-awesome'
        )
        .copy(
            'node_modules/bootstrap-sass/assets/fonts/bootstrap',
            'public/admin-theme/fonts/bootstrap'
        )
        .copy(
            'node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js',
            'public/admin-theme/js/vendor/bootstrap'
        )
        .copy(
            'resources/assets/css/admin-theme/vendor/google/google-font-css.css',
            'public/admin-theme/css/vendor/google/fonts.css'
        )
        // .copy(
        //     'resources/assets/css/vendor/semantic-ui/2.2.2/semantic.min.css',
        //     'public/css/vendor/semantic/semantic.min.css'
        // )
        .copy(
            'resources/assets/images/admin-theme',
            'public/admin-theme/images'
        )
        .copy(
            'resources/assets/js/admin-theme/vendor/jquery',
            'public/admin-theme/js/vendor/jquery'
        )


    // Admin
    mix

    .sass([
        'admin-theme/app.scss',
        'admin-theme/vendor/toastr/toastr.scss',
        'admin-theme/vendor/sweetalert/sweetalert.scss'
    ], 'resources/assets/css/admin/app.css')

    .styles([
        'admin/app.css'
        // 'vendor/semantic-ui/2.2.2/semantic.min.css'
    ], 'public/admin-theme/css/admin.css')

    .scripts([
        'admin-theme/vendor/sweetalert/sweetalert.min.js',
        'admin-theme/vendor/toastr/toastr.min.js',
        'admin-theme/plugins/plugins.js',
        'admin-theme/admin-theme-app.js',
        'admin-theme/custom.js'
    ], 'public/admin-theme/js/admin-layout.js')


});
