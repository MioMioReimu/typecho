$(document).ready(function() {
	function html_decode(str)
	{
		var s = "";
		if (str.length == 0) return "";
		s = str.replace(/&amp;/g, "&");
		s = s.replace(/&lt;/g, "<");
		s = s.replace(/&gt;/g, ">");
		s = s.replace(/&nbsp;/g, " ");
		s = s.replace(/&#39;/g, "\'");
		s = s.replace(/&quot;/g, "\"");
		s = s.replace(/<br>/g, "\n");
		s = s.replace(/<br\/>/g, "\n");
		return s;
	}
	var articles = $("article");
	for(var i = 0; i < articles.length; i++) {
		var articleDOM = articles[i]
		articleDOM.innerHTML = articleDOM.innerHTML.replace(/(?:\$\$|\$\[)([\s\S]*?)(?:\$\[|\$\$)/ig, function(all, latex, src) {
			latex = html_decode(latex);
			var renderMode = false;

			if(all.substring(0,2) == "$$" && all.substring(all.length-2, all.length) == "$$") {
				renderMode = true;

			} else if(all.substring(0, 2) == "$[" && all.substring(all.length-2, all.length) == "$[") {
				renderMode = false;
			}
			try {
				var s = katex.renderToString(latex , {displayMode : renderMode});
				return s;
			} catch(e) {
				console.log(e);
				return all;
			}
			return all;
		});
	}
});
