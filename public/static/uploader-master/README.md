# [File Uploader](https://github.com/fengyuanchen/uploader)

> A simple jQuery file uploading plugin.

- [Demo](http://fengyuanchen.github.io/uploader)



# Features

- Supports to upload files without form
- Supports to upload files from a file input inner a form without submit the form
- Supports to upload multiple files
- Supports to upload multiple files one by one
- Supports to upload files with drag and drop
- Supports progress event (will be simulated in IE8/9)



## Main

```
dist/
├── uploader.js      (14 KB)
└── uploader.min.js  ( 6 KB)
```



## Getting started

### Quick start

Three quick start options are available:

- [Download the latest release](https://github.com/fengyuanchen/uploader/archive/master.zip).
- Clone the repository: `git clone https://github.com/fengyuanchen/uploader.git`.
- Install with [NPM](http://npmjs.org): `npm install @fengyuanchen/uploader`.



### Installation

Include files:

```html
<script src="/path/to/jquery.js"></script><!-- jQuery is required -->
<script src="/path/to/uploader.js"></script>
```


### Usage

Initialize with `$.fn.uploader` method.

```html
<input id="file" type="file" name="file" multiple>
```

```js
$('#file').uploader({
  done: function (e, data) {
    console.log(e.type); // 'done'
    console.log(e.namespace); // 'uploader'
    console.log(data); // Response data
  }
});
```


## Options


```js
// Set uploader options
$().uploader(options);

// Change the global default options
$.fn.uploader.setDefaults(options);
```

**Note:** [jQuery.ajax](http://api.jquery.com/jQuery.ajax/)'s options are available too.


### name

- Type: `String`
- Default: The file input's "name" property (or "file" if not set)

A name for submit the files.


### url

- Type: `String`
- Default: The current page

A string containing the URL to which the request is sent.


### data

- Type: `Object`
- Default: `null`

Add extra parameters to the request.


### autoUpload

- Type: `Boolean`
- Default: `true`

Upload the files automatically when the file input changes.


### singleUpload

- Type: `Boolean`
- Default: `true`

Upload the files one by one when there are multiple files.


### dropzone

- Type: `String` (jQuery selector)
- Default: `''`

Drop file to zone to upload.


### upload(event)

- Type: `Function`
- Default: `null`

A shortcut of the "upload.uploader" event.

```js
$().uploader({
  upload: function (e) {
    console.log(e.files); // File List
  }
})
```


### start(event)

- Type: `Function`
- Default: `null`

A shortcut of the "start.uploader" event.

```js
$().uploader({
  start: function (e) {
    console.log(e.type); // start
    console.log(e.namespace); // uploader
    console.log(e.index); // Index of upload queues
  }
})
```


### progress(event)

- Type: `Function`
- Default: `null`

A shortcut of the "progress.uploader" event.


```js
$().uploader({
  progress: function (e) {
    console.log(e.lengthComputable);
    console.log(e.loaded);
    console.log(e.total);
  }
})
```


### done(event, data, textStatus)

- Type: `Function`
- Default: `null`

A shortcut of the "done.uploader" event.


### fail(event, textStatus, errorThrown)

- Type: `Function`
- Default: `null`

A shortcut of the "fail.uploader" event.


### end(event, textStatus)

- Type: `Function`
- Default: `null`

A shortcut of the "end.uploader" event.


### uploaded(event)

- Type: `Function`
- Default: `null`

A shortcut of the "uploaded.uploader" event.



## Methods


```js
$().uploader('method')
```


### upload([files])

- **files** (optional):
  - Type: [`FileList`](https://developer.mozilla.org/en/docs/Web/API/FileList)
  - The files to upload, use the file input's "files" property by default.

Upload the files manually (You may need to set the `autoUpload` option to `false` first).


### destroy()

Destroy the uploader.




## Events


### upload.uploader

This event fires when start to upload all files.


### start.uploader

This event fires when start to upload files or the first file.


### progress.uploader

This event fires when the upload request progress changes.


### done.uploader

This event is fired when the upload request succeeds.


### fail.uploader

This event is fired when the upload request fails.


### end.uploader

This event is fired when the upload request finishes (after `done` and `fail` events are fired).


### uploaded.uploader

This event is fired when all files uploaded.



## No conflict

If you have to use other plugin with the same namespace, just call the `$.fn.uploader.noConflict` method to revert to it.

```html
<script src="other-plugin.js"></script>
<script src="uploader.js"></script>
<script>
  $.fn.uploader.noConflict();
  // Code that uses other plugin's "$().uploader" can follow here.
</script>
```



## Browser Support

- Chrome (latest 2)
- Firefox (latest 2)
- Internet Explorer 8+
- Opera (latest 2)
- Safari (latest 2)

As a jQuery plugin, you also need to see the [jQuery Browser Support](http://jquery.com/browser-support/).



## [License](LICENSE.md)

Released under the [MIT](http://opensource.org/licenses/mit-license.html) license.
