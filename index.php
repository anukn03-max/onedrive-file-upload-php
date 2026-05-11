<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<title>Page Title</title>
</head>
<body>

<script type="text/javascript" src="https://js.live.net/v7.2/OneDrive.js"></script>
<script type="text/javascript">
  function launchOneDrivePicker(){
    var odOptions = {
    clientId: "XXXX",//my app

    action: "query",
    multiSelect: true,
    viewType : "all",
    openInNewWindow: true,
    advanced: {
        redirectUri:"http://localhost/onedrivephp/redirect.php",
        endpointHint: "api.onedrive.com",
  },

    success: function(files) {
        console.log(JSON.stringify(files));
        var files_array = files.value;
        if(files_array) {
            for(var i in files_array) {
                console.log(files_array[i].id);
                
            }
        }
    },
    cancel: function() { /* cancel handler */ },
    error: function(error) {
        console.log(data);
        console.debug(data);
        console.log("error");
     }
    }
    OneDrive.open(odOptions);
  }

  function processOneDriveFile(file) {
    var file_name = file.name;
    var file_size = file.size;
    var download_url = file['@microsoft.graph.downloadUrl'];
    var data = {
        file_name : file_name,
        file_size : file_size,
        download_url : download_url,
        command : 'handle-onedrive-file',
    };console.log(data);

    $.ajax({
        url: 'file_handler.php',
        type: 'post',
        data: data,
        error: function (data) {
            console.log(data);
            console.debug(data);
            console.log("error");
        },
        success: function (data) {
            console.log(data);
            console.log("success");
        }
    });
}
</script>
<button onClick="launchOneDrivePicker()">Open from OneDrive</button>
</body>
</html>

</body>
</html>