function fileUploadPreview(thisObj, preViewer) {
  if(!/(\.gif|\.jpg|\.jpeg|\.png)$/i.test(thisObj.value)) {
    alert("이미지 형식의 파일을 선택하십시오");
    return;
  }

preViewer = (typeof(preViewer) == "object") ? preViewer : document.getElementById(preViewer);
var ua = window.navigator.userAgent;

if (ua.indexOf("MSIE") > -1) {
  var img_path = "";
  if (thisObj.value.indexOf("\\fakepath\\") < 0) {
    img_path = thisObj.value;
  } else {
    thisObj.select();
    var selectionRange = document.selection.createRange();
    img_path = selectionRange.text.toString();
    thisObj.blur();
  }
  preViewer.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='fi" + "le://" + img_path + "', sizingMethod='scale')";
} else {
  preViewer.innerHTML = "";
  var W = preViewer.offsetWidth;
  var H = preViewer.offsetHeight;
  var tmpImage = document.createElement("img");
  preViewer.appendChild(tmpImage);

  tmpImage.onerror = function () {
      return preViewer.innerHTML = "";
  }

  tmpImage.onload = function () {
      if (this.width > W) {
          this.height = this.height / (this.width / W);
          this.width = W;
      }
      if (this.height > H) {
          this.width = this.width / (this.height / H);
          this.height = H;
      }
                }
                if (ua.indexOf("Firefox/3") > -1) {
                    var picData = thisObj.files.item(0).getAsDataURL();
                    tmpImage.src = picData;
                } else {
                    tmpImage.src = "file://" + thisObj.value;
                }
            }
        }
