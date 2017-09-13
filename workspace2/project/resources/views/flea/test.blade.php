// 설정된 부스 불러오기
var idValue = 1;
@foreach($booths as $boothList)

    function boothObj1() {/*부스 클래스*/
    this.top = 0;
    this.left = 0;
    this.width = {{$boothList->width}}; //기본 크기
    this.height = {{$boothList->height}};
    this.booth;

    this.getTop = function () {
    return this.top;
    }
    this.getLeft = function () {
    return this.left;
    }
    this.setTop = function (argTop) {
    this.top = argTop;
    }
    this.setLeft = function (argLeft) {
    this.left = argLeft;
    }
    this.setWidth = function (argWidth) {
    this.width = argWidth;
    }
    this.setHeight = function (argHeight) {
    this.height = argHeight;
    }
    this.getWidth = function () {
    return this.width;
    }
    this.getHeight = function () {
    return this.height;
    }

    this.getBooth = function () {
    return this.booth;
    }
    this.setBooth = function (argBooth) {
    this.booth = argBooth;
    }
    }

    var boothLeft = {{$boothList->left}};
    var boothTop = {{$boothList->top}};
    var boardLeft = Number($('.draggable').offset().left);
    var boardTop = Number($('.draggable').offset().top);
    var boardWidth = Number($('.draggable').width());
    var boothWidth = {{$boothList->width}};
    var boardHeight = Number($('.draggable').height());
    var boothHeight = {{$boothList->height}};

    // 쓰레기통의 값들
    var garbageLeft = Number($('.booth_del').offset().left);
    var garbageTop = Number($('.booth_del').offset().top);
    var garbageWidth = Number($('.booth_del').width());
    var garbageHeight = Number($('.booth_del').height());
    //====================

    if(boothLeft <= boardLeft ||
    boothLeft >= boardLeft + boardWidth  - boothWidth ||
    boothTop  <= boardTop  ||
    boothTop  >= boardTop  + boardHeight - boothHeight){

    $(this).css({
    "top":"0px",
    "left":"0px"
    });
    return;
    }
    //====================

    /*작업장에 올라와있는 부스 요소의 id속성 get 및 부스간 충돌 판정*/
    if($('.boothContent').length) {
    for (var i = 0, length = boothObjArr.length; i < length; i++) {
    if ((boothLeft + boothWidth) > boothObjArr[i].getLeft() &&
    boothLeft < (boothObjArr[i].getLeft() + boothObjArr[i].getBooth().width()) &&
    (boothTop + boothHeight) > boothObjArr[i].getTop() &&
    boothTop < (boothObjArr[i].getTop() + boothObjArr[i].getBooth().height())) {
    $(this).css({
    "top": "0px",
    "left": "0px"
    });
    return;
    }
    }
    }

    var booth = "<div class='boothContent' id=content_" + idValue + "><p>BOOTH_" + idValue + "</p></div>";
    /*부스객체 추가, 부스도형 초기화 및 작업장에 부스 추가*/
    $(".draggable").append(booth);
    var boothObj = new boothObj1();

    boothObj.setBooth($('#content_' + idValue));
    boothObj.setTop(boothTop);
    boothObj.setLeft(boothLeft);

    boothObjArr.push(boothObj);

    $('#content_' + idValue).css({
    "position": "absolute",
    "top": boothTop - 10,
    "left": boothLeft - 10,
    "height": boothHeight,
    "width": boothWidth
    });
    idValue++;

    $('.boothContent').resizable({
    start: function () {
    //현재의 위치값과 배치도의 크기를 계산하여 배치도를 넘어가지 않게 함
    var thisLeft = Number($(this).offset().left);
    var thisTop = Number($(this).offset().top);
    $(this).resizable("option", "maxWidth", (boardWidth - thisLeft + boardLeft));
    $(this).resizable("option", "maxHeight", (boardHeight - thisTop + boardTop));
    },
    grid: [50, 50],
    minHeight: 98, //최소 부스 크기
    minWidth: 98,  //최소 부스 크기
    stop: function () {
    // 간단한 사이즈 표시
    var thisWidth = Number($(this).width());
    var thisHeight = Number($(this).height());
    var thisLeft = Number($(this).offset().left);
    var thisTop = Number($(this).offset().top);

    var id = $(this).attr('id');

    for (var i = 0, length = boothObjArr.length; i < length; i++) {
    if (id == boothObjArr[i].getBooth().attr('id')) {
    continue;
    }
    if ((thisLeft + thisWidth) > boothObjArr[i].getLeft() &&
    thisLeft < ( boothObjArr[i].getLeft() + boothObjArr[i].getBooth().width()) &&
    (thisTop + thisHeight) > boothObjArr[i].getTop() &&
    thisTop < (boothObjArr[i].getTop() + boothObjArr[i].getBooth().height())) {
    for (var i = 0, length = boothObjArr.length; i < length; i++) {

    if (id == boothObjArr[i].getBooth().attr('id')) {
    window.alert('부스가 겹칩니다');
    $(this).css({
    "width": boothObjArr[i].getWidth(),
    "height": boothObjArr[i].getHeight()
    });
    return;
    }
    }
    }
    }

    // 각 부스별 사이즈를 표시
    for (var i = 0, length = boothObjArr.length; i < length; i++) {
    if (id == boothObjArr[i].getBooth().attr('id')) {
    boothObjArr[i].setWidth(thisWidth);
    boothObjArr[i].setHeight(thisHeight);
    $(this).children('p').html('사이즈 : ' + (thisWidth + 2) + ' X ' + (thisHeight + 2)
    + "<br>" + boothObjArr[i].getWidth() + " " + boothObjArr[i].getHeight());
    }
    }

    }
    }).draggable({
    grid: [10, 10],
    snap: true,
    stop: function () {
    var thisLeft = Number($(this).offset().left);
    var thisTop = Number($(this).offset().top);
    var thisWidth = Number($(this).width());
    var thisHeight = Number($(this).height());

    var id = $(this).attr('id');

    /*부스간 충돌방지*/
    for (var i = 0, length = boothObjArr.length; i < length; i++) {
    if (id == boothObjArr[i].getBooth().attr('id')) {
    continue;
    }
    if ((thisLeft + thisWidth) > boothObjArr[i].getLeft() &&
    thisLeft < ( boothObjArr[i].getLeft() + boothObjArr[i].getBooth().width()) &&
    (thisTop + thisHeight) > boothObjArr[i].getTop() &&
    thisTop < (boothObjArr[i].getTop() + boothObjArr[i].getBooth().height())) {
    for (var i = 0, length = boothObjArr.length; i < length; i++) {

    if (id == boothObjArr[i].getBooth().attr('id')) {
    $(this).css({
    "top": boothObjArr[i].getTop() - 10,
    "left": boothObjArr[i].getLeft() - 10
    });
    return;
    }
    }
    }
    }
    }
    })
@endforeach
console.log(boothObjArr);


if(boothObjArr.length<1)
alert('초기화 할 부스가 없습니다!');