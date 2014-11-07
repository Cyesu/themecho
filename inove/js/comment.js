/*
Author: mg12
Modify: Hanabi
Update: 2014/11/03
Author URI: http://www.neoease.com/
*/
(function() {

function reply(authorId, commentId, commentBox) {
	var author = MGJS.$(authorId).innerHTML;
	var insertStr = '<a href="#' + commentId + '">@' + author.replace(/\t|\n|\r\n/g, "") + ' </a> ';

	appendReply(insertStr, commentBox);
}

function appendReply(insertStr, commentBox) {
	if(MGJS.$(commentBox) && MGJS.$(commentBox).type == 'textarea') {
		field = MGJS.$(commentBox);

	} else {
		alert("评论框不存在!");
		return false;
	}

	if (field.value.indexOf(insertStr) > -1) {
		alert("你已经添加回复了!");
		return false;
	}

	if (field.value.replace(/\s|\t|\n/g, "") == '') {
		field.value = insertStr;
	} else {
		field.value = field.value.replace(/[\n]*$/g, "") + '\n\n' + insertStr;
	}
	field.focus();
}

window['MGJS_CMT'] = {};
window['MGJS_CMT']['reply'] = reply;

})();