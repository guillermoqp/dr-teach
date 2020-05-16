var protocol=location.protocol;
var slashes=protocol.concat("//");
var host=slashes.concat(window.location.hostname);
/*DEVELOP */
var url_base=host+"/dr-teach/";
/*PRODUCTION */
//var url_base="https://dr-teach.herokuapp.com/";
localStorage.setItem("url_base_dr-teach",url_base);
sessionStorage.setItem("url_base_dr-teach",url_base);