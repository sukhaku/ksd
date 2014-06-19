jQuery(document).ready(function() {
    var visited = readCookie('modalshow');
    if (!visited || visited !== "true") {
        createCookie('modalshow', "true", 30);
        $.colorbox({width:"400px", inline:true, href:"#pop-up"});
    }
});