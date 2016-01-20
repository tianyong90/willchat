# Summernote

Super simple WYSIWYG Editor using Bootstrap (3.0 and 2.x).

[![Build Status](https://secure.travis-ci.org/summernote/summernote.png)](http://travis-ci.org/summernote/summernote)
[![npm version](https://badge.fury.io/js/summernote.svg)](http://badge.fury.io/js/summernote)
[![Dependency Status](https://gemnasium.com/summernote/summernote.svg)](https://gemnasium.com/summernote/summernote)

[![Sauce Test Status](https://saucelabs.com/browser-matrix/summernoteis.svg)](https://saucelabs.com/u/summernoteis)

### Summernote
Summernote is a JavaScript library that helps you create WYSIWYG editors online.

Home Page: http://summernote.org

### Why Summernote?

Summernote has a few special features:

* Paste images from clipboard
* Saves images directly in the content of the field using base64 encoding, so you don't need to implement image handling at all
* Simple UI
* Interactive WYSIWYG editing
* Handy integration with server

#### Inspired by
* Gmail's WYSIWYG editor (http://www.gmail.com)
* Redactor (http://imperavi.com/redactor/)

### Installation and dependencies

Summernote uses opensource libraries: [jQuery](http://jquery.com/), [Bootstrap](http://getbootstrap.com), [Font Awesome](https://github.com/FortAwesome/Font-Awesome).

For [Meteor](http://github.com/meteor/meteor), just run `meteor add summernote:summernote`. More info in the [Meteor README](meteor/README.md).

For other/no frameworks:

#### 1. include JS/CSS

Include the following code in the `<head>` tag of your HTML:

```html
<!-- include libraries(jQuery, bootstrap, fontawesome) -->
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script> 
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />

<!-- include summernote css/js-->
<link href="summernote.css" rel="stylesheet">
<script src="summernote.min.js"></script>
```

#### 2. target elements

Then place a `div` tag somewhere in the `body` tag. This element will be replaced with the summernote editor.

```html
<div id="summernote">Hello Summernote</div>
```

#### 3. summernote

Finally, run this script after the DOM is ready:

```javascript
$(document).ready(function() {
  $('#summernote').summernote();
});
```

### API

`code` - get the HTML source code underlying the text in the editor:

```javascript
var sHTML = $('#summernote').code();
```

`Destroy` summernote:

```javascript
$('#summernote').destroy();
```

#### Warning - code injection

The code view allows the user to enter script contents. Make sure to filter/[sanitize the HTML on the server](https://github.com/search?l=JavaScript&q=sanitize+html). Otherwise, an attacker can inject arbitrary JavaScript code into clients.

### Supported platforms

Any modern browser: Safari, Chrome, Firefox, Opera, Internet Explorer 9+.

### Upcoming Features
* Responsive toolbar
* Table: Handles (sizing, selection) and popover
* IE8 Support
* Clipboard (you can paste images already)
* Media object selection


### Developer information

#### structure of summernote.js

```
summernote.js - Renderer.js (Generate markup) - Locale.js (Locale object)
              ㄴEventHandler.js - Toolbar.js (Toolbar module)
                                ㄴPopover.js (Popover module)
                                ㄴHandle.js  (Handle module)
                                ㄴDialog.js  (Dialog module)
                                ㄴEditor.js  (Abstract editor module) - Style.js (Style Getter and Setter)
                                                                      ㄴHistory.js (Store on jQuery.data)
-----------------------------Core Script-----------------------------
  agent.js  (agent information)
  async.js  (aysnc utility)
  key.js    (keycode object)
  dom.js    (dom functions)
  list.js   (list functions)
  range.js  (W3CRange extention)
---------------------------------------------------------------------
```

#### document structure

```
 - body container: <div class="note-editable">, <td>, <blockquote>, <ul>
 - block node: <div>, <p>, <li>, <h1>, <table>
 - void block node: <hr>
 - inline node: <span>, <b>, <font>, <a>, ...
 - void inline node: <img>
 - text node: #text
```

1. A body container has block node, but `<ul>` has only `<li>` nodes.
2. A body container also has inline nodes sometimes. This inline nodes will be wraped with `<p>` when enter key pressed.
4. A block node only has inline nodes.
5. A inline nodes has another inline nodes
6. `#text` and void inline node doesn't have children.

#### build summernote
```bash
# grunt-cli is need by grunt; you might have this installed already
npm install -g grunt-cli
npm install

# build full version of summernote: dist/summernote.js
grunt build

# generate minified copy: dist/summernote.min.js, dist/summernote.css
grunt dist
```
At this point, you should now have a `build/` directory populated with everything you need to use summernote.

#### test summernote
run tests with PhantomJS
```bash
grunt test
```

#### start local server for developing summernote.
run local server with connect and watch.
```bash
grunt server
# Open a browser on http://localhost:3000.
# If you change source code, automatically reload your page.
```

#### Coding convention
* JSHint: http://www.jshint.com/about/
* JSHint rule: https://github.com/summernote/summernote/blob/master/.jshintrc

#### Contribution guide
* Please read [CONTRIBUTING.md](https://github.com/summernote/summernote/blob/develop/CONTRIBUTING.md) before sending pull requests.

### Contacts
* Email: susukang98@gmail.com
* Twitter: http://twitter.com/hackerwins
* Chat with us:
[![Join the chat at https://gitter.im/summernote/summernote](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/summernote/summernote?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

### License
summernote may be freely distributed under the MIT license.
