$(document).ready(function (){
  $(".block_img img").bind("click",function(event){
    var src=$(event.target).attr("src");
    var img=$(".block_img img");
    for(var i=0;i<img.length;i++){
      img.eq(i).css("border","1px solid black");
    }
    $(event.target).css("border","1px solid red");
    $(".slid img").attr("src",src);

  });   
});