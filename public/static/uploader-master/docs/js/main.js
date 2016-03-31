$(function () {

  'use strict';

  var $logs = $('.logs'),
      p = function (text) {
        return ('<p>' + text + '</p>');
      };

  $('#file').uploader({
    url: 'json/request.json',
    dataType: 'json',

    // Note: The GET is for test as POST request is not allowed on Github Pages.
    method: /github/.test(window.location.host) ? 'GET' : 'POST',
    dropzone: '.dropzone',

    upload: function () {
      $logs.empty().append(p('All files uploading'));
    },

    start: function (e) {
      $logs.append(p('* File ' + (e.index + 1) + ' uploading'));
    },

    progress: function (e) {
      $logs.append(p('* File ' + (e.index + 1) + ' uploaded: ' + Math.round(e.loaded / e.total * 100) + '%'));
    },

    done: function (e, data) {
      $logs.append(p('* File ' + (e.index + 1) + ' result: ' + data.result));
    },

    fail: function (e, textStatus) {
      $logs.append(p('* File ' + (e.index + 1) + ' result: ' + textStatus));
    },

    end: function (e) {
      $logs.append(p('* File ' + (e.index + 1) + ' completed'));
    },

    uploaded: function () {
      $logs.append(p('All files uploaded'));
    }
  });
});
