Dynamic Photo
=======================

[![GitHub issues](https://img.shields.io/github/issues/maickom88/dynamic-photo?style=flat-square)](https://github.com/maickom88/dynamic-photo/issues)
[![GitHub forks](https://img.shields.io/github/forks/maickom88/dynamic-photo?style=flat-square)](https://github.com/maickom88/dynamic-photo/network)
[![GitHub stars](https://img.shields.io/github/stars/maickom88/dynamic-photo?color=yellow&style=flat-square)](https://github.com/maickom88/dynamic-photo/stargazers)
[![GitHub version](https://img.shields.io/static/v1?label=Version&message=v1.5.0&color=blueviolet&style=flat-square)](https://github.com/maickom88/dynamic-photo/releases/tag/v1.5.0)

Dynamic Photo is a package to assist in integration with CKEditor, a powerful WYSIWYG. With the package it is possible to send photos dynamically to the server and display them.

![](https://media.giphy.com/media/McCGXmHYlFDTux4QYq/giphy.gif)

## ✔️ Installing Dynamic Photo

#### ❗️ Attention ❗️
this package is exclusive for Framework [Laravel](https://laravel.com),
So you will also need [Composer](https://getcomposer.org/).


```bash
composer require michaelfrank/dynamicphoto
```
...Then publish the provider package.

```bash
php artisan vendor:publish --tag=config
```


## ✔️ Instalando CDN CKEditor
In your VIEW in the script file, paste!

```html
<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
```
👇🏼 Now paste the code below

```html
ClassicEditor.create( document.querySelector( '#editor' ), {
  language: 'pt',
  ckfinder: {
    uploadUrl: '{{$siteRoot}}/api/uploud-photo',
  }
} ).then( editor => {
  console.log( 'Editor was initialized', editor );
  myEditor = editor;
})
.catch( error => {
  console.error( error.stack );
});
```
#### ❗️ Attention ❗️
in uploadUrl, just modify your route url if you create a different route.

👇🏼 With that, just create a div with the id = "editor" that will be initialized!

```html
<textarea name="" id="editor"></textarea>
```
Now you just need to create an Api route to send the image data that will be automatically displayed!

=======================

## ✔️ Creating controller and API route.

You now need to create your API route. Paste this code in your "api" file.

```php
Route::post('/uploud-photo', 'APIs\UploudImages@uploud');
```
👇🏼 With the route created, run the command below to create the Controller.

```bash
php artisan make:controller APIs/UploudImages
```

Navigate to the created APIs / UploudImages.php file, Open the file.

Now just instantiate the class.

```php
use michaelFrank\dynamicphoto\config\CkeditorUploud;
```

## ✔️ How to use
Paste this function into your class.

```php
public function uploud(Request $req){
  $file =  new CkeditorUploud();
  $saved = $file->uploadAction($req, 'Album01');
  return $saved;
}
```

The uploadAction function expects two arguments.
the first is the request file, ie the image. The second will wait for the path, where 'Album01' will be the path where you will save your image

==========

End

