
function sendFile(file) {
  $.ajax({
    type: 'post',
    url: '/targeturl?name=' + file.fileName,
    data: file,
    success: function () {
      // do something
    },
    xhrFields: {
      // add listener to XMLHTTPRequest object directly for progress (jquery doesn't have this yet)
      onprogress: function (progress) {
        // calculate upload progress
        var percentage = Math.floor((progress.total / progress.totalSize) * 100);
        // log upload progress to console
        console.log('progress', percentage);
        if (percentage === 100) {
          console.log('DONE!');
        }
      }
    },
    processData: false,
    contentType: file.type
  });
}