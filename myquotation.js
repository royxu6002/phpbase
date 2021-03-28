function SetCookie(name, value){
	var expdate = new Date();
	expdate.setTime(expdate.getTime() + 30*60*1000);
	document.cookie = name + "="+value+";expires="+expdate.toGMTString()+";path=/";
	alert("添加商品"+name+"成功!");
	var quotation=window.open("show_quotation.php", "quotation","toolbar=no,menubar=no, location=no, status=no, width=420, height=280");

}

function Deletecookie (name){
	var exp =new Date();
	exp.setTime(exp.getTime()-1);
	var cval= GetCookie(name);
	document.cookie=name+"="+cval+";expires="+exp.toGMTString();
}

function Clearcookie (){
	var temp =document.cookie.split(";");
	var loop3;
	var ts;
	for (loop3=0;loop3<temp.length;loop3++){
		ts=temp[loop3].split("=")[0];
		if(ts.indexOf('myquotation') != -1)
			DeleteCookie(ts);
	}
}

function getCookieVal (offset) {
	var endstr =document.cookie.indexOf(";", offset);
	if(endstr==-1)
		endstr=document.cookie.length;
		return unescape(document.cookie.substring(offset, endstr));
}

function GetCookie (name) {
	var arg=name+"=";
	var alen = arg.length;
	var clen =document.cookie.length;
	var i=0;
	while (i<clen){
		var j=i+alen;
		if(document.cookie.substring(i,j)==arg)
			return getCookieVal (j);
			i=document.cookie.indexOf(" ",i) +1;
			if(i==0) break;
	}
	return null;
}

