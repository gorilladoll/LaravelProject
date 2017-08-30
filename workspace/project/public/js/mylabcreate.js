$(function(){
  var drop = $(".drop").children();
  var disTextDrop = [$(".ten"),$(".fifteen"),$(".twenty"),$(".twenty_five")];
  var disFriendDrop = [$(".twenty_one"),$(".twenty_two"),$(".twenty_three"),$(".twenty_four"),$(".twenty_five")];
  var disTimelineDrop  = new Array();
  var nodeValue = new Array();
  var wiget_clock_left;
  var wiget_clock_top;
  var wiget_stiker_left;
  var wiget_stiker_top;
  var textbox_left;
  var textbox_top;
  var timeline_left;
  var timeline_top;
  var friends_left;
  var friends_top;
  var main_text;

  disTimelineDrop.push(drop[3],drop[4],drop[8],drop[9])

  drop.each(function(){
      nodeValue.push($(this).attr("value"));
  });

  for(var i = 10; i < 20; i++){
    disTimelineDrop.push(drop[i]);
  }

  $(".wiget").draggable({
      grid:[10,10],
      snap: true,
      revert: "invalid",
      cursor: "move"
  });

  $(".textbox").draggable({
      grid:[10,10],
      snap: true,
      revert: "invalid",
      cursor: "move"
  });

  $(".timeline").draggable({
      grid:[10,10],
      snap: true,
      revert: "invalid",
      cursor: "move"
  });

  $(".friends").draggable({
    grid:[10,10],
    snap: true,
    revert: "invalid",
    cursor: "move"
  });

  $("#submit").click(function(){
    var main_text = $(".main_text").val();
    $.ajax({
      url: "/mylab/createJson",
      type: "get",
      data: {
        main_text : main_text,
        clock_left : wiget_clock_left,
        clock_top : wiget_clock_top,
        text_left : wiget_text_left,
        text_top : wiget_text_top,
        stiker_left : wiget_stiker_left,
        stiker_top : wiget_stiker_top,
        textbox_left : textbox_left,
        textbox_top : textbox_top,
        timeline_left : timeline_left,
        timeline_top : timeline_top,
        friends_left : friends_left,
        friends_top : friends_top,
      },
      success: function(data){
        window.alert(data);
        location.replace('/mylab/show');
      },
      error: function(){
        window.alert("제목을 입력하지 않았거나 드랍 하지 않으셨습니다");
      }
    });
  });

  $("#returnAll").click(function(){
    $(".wiget").css({
      "margin" : "10px",
      "border" : "1px solid black",
      "width" : "50px",
      "height" : "50px",
      "position" : "relative",
      "top" : "0px",
      "left" : "0px"
    });

    $(".textbox").css({
      "margin" : "10px",
      "border" : "1px solid black",
      "width" : "100px",
      "height" : "50px",
      "position" : "relative",
      "top" : "0px",
      "left" : "0px"
    });

    $(".timeline").css({
      "margin" : "10px",
      "border" : "1px solid black",
      "width" : "130px",
      "height" : "130px",
      "position" : "relative",
      "top" : "0px",
      "left" : "0px"
    });

    $(".friends").css({
      "margin" : "10px",
      "border" : "1px solid black",
      "width" : "50px",
      "height" : "100px",
      "position" : "relative",
      "top" : "0px",
      "left" : "0px"
    });

    $(".wiget").draggable("enable");
    $(".textbox").draggable("enable");
    $(".timeline").draggable("enable");
    $(".friends").draggable("enable");
    for(var i = 0; i < drop.length; i++){
      drop.eq(i).droppable("enable");
      nodeValue[i] = "true";
    }
  });

  drop.droppable({
    drop:function(event,ui){
      var top = $(this).offset().top;
      var left = $(this).offset().left;

      ///////////////////////////////////////////////////////////////////////////
      //                      wiget                                            //
      ///////////////////////////////////////////////////////////////////////////
      if($(ui.draggable).is($(".wiget"))){
        for(var i = 0; i < drop.length; i++){
          if($(this).is(drop[i]) && nodeValue[i] == "true"){
            $(ui.draggable).css({
              "margin" : "0px",
              "border" : "3px solid red",
              "width" : "200px",
              "height" : "200px",
              "position" : "absolute",
              "top" : top,
              "left" : left,
            });
            $(ui.draggable).draggable("disable");
            drop.eq(i).droppable("disable");
            nodeValue[i] = "false";
            if($(ui.draggable).is($(".wiget-clock"))){
              wiget_clock_left = $(this).offset().left;
              wiget_clock_top = $(this).offset().top;
            } else if($(ui.draggable).is($(".wiget-text"))){
              wiget_text_left = $(this).offset().left;
              wiget_text_top = $(this).offset().top;
            } else if($(ui.draggable).is($(".wiget-stiker"))){
              wiget_stiker_left = $(this).offset().left;
              wiget_stiker_top = $(this).offset().top;
            }
            break;
          } else {
            $(ui.draggable).css({
              "position" : "relative",
              "top" : "0px",
              "left" : "0px"
            });
          }
        }
      }

      ///////////////////////////////////////////////////////////////////////////
      //                      text box                                         //
      ///////////////////////////////////////////////////////////////////////////
      if($(ui.draggable).is($(".textbox"))){
        for(var i = 0; i < drop.length; i++){
          var nextNode = i+1;
          if($(this).is(drop[i]) && !$(this).is(disTextDrop[0]) &&
            !$(this).is(disTextDrop[1]) && !$(this).is(disTextDrop[2]) &&
            !$(this).is(disTextDrop[3]) && nodeValue[i] == "true" && nodeValue[nextNode] == "true")
            {
             $(ui.draggable).css({
               "margin" : "0px",
               "border" : "3px solid red",
               "width" : "400px",
               "height" : "200px",
               "position" : "absolute",
               "top" : top,
               "left" : left,
             });
             $(ui.draggable).draggable("disable");
             drop.eq(i).droppable("disable");
             drop.eq(nextNode).droppable("disable");
             nodeValue[i] = "false";
             nodeValue[nextNode] = "false";
             textbox_left = $(this).offset().left;
             textbox_top = $(this).offset().top;
             break;
          } else {
            $(ui.draggable).css({
              "position" : "relative",
              "top" : "0px",
              "left" : "0px"
            });
          }
        }
      }
      ///////////////////////////////////////////////////////////////////////////
      //                      friends                                          //
      ///////////////////////////////////////////////////////////////////////////
      else if($(ui.draggable).is($(".friends"))){
        for(var i = 0; i < drop.length; i++){
          var nextNode = i + 5;
          if($(this).is(drop[i]) && !$(this).is(disFriendDrop[0]) &&
             !$(this).is(disFriendDrop[1]) && !$(this).is(disFriendDrop[2]) &&
             !$(this).is(disFriendDrop[3]) && !$(this).is(disFriendDrop[3]) &&
             nodeValue[i] == "true" && nodeValue[nextNode] == "true")
            {
               $(ui.draggable).css({
                 "margin" : "0px",
                 "border" : "3px solid red",
                 "width" : "200px",
                 "height" : "400px",
                 "position" : "absolute",
                 "top" : top,
                 "left" : left,
               });
               $(ui.draggable).draggable("disable");
               drop.eq(i).droppable("disable");
               drop.eq(nextNode).droppable("disable");
               nodeValue[i] = "false";
               nodeValue[nextNode] = "false";
               friends_left = $(this).offset().left;
               friends_top = $(this).offset().top;
               break;
          } else {
            $(ui.draggable).css({
              "position" : "relative",
              "top" : "0px",
              "left" : "0px"
            });
          }
        }
      }
      ///////////////////////////////////////////////////////////////////////////
      //                      timeline                                         //
      ///////////////////////////////////////////////////////////////////////////
      else if($(ui.draggable).is($(".timeline"))){
        for(var i = 0; i < drop.length; i++){
          var nextNode = i+1;
          var nextNode_2 = i+2;
          var nextParentNode_1 = i+5;
          var nextParentNode_2 = i+6;
          var nextParentNode_3 = i+7;
          var thirdParentNode_1 = i+10;
          var thirdParentNode_2 = i+11;
          var thirdParentNode_3 = i+12;
           if($(this).is(drop[i]) && !$(this).is(disTimelineDrop[0]) &&
             !$(this).is(disTimelineDrop[1]) && !$(this).is(disTimelineDrop[2])
             && !$(this).is(disTimelineDrop[3]) && !$(this).is(disTimelineDrop[4])
             && !$(this).is(disTimelineDrop[5]) && !$(this).is(disTimelineDrop[6])
             && !$(this).is(disTimelineDrop[7]) && !$(this).is(disTimelineDrop[8])
             && !$(this).is(disTimelineDrop[9]) && !$(this).is(disTimelineDrop[10])
             && !$(this).is(disTimelineDrop[11]) && !$(this).is(disTimelineDrop[12])
             && !$(this).is(disTimelineDrop[13]) && nodeValue[i] == "true"
             && nodeValue[nextNode] == "true" && nodeValue[nextNode_2] == "true"
             && nodeValue[nextParentNode_1] == "true" && nodeValue[nextParentNode_2] == "true"
             && nodeValue[nextParentNode_3] == "true" && nodeValue[thirdParentNode_1] == "true"
             && nodeValue[thirdParentNode_2] == "true" && nodeValue[thirdParentNode_3] == "true")
          {
            $(ui.draggable).css({
              "margin" : "0px",
              "border" : "3px solid red",
              "width" : "600px",
              "height" : "600px",
              "position" : "absolute",
              "top" : top,
              "left" : left,
            });
            $(ui.draggable).draggable("disable");
            drop.eq(i).droppable("disable");
            drop.eq(nextNode[0]).droppable("disable");
            drop.eq(nextNode[1]).droppable("disable");
            drop.eq(nextNode[2]).droppable("disable");
            drop.eq(nextNode[3]).droppable("disable");
            drop.eq(nextNode[4]).droppable("disable");
            drop.eq(nextNode[5]).droppable("disable");
            drop.eq(nextNode[6]).droppable("disable");
            drop.eq(nextNode[7]).droppable("disable");
            drop.eq(nextNode[8]).droppable("disable");
            nodeValue[i] = "false";
            nodeValue[nextNode] = "false";
            nodeValue[nextNode_2] = "false";
            nodeValue[nextParentNode_1] = "false";
            nodeValue[nextParentNode_2] = "false";
            nodeValue[nextParentNode_3] = "false";
            nodeValue[thirdParentNode_1] = "false";
            nodeValue[thirdParentNode_2] = "false";
            nodeValue[thirdParentNode_3] = "false";
            timeline_left = $(this).offset().left;
            timeline_top = $(this).offset().top;
            break;
          } else {
            $(ui.draggable).css({
              "position" : "relative",
              "top" : "0px",
              "left" : "0px"
            });
          }
        }
      }
    }
    //drop의 블레이스
  });
});
