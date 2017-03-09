function change_lang(selector, url_path, red){
  var r = encodeURIComponent(location.href);
  //location.href = 'http://localhost/project/ekohort/index.php/ekohort/lang/' + selector.value + '?r=' + r;
  location.href = url_path + selector.value + ((undefined !== red) ? red : '?r=') + r;
}
function change_lang2(selector){
  var o, pre, addr = location.href;
  if((o = addr.search("&lang=")) > -1 || (o = addr.search("#lang=")) > -1){
    var mylang = addr.substr(o, 8); // 7 is the length of ="(&|#)lang=xx"
    var newlang = addr.substr(o, 6) + selector.value;
    location.href = addr.replace(mylang, newlang);
    return true;
  } else if ((o = addr.search("#")) > -1) {
    location.href += "&lang=" + selector.value;
    return true;
  } else {
    location.href += "#lang=" + selector.value;
    return true;
  }
}
function flip(str){
  var res = '', b = '';
  for(var i = 0; i < str.length; i++){
    b = str.charAt(i);
    if(b.toLowerCase() === b)
      res += b.toUpperCase();
    else
      res += b.toLowerCase();
  }
  return res;
}
