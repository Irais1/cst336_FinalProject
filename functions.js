/* global $ */
$(document).ready(function(){
    $("#add").click(function(){
        $("#status").html("");
        $("#changes").html("<input type = 'text' id='newAlbumPic' placeholder ='Picture Link'/><input type = 'text' id='newSongLink' placeholder = 'YouTube Link'/><input type = 'text' id='newSongName' placeholder='Name of the Song'/><input type = 'text' id='newArtistName' placeholder='Name of Artist'/><input type = 'text' id='newYear' placeholder='Release Year'/><input type = 'text' id='newGenre' placeholder='Genre'/>"
        +"<input type = 'button' id='submission' value ='Submit'/>");
       $("#submission").click(function(){
        console.log("Hello");
        var albumPic =$('#newAlbumPic').val();
        var songLink = $('#newSongLink').val();
        var songName = $('#newSongName').val();
        var Artist = $('#newArtistName').val();
        console.log(songName);
        var genre = $('#newGenre').val();
        var year = $('#newYear').val();
        
        $.ajax({
            type : 'post',
            url : "add.php",
            dataType : 'json',
            data : {"albumPic":albumPic,"songLink":songLink,"songName":songName,"Artist":Artist,"genre":genre,"year":year},
            success : function(data){
                console.log("Hello");
            },
            complete: function(data,status){
                $("#status").html(status);
            }
            
        });
    });
        console.log("here");
    });
    console.log("out");
    
    
    $("#update").click(function(){
        $("#status").html("");
       $("#changes").html("<input type = 'text' id = 'pass' placeholder = 'New Password'/><input type = 'button' id = 'passButton' value = 'Submit'/>"); 
     $("#passButton").click(function(){
        console.log("Hello");
        var pass =$('#pass').val();
        
        $.ajax({
            type : 'post',
            url : "update.php",
            dataType : 'json',
            data : {"pass":pass},
            success : function(data){
                console.log("Hello");
            },
            complete: function(data,status){
                $("#status").html(status);
            }
        });
            
        });
     });
     $("#delete").click(function(){
         $("#status").html("");
         $("#changes").html("<input type = 'text' id = 'id' placeholder = 'Pick ID to Delete'/><input type = 'button' id = 'deleteButton' value = 'Submit'/><br>")
         $.ajax({
                  url: 'dataList.php',
                  type: 'POST',
                  dataType: 'json',
                  data: {}, 
                  success : function(data) 
                  {
                    //   $("#changes").append(data);
                      for(var info in data){
                          $("#changes").append("(ID: <strong>"+data[info].id+ "</strong>) &nbsp Song Name: <i>"+data[info].SongName+"</i><br>&nbsp &nbsp &nbsp &nbsp Artist: <i>"+ data[info].Artist+"</i><br>");
                      }
                      
                  },
                    complete: function(data,status){
                        // $("#status").html(status);
                 }
                  
              });
         $("#deleteButton").click(function(){
             $("#status").html("");
             var id = $("#id").val();
             
             $.ajax({
                 type : 'post',
                 url : "delete.php",
                 dataType : 'json',
                 data  : {'id': id},
                 success : function(data){
                     $.ajax({
                        type : 'post',
                        url : "likes.php",
                        dataType : 'json',
                        data  : {'id': id},
                        success : function(data){
                            alert("Likes: "+data.Likes + " Dislikes: " + data.Dislikes);
                        },
                        complete: function(data,status){
                            //$("#status").html(status);
                        }
                    });
                 },
                 complete: function(data,status){
                     $("#status").html(status);
                 }
             });
         });
     });
});
    